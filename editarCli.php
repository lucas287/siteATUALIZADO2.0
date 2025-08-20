<?php
session_start();
include_once("conexao.php");
error_reporting(E_ALL & ~E_DEPRECATED);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$cnh = filter_input(INPUT_POST, 'cnh', FILTER_SANITIZE_STRING);
$rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

	$erros = [];

if (empty($nome)) {
    $erros[] = "O nome é obrigatório.";
}

if (empty($cpf) || !preg_match("/^\d{11}$/", $cpf)) {
    $erros[] = "CPF inválido. Deve conter 11 dígitos.";
}

if (empty($rg) || !preg_match("/^\d{9}$/", $rg)) {
    $erros[] = "RG inválido. Deve conter 9 dígitos.";
}

if (empty($cnh) || !preg_match("/^\d{9}$/", $cnh)) {
    $erros[] = "CNH inválida. Deve conter 9 dígitos.";
}

if (empty($email)) {
    $erros[] = "O e-mail é obrigatório e deve ser válido.";
}

if (empty($senha) || strlen($senha) < 6) {
    $erros[] = "A senha deve ter pelo menos 6 caracteres.";
}
if (empty($erros)) 
{
	$result_usuario = "UPDATE clientes SET nome='$nome', cpf='$cpf', cnh='$cnh', rg='$rg', telefone='$telefone', endereco='$endereco', estado='$estado', email='$email', genero='$genero', senha='$senha' WHERE id='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);

	if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: exibirClientes.php");
	}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: exibirClientes.php?id=$id");
	}
}
else {
    $_SESSION['msg'] = "<p style='color:red;'>" . implode("<br>", $erros) . "</p>";
    header("Location: editCli.php");
    exit();
}
