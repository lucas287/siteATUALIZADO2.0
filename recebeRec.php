<?php
	session_start();	
	include_once("conexao.php");
		
	if((isset($_POST['email'])) && (isset($_POST['cpf'])))
	{
	
		$email = filter_input(INPUT_POST, 'email');
		$cpf = filter_input(INPUT_POST, 'cpf');
	
			
		$result_usuario = "SELECT * FROM funcionario WHERE  cpf = '$cpf' && email='$email' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		
		if(isset($resultado))
		{
			$_SESSION['id'] = $resultado['id'];
			header("Location: AtualizaSenha.php");
	  
		}
		
		else
		{	
			$_SESSION['msg'] = "Usuário ou cpf Inválido";
			header("Location: recuperaFun.php");
		}
	}
	else
	{
		$_SESSION['msg'] = "Usuário ou cpf inválido";
		header("Location: recuperaFun.php");
	}
?>
