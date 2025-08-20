<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Funcionários</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="listar1.css">
</head>
<body>

<div class="topnav">
  <div class="dropdown">
    <button class="dropbtn">Clientes <i class="fa fa-caret-down"></i></button>
    <div class="dropdown-content">
      <a href="exibirClientes.php">Listagem geral</a>  
      <a href="loguin2.php">Cadastro</a>
      <a href="atualizaListCli.php">Atualizar</a>
      <a href="apagarCli.php">Deletar</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Veículos <i class="fa fa-caret-down"></i></button>
    <div class="dropdown-content">
      <a href="exibirVei.php">Listagem geral</a>      
      <a href="logvei.php">Cadastro</a>
      <a href="atualistVei.php">Atualizar</a>
      <a href="delist.php">Deletar</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Funcionários <i class="fa fa-caret-down"></i></button>
    <div class="dropdown-content">
      <a href="logfun.php">Cadastro</a>
      <a href="atualizarFun.php">Atualizar</a>
      <a href="apagalistFun.php">Deletar</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Home <i class="fa fa-caret-down"></i></button>
    <div class="dropdown-content">
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

<h1>Funcionários</h1>

<?php
if (isset($_SESSION['msg'])) {
  echo "<p class='mensagem'>" . $_SESSION['msg'] . "</p>";
  unset($_SESSION['msg']);
}
?>

<div class="clientes-container">
<?php
if (empty($dados['EditarUsuario'])) {
    $nome = filter_input(INPUT_POST, 'nome');

      $result_clientes = "SELECT * FROM funcionario WHERE nome LIKE '%$nome%' ";
    $resultado_clientes = mysqli_query($conn, $result_clientes);
    while($row = mysqli_fetch_assoc($resultado_clientes)) {
    echo "<div class='cliente-card'>";
    echo "<h3>{$row['nome']}</h3>";
    echo "<p><strong>Código:</strong> {$row['id']}</p>";
    echo "<p><strong>CPF:</strong> {$row['cpf']}</p>";
    echo "<p><strong>Email:</strong> {$row['email']}</p>";
    echo "<p><strong>Senha:</strong> {$row['senha']}</p>";
    echo "</div>";
}
}
?>
</div>

</body>
</html>
