<?php
    session_start();
	include_once("conexao.php");
	
	
	$login = filter_input(INPUT_POST, 'login');
	$senha = filter_input(INPUT_POST, 'senha');
	
	$cliente = $conn->prepare("SELECT senha FROM sever WHERE login = ? LIMIT 1");
$cliente->bind_param("s", $logun);
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
        header("Location: login_dev.php");
    }
} else {
	$_SESSION['msg'] = "<p style='color:red;'>Login não cadastrado</p>";
    header("Location: login_dev.php");
}

$cliente
->close();
$conn->close();
?>
