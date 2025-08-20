<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
 <style>
    body {
      background-color: #121212;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      color: white;
    }

    h1 {
      margin-top: 50px;
      font-size: 2rem;
      text-align: center;
      color: #ffffff;
    }

    .ex1 {
      width: 90%;
      max-width: 600px;
      background-color: #222;
      padding: 30px;
      border-radius: 10px;
      margin-top: 20px;
      box-shadow: 0px 4px 12px rgba(0, 123, 255, 0.3);
      text-align: center;
      margin-bottom: 50px;
    }

    .ex1 form {
      display: flex;
      flex-direction: column;
      gap: 15px;
      align-items: flex-start;
    }

    .ex1 input[type="text"], .ex1 input[type="email"], .ex1 input[type="password"], .ex1 select, .ex1 input[type="radio"], .ex1 input[type="checkbox"] {
      padding: 12px;
      border: 1px solid #444;
      border-radius: 5px;
      background-color: #333;
      color: #fff;
      font-size: 16px;
      width: 100%;
    }

    .ex1 input[type="radio"], .ex1 input[type="checkbox"] {
      width: auto;
    }

    .ex1 input[type="text"]:focus, .ex1 input[type="email"]:focus, .ex1 input[type="password"]:focus, .ex1 select:focus {
      border-color: #007bff;
      outline: none;
    }

    .ex1 label {
      color: #fff;
      font-size: 14px;
      text-align: left;
      width: 100%;
      margin-bottom: 5px;
    }

    .ex1 input[type="submit"], .ex1 button {
      padding: 12px;
      background-color: #007bff;
      color: #fff;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      width: 100%;
    }

    .ex1 input[type="submit"]:hover, .ex1 button:hover {
      background-color: #0056b3;
    }

    .message {
      color: #f8d7da;
      background-color: #f8d7da;
      padding: 10px;
      margin-top: 20px;
      border-radius: 5px;
    }

    .message.success {
      color: #155724;
      background-color: #d4edda;
    }
  </style>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Loguin usuario</title>
	<script src="validador.js"></script>
	<link rel="stylesheet" type="text/css" href="lp.css">
</head>
<body style="background-color: black;">
<center>
	<h1 style="color: white; ">Formulario de cadastro do cliente</h1>
	<?php
          if(isset($_SESSION['msg']))
          {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
          }
      ?> 
	<div class="ex1">
		<form method="POST" action="recebepagina1.php" onsubmit="return validarFormulario();">
	<label>Nome do usuario</label>	
	<input type="text" class="text" name="nome" placeholder="Nome">
	<label>CPF</label>
	<input type="text" class="text" name="cpf" placeholder="Seu CPF">
	<label>CNH</label>
	<input type="text" class="text" name="cnh" placeholder="Sua CNH">	
	<label>RG</label>
	<input type="text" class="text" name="rg" placeholder="Seu RG">			
	<label>Telefone</label>
	<input type="text" class="text" name="telefone" placeholder="Seu Telefone">			

	<label>Endereço</label>
	<input type="text" class="city" name="endereco" placeholder="Cidade">	
	<select name="estado">
		<option value="AC">AC</option>
		<option value="AL">AL</option>
		<option value="AP">AP</option>
		<option value="AM">AM</option>
		<option value="BA">BA</option>
		<option value="CE">CE</option>
		<option value="DF">DF</option>
		<option value="ES">ES</option>
		<option value="GO">GO</option>
		<option value="MA">MA</option>
		<option value="MT">MT</option>
		<option value="MS">MS</option>
		<option value="MG">MG</option>
		<option value="PA">PA</option>
		<option value="PB">PB</option>
		<option value="PR">PR</option>
		<option value="PE">PE</option>
		<option value="PI">PI</option>
		<option value="RJ">RJ</option>
		<option value="RN">RN</option>
		<option value="RS">RS</option>
		<option value="RO">RO</option>
		<option value="RR">RR</option>
		<option value="SC">SC</option>
		<option value="SP">SP</option>
		<option value="SE">SE</option>
		<option value="TO">TO</option>
	</select>		
	<br>

	

	<label>Email</label>
	<input type="email" class="text" name="email" placeholder="Seu Email">

	<label>Genero</label>
	<input type="radio" id="masc" name="genero" value="masculino">
	<label for="masc">masculino</label>
	<input type="radio" id="fem" name="genero" value="feminino">
	<label for="fem">Feminino</label>
	<input type="radio" id="ot" name="genero" value="outro">
	<label for="ot">Outro</label>
	

	<label>Senha</label>
	<input type="password" class="text" name="senha" placeholder="">

	<label>Repetir senha</label>
	<input type="password" class="text" name="repetirSenha" placeholder="">

	
	<label>Concordo com todos os <a href="termos.html">Termos de privacidade</a></label>
	<input type="checkbox" name="checkbox">
	<input type="submit" class="text"  value="Cadastrar">
	<a href="index.php">
					<button type="button" class="text">Voltar</button>
				</a>
	
	</form>
	</div>

</body>
</html>