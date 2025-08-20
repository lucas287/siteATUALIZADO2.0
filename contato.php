<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - Venda de Veículos de Luxo</title>
    <link rel="stylesheet" href="telainicial.css">
    <link rel="stylesheet" href="cssparacontato.css">
    
    <!-- CDN do Font Awesome para ícones -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            z-index: -1;
        }

        .video-background iframe {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 120vw;
            height: 120vh;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }

        /* Overlay para escurecer o fundo */
        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6); /* Escurecer mais para contraste */
            filter: blur(5px); /* Efeito de desfoque */
            z-index: -1;
        }

        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Arial', sans-serif;
            color: white;
        }

        /* Animação de fade-in para o conteúdo */
        #contact-content {
            position: relative;
            z-index: 1;
            padding: 40px;
            text-align: center;
            opacity: 0;
            animation: fadeIn 2s forwards;
            padding-left: 50px; /* Ajuste para não sobrepor a logo */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 500px; /* Ocupa toda a altura da tela */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Logo fixa no canto superior esquerdo */
        .logo {
            position: fixed;
            top: 20px;
            left: 20px;
            width: 35px; /* Ajuste o tamanho conforme necessário */
            z-index: 9999;
        }

        header, footer{
    background-color: rgba(0, 0, 0, 0.7);
    padding: 5px 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 60px; /* Reduz a altura */
}

nav ul {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
    padding: 0;
    height: 100%;
}


        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 30px; /* Ajuste o tamanho do ícone */
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #e74c3c;
        }

        form {
            //*background: rgba(255, 255, 255, 0.8);*//
            padding: 25px;
            border-radius: 19px;
            max-width: 900px;
            margin: 20px auto;
            //*box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);*//
            opacity: 0;
            animation: formSlideUp 2s forwards;
            width: 100%; /* Faz o formulário ocupar a largura disponível */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        @keyframes formSlideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            background: white;
            color: #333;
            outline: none;
            transition: all 0.3s ease;
        }

        input:focus, textarea:focus {
            border-color: #e74c3c;
            box-shadow: 0 0 5px rgba(231, 76, 60, 0.5);
        }

        input[type="submit"] {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0px 4px 10px rgba(231, 76, 60, 0.3);
        }

        input[type="submit"]:hover {
            background-color: #c0392b;
            transform: scale(1.05);
            box-shadow: 0px 6px 15px rgba(231, 76, 60, 0.5);
        }

        footer p {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
        }

        /* Media Queries para Responsividade */

        @media (max-width: 768px) {
            /* Ajustes para telas pequenas como tablets e celulares */
            .logo {
                width: 25px; /* Reduz o tamanho da logo em telas menores */
                top: 15px;
                left: 15px;
            }

            nav ul {
                flex-direction: column; /* Centraliza os itens da navegação verticalmente */
            }

            nav ul li {
                margin: 10px 0; /* Diminui o espaço entre os itens */
            }

            form {
                max-width: 90%; /* Faz o formulário ocupar mais espaço em telas pequenas */
                margin: 20px auto;
            }

            input, textarea {
                font-size: 14px; /* Ajusta o tamanho da fonte para telas pequenas */
                padding: 10px;
            }

            input[type="submit"] {
                font-size: 14px; /* Ajusta o tamanho do botão */
                padding: 10px;
            }

            header, footer {
                font-size: 1rem; /* Reduz o tamanho da fonte no cabeçalho e rodapé */
            }
        }
        .logo {
    width: 35px;
    margin-right: 20px;
}
    </style>
</head>
<body>

<div class="video-background">
    <iframe src="https://www.youtube.com/embed/bD_nlDO09f4?autoplay=1&mute=1" 
    frameborder="0" 
    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
    allowfullscreen></iframe>
</div>

<div class="video-overlay"></div>

<!-- Logo no canto superior esquerdo -->
<img src="logom-VMFinal.png" alt="Logo" class="logo"> <!-- Substitua "sua-logo.png" pelo caminho correto para sua logo -->

<header>
    <nav>
        <ul>
            <!-- Substituindo o "Home" por um ícone de casa -->
            <li><a href="index.php"><i class="fas fa-home"></i></a></li> <!-- Ícone de casa -->
        </ul>
    </nav>
</header>

<section id="contact-content">
    <h1>Contato</h1>
    <p>Entre em contato conosco através do formulário abaixo.</p>

    <form action="https://api.staticforms.xyz/submit" method="post">
        <input type="hidden" name="accessKey" value="78f914a8-c234-453d-8508-9347b625c5d0">
        <input type="text" name="name" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Telefone" required>
        <textarea name="message" placeholder="Mensagem" required></textarea>
        <input type="hidden" name="replyTo" value="@">
        <input type="hidden" name="redirectTo" value="https://www.instagram.com/voinichmotors/">
        <input type="text" name="honeypot" style="display: none;">
        <input type="submit" value="Enviar">
    </form>
</section>

<footer>
    <p>&copy; 2024 Venda de Veículos de Luxo. Todos os direitos reservados.</p>
</footer>

</body>
</html>
