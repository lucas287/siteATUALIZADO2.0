<?php
	session_start();
	include_once("conexao.php");
    error_reporting(E_ALL & ~E_DEPRECATED);
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$result_usuario = "SELECT * FROM Funcionario WHERE id = '$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<style>
	label{
		color: white;
	}
</style>

<title>Página Principal</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="devs2.css">
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

<center>
		<p><hr><h1  style="color: white;">Editar dados do Funcionario</h1> <p> <hr>
		
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
	<form method="POST" action="editarFun.php">
		<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
			
			<label class="p">Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>">

			<label class="p">CPF: </label>
			<input type="text" name="cpf" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['cpf']; ?>">
			
			<label class="p">E-mail: </label>
			<input type="email" name="email" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['email']; ?>">

			<label class="p">Senha: </label>
			<input type="password" name="senha" value="<?php echo $row_usuario['senha']; ?>">
			
			<input type="submit" value="Editar">
		</form></center>
	</body>
</html>