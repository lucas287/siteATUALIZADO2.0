<?php
session_start();
ob_start();
include_once "conexao.php";
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#090909">
  <title>Cadastrar veículo | Voinich Motors</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    :root{color-scheme:dark;--red:#df2028;--bg:#090909;--panel:#171717;--muted:#aaa}
    *{box-sizing:border-box}
    body{margin:0;min-height:100vh;background:radial-gradient(ellipse at 50% -15%,rgba(160,0,0,.22),transparent 48%),var(--bg);color:#f5f5f5;font-family:Segoe UI,Arial,sans-serif}
    .topbar{min-height:70px;padding:12px clamp(18px,5vw,64px);display:flex;align-items:center;justify-content:space-between;gap:16px;background:#080808;border-bottom:1px solid rgba(223,32,40,.5)}
    .brand{display:flex;align-items:center;gap:12px;color:#fff;text-decoration:none}
    .brand img{width:44px;height:44px;object-fit:contain}
    .brand strong{display:block;font-size:15px;letter-spacing:2px}
    .brand small{display:block;margin-top:3px;color:#999;font-size:9px;letter-spacing:1.8px}
    .back{padding:10px 14px;border:1px solid #444;border-radius:8px;color:#eee;text-decoration:none;font-size:13px}
    .back:hover{border-color:var(--red);background:#251012}
    main{width:min(850px,calc(100% - 32px));margin:42px auto 56px}
    .heading{margin-bottom:22px}
    .eyebrow{color:#f0444b;font-size:10px;font-weight:800;letter-spacing:2px}
    h1{margin:8px 0;color:#fff;font-size:clamp(27px,4vw,36px)}
    .heading p{margin:0;color:var(--muted);font-size:14px;line-height:1.6}
    .form-card{padding:clamp(20px,4vw,34px);border:1px solid #303030;border-radius:16px;background:linear-gradient(145deg,#1d1d1d,#111);box-shadow:0 18px 45px rgba(0,0,0,.3)}
    .fields{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}
    .field{display:flex;flex-direction:column;gap:8px;min-width:0}
    .field.full{grid-column:1/-1}
    label{color:#e8e8e8;font-size:12px;font-weight:700}
    input[type=text],input[type=file]{width:100%;min-height:46px;padding:12px 13px;border:1px solid #414141;border-radius:8px;background:#101010;color:#fff;font:inherit;font-size:14px}
    input:focus{outline:none;border-color:var(--red);box-shadow:0 0 0 3px rgba(223,32,40,.13)}
    input[type=file]{padding:9px;color:#bbb}
    input[type=file]::file-selector-button{margin-right:12px;padding:8px 11px;border:0;border-radius:6px;background:#292929;color:#fff;cursor:pointer}
    .hint{color:#858585;font-size:11px;line-height:1.5}
    .submit{width:100%;min-height:48px;margin-top:24px;border:0;border-radius:8px;background:linear-gradient(110deg,#a80e15,var(--red));color:#fff;font-size:14px;font-weight:800;letter-spacing:.4px;cursor:pointer;transition:filter .2s,transform .2s}
    .submit:hover{filter:brightness(1.15);transform:translateY(-1px)}
    .message{margin:0 0 18px;padding:12px 14px;border:1px solid rgba(55,190,110,.3);border-radius:8px;background:rgba(55,190,110,.1);color:#b8f2cb;font-size:13px}
    .footer{padding:18px;text-align:center;color:#666;font-size:10px;letter-spacing:1.5px}
    @media(max-width:600px){main{margin:30px auto 40px}.fields{grid-template-columns:1fr}.field.full{grid-column:auto}.topbar{min-height:64px}.brand img{width:38px;height:38px}.back{padding:9px 11px;font-size:11px}}
  </style>
  <script src="validador.js"></script>
</head>
<body>
  <header class="topbar">
    <a class="brand" href="devs.php"><img src="logom-VMFinal.png" alt="Voinich Motors"><span><strong>VOINICH MOTORS</strong><small>PAINEL ADMINISTRATIVO</small></span></a>
    <a class="back" href="devs.php"><i class="fa fa-arrow-left"></i> Voltar ao painel</a>
  </header>
  <main>
    <div class="heading">
      <span class="eyebrow">ESTOQUE · NOVO REGISTRO</span>
      <h1>Cadastrar veículo</h1>
      <p>Preencha os dados abaixo para adicionar um veículo ao sistema demonstrativo.</p>
    </div>
    <?php
    if (isset($_SESSION['msg'])) {
      echo "<div class='message'>" . $_SESSION['msg'] . "</div>";
      unset($_SESSION['msg']);
    }
    ?>
    <section class="form-card">
      <form name="cad_veiculo" method="POST" action="" enctype="multipart/form-data" onsubmit="return validarFormulario();">
        <div class="fields">
          <div class="field"><label for="nome">Nome do veículo</label><input id="nome" type="text" name="nome" placeholder="Ex.: BMW 320i Sport" required></div>
          <div class="field"><label for="preco">Preço</label><input id="preco" type="text" name="preco" placeholder="Ex.: 145000" required></div>
          <div class="field"><label for="placa">Placa</label><input id="placa" type="text" name="placa" placeholder="Placa do veículo" required></div>
          <div class="field"><label for="km">Quilometragem</label><input id="km" type="text" name="km" placeholder="Ex.: 45000 km" required></div>
          <div class="field"><label for="ano">Ano de fabricação</label><input id="ano" type="text" name="ano" placeholder="Ex.: 2022" required></div>
          <div class="field"><label for="cor">Cor</label><input id="cor" type="text" name="cor" placeholder="Ex.: Preto" required></div>
          <div class="field"><label for="chassi">Chassi</label><input id="chassi" type="text" name="chassi" placeholder="Número do chassi" required></div>
          <div class="field"><label for="renavam">Renavam</label><input id="renavam" type="text" name="renavam" placeholder="Código Renavam" required></div>
          <div class="field"><label for="tipo">Tipo</label><input id="tipo" type="text" name="tipo" placeholder="Carro ou moto" required></div>
          <div class="field"><label for="foto">Foto do veículo</label><input type="file" name="foto" id="foto" accept="image/*" required><span class="hint">Selecione uma imagem do veículo.</span></div>
        </div>
        <button class="submit" type="submit" name="Cadastrar" value="1"><i class="fa fa-plus-circle"></i> Cadastrar veículo</button>
      </form>
    </section>
  </main>
  <footer class="footer">VOINICH MOTORS · AMBIENTE DEMONSTRATIVO</footer>
</body>
</html>
<?php
if (!empty($dados['Cadastrar'])) {
    $arquivo = $_FILES['foto'];
    $query_veiculo = "INSERT INTO veiculo (placa, km, ano, chassi, cor, tipo, renavam, nome, preco, foto)
                      VALUES (:placa, :km, :ano, :chassi, :cor, :tipo, :renavam, :nome, :preco, :foto)";
    $cad_veiculo = $conn2->prepare($query_veiculo);
    $cad_veiculo->bindParam(':placa', $dados['placa'], PDO::PARAM_STR);
    $cad_veiculo->bindParam(':km', $dados['km'], PDO::PARAM_STR);
    $cad_veiculo->bindParam(':ano', $dados['ano'], PDO::PARAM_STR);
    $cad_veiculo->bindParam(':chassi', $dados['chassi'], PDO::PARAM_STR);
    $cad_veiculo->bindParam(':cor', $dados['cor'], PDO::PARAM_STR);
    $cad_veiculo->bindParam(':tipo', $dados['tipo'], PDO::PARAM_STR);
    $cad_veiculo->bindParam(':renavam', $dados['renavam'], PDO::PARAM_STR);
    $cad_veiculo->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
    $cad_veiculo->bindParam(':preco', $dados['preco'], PDO::PARAM_STR);
    $cad_veiculo->bindParam(':foto', $arquivo['name'], PDO::PARAM_STR);
    $cad_veiculo->execute();
    if ($cad_veiculo->rowCount()) {
        if (!empty($arquivo['name'])) {
            $ultimo_id = $conn2->lastInsertId();
            $diretorio = "imagens/$ultimo_id/";
            if (!is_dir($diretorio)) { mkdir($diretorio, 0755, true); }
            $nome_arquivo = $arquivo['name'];
            move_uploaded_file($arquivo['tmp_name'], $diretorio . $nome_arquivo);
            $_SESSION['msg'] = "Veículo e foto cadastrados com sucesso!";
            $_SESSION['msg_type'] = "success";
            header("Location: logvei.php");
            exit;
        } else {
            $_SESSION['msg'] = "Veículo cadastrado com sucesso!";
            $_SESSION['msg_type'] = "success";
            header("Location: logvei.php");
            exit;
        }
    } else {
        echo "<p style='color:#f44;text-align:center'>Erro: veículo não cadastrado.</p>";
    }
}
?>