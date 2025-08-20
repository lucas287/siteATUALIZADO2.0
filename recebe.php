<?php
    session_start();
	include_once("conexao.php");
	
	//$codigo = filter_input(INPUT_POST,'codigo',FILTER_SANITIZE_NUMBER_INT);
	$nome = filter_input(INPUT_POST, 'nome');
	$cpf = filter_input(INPUT_POST, 'cpf');
	$cnh = filter_input(INPUT_POST, 'cnh');
	$rg = filter_input(INPUT_POST, 'rg');
	$telefone = filter_input(INPUT_POST, 'telefone');
	$endereco = filter_input(INPUT_POST, 'endereco');
	$estado = filter_input(INPUT_POST, 'estado');
	$email = filter_input(INPUT_POST, 'email');
	$genero = filter_input(INPUT_POST, 'genero');
	$senha = filter_input(INPUT_POST, 'senha');

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

if (empty($erros)) {
    // Inserir no banco de dados
    $result_usuario = "INSERT INTO clientes(nome, cpf, cnh, rg, telefone, endereco, estado, email, genero, senha) VALUES ('$nome', '$cpf', '$cnh', '$rg', '$telefone', '$endereco', '$estado', '$email', '$genero', '$senha')";
    
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    
    if(mysqli_insert_id($conn)) {
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
        header("Location: loginusuario.php");
        exit();
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
        header("Location: loguin.php");
        exit();
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>" . implode("<br>", $erros) . "</p>";
    header("Location: loguin.php");
    exit();
}
	
	$result_usuario = "INSERT INTO clientes(nome, cpf, cnh, rg, telefone, endereco, estado, email, genero, senha) VALUES ('$nome', '$cpf', '$cnh', '$rg', '$telefone', '$endereco', '$estado', '$email', '$genero', '$senha')";

	$resultado_usuario = mysqli_query($conn, $result_usuario);

	
	
if(mysqli_insert_id($conn))
{
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: loginusuario.php");
}
else
{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: loguin.php");
}
