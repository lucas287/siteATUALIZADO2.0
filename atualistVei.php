<?php
session_start();
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Atualizar Veículos</title>
    <link rel="stylesheet" type="text/css" href="listar3.css">
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
          <a href="atualizarFun.php">Atualizar</a>
          <a href="apagalistFun.php">Deletar</a>
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

    <div class="list">
      <h1>Atualização de Veículos</h1>
      <h3>
        <?php
        if(isset($_SESSION['msg'])){
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        }

        $query_usuarios = "SELECT * FROM veiculo ORDER BY id";
        $result_usuarios = $conn2->prepare($query_usuarios);
        $result_usuarios->execute();

        while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
          extract($row_usuario);
          echo "<table class='vehicle-table'>";
          echo "<tr><th>ID</th><td>$id</td></tr>";
          echo "<tr><th>Placa</th><td>$placa</td></tr>";
          echo "<tr><th>Quilometragem</th><td>$km</td></tr>";
          echo "<tr><th>Ano</th><td>$ano</td></tr>";
          echo "<tr><th>Chassi</th><td>$chassi</td></tr>";
          echo "<tr><th>Cor</th><td>$cor</td></tr>";
          echo "<tr><th>Tipo</th><td>$tipo</td></tr>";
          echo "<tr><th>Renavam</th><td>$renavam</td></tr>";
          echo "<tr><th>Nome</th><td>$nome</td></tr>";
          echo "<tr><th>Preço</th><td>$preco</td></tr>";
          echo "<tr><th>Foto</th><td class='vehicle-image'><img src='imagens/$id/$foto' alt='Imagem do Veículo'></td></tr>";
          echo "</table>";
          
          echo "<div class='action-links'>";
          echo "<a href='AtualizaVei.php?id=$id'>Editar</a>";
          echo "<a href='editImg.php?id=$id'>Editar Foto</a>";
          echo "</div><hr>";
        }
        ?>
      </h3>
    </div>
  </body>
</html>
