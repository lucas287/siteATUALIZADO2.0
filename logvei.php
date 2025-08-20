<?php
session_start();
ob_start();
include_once "conexao.php";

// Captura os dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro de Veículos</title>
  <script src="validador.js"></script>
  <link rel="stylesheet" type="text/css" href="lp.css">
  <style>
    body {
      background-color: #121212;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      color: white;
    }
    h1 {
      margin-top: 50px;
      font-size: 2rem;
      text-align: center;
      color: #ffffff;
    }
    .ex1 {
      width: 90%;
      max-width: 600px;
      background-color: #222;
      padding: 30px;
      border-radius: 10px;
      margin-top: 20px;
      box-shadow: 0px 4px 12px rgba(0, 123, 255, 0.3);
      text-align: center;
      margin-bottom: 50px;
    }
    .ex1 form {
      display: flex;
      flex-direction: column;
      gap: 15px;
      align-items: flex-start;
    }
    .ex1 input[type="text"], .ex1 input[type="file"], .ex1 input[type="submit"] {
      padding: 12px;
      border: 1px solid #444;
      border-radius: 5px;
      background-color: #333;
      color: #fff;
      font-size: 16px;
      width: 100%;
    }
    .ex1 input[type="text"]:focus, .ex1 input[type="file"]:focus {
      border-color: #007bff;
      outline: none;
    }
    .ex1 label {
      color: #fff;
      font-size: 14px;
      text-align: left;
      width: 100%;
      margin-bottom: 5px;
    }
    .ex1 input[type="submit"] {
      padding: 12px;
      background-color: #007bff;
      color: #fff;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .ex1 input[type="submit"]:hover {
      background-color: #0056b3;
    }
    .message {
      color: #f8d7da;
      background-color: #f8d7da;
      padding: 10px;
      margin-top: 20px;
      border-radius: 5px;
    }
    .message.success {
      color: #155724;
      background-color: #d4edda;
    }
  </style>
</head>
<body>

<center>
  <h1>Cadastro de Veículo</h1>

  <?php
  if (isset($_SESSION['msg'])) {
    echo "<div class='message {$_SESSION['msg_type']}'>" . $_SESSION['msg'] . "</div>";
    unset($_SESSION['msg']);
  }
  ?>

  <div class="ex1">
    <form name="cad_veiculo" method="POST" action="" enctype="multipart/form-data" onsubmit="return validarFormulario();">
      <label>Nome do Veículo</label>
      <input type="text" name="nome" placeholder="Nome do veículo" required>

      <label>Preço</label>
      <input type="text" name="preco" placeholder="Preço do veículo" required>

      <label>Placa</label>
      <input type="text" name="placa" placeholder="Placa" required>

      <label>Quilometragem</label>
      <input type="text" name="km" placeholder="Quilometragem" required>

      <label>Ano de Fabricação</label>
      <input type="text" name="ano" placeholder="Ano de fabricação" required>

      <label>Chassi</label>
      <input type="text" name="chassi" placeholder="Número do Chassi" required>

      <label>Cor</label>
      <input type="text" name="cor" placeholder="Cor do veículo" required>

      <label>Tipo</label>
      <input type="text" name="tipo" placeholder="Tipo (Carro, Moto)" required>

      <label>Renavam</label>
      <input type="text" name="renavam" placeholder="Código Renavam" required>

      <label>Foto do Veículo</label>
      <input type="file" name="foto" id="foto" required>

      <input type="submit" value="Cadastrar" name="Cadastrar">
    </form>
  </div>

</center>

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
            mkdir($diretorio, 0755);
            $nome_arquivo = $arquivo['name'];
            move_uploaded_file($arquivo['tmp_name'], $diretorio . $nome_arquivo);

            $_SESSION['msg'] = "<p style='color: green;'>Veículo e a foto cadastrados com sucesso!</p>";
            $_SESSION['msg_type'] = "success";
            header("Location: logvei.php");
            exit;
        } else {
            $_SESSION['msg'] = "<p style='color: green;'>Veículo cadastrado com sucesso!</p>";
            $_SESSION['msg_type'] = "success";
            header("Location: logvei.php");
            exit;
        }
    } else {
        echo "<p style='color: #f00;'>Erro: Veículo não cadastrado com sucesso!</p>";
    }
}
?>

</body>
</html>
