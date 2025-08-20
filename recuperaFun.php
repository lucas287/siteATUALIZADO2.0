<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <script>
    function blo() {
      window.location.replace('recuperaFun.php');
    }
  </script>
  <link rel="stylesheet" type="text/css" href="lp.css">
  
  <style>
    body {
      background-color: #121212;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    h1 {
      color: #ffffff;
      margin-top: 50px;
      font-size: 2rem;
    }

    .ex1 {
      width: 90%;
      max-width: 400px;
      background-color: #222;
      padding: 30px;
      border-radius: 10px;
      margin-top: 20px;
      box-shadow: 0px 4px 12px rgba(0, 123, 255, 0.3);
      text-align: center;
    }

    .ex1 form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .ex1 input[type="email"], .ex1 input[type="text"], .ex1 input[type="password"] {
      padding: 12px;
      border: 1px solid #444;
      border-radius: 5px;
      background-color: #333;
      color: #fff;
      font-size: 16px;
    }

    .ex1 input[type="email"]:focus, .ex1 input[type="text"]:focus, .ex1 input[type="password"]:focus {
      border-color: #007bff;
      outline: none;
    }

    .ex1 label {
      color: #fff;
      font-size: 14px;
      text-align: left;
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
</head>
<body>

<center>
  <h1>Recuperação de senha</h1>

  <?php
  if(isset($_SESSION['msg'])) {
    echo "<div class='message'>" . $_SESSION['msg'] . "</div>";
    unset($_SESSION['msg']);
  }
  ?>

  <div class="ex1">
    <form method="POST" action="recebeRec.php">
      
      
      <label>EMAIL</label>
      <input type="email" name="email" placeholder="Seu email" required>

      <label>CPF</label>
      <input type="text" name="cpf" placeholder="Seu RG" required>

      <input type="submit" value="Enviar">
      
      <button type="button" onclick="blo()">Entre em contato...</button>
   
    </form>
  </div>
</center>

</body>
</html>
