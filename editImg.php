<?php

session_start();
ob_start();

include_once "conexao.php";

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
    header("Location: index.php");
} else {

    $query_usuario = "SELECT id, foto FROM veiculo WHERE id=:id LIMIT 1";
    $result_usuario = $conn2->prepare($query_usuario);
    $result_usuario->bindParam(':id', $id, PDO::PARAM_INT);
    $result_usuario->execute();

    if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
        header("Location: index.php");
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Listar Dados </title>
        <link rel="stylesheet" type="text/css" href="devs2.css">
        <style>
            p{
                color: white;
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
    <a href="#">Atualizar</a>
    <a href="#">Deletar</a>
    </div>
    
  </div>

  <div class="dropdown">
    <button class="dropbtn">veiculos
      <i class="fa fa-caret-down"></i>
    </button>

    <div class="dropdown-content">      
      <a href="logvei.php">Cadastro</a>
      <a href="#">Atualizar</a>
    <a href="#">Deletar</a>
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
<h2>Editar Foto</h2>

    <?php
    //echo "<a href='atualistVei.php?id=$id'>Visualizar</a><br><br>";
    // Receber os dados do formulario
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);    

    // Verificar se o usuario clicou no botao
    if(!empty($dados['EditarFoto'])){
        // Receber a foto
        $arquivo = $_FILES['fotos'];
        //var_dump($arquivo);
        // Verificar se o usuario esta enviando a foto
        if((isset($arquivo['name'])) and (!empty($arquivo['name']))){
            // Criar a QUERY editar no banco de dados
            $query_edit_usuario = "UPDATE veiculo SET foto=:foto WHERE id=:id";
            $edit_usuario = $conn2->prepare($query_edit_usuario);
            $edit_usuario->bindParam(':foto', $arquivo['name'], PDO::PARAM_STR);
            $edit_usuario->bindParam(':id', $id, PDO::PARAM_INT);

            // Verificar se editou com sucesso
            if($edit_usuario->execute()){
                // Diretorio onde o arquivo sera salvo
                $diretorio = "imagens/$id/";

                // Verificar se o diretorio existe
                if((!file_exists($diretorio)) and (!is_dir($diretorio))){
                    // Criar o diretorio
                    mkdir($diretorio, 0755);
                }

                // Upload do arquivo
                $nome_arquivo = $arquivo['name'];
                if(move_uploaded_file($arquivo['tmp_name'], $diretorio . $nome_arquivo)){
                    // Verificar se existe o nome da imagem salva no banco de dados e o nome da imagem salva no banco de dados he diferente do nome da imagem que o usuario esta enviando
                    if(((!empty($row_usuario['foto'])) or ($row_usuario['foto'] != null)) and ($row_usuario['foto'] != $arquivo['name'])){
                        $endereco_imagem = "imagens/$id/". $row_usuario['foto'];
                        if(file_exists($endereco_imagem)){
                            unlink($endereco_imagem);
                        }
                    }

                    $_SESSION['msg'] = "<p style='color: green;'>Foto editada com sucesso!</p>";
                    header("Location: atualistVei.php?id=$id");
                }else{
                    echo "<p style='color: #f00;'>Erro: Usuário não editado com sucesso!</p>";
                }
            }else{
                echo "<p style='color: #f00;'>Erro: Usuário não editado com sucesso!</p>";
            }
        }else{
            echo "<p style='color: #f00;'>Erro: Necessário selecionar uma imagem!</p>";
        }
    }
    ?>

    <form name="edit_foto" method="POST" action="" enctype="multipart/form-data">
        <label>Foto: </label>
        <input type="file" name="fotos[]" id="foto" multiple><br><br>

        <input type="submit" value="Salvar" name="EditarFoto">

    </form>


</body>

</html>