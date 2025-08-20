<?php
session_start();
ob_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Loja de Carros</title>
    <link rel="stylesheet" href="cssanalise.css">
    <link rel="stylesheet" href="telainicial.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .navbarra img {
            width: 40px; /* Corrigido 'weight' para 'width' */
            height: 40px;
        }

        .logoempresa img {
            width: 200px; /* Corrigido 'weight' para 'width' */
            height: 200px;
        }
    </style>
    <script>
        function voltarPaginas() {
            if (history.length > 3) {
                history.go(-3);
            } else {
                history.back(); // fallback para voltar uma página
            }
        }
    </script>
</head>
<body>
    <header>
        <nav class="navbar"><br>
            <div class="logo">
                <div class="navbarra">
                    <img src="logom-VMFinal.png" alt="Logo">
                </div>
                <ul class="nav-links">
                    <li><a href="index.php"><i class="fas fa-home"></i></a></li>
                </ul>
            </div>
        </nav>
    </header><br><br><br>

    <div class="mensagem-sucesso">
        <span>📧 Sua mensagem será enviada para o vendedor!</span>
    </div>

    <div class="container">
        <div class="banner">
            <div class="logo">
                <div class="logoempresa">
                    <img src="logom-VMFinal.png" alt="Logo">
                </div>
            </div>
        </div>

        <div class="info-loja">
            <h2>Seus dados foram para análise!</h2>

            <!-- Seção "Veja outros veículos" -->
            <h3 style='margin-top: 30px;'>Veja outros veículos:</h3>
            <div class='outros-veiculos'></div>

            <!-- Botão modificado com verificação do histórico -->
            <a href="#" onclick="voltarPaginas();" class="botao-verde">Ver Loja</a>
        </div>
    </div>
</body>
</html>
