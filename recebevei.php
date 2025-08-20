<?php
    session_start();
	include_once("conexao.php");
	
	//$codigo = filter_input(INPUT_POST,'codigo',FILTER_SANITIZE_NUMBER_INT);
	$nome = filter_input(INPUT_POST, 'nome');
	$preco = filter_input(INPUT_POST, 'preco');
	$placa = filter_input(INPUT_POST, 'placa');
	$km = filter_input(INPUT_POST, 'km');
	$ano = filter_input(INPUT_POST, 'ano');
	$chassi = filter_input(INPUT_POST, 'chassi');
	$cor = filter_input(INPUT_POST, 'cor');
	$tipo = filter_input(INPUT_POST, 'tipo');
	$renavam = filter_input(INPUT_POST, 'renavam');

	$erros = [];


if (empty($chassi) || !preg_match("/^\d{17}$/", $chassi)) {
    $erros[] = "CPF inválido. Deve conter 11 dígitos.";
}
if (empty($renavam) || !preg_match("/^\d{11}$/", $renavam)) {
    $erros[] = "CPF inválido. Deve conter 11 dígitos.";
}



if (empty($erros)) {
    // Inserir no banco de dados
    $result_usuario = "INSERT INTO veiculo (nome, preco, placa, km, ano, chassi, cor, tipo, renavam) VALUES ('$nome', '$preco', '$placa', '$km', '$ano', '$chassi', '$cor', '$tipo', '$renavam')";
    
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    
    if(mysqli_insert_id($conn)) {
        $_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
        header("Location: logvei.php");
        exit();
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
        header("Location: logvei.php");
        exit();
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>" . implode("<br>", $erros) . "</p>";
    header("Location: loguin.php");
    exit();
}
	
	$result_usuario = "INSERT INTO veiculo (nome, preco, placa, km, ano, chassi, cor, tipo, renavam) VALUES ('$nome', '$preco', '$placa', '$km', '$ano', '$chassi', '$cor', '$tipo', '$renavam')";

	$resultado_usuario = mysqli_query($conn, $result_usuario);

	
	
if(mysqli_insert_id($conn))
{
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: logvei.php");
}
else
{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: logvei.php");
}
