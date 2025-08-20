<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro de Veiculos</title>
	<link rel="stylesheet" type="text/css" href="lp.css">
</head>
<body style="background-color: lightgray;">
	<center>
	<h1>Formulario de cadastro de veiculos</h1>
	<?php
          if(isset($_SESSION['msg']))
          {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }
      ?> 
	<div class="ex1">
		<form method="POST" action="recebeVeiculo.php">
	<label>Placa do veículo</label><br>	
	<input type="text" class="text" name="placa" placeholder="Placa"><br><br>
	<label>Quilometragem</label><br>
	<input type="text" class="text" name="km" placeholder="Quilometros rodados"><br><br>
	<label>Ano/Modelo</label><br>
	<input type="text" class="text" name="ano" placeholder="Ano de fabricação"><br><br>	
	<label>Chassi</label><br>
	<input type="text" class="text" name="chassi" placeholder="Chassi do veiculo"><br><br>
	<label>Cor</label><br>
	<input type="text" class="text" name="cor" placeholder="Cor do veiculo"><br><br>			
	<label>Tipo</label><br>
	<input type="text" class="text" name="tipo" placeholder="Tipo do veiculo"><br><br>
	<label>Renavam</label><br>
	<input type="text" class="text" name="renavan" placeholder="Código renavam"><br><br>			
	<input type="submit" class="text"  value="Cadastrar">
	
	</form>
	</div>

</body>
</html>