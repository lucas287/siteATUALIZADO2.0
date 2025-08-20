<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "loja";
	
	try{

		$conn2 = $conn = new PDO("mysql:servidor=$servidor;dbname=" . $dbname, $usuario, $senha);

		$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	} 
	catch(PDOException $err) {
    	echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}
?>