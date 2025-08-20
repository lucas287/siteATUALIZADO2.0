<?php
  session_start();
  include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <style>
    /* Reset Básico */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Corpo da página */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: black;/*fundo inicial*/
      color: white;/*letrA tabela*/
      padding: 30px;
    }

    /* Títulos */
    h1, h2, h3 {
      color: white;
      margin-bottom: 20px;
      text-align: center;
    }

    /* Barra de navegação */
    .topnav {
      display: flex;
      justify-content: space-around;
      background-color: darkred;/*dropdwn fundo*/
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 30px;
    }

    .topnav .dropdown {
      position: relative;
    }

    .topnav .dropbtn {
      background-color: black;/*fundo botao*/
      color: white;/*letra botao*/
      padding: 14px 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .topnav .dropbtn:hover {
      background-color: darkred;/*efeito de fundo drop*/
    }

    .topnav .dropdown-content {
      display: none;
      position: absolute;
      background-color: darkgray;/*expansion de la butom*/
      min-width: 160px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      z-index: 1;
      border-radius: 4px;
    }

    .topnav .dropdown-content a {
      color: white;/*letra da expA*/
      padding: 12px 16px;
      display: block;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s;
    }

    .topnav .dropdown-content a:hover {
      background-color: black;/*efeito passar mouse*/
    }

    .topnav .dropdown:hover .dropdown-content {
      display: block;
    }

    /* Tabela */
    table {
      width: 100%;
      margin-top: 30px;
      border-collapse: collapse;
      background-color: green;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
      text-align: left;
      padding: 12px;
      border: 1px solid red;/*cotorno tabela*/
    }

    th {
      background-color: black;/* direcao*/
      color: white;
    }

    td {
      background-color: #444;/*linha 1*/
    }

    tr:nth-child(even) td {
      background-color: #555;/*linha 2*/
    }

    tr:hover td {
      background-color: darkgrey;/*efeito*/
    }

    /* Links de Ação */
    .action-links a {
      color: black;
      text-decoration: none;
      margin-right: 10px;
      transition: color 0.3s;
    }

    .action-links a:hover {
      color: darkred;
    }

    /* Paginação */
    .pagination {
      display: flex;
      gap: 10px;
      justify-content: center;
      margin-top: 20px;
    }

    .pagination a {
      text-decoration: none;
      padding: 8px 12px;
      background-color: darkred;
      color: white;
      border-radius: 5px;
      transition: background 0.3s ease;
    }

    .pagination a:hover {
      background-color: black;
    }

    /* Mensagens */
    h3.p {
      background-color: white;
      color: black;
      padding: 10px 15px;
      border-radius: 6px;
      margin-bottom: 20px;
      max-width: 800px;
      margin: 0 auto;
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

<h1>Listagem dos Clientes</h1>

<?php
    if(isset($_SESSION['msg'])){
      echo "<h3 class='p'>" . $_SESSION['msg'] . "</h3>";
      unset($_SESSION['msg']);
    }
    
    //Receber o número da página
    $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);   
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
    
    //Setar a quantidade de itens por pagina
    $qnt_result_pg = 3;
    
    //Calcular o início da visualização
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
    
    $result_usuarios = "SELECT * FROM clientes LIMIT $inicio, $qnt_result_pg";
    $resultado_usuarios = mysqli_query($conn, $result_usuarios);
?>

<!-- Tabela de Clientes -->
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>CPF</th>
      <th>CNH</th>
      <th>RG</th>
      <th>Telefone</th>
      <th>Endereço</th>
      <th>Estado</th>
      <th>E-mail</th>
      <th>Gênero</th>
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
      echo "<td>" . $row_aluno['cnh'] . "</td>";
      echo "<td>" . $row_aluno['rg'] . "</td>";
      echo "<td>" . $row_aluno['telefone'] . "</td>";
      echo "<td>" . $row_aluno['endereco'] . "</td>";
      echo "<td>" . $row_aluno['estado'] . "</td>";
      echo "<td>" . $row_aluno['email'] . "</td>";
      echo "<td>" . $row_aluno['genero'] . "</td>";
      echo "<td class='action-links'>
              <a href='apagaCli.php?id=" . $row_aluno['id'] . "'>Apagar</a>
            </td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>

<!-- Paginação -->
<div class="pagination">
  <?php
    //Paginação - Contar a quantidade total de clientes
    $result_pg = "SELECT COUNT(id) AS num_result FROM clientes";
    $resultado_pg = mysqli_query($conn, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);

    //Quantidade de páginas
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    //Limitar os links antes e depois da página atual
    $max_links = 2;
    echo "<a href='apagarCli.php?pagina=1'>Primeira</a> ";
    
    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
      if($pag_ant >= 1){
        echo "<a href='apagarCli.php?pagina=$pag_ant'>$pag_ant</a> ";
      }
    }

    echo "$pagina ";
    
    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
      if($pag_dep <= $quantidade_pg){
        echo "<a href='apagarCli.php?pagina=$pag_dep'>$pag_dep</a> ";
      }
    }
    
    echo "<a href='apagarCli.php?pagina=$quantidade_pg'>Última</a>";
  ?>
</div>

</body>
</html>
