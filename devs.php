<head>
  <title>Página Principal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="devs.css">
</head>

<body>
  <div class="topnav">
    <div class="dropdown">
      <button class="dropbtn">clientes
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="exibirClientes.php">Listagem geral</a>  
        <a href="loguin2.php">Cadastro</a>
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
        <a href="apagalistFun.php">Deletar</a>
      </div>
    </div>
  </div>  

  <div class="content">
    <center>
      <a href="index.php">
      <img src="logo.PNG" alt="Logo">
    </center>
  </div>

</body>
</html>
