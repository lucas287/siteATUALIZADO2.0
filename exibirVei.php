<?php
session_start();
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Veículos</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="listar1">
</head>
<body>

<div class="topnavv">
  <div class="dropdownv">
    <button class="dropbtnv">Clientes <i class="fa fa-caret-down"></i></button>
    <div class="dropdownv-content">
      <a href="exibirClientes.php">Listagem geral</a>  
     <a href="loguin.php">Cadastro</a>
    <a href="atualizaListCli.php">Atualizar</a>
    <a href="apagarCli.php">Deletar</a>
    </div>
  </div>

  <div class="dropdownv">
    <button class="dropbtnv">Veículos <i class="fa fa-caret-down"></i></button>
    <div class="dropdownv-content">
      
      <a href="logvei.php">Cadastro</a>
      <a href="atualistVei.php">Atualizar</a>
    <a href="delist.php">Deletar</a>
    </div>
  </div>

  <div class="dropdownv">
    <button class="dropbtnv">Funcionários <i class="fa fa-caret-down"></i></button>
    <div class="dropdownv-content">
      <a href="exibirFuncionario.php">Listagem geral</a>  
      <a href="logfun.php">Cadastro</a>
      <a href="atualizarFun.php">Atualizar</a>
      <a href="apagalistFun.php">Deletar</a>
    </div>
  </div>

  <div class="dropdownv">
    <button class="dropbtnv">Home <i class="fa fa-caret-down"></i></button>
    <div class="dropdownv-content">
      <a href="devs.php">Página Inicial</a>
    </div>
  </div>
</div>
<center>
  <form name="edit_usuario" method="POST" action="">
    <input type="text" name="nome">
    <input type="submit" value="Pesquisar" name="EditarUsuario"> 
  </form>
</center>

<h1>Veículos</h1>

<?php
if(isset($_SESSION['msg'])) {
  echo "<p class='mensagem'>" . $_SESSION['msg'] . "</p>";
  unset($_SESSION['msg']);
}
?>

<div class="veiculos-container">
<?php
if (empty($dados['EditarUsuario'])) {
    $nome = filter_input(INPUT_POST, 'nome');
$query_usuarios = "SELECT * FROM veiculo WHERE nome LIKE '%$nome%' ORDER BY id";
$result_usuarios = $conn2->prepare($query_usuarios);
$result_usuarios->execute();

while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
  extract($row_usuario);

  echo "<div class='veiculo-card'>";
  echo "<img src='";

  if(!empty($foto) && file_exists("imagens/$id/$foto")){
    echo "imagens/$id/$foto";
  } else {
    echo "imagens/icon_user.png";
  }

  echo "' alt='Imagem do veículo'>";

  echo "<p><strong>ID:</strong> $id</p>";
  echo "<p><strong>Placa:</strong> $placa</p>";
  echo "<p><strong>KM:</strong> $km</p>";
  echo "<p><strong>Ano:</strong> $ano</p>";
  echo "<p><strong>Chassi:</strong> $chassi</p>";
  echo "<p><strong>Cor:</strong> $cor</p>";
  echo "<p><strong>Tipo:</strong> $tipo</p>";
  echo "<p><strong>Renavam:</strong> $renavam</p>";
  echo "<p><strong>Nome:</strong> $nome</p>";
  echo "<p><strong>Preço:</strong> R$ $preco</p>";

  if(!empty($foto) && file_exists("imagens/$id/$foto")){
    echo "<a href='imagens/$id/$foto' download>Download da imagem</a>";
  }

  echo "</div>";
  }
}
?>
</div>

</body>
</html>
