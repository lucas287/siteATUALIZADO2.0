<?php

session_start();
ob_start();

error_reporting(E_ALL & ~E_DEPRECATED);
include_once "conexao.php";

// Receber o ID do registro
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

// Acessa o IF quando nao existe o ID
if (empty($id)) {
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
    
} else {
    // QUERY para recuperar os dados do registro
    $query_usuario = "SELECT * FROM veiculo WHERE id=:id LIMIT 1";
    $result_usuario = $conn2->prepare($query_usuario);
    $result_usuario->bindParam(':id', $id, PDO::PARAM_INT);
    $result_usuario->execute();

    // Verificar se encontrou o registro no banco de dados
    if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        //var_dump($row_usuario);
    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
        header("Location: AtualizaVei.php");
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <style>
        h2, h3{
            color: white;
        }

    </style>
<title>Página Principal</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"  href="devs2.css">
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
    border-color: grey;
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
    background-color: grey;
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


.container {
    background-color: #1e1e1e;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    width: 90%;
    max-width: 500px;
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    gap: 10px;
    text-align: center;
}

form label {
    text-align: left;
    margin-bottom: 5px;
    font-weight: 500;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #FF0000;
    border-radius: 6px;
    background-color: #2a2a2a;
    color: white;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
    outline: none;
    border-color: grey;
}

.btn-editar {
    align-self: center;
    width: 120px;
    padding: 8px 0;
    background-color: #FF0000;
    color: #fff;
    font-weight: bold;
    border: none;
    border-radius: 6px;
    font-size: 0.95rem;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn-editar:hover {
    background-color: grey;
    color: grey;
}

</style>
<body>



 <center><h2>Atualizar Veiculo</h2><h3></center>

<?php
  
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // Verificar se o usuario clicou no botao
    if (!empty($dados['EditarUsuario'])) {
        //var_dump($dados);
        // Criar a QUERY editar no banco de dados
        $query_edit_usuario = "UPDATE veiculo SET placa=:placa, km=:km, ano=:ano, chassi=:chassi, cor=:cor, tipo=:tipo, renavam=:renavam, nome=:nome, preco=:preco WHERE id=:id";
        $edit_usuario = $conn2->prepare($query_edit_usuario);
        $edit_usuario->bindParam(':placa', $dados['placa'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':km', $dados['km'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':ano', $dados['ano'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':chassi', $dados['chassi'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':cor', $dados['cor'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':tipo', $dados['tipo'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':renavam', $dados['renavam'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':preco', $dados['preco'], PDO::PARAM_STR);
        $edit_usuario->bindParam(':id', $id, PDO::PARAM_INT);

        // Verificar se editou com sucesso
        if ($edit_usuario->execute()) {
            $_SESSION['msg'] = "<p style='color: green;'>Usuário editado com sucesso!</p>";
            header("Location: exibirVei.php?id=$id");
        } else {
            echo "<p style='color: #f00;'>Erro: Usuário não editado com sucesso!</p>";
        }
    }
    ?>

    <form name="edit_usuario" method="POST" action="">
        <?php
        $placa = "";
        if (isset($row_usuario['placa'])) {
            $placa = $row_usuario['placa'];
        }
        ?>
        <label>Placa: </label>
        <input type="text" name="placa" id="placa" placeholder="Placa" value="<?php echo $placa; ?>" autofocus required>
        <?php
        $km = "";
        if (isset($row_usuario['km'])) {
            $km = $row_usuario['km'];
        }
        ?>
        <label>Quilometragem: </label>
        <input type="text" name="km" id="km" placeholder="Quilometragem" value="<?php echo $km; ?>" autofocus required>

        <?php
        $ano = "";
        if (isset($row_usuario['ano'])) {
            $ano = $row_usuario['ano'];
        }
        ?>
        <label>Ano: </label>
        <input type="text" name="ano" id="ano" placeholder="Ano" value="<?php echo $ano; ?>" autofocus required>

        <?php
        $chassi = "";
        if (isset($row_usuario['chassi'])) {
            $chassi = $row_usuario['chassi'];
        }
        ?>
        <label>Chassi: </label>
        <input type="text" name="chassi" id="chassi" placeholder="Chassi" value="<?php echo $chassi; ?>" autofocus required>
        <?php
        $cor = "";
        if (isset($row_usuario['cor'])) {
            $cor = $row_usuario['cor'];
        }
        ?>
        <label>Cor: </label>
        <input type="text" name="cor" id="cor" placeholder="Cor do Veiculo" value="<?php echo $cor; ?>" autofocus required>

        <?php
        $renavam = "";
        if (isset($row_usuario['renavam'])) {
            $renavam = $row_usuario['renavam'];
        }
        ?>
        <label>Renavam: </label>
        <input type="text" name="renavam" id="renavam" placeholder="Renavam" value="<?php echo $renavam; ?>" autofocus required>

        <?php
        $nome = "";
        if (isset($row_usuario['nome'])) {
            $nome = $row_usuario['nome'];
        }
        ?>
        <label>Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome do veiculo" value="<?php echo $nome; ?>" autofocus required>

        <?php
        $preco = "";
        if (isset($row_usuario['preco'])) {
            $preco = $row_usuario['preco'];
        }
        ?>
        <label>Preço: </label>
        <input type="text" name="preco" id="preco" placeholder="Preço" value="<?php echo $preco; ?>" autofocus required>

        <input type="submit" value="Salvar" name="EditarUsuario">

    </form>

</body>

</html>
