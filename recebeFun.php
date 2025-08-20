<?php
    session_start();
	include_once("conexao.php");
	
	//$codigo = filter_input(INPUT_POST,'codigo',FILTER_SANITIZE_NUMBER_INT);
	$nome = filter_input(INPUT_POST, 'nome');
	$cpf = filter_input(INPUT_POST, 'cpf');
	$email = filter_input(INPUT_POST, 'email');
	$senha = filter_input(INPUT_POST, 'senha');

	$erros = [];

if (empty($nome)) {
    $erros[] = "O nome é obrigatório.";
}

if (empty($cpf) || !preg_match("/^\d{11}$/", $cpf)) {
    $erros[] = "CPF inválido. Deve conter 11 dígitos.";
}

if (empty($email)) {
    $erros[] = "O e-mail é obrigatório e deve ser válido.";
}

if (empty($senha) || strlen($senha) < 6) {
    $erros[] = "A senha deve ter pelo menos 6 caracteres.";
}

if (empty($erros)) {
    // Inserir no banco de dados
    $result_usuario = "INSERT INTO funcionario(nome, cpf, email, senha) VALUES ('$nome', '$cpf', '$email', '$senha')";
    
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    
    if(mysqli_insert_id($conn)) {
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
        header("Location: logfun.php");
        exit();
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
        header("Location: logfun.php");
        exit();
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>" . implode("<br>", $erros) . "</p>";
    header("Location: logfun.php");
    exit();
}
	
	$result_usuario = "INSERT INTO funcionario(nome, cpf, email, senha) VALUES ('$nome', '$cpf', '$email', '$senha')";

	$resultado_usuario = mysqli_query($conn, $result_usuario);

	
	
if(mysqli_insert_id($conn))
{
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: logfun.php");
}
else
{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: logfun.php");
}
