<?php
  session_start();
  include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Página Principal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="devs2.css">
  <link rel="stylesheet" type="text/css" href="listar2.css">  


</head>
<style type="text/css">
  /* =======================
   RESET + BASE
======================= */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    font-size: 16px;
    scroll-behavior: smooth;
}

body {
    font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #121212;
    color: #e0e0e0;
    line-height: 1.6;
    padding: 20px;
}

/* =======================
   TIPOGRAFIA
======================= */
h1, h2, h3, h4, h5, h6 {
    color: #FF0000;
    margin-bottom: 10px;
    font-weight: 600;
}

p {
    margin-bottom: 1em;
}

/* =======================
   LINKS
======================= */
a {
    color: #FF0000;
    text-decoration: none;
    transition: 0.3s ease;
}

a:hover {
    color: #ffffff;
    text-decoration: underline;
}

/* =======================
   NAVBAR & DROPDOWN
======================= */
.topnav {
    display: flex;
    background-color: #1e1e1e;
    padding: 10px 20px;
    border-bottom: 2px solid #FF0000;
    flex-wrap: wrap;
}

.dropdown {
    position: relative;
}

.dropbtn {
    background-color: transparent;
    color: #e0e0e0;
    padding: 10px 16px;
    font-size: 1rem;
    border: none;
    cursor: pointer;
    font-weight: 500;
    transition: 0.3s;
}

.dropbtn:hover {
    background-color: #FF0000;
    color: #121212;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #2c2c2c;
    min-width: 200px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    z-index: 10;
    top: 100%;
    left: 0;
    border-radius: 6px;
}

.dropdown-content a {
    padding: 12px 16px;
    display: block;
    transition: 0.3s;
}

.dropdown-content a:hover {
    background-color: #FF0000;
    color: #121212;
}

.dropdown:hover .dropdown-content {
    display: block;
}

/* =======================
   FORMULÁRIOS
======================= */
input[type="text"],
input[type="email"],
input[type="password"],
textarea {
    width: 100%;
    max-width: 400px;
    padding: 12px;
    margin: 10px 0;
    background-color: #2a2a2a;
    border: 1px solid #FF0000;
    border-radius: 6px;
    color: #fff;
    font-size: 1rem;
}

input:focus,
textarea:focus {
    outline: none;
    border-color: #00cccc;
}

/* Botões */
button, input[type="submit"] {
    background-color: #FF0000;
    color: #121212;
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    font-size: 1rem;
    transition: 0.3s;
}

button:hover,
input[type="submit"]:hover {
    background-color: #00cccc;
}

/* =======================
   MENSAGENS
======================= */
p.success {
    color: #90ee90;
    font-weight: 500;
}

p.error {
    color: #ff4d4d;
    font-weight: 500;
}

/* =======================
   COMPONENTES VISUAIS
======================= */
hr {
    border: none;
    border-top: 1px solid #333;
    margin: 20px 0;
}

img {
    max-width: 100%;
    border-radius: 8px;
    margin-top: 10px;
}

/* =======================
   RESPONSIVO
======================= */
@media (max-width: 768px) {
    .topnav {
        flex-direction: column;
        align-items: flex-start;
    }

    .dropbtn {
        width: 100%;
        text-align: left;
    }

    .dropdown-content {
        position: static;
        width: 100%;
        box-shadow: none;
        margin-top: 5px;
    }
}

</style>
<body class="bodys">

<div class="topnav">
  <div class="dropdown">
    <button class="dropbtn">Clientes
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
    <button class="dropbtn">Veículos
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
    <button class="dropbtn">Funcionários
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="exibirFuncionario.php">Listagem geral</a>
      <a href="logfun.php">Cadastro</a>
      <a href="apagalistFun.php">Deletar</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Home
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="devs.php">Página Inicial</a>
    </div>
  </div>
</div>

<div class="content">
  <h1>Listagem dos Funcionários</h1>

  <?php
    if(isset($_SESSION['msg'])){
      echo "<div class='msg msg-error'>".$_SESSION['msg']."</div>";
      unset($_SESSION['msg']);
    }
  ?>

  <div class="clientes-container">
  <?php  
    
    $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
    $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
    
    // Setar a quantidade de itens por página
    $qnt_result_pg = 2;
    
    // Calcular o início da visualização
    $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
    
    $result_usuarios = "SELECT * FROM funcionario LIMIT $inicio, $qnt_result_pg";
    $resultado_usuarios = mysqli_query($conn, $result_usuarios);
    
    while($row_aluno = mysqli_fetch_assoc($resultado_usuarios)) {
      echo "<div class='client-list'>";
      echo "<h3>Funcionário: " . $row_aluno['nome'] . "</h3>";
      echo "ID: " . $row_aluno['id'] . "<br>";
      echo "CPF: " . $row_aluno['cpf'] . "<br>";
      echo "E-mail: " . $row_aluno['email'] . "<br>";
      echo "Senha: " . $row_aluno['senha'] . "<br>";
      echo "<a href='editfun.php?id=" . $row_aluno['id'] . "'>Editar</a><br><hr>";
      echo "</div>";
    }
    
    // Paginação
    $result_pg = "SELECT COUNT(id) AS num_result FROM funcionario";
    $resultado_pg = mysqli_query($conn, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);
    
    // Quantidade de páginas
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
    
    // Limitar os links antes e depois
    $max_links = 2;
    
    echo "<div class='pagination'>";
    echo "<a href='atualizarFun.php?pagina=1'>Primeira</a> ";
    
    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
      if($pag_ant >= 1){
        echo "<a href='atualizarFun.php?pagina=$pag_ant'>$pag_ant</a> ";
      }
    }
    
    echo "<span>$pagina</span>";
    
    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
      if($pag_dep <= $quantidade_pg){
        echo "<a href='atualizarFun.php?pagina=$pag_dep'>$pag_dep</a> ";
      }
    }
    
    echo "<a href='atualizarFun.php?pagina=$quantidade_pg'>Última</a>";
    echo "</div>";
  ?>
</div>

</body>
</html>
