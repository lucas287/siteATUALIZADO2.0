<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuario = "DELETE FROM clientes WHERE id='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Cliente excluído com sucesso</p>";
		header("Location: apagarCli.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro! O Cliente não foi excluído</p>";
		header("Location: apagarCli.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um cliente</p>";
	header("Location: apagarCli.php");
}
