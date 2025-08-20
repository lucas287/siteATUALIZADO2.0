<?php
  session_start();
  include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Página Principal - Banco de Dados</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    /* Reset básico */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: black;
      color: white;
      padding: 30px;
    }

    /* Top Navigation */
    .topnav {
      background-color: darkred;
      display: flex;
      flex-wrap: wrap;
      padding: 15px 20px;
      border-radius: 8px;
      margin-bottom: 20px;
      justify-content: space-between;
    }

    .topnav .dropdown {
      position: relative;
    }

    .topnav .dropbtn {
      background-color: black;
      color: white;
      padding: 14px 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
    }

    .topnav .dropbtn:hover {
      background-color: darkred;
    }

    .topnav .dropdown-content {
      display: none;
      position: absolute;
      background-color: darkgrey;
      min-width: 160px;
      box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
      z-index: 1;
      border-radius: 4px;
    }

    .topnav .dropdown-content a {
      color: white;
      padding: 12px 16px;
      display: block;
      text-decoration: none;
    }

    .topnav .dropdown-content a:hover {
      background-color: black;
    }

    .topnav .dropdown:hover .dropdown-content {
      display: block;
    }

    /* Estilo de tabelas */
    table {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
      background-color: black;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    th, td {
      text-align: left;
      padding: 12px;
      border: 1px solid red;
    }

    th {
      background-color: black;
      color: white;
    }

    td {
      background-color: black;
    }

    tr:nth-child(even) td {
      background-color: black;
    }

    tr:hover td {
      background-color: darkred;
    }

    /* Estilo dos links de edição e exclusão */
    .action-links a {
      color:white;
      text-decoration: none;
      margin-right: 10px;
    }

    .action-links a:hover {
      text-decoration: underline;
    }

    /* Paginação */
    .pagination {
      display: flex;
      gap: 10px;
      margin-top: 20px;
      justify-content: center;
    }

    .pagination a {
      text-decoration: none;
      padding: 8px 12px;
      background-color: black;
      color: white;
      border-radius: 5px;
      transition: background 0.3s ease;
    }

    .pagination a:hover {
      background-color: darkred;
    }
    
    /* Mensagens */
    h3.p {
      background-color: white;
      color: gray;
      padding: 10px 15px;
      border-radius: 6px;
      margin-bottom: 20px;
      max-width: 800px;
    }

  </style>
</head>
<body>

<div class="topnav">

  <div class="dropdown">
    <button class="dropbtn">clientes
      <i class="fa fa-caret-down"></i>
    </button>

    <div class="dropdown-content">
      <a href="exibirClientes.php">Listagem geral</a>
      <a href="loguin.php">Cadastro</a>
      <a href="atualizaListCli.php">Atualizar</a>
      <a href="apagarCli.php">Deletar</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">veiculos
      <i class="fa fa-caret-down"></i>
    </button>

    <div class="dropdown-content">
      <a href="exibirVei.php">Listagem geral</a>      
      <a href="logvei.php">Cadastro</a>
      <a href="atualistVei.php">Atualizar</a>
        <a href="delist.php">Deletar</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Funcionarios
      <i class="fa fa-caret-down"></i>
    </button>

    <div class="dropdown-content">
      <a href="exibirFuncionario.php">Listagem geral</a>  
      <a href="logfun.php">Cadastro</a>
      <a href="atualizarFun.php">Atualizar</a>
      <!--<a href="#">Deletar</a>-->
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Home
      <i class="fa fa-caret-down"></i>
    </button>

    <div class="dropdown-content">
      <a href="devs.php">Pagina Inicial</a>
    </div>
  </div>

</div>

<h3 class="p">
<?php
    if(isset($_SESSION['msg'])){
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
    
    //Receber o número da página
    $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);   
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
    
    //Setar a quantidade de itens por pagina
    $qnt_result_pg = 3;
    
    //calcular o inicio visualização
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
    
    $result_usuarios = "SELECT * FROM funcionario LIMIT $inicio, $qnt_result_pg";
    $resultado_usuarios = mysqli_query($conn, $result_usuarios);
?>
  
<!-- Tabela de Dados -->
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>CPF</th>
      <th>E-mail</th>
      <th>Senha</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while($row_aluno = mysqli_fetch_assoc($resultado_usuarios)){
      echo "<tr>";
      echo "<td>" . $row_aluno['id'] . "</td>";
      echo "<td>" . $row_aluno['nome'] . "</td>";
      echo "<td>" . $row_aluno['cpf'] . "</td>";
      echo "<td>" . $row_aluno['email'] . "</td>";
      echo "<td>" . $row_aluno['senha'] . "</td>";
      echo "<td class='action-links'>
              <a href='editfun.php?id=" . $row_aluno['id'] . "'>Editar</a>
              <a href='apagaFun.php?id=" . $row_aluno['id'] . "'>Apagar</a>
            </td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>

<!-- Paginação -->
<div class="pagination">
  <?php
    //Paginção - Somar a quantidade de usuários
    $result_pg = "SELECT COUNT(id) AS num_result FROM funcionario";
    $resultado_pg = mysqli_query($conn, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);

    //Quantidade de pagina
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    //Limitar os link antes depois
    $max_links = 2;
    echo "<a href='apagalistFun.php?pagina=1'>Primeira</a> ";
    
    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
      if($pag_ant >= 1){
        echo "<a href='apagalistFun.php?pagina=$pag_ant'>$pag_ant</a> ";
      }
    }

    echo "$pagina ";
    
    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
      if($pag_dep <= $quantidade_pg){
        echo "<a href='apagalistFun.php?pagina=$pag_dep'>$pag_dep</a> ";
      }
    }
    
    echo "<a href='apagalistFun.php?pagina=$quantidade_pg'>Ultima</a>";
  ?>
</div>

</body>
</html>
