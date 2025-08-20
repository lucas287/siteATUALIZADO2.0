<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";
if (empty($senha) || strlen($senha) < 6) {
    $_SESSION['msg'] = "<p style='color:red;'>A senha deve ter pelo menos 6 caracteres.</p>";
    header("Location: AtualizaSenha.php");
}
else{
	$result_usuario = "UPDATE funcionario SET  senha='$senha' WHERE id='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);

	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Funcionario editado com sucesso</p>";
		header("Location: login_tela1.php");
	}else{
		$_SESSION['msg'] = "<p style='color:red;'>Funcionário não foi editado com sucesso</p>";
		header("Location: AtualizaSenha.php?id=$id");
	}
}
