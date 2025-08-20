<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <style>
    body {
      background-color: #121212;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .ex1 {
      width: 100%;
      max-width: 400px;
      background-color: #222;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 4px 12px rgba(0, 123, 255, 0.3);
      border: 2px solid red;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    label {
      color: #fff;
      font-size: 14px;
      margin-bottom: 5px;
    }

    input[type="email"],
    input[type="password"] {
      padding: 12px;
      border: 1px solid #444;
      border-radius: 5px;
      background-color: #333;
      color: #fff;
      font-size: 16px;
      width: 93.3%;
    }

    input[type="submit"],
    button,
    a.button-link {
      padding: 12px;
      background-color: #007bff;
      color: #fff;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      text-align: center;
      width: 100%;
      display: block;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover,
    button:hover,
    a.button-link:hover {
      background-color: #0056b3;
    }
  </style>
  <script>
    function blo() {
      window.location.href = 'logfun.php';
    }
    function blo2() {
      window.location.href = 'index.php';
    }
    function blo3() {
      window.location.href = 'loguin.php';
    }
  </script>
</head>
<body>
  <div class="ex1">
    <?php
      session_start();
      if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
    ?>
    <form method="POST" action="recebeloginusuario.php">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="seu email" required>

      <label for="senha">Senha</label>
      <input type="password" id="senha" name="senha" placeholder="sua senha" required>

      <button type="button" onclick="blo()">Esqueci minha senha</button>
      <button type="button" onclick="blo2()">Voltar</button>
      <button type="button" onclick="blo3()">Criar conta</button>

      <input type="submit" value="Entrar">

    </form>
  </div>
</body>
</html>
