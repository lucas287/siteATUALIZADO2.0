<?php
  session_start();
  include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Clientes</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="listar1.css">
</head>
<body class="bodys">

<div class="topnav">
  <div class="dropdown">
    <button class="dropbtn">Clientes<i class="fa fa-caret-down"></i></button>
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
      <a href="exibirFuncionario.php">Listagem geral</a>  
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
<h1>Clientes</h1>

<?php
if(isset($_SESSION['msg'])) {
    echo "<p class='mensagem'>" . $_SESSION['msg'] . "</p>";
    unset($_SESSION['msg']);
}
?>

<div class="clientes-container">
<?php
if (empty($dados['EditarUsuario'])) {
    $nome = filter_input(INPUT_POST, 'nome');

      $result_clientes = "SELECT * FROM clientes WHERE nome LIKE '%$nome%' ";
    $resultado_clientes = mysqli_query($conn, $result_clientes);
    while($row_cliente = mysqli_fetch_assoc($resultado_clientes))
     {
    echo "<div class='cliente-card'>";
    echo "<h3>{$row_cliente['nome']}</h3>";
    echo "<p><strong>Código:</strong> {$row_cliente['id']}</p>";
    echo "<p><strong>CPF:</strong> {$row_cliente['cpf']}</p>";
    echo "<p><strong>CNH:</strong> {$row_cliente['cnh']}</p>";
    echo "<p><strong>RG:</strong> {$row_cliente['rg']}</p>";
    echo "<p><strong>Telefone:</strong> {$row_cliente['telefone']}</p>";
    echo "<p><strong>Endereço:</strong> {$row_cliente['endereco']}</p>";
    echo "<p><strong>Estado:</strong> {$row_cliente['estado']}</p>";
    echo "<p><strong>Email:</strong> {$row_cliente['email']}</p>";
    echo "<p><strong>Gênero:</strong> {$row_cliente['genero']}</p>";
    echo "</div>";
  }
}
?>
</div>

</body>
</html>
