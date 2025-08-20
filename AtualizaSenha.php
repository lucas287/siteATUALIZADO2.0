<?php
	session_start();
	include_once("conexao.php");

	
	$id = $_SESSION['id'];
	$result_usuario = "SELECT * FROM Funcionario WHERE id = '$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<script>
		 function validarFormulario() {
        
        const senha = document.forms[0].senha.value;
        const rsenha = document.forms[0].rsenha.value;

        if (!senha || !rsenha) {
            alert("Por favor, preencha todos os campos obrigatórios.");
            return false;
        }

        if (senha !== rsenha) {
            alert("As senhas não coincidem.");
            return false;
        }

        return true; 
    }
	</script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar Funcionário</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<style>
		body {
			background-color: #1e1e2f;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			margin: 0;
			padding: 0;
		}

		.topnav {
			background-color: #ff4d4d; /* Vermelho */
			overflow: hidden;
			display: flex;
			justify-content: center;
			padding: 12px;
			position: relative;
			z-index: 5;
		}

		.dropdown {
			position: relative;
			display: inline-block;
			margin: 0 10px;
		}

		.dropbtn {
			background-color: #ff4d4d; /* Vermelho */
			color: white;
			padding: 12px 18px;
			font-size: 16px;
			border: none;
			cursor: pointer;
			border-radius: 4px;
		}

		.dropbtn:hover {
			background-color: #cc0000; /* Vermelho mais escuro */
		}

		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #343a40;
			min-width: 180px;
			border-radius: 5px;
			z-index: 10;
		}

		.dropdown-content a {
			color: white;
			padding: 10px 15px;
			display: block;
			text-decoration: none;
		}

		.dropdown-content a:hover {
			background-color: #ff4d4d; /* Vermelho */
		}

		.dropdown:hover .dropdown-content {
			display: block;
		}

		h1 {
			color: white;
			text-align: center;
			margin-top: 30px;
		}

		form {
			background-color: black;
			max-width: 600px;
			margin: 40px auto;
			padding: 40px;
			border-radius: 12px;
			box-shadow: 0px 0px 15px rgba(255, 77, 77, 0.3); /* Vermelho */
		}

		label {
			color: white;
			display: block;
			margin-bottom: 6px;
		}

		input[type="text"],
		input[type="email"],
		input[type="password"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border-radius: 5px;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}

		input[type="submit"] {
			background-color: #ff4d4d; /* Vermelho */
			color: white;
			border: none;
			padding: 12px 20px;
			border-radius: 6px;
			cursor: pointer;
			width: 100%;
			font-size: 16px;
		}

		input[type="submit"]:hover {
			background-color: #cc0000; /* Vermelho mais escuro */
		}

		p {
			color: white;
			text-align: center;
		}
	</style>
</head>
<body>



<h1>Editar dados do Funcionário</h1>

<?php
	if(isset($_SESSION['msg'])){
		echo "<p>" . $_SESSION['msg'] . "</p>";
		unset($_SESSION['msg']);
	}
?>

<form method="POST" action="attSenha.php" onsubmit="return validarFormulario();">
	
	<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">

	<label>Senha:</label>
	<input type="password" name="senha" value="<?php echo $row_usuario['senha']; ?>">

	<label>Senha:</label>
	<input type="password" name="rsenha">

	<input type="submit" value="Editar">
</form>

</body>
</html>
