<?php
    session_start();
	include_once("conexao.php");
	
	
	$email = filter_input(INPUT_POST, 'email');
	$senha = filter_input(INPUT_POST, 'senha');
	
	$cliente = $conn->prepare("SELECT senha FROM funcionario WHERE email = ? LIMIT 1");
$cliente->bind_param("s", $email);
$cliente->execute();
$cliente->store_result();

if ($cliente->num_rows > 0) {
    $cliente->bind_result($senha_hash);
    $cliente->fetch();

    // Verificar a senha
    if ($senha == $senha_hash) {
        header("Location: devs.php");
    } else {
    	$_SESSION['msg'] = "<p style='color:red;'>Senha incorreta</p>";
        header("Location: login_tela1.php");
    }
} else {
	$_SESSION['msg'] = "<p style='color:red;'>Email não cadastrado</p>";
    header("Location: login_tela1.php");
}

$cliente
->close();
$conn->close();
?>
