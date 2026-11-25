<?php
session_start();
include_once("conexao.php");

$busca = trim($_GET['nome'] ?? '');
$pagina = max(1, (int)($_GET['pagina'] ?? 1));
$porPagina = 8;
$inicio = ($pagina - 1) * $porPagina;

function e($valor) {
    return htmlspecialchars((string)($valor ?? ''), ENT_QUOTES, 'UTF-8');
}

$termo = '%' . $busca . '%';
$stmtCount = $conn->prepare("SELECT COUNT(*) AS total FROM clientes WHERE nome LIKE ?");
$stmtCount->bind_param("s", $termo);
$stmtCount->execute();
$total = (int)$stmtCount->get_result()->fetch_assoc()['total'];
$totalPaginas = max(1, (int)ceil($total / $porPagina));

$stmt = $conn->prepare("SELECT id, nome, cpf, cnh, rg, telefone, endereco, estado, email, genero FROM clientes WHERE nome LIKE ? ORDER BY id DESC LIMIT ?, ?");
$stmt->bind_param("sii", $termo, $inicio, $porPagina);
$stmt->execute();
$clientes = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Clientes | Voinich Motors</title>
<style>
:root{color-scheme:dark;--bg:#0b0b0d;--panel:#151518;--panel2:#1d1d22;--red:#e50914;--text:#f5f5f5;--muted:#a5a5ad;--line:#2b2b32}
*{box-sizing:border-box}
body{margin:0;background:radial-gradient(ellipse at top,#241014 0%,#0b0b0d 48%);color:var(--text);font-family:Inter,Segoe UI,Arial,sans-serif;min-height:100vh}
a{color:inherit;text-decoration:none}
.topbar{display:flex;align-items:center;justify-content:space-between;gap:18px;padding:18px clamp(18px,4vw,54px);background:rgba(12,12,14,.94);border-bottom:1px solid #3b171b;position:sticky;top:0;z-index:10;backdrop-filter:blur(12px)}
.brand{font-size:19px;font-weight:900;letter-spacing:1.5px}.brand span{color:var(--red)}
.nav{display:flex;gap:8px;flex-wrap:wrap}.nav a{padding:10px 13px;border-radius:9px;color:#c9c9ce;font-size:13px;font-weight:650;transition:.2s}.nav a:hover,.nav a.active{background:#351317;color:#fff}
main{width:min(1180px,92%);margin:38px auto 60px}
.heading{display:flex;justify-content:space-between;align-items:end;gap:20px;margin-bottom:25px}.eyebrow{color:#ff5660;text-transform:uppercase;letter-spacing:2px;font-size:11px;font-weight:800}
h1{font-size:clamp(28px,4vw,40px);margin:7px 0 5px;letter-spacing:-1px}.sub{color:var(--muted);margin:0;font-size:14px}
.primary{display:inline-flex;align-items:center;justify-content:center;background:var(--red);color:white;border:0;border-radius:10px;padding:12px 17px;font-weight:800;font-size:13px;cursor:pointer;box-shadow:0 7px 22px #e509142b}.primary:hover{background:#ff2530}
.stats{display:flex;gap:12px;margin-bottom:20px}.stat{background:linear-gradient(135deg,#1b1b20,#121215);border:1px solid var(--line);border-radius:13px;padding:15px 18px;min-width:155px}.stat strong{display:block;font-size:24px}.stat span{color:var(--muted);font-size:12px}
.search{display:flex;gap:10px;background:var(--panel);border:1px solid var(--line);padding:13px;border-radius:14px;margin-bottom:20px}.search input{flex:1;min-width:0;background:#0d0d10;border:1px solid #33333b;color:#fff;border-radius:9px;padding:12px 14px;font-size:14px;outline:none}.search input:focus{border-color:var(--red)}.search button{border:0;border-radius:9px;padding:0 20px;background:#29292f;color:white;font-weight:750;cursor:pointer}.search button:hover{background:#3b2024}
.grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:15px}.client{background:linear-gradient(145deg,#19191e,#121215);border:1px solid var(--line);border-radius:15px;padding:19px;min-width:0;transition:.2s}.client:hover{border-color:#76242b;transform:translateY(-2px)}.client-head{display:flex;align-items:center;gap:13px;border-bottom:1px solid var(--line);padding-bottom:14px;margin-bottom:14px}.avatar{width:43px;height:43px;display:grid;place-items:center;flex:none;border-radius:12px;background:#351317;color:#ff6b73;font-size:17px;font-weight:900}.client h2{font-size:17px;margin:0 0 4px;overflow-wrap:anywhere}.code{color:var(--muted);font-size:11px}
.details{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}.detail{min-width:0}.detail small{display:block;color:#85858e;font-size:10px;text-transform:uppercase;letter-spacing:1px;margin-bottom:4px}.detail span{display:block;color:#e5e5e8;font-size:13px;overflow-wrap:anywhere}.wide{grid-column:1/-1}
.actions{display:flex;gap:9px;margin-top:17px;padding-top:14px;border-top:1px solid var(--line)}.action{padding:9px 13px;border-radius:8px;font-size:12px;font-weight:800;background:#29292f;color:#eee}.action.edit:hover{background:#343b4d}.action.delete{color:#ff777e;background:#351317}.action.delete:hover{background:#551a21}
.empty{padding:38px 20px;text-align:center;border:1px dashed #444;border-radius:14px;color:var(--muted);background:#141417}
.pagination{display:flex;justify-content:center;align-items:center;gap:7px;margin:26px 0;flex-wrap:wrap}.pagination a,.pagination span{padding:9px 13px;border:1px solid var(--line);border-radius:8px;color:#ddd;font-size:13px}.pagination .current{background:var(--red);border-color:var(--red);color:white;font-weight:800}
.message{padding:13px 16px;margin-bottom:18px;background:#19251c;border:1px solid #315b39;border-radius:10px;color:#b8f0c2}
@media(max-width:760px){.topbar{align-items:flex-start;flex-direction:column}.nav{width:100%;gap:3px}.nav a{padding:9px;font-size:12px}.heading{align-items:flex-start;flex-direction:column}.grid{grid-template-columns:1fr}.search{flex-wrap:wrap}.search button{padding:12px 16px}.stats{width:100%}.stat{flex:1}}
@media(max-width:390px){.details{grid-template-columns:1fr}.wide{grid-column:auto}.search input{flex-basis:100%}}
</style>
</head>
<body>
<header class="topbar">
  <a class="brand" href="devs.php">VOINICH <span>MOTORS</span></a>
  <nav class="nav" aria-label="Navegação administrativa">
    <a class="active" href="exibirClientes.php">Clientes</a>
    <a href="loguin2.php">Cadastrar cliente</a>
    <a href="atualizaListCli.php">Editar clientes</a>
    <a href="apagarCli.php">Excluir clientes</a>
    <a href="exibirVei.php">Veículos</a>
    <a href="exibirFuncionario.php">Funcionários</a>
    <a href="devs.php">Painel</a>
  </nav>
</header>
<main>
  <section class="heading">
    <div><div class="eyebrow">Gestão de relacionamento</div><h1>Clientes</h1><p class="sub">Consulte e gerencie os clientes cadastrados na Voinich Motors.</p></div>
    <a class="primary" href="loguin2.php">＋ Novo cliente</a>
  </section>
  <?php if(isset($_SESSION['msg'])): ?>
    <div class="message"><?php echo strip_tags((string)$_SESSION['msg']); unset($_SESSION['msg']); ?></div>
  <?php endif; ?>
  <section class="stats"><div class="stat"><strong><?php echo $total; ?></strong><span>Clientes encontrados</span></div></section>
  <form class="search" method="GET" action="exibirClientes.php">
    <input type="search" name="nome" placeholder="Pesquisar cliente pelo nome..." value="<?php echo e($busca); ?>">
    <button type="submit">Pesquisar</button>
    <?php if($busca !== ''): ?><a class="action" href="exibirClientes.php">Limpar</a><?php endif; ?>
  </form>
  <?php if(!$clientes): ?>
    <div class="empty"><?php echo $busca !== '' ? 'Nenhum cliente encontrado para essa pesquisa.' : 'Ainda não há clientes cadastrados.'; ?></div>
  <?php else: ?>
    <section class="grid">
    <?php foreach($clientes as $cliente): ?>
      <article class="client">
        <div class="client-head">
          <div class="avatar"><?php echo e(mb_strtoupper(mb_substr((string)$cliente['nome'],0,1,'UTF-8'),'UTF-8')); ?></div>
          <div><h2><?php echo e($cliente['nome']); ?></h2><div class="code">Cadastro #<?php echo (int)$cliente['id']; ?></div></div>
        </div>
        <div class="details">
          <div class="detail"><small>CPF</small><span><?php echo e($cliente['cpf']); ?></span></div>
          <div class="detail"><small>CNH</small><span><?php echo e($cliente['cnh']); ?></span></div>
          <div class="detail"><small>RG</small><span><?php echo e($cliente['rg']); ?></span></div>
          <div class="detail"><small>Telefone</small><span><?php echo e($cliente['telefone']); ?></span></div>
          <div class="detail wide"><small>Endereço</small><span><?php echo e($cliente['endereco']); ?><?php echo !empty($cliente['estado']) ? ' — '.e($cliente['estado']) : ''; ?></span></div>
          <div class="detail wide"><small>E-mail</small><span><?php echo e($cliente['email']); ?></span></div>
          <div class="detail"><small>Gênero</small><span><?php echo e($cliente['genero']); ?></span></div>
        </div>
        <div class="actions">
          <a class="action edit" href="editCli.php?id=<?php echo (int)$cliente['id']; ?>">Editar cadastro</a>
          <a class="action delete" href="apagaCli.php?id=<?php echo (int)$cliente['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</a>
        </div>
      </article>
    <?php endforeach; ?>
    </section>
    <?php if($totalPaginas > 1): ?>
    <nav class="pagination" aria-label="Paginação">
      <?php if($pagina > 1): ?><a href="?nome=<?php echo urlencode($busca); ?>&pagina=<?php echo $pagina-1; ?>">‹ Anterior</a><?php endif; ?>
      <?php for($p=max(1,$pagina-2); $p<=min($totalPaginas,$pagina+2); $p++): ?>
        <?php if($p===$pagina): ?><span class="current"><?php echo $p; ?></span><?php else: ?><a href="?nome=<?php echo urlencode($busca); ?>&pagina=<?php echo $p; ?>"><?php echo $p; ?></a><?php endif; ?>
      <?php endfor; ?>
      <?php if($pagina < $totalPaginas): ?><a href="?nome=<?php echo urlencode($busca); ?>&pagina=<?php echo $pagina+1; ?>">Próxima ›</a><?php endif; ?>
    </nav>
    <?php endif; ?>
  <?php endif; ?>
</main>
</body>
</html>
