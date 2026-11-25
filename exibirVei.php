<?php
session_start();
include_once "conexao.php";

$termo = trim((string)($_GET['nome'] ?? ''));
$sql = "SELECT * FROM veiculo";
if ($termo !== '') {
    $sql .= " WHERE nome LIKE :nome";
}
$sql .= " ORDER BY id DESC";
$result_usuarios = $conn2->prepare($sql);
if ($termo !== '') {
    $busca = '%' . $termo . '%';
    $result_usuarios->bindParam(':nome', $busca, PDO::PARAM_STR);
}
$result_usuarios->execute();
$veiculos = $result_usuarios->fetchAll(PDO::FETCH_ASSOC);

function h($valor) {
    return htmlspecialchars((string)$valor, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#090909">
  <title>Veículos cadastrados | Voinich Motors</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    :root{color-scheme:dark;--red:#df2028;--bg:#090909;--muted:#a5a5a5}
    *{box-sizing:border-box}
    body{margin:0;min-height:100vh;background:radial-gradient(ellipse at 50% -15%,rgba(160,0,0,.2),transparent 48%),var(--bg);color:#f5f5f5;font-family:Segoe UI,Arial,sans-serif}
    .topbar{min-height:70px;padding:12px clamp(18px,5vw,64px);display:flex;align-items:center;justify-content:space-between;gap:16px;background:#080808;border-bottom:1px solid rgba(223,32,40,.5)}
    .brand{display:flex;align-items:center;gap:12px;color:#fff;text-decoration:none}
    .brand img{width:44px;height:44px;object-fit:contain}
    .brand strong{display:block;font-size:15px;letter-spacing:2px}
    .brand small{display:block;margin-top:3px;color:#999;font-size:9px;letter-spacing:1.8px}
    .back{padding:10px 14px;border:1px solid #444;border-radius:8px;color:#eee;text-decoration:none;font-size:13px}
    .back:hover{border-color:var(--red);background:#251012}
    main{width:min(1120px,calc(100% - 36px));margin:42px auto 56px}
    .heading{display:flex;align-items:flex-end;justify-content:space-between;gap:20px;margin-bottom:24px}
    .eyebrow{color:#f0444b;font-size:10px;font-weight:800;letter-spacing:2px}
    h1{margin:8px 0;color:#fff;font-size:clamp(28px,4vw,38px)}
    .heading p{margin:0;color:var(--muted);font-size:14px}
    .search{display:flex;gap:9px;width:min(430px,100%)}
    .search input{flex:1;min-width:0;padding:12px 14px;border:1px solid #3a3a3a;border-radius:8px;background:#151515;color:#fff;font:inherit}
    .search input:focus{outline:none;border-color:var(--red);box-shadow:0 0 0 3px rgba(223,32,40,.12)}
    .search button{padding:0 16px;border:0;border-radius:8px;background:var(--red);color:white;font-weight:700;cursor:pointer}
    .search button:hover{filter:brightness(1.15)}
    .results{display:flex;justify-content:space-between;align-items:center;margin:22px 0 14px;color:#aaa;font-size:12px}
    .results strong{color:#fff}
    .grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:18px}
    .vehicle{overflow:hidden;min-width:0;border:1px solid #303030;border-radius:14px;background:linear-gradient(155deg,#1c1c1c,#101010);box-shadow:0 14px 32px rgba(0,0,0,.24);transition:transform .2s,border-color .2s}
    .vehicle:hover{transform:translateY(-3px);border-color:rgba(223,32,40,.6)}
    .photo{height:190px;background:#0d0d0d;display:grid;place-items:center;overflow:hidden}
    .photo img{width:100%;height:100%;object-fit:cover}
    .photo .placeholder{color:#555;font-size:44px}
    .vehicle-body{padding:18px}
    .vehicle-id{color:#f0444b;font-size:10px;font-weight:800;letter-spacing:1.5px}
    .vehicle h2{margin:7px 0 13px;font-size:19px;line-height:1.3}
    .price{margin:0 0 16px;color:#fff;font-size:18px;font-weight:800}
    .details{display:grid;grid-template-columns:1fr 1fr;gap:10px;padding-top:14px;border-top:1px solid #303030}
    .detail{min-width:0}
    .detail span{display:block;color:#888;font-size:10px;text-transform:uppercase;letter-spacing:.7px}
    .detail strong{display:block;margin-top:4px;color:#ddd;font-size:12px;overflow-wrap:anywhere}
    .download{display:inline-flex;align-items:center;gap:7px;margin-top:16px;color:#ff777c;font-size:12px;text-decoration:none}
    .download:hover{color:#fff}
    .empty{grid-column:1/-1;padding:42px 20px;border:1px dashed #444;border-radius:12px;text-align:center;color:#aaa}
    .empty i{display:block;margin-bottom:12px;color:#e33;font-size:30px}
    .notice{margin-top:24px;padding:14px 16px;border:1px solid #292929;border-radius:9px;background:#121212;color:#999;font-size:12px;line-height:1.6}
    .notice i{margin-right:7px;color:#e0444b}
    footer{padding:18px;text-align:center;color:#666;font-size:10px;letter-spacing:1.5px}
    @media(max-width:900px){.grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
    @media(max-width:620px){.topbar{min-height:64px}.brand img{width:38px;height:38px}.brand strong{font-size:13px}.back{padding:9px 11px;font-size:11px}main{margin:30px auto 42px}.heading{align-items:stretch;flex-direction:column}.search{width:100%}.grid{grid-template-columns:1fr}.photo{height:210px}}
  </style>
</head>
<body>
<header class="topbar">
  <a class="brand" href="devs.php"><img src="logom-VMFinal.png" alt="Voinich Motors"><span><strong>VOINICH MOTORS</strong><small>PAINEL ADMINISTRATIVO</small></span></a>
  <a class="back" href="devs.php"><i class="fa fa-arrow-left"></i> Voltar ao painel</a>
</header>
<main>
  <section class="heading">
    <div>
      <span class="eyebrow">ESTOQUE · INVENTÁRIO</span>
      <h1>Veículos cadastrados</h1>
      <p>Consulte os veículos registrados no sistema demonstrativo.</p>
    </div>
    <form class="search" method="GET" action="">
      <input type="search" name="nome" value="<?php echo h($termo); ?>" placeholder="Buscar veículo pelo nome..." aria-label="Buscar veículo pelo nome">
      <button type="submit"><i class="fa fa-search"></i> Buscar</button>
    </form>
  </section>
  <?php if(isset($_SESSION['msg'])): ?>
    <div class="notice"><?php echo h($_SESSION['msg']); unset($_SESSION['msg']); ?></div>
  <?php endif; ?>
  <div class="results"><span><strong><?php echo count($veiculos); ?></strong> registro(s) encontrado(s)</span><a href="logvei.php" style="color:#ff777c;text-decoration:none"><i class="fa fa-plus"></i> Cadastrar veículo</a></div>
  <section class="grid" aria-label="Lista de veículos">
    <?php
    $encontrou = !empty($veiculos);
    foreach($veiculos as $row_usuario):
      $id = $row_usuario['id'];
      $foto = $row_usuario['foto'] ?? '';
      $caminhoFoto = (!empty($foto) && file_exists("imagens/$id/$foto")) ? "imagens/$id/" . rawurlencode($foto) : "imagens/icon_user.png";
    ?>
      <article class="vehicle">
        <div class="photo"><img src="<?php echo h($caminhoFoto); ?>" alt="<?php echo h($row_usuario['nome']); ?>" onerror="this.onerror=null;this.src='imagens/icon_user.png'"></div>
        <div class="vehicle-body">
          <span class="vehicle-id">VEÍCULO #<?php echo h($id); ?></span>
          <h2><?php echo h($row_usuario['nome']); ?></h2>
          <p class="price">R$ <?php echo h($row_usuario['preco']); ?></p>
          <div class="details">
            <div class="detail"><span>Tipo</span><strong><?php echo h($row_usuario['tipo']); ?></strong></div>
            <div class="detail"><span>Ano</span><strong><?php echo h($row_usuario['ano']); ?></strong></div>
            <div class="detail"><span>Quilometragem</span><strong><?php echo h($row_usuario['km']); ?></strong></div>
            <div class="detail"><span>Cor</span><strong><?php echo h($row_usuario['cor']); ?></strong></div>
            <div class="detail"><span>Placa</span><strong><?php echo h($row_usuario['placa']); ?></strong></div>
            <div class="detail"><span>Chassi</span><strong><?php echo h($row_usuario['chassi']); ?></strong></div>
            <div class="detail"><span>Renavam</span><strong><?php echo h($row_usuario['renavam']); ?></strong></div>
          </div>
          <?php if(!empty($foto) && file_exists("imagens/$id/$foto")): ?>
            <a class="download" href="<?php echo h($caminhoFoto); ?>" download><i class="fa fa-download"></i> Baixar foto</a>
          <?php endif; ?>
        </div>
      </article>
    <?php endforeach; ?>
    <?php if(!$encontrou): ?>
      <div class="empty"><i class="fa fa-car"></i>Nenhum veículo encontrado. Tente outra busca ou cadastre um veículo.</div>
    <?php endif; ?>
  </section>
  <aside class="notice"><i class="fa fa-info-circle"></i> Ambiente demonstrativo: utilize apenas dados fictícios durante os testes.</aside>
</main>
<footer>VOINICH MOTORS · AMBIENTE DEMONSTRATIVO</footer>
</body>
</html>