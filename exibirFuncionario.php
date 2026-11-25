<?php
session_start();
include_once("conexao.php");

$busca = trim($_GET['nome'] ?? '');
$pagina = max(1, (int)($_GET['pagina'] ?? 1));
$porPagina = 8;
$inicio = ($pagina - 1) * $porPagina;
$termo = '%' . $busca . '%';

function esc($v) { return htmlspecialchars((string)($v ?? ''), ENT_QUOTES, 'UTF-8'); }

$count = $conn->prepare("SELECT COUNT(*) AS total FROM funcionario WHERE nome LIKE ?");
$count->bind_param("s", $termo);
$count->execute();
$total = (int)$count->get_result()->fetch_assoc()['total'];
$totalPaginas = max(1, (int)ceil($total / $porPagina));

$stmt = $conn->prepare("SELECT id, nome, cpf, email FROM funcionario WHERE nome LIKE ? ORDER BY id DESC LIMIT ?, ?");
$stmt->bind_param("sii", $termo, $inicio, $porPagina);
$stmt->execute();
$funcionarios = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Funcionários | Voinich Motors</title>
<style>
:root{color-scheme:dark;--bg:#0b0b0d;--panel:#17171c;--red:#e50914;--text:#f5f5f5;--muted:#a5a5ad;--line:#2c2c33}
*{box-sizing:border-box}body{margin:0;min-height:100vh;background:radial-gradient(ellipse at top,#241014 0%,#0b0b0d 48%);color:var(--text);font-family:Inter,Segoe UI,Arial,sans-serif}
a{color:inherit;text-decoration:none}.topbar{display:flex;align-items:center;justify-content:space-between;gap:18px;padding:18px clamp(18px,4vw,54px);background:rgba(12,12,14,.95);border-bottom:1px solid #3b171b;position:sticky;top:0;z-index:5;backdrop-filter:blur(12px)}
.brand{font-size:19px;font-weight:900;letter-spacing:1.5px}.brand span{color:var(--red)}.nav{display:flex;gap:7px;flex-wrap:wrap}.nav a{padding:10px 12px;border-radius:9px;color:#c9c9ce;font-size:13px;font-weight:650}.nav a:hover,.nav a.active{background:#351317;color:#fff}
main{width:min(1180px,92%);margin:38px auto 60px}.heading{display:flex;justify-content:space-between;align-items:end;gap:20px;margin-bottom:24px}.eyebrow{color:#ff5660;text-transform:uppercase;letter-spacing:2px;font-size:11px;font-weight:800}h1{font-size:clamp(28px,4vw,40px);margin:7px 0 5px;letter-spacing:-1px}.sub{color:var(--muted);margin:0;font-size:14px}
.primary{display:inline-flex;align-items:center;justify-content:center;background:var(--red);color:white;border:0;border-radius:10px;padding:12px 17px;font-weight:800;font-size:13px;cursor:pointer}.primary:hover{background:#ff2530}
.stat{display:inline-block;background:linear-gradient(135deg,#1b1b20,#121215);border:1px solid var(--line);border-radius:13px;padding:14px 18px;margin-bottom:18px}.stat strong{display:block;font-size:24px}.stat span{color:var(--muted);font-size:12px}
.search{display:flex;gap:10px;background:var(--panel);border:1px solid var(--line);padding:13px;border-radius:14px;margin-bottom:20px}.search input{flex:1;min-width:0;background:#0d0d10;border:1px solid #33333b;color:#fff;border-radius:9px;padding:12px 14px;font-size:14px;outline:none}.search input:focus{border-color:var(--red)}.search button{border:0;border-radius:9px;padding:0 20px;background:#29292f;color:white;font-weight:750;cursor:pointer}
.grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:15px}.employee{background:linear-gradient(145deg,#19191e,#121215);border:1px solid var(--line);border-radius:15px;padding:19px;min-width:0;transition:.2s}.employee:hover{border-color:#76242b;transform:translateY(-2px)}
.head{display:flex;align-items:center;gap:13px;border-bottom:1px solid var(--line);padding-bottom:14px;margin-bottom:14px}.avatar{width:44px;height:44px;display:grid;place-items:center;flex:none;border-radius:12px;background:#351317;color:#ff6b73;font-size:17px;font-weight:900}.employee h2{font-size:17px;margin:0 0 4px;overflow-wrap:anywhere}.code{color:var(--muted);font-size:11px}
.detail small{display:block;color:#85858e;font-size:10px;text-transform:uppercase;letter-spacing:1px;margin-bottom:4px}.detail span{display:block;color:#e5e5e8;font-size:13px;overflow-wrap:anywhere}
.actions{display:flex;gap:9px;margin-top:17px;padding-top:14px;border-top:1px solid var(--line)}.action{padding:9px 13px;border-radius:8px;font-size:12px;font-weight:800;background:#29292f;color:#eee}.action.delete{color:#ff777e;background:#351317}
.empty{padding:38px 20px;text-align:center;border:1px dashed #444;border-radius:14px;color:var(--muted);background:#141417}.message{padding:13px 16px;margin-bottom:18px;background:#19251c;border:1px solid #315b39;border-radius:10px;color:#b8f0c2}
.pagination{display:flex;justify-content:center;align-items:center;gap:7px;margin:26px 0;flex-wrap:wrap}.pagination a,.pagination span{padding:9px 13px;border:1px solid var(--line);border-radius:8px;color:#ddd;font-size:13px}.pagination .current{background:var(--red);border-color:var(--red);color:white;font-weight:800}
@media(max-width:760px){.topbar{align-items:flex-start;flex-direction:column}.nav{width:100%;gap:3px}.nav a{padding:9px;font-size:12px}.heading{align-items:flex-start;flex-direction:column}.grid{grid-template-columns:1fr}.search{flex-wrap:wrap}.search input{flex-basis:100%}.search button{padding:12px 16px}}
</style>
</head>
<body>
<header class="topbar">
<a class="brand" href="devs.php">VOINICH <span>MOTORS</span></a>
<nav class="nav" aria-label="Navegação administrativa">
<a href="exibirClientes.php">Clientes</a><a href="exibirVei.php">Veículos</a><a class="active" href="exibirFuncionario.php">Funcionários</a><a href="logfun.php">Cadastrar funcionário</a><a href="atualizarFun.php">Editar funcionários</a><a href="apagalistFun.php">Excluir funcionários</a><a href="devs.php">Painel</a>
</nav></header>
<main>
<section class="heading"><div><div class="eyebrow">Gestão da equipe</div><h1>Funcionários</h1><p class="sub">Consulte e gerencie os colaboradores cadastrados.</p></div><a class="primary" href="logfun.php">＋ Novo funcionário</a></section>
<?php if(isset($_SESSION['msg'])): ?><div class="message"><?php echo strip_tags((string)$_SESSION['msg']); unset($_SESSION['msg']); ?></div><?php endif; ?>
<div class="stat"><strong><?php echo $total; ?></strong><span>Funcionários encontrados</span></div>
<form class="search" method="GET" action="exibirFuncionario.php"><input type="search" name="nome" placeholder="Pesquisar funcionário pelo nome..." value="<?php echo esc($busca); ?>"><button type="submit">Pesquisar</button><?php if($busca!==''): ?><a class="action" href="exibirFuncionario.php">Limpar</a><?php endif; ?></form>
<?php if(!$funcionarios): ?><div class="empty"><?php echo $busca!==''?'Nenhum funcionário encontrado para essa pesquisa.':'Ainda não há funcionários cadastrados.'; ?></div>
<?php else: ?><section class="grid">
<?php foreach($funcionarios as $func): $iniciais = strtoupper(substr(trim((string)$func['nome']),0,1)); ?>
<article class="employee"><div class="head"><div class="avatar"><?php echo esc($iniciais); ?></div><div><h2><?php echo esc($func['nome']); ?></h2><div class="code">Cadastro #<?php echo (int)$func['id']; ?></div></div></div>
<div class="detail"><small>CPF</small><span><?php echo esc($func['cpf']); ?></span></div><div class="detail" style="margin-top:12px"><small>E-mail</small><span><?php echo esc($func['email']); ?></span></div>
<div class="actions"><a class="action" href="editfun.php?id=<?php echo (int)$func['id']; ?>">Editar cadastro</a><a class="action delete" href="apagaFun.php?id=<?php echo (int)$func['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este funcionário?')">Excluir</a></div></article>
<?php endforeach; ?></section>
<?php if($totalPaginas>1): ?><nav class="pagination" aria-label="Paginação"><?php if($pagina>1): ?><a href="?nome=<?php echo urlencode($busca); ?>&pagina=<?php echo $pagina-1; ?>">‹ Anterior</a><?php endif; ?><?php for($p=max(1,$pagina-2);$p<=min($totalPaginas,$pagina+2);$p++): ?><?php if($p===$pagina): ?><span class="current"><?php echo $p; ?></span><?php else: ?><a href="?nome=<?php echo urlencode($busca); ?>&pagina=<?php echo $p; ?>"><?php echo $p; ?></a><?php endif; ?><?php endfor; ?><?php if($pagina<$totalPaginas): ?><a href="?nome=<?php echo urlencode($busca); ?>&pagina=<?php echo $pagina+1; ?>">Próxima ›</a><?php endif; ?></nav><?php endif; ?><?php endif; ?>
</main></body></html>