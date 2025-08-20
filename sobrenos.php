<?php
    session_start();
    include_once("conexao.php")
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós - Venda de Veículos de Luxo</title>
    <link rel="stylesheet" href="telainicial.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #e0e0e0; /* Fundo branco acinzentado */
        }
        header {
            background: #333;
            color: #fff;
            padding: 10px 0;
            position: relative;
        }
        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        /* Estilos das linhas preta, branca e vermelha */
        .colored-lines {
            height: 10px;
            display: flex;
            margin-bottom: 20px;
        }
        .line-black {
            background-color: black;
            flex: 1;
        }
        .line-white {
            background-color: white;
            flex: 1;
        }
        .line-red {
            background-color: red;
            flex: 1;
        }

        #about-content {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 20px auto;
            position: relative;
            z-index: 1;
        }

        /* Contorno em cores preta, branca e vermelha */
        #about-content::before {
            content: "";
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            border: 5px solid black; /* Contorno preto */
            border-radius: 5px;
            z-index: -1;
        }
        #about-content::after {
            content: "";
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            border: 5px solid red; /* Contorno vermelho */
            border-radius: 5px;
            z-index: -2;
        }
        #about-content::before::before {
            content: "";
            position: absolute;
            top: -15px;
            left: -15px;
            right: -15px;
            bottom: -15px;
            border: 5px solid white; /* Contorno branco */
            border-radius: 5px;
            z-index: -3;
        }

        /* Logo ao lado de Sobre Nós */
        .about-header {
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }
        .about-header h1 {
            margin-right: 550px; /* Espaçamento entre o título e a logo */
            color: #333;
        }
        .about-logo {
            max-width: 100px;
        }

        h2 {
            color: #333;
        }
        ul {
            margin: 15px 0;
            padding-left: 20px;
        }
        footer {
            text-align: center;
            padding: 10px 0;
            background: #333;
            color: #fff;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        .creators {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .creator {
            margin: 10px;
            flex-basis: calc(33% - 20px);
            text-align: center;
        }
        .creator img {
            max-width: 50%;
            height: auto;
            border-radius: 5px;
        }
        .effect {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin: 40px 0;
            animation: blink 1s infinite;
        }
        @keyframes blink {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }
            img{
        weight: 40px;
        height: 40px;
    }

    </style>
</head>
<body>
<header>
    <nav class="navbar"><br>
        <div class="logo">
            <img src="logom-VMFinal.png" alt="Logo">
        
        <ul class="nav-links">
            <li><a href="index.php"><i class="fas fa-home"></i></a></li>

        </ul>
    </nav></div>
</header>

    <!-- Linhas coloridas preta, branca e vermelha -->
    <div class="colored-lines">
        <div class="line-black"></div>
        <div class="line-white"></div>
        <div class="line-red"></div>
    </div>
    
    <section id="about-content">
        <!-- Título e logo ao lado -->
        <div class="about-header">
            <h1>Sobre Nós</h1>
            <img src="logom-VMFinal.png" alt="Logo VoinichMotors" class="about-logo">
        </div>
        
        <h2>Sobre a VoinichMotors</h2>
        <p>Na VoinichMotors, somos apaixonados por mobilidade e comprometidos em oferecer uma experiência excepcional na compra de veículos. Com uma vasta gama de opções, atendemos às suas necessidades, seja você um entusiasta de carros e motos ou alguém em busca de seu primeiro veículo.</p>
        
        <h2>Nossa História</h2>
        <p>Fundada em junho de 2024, a VoinichMotors começou com o objetivo de fornecer veículos de alta qualidade com um atendimento ao cliente impecável. Nosso nome, "Voinich," reflete nossa tradição de excelência e inovação no setor automotivo.</p>
          
        <h2>O que Fazemos</h2>
        <p>Oferecemos uma ampla seleção de carros e motos novos e usados, atendendo a todos os estilos de vida e orçamentos. Seja você fã de tecnologia de ponta ou apreciador de modelos clássicos, nossa oferta inclui:</p>
        <ul>
            <li><strong>Carros Novos:</strong> Explore nossa linha de veículos novos, projetados com as mais recentes inovações tecnológicas, eficiência de combustível e segurança.</li>
            <li><strong>Carros Usados:</strong> Nossa frota de carros usados é rigorosamente inspecionada e certificada, garantindo qualidade e confiabilidade a preços acessíveis.</li>
            <li><strong>Motos Novas e Usadas:</strong> Oferecemos motos novas e usadas para todos os tipos de motociclistas, desde iniciantes até pilotos experientes, com garantia de qualidade e performance.</li>
        </ul>
        
        <h2>Nosso Compromisso</h2>
        <p>Acreditamos que cada veículo deve proporcionar uma experiência de condução única e satisfatória. Nossa equipe de profissionais está aqui para ajudar você a encontrar o carro ou a moto que melhor se adapta às suas necessidades e desejos. Com um atendimento personalizado, financiamento facilitado e serviços pós-venda de excelência, garantimos que sua jornada conosco seja tão satisfatória quanto possível.</p>
        
        <h2>Por que Escolher a VoinichMotors?</h2>
        <ul>
            <li><strong>Qualidade e Confiança:</strong> Todos os nossos veículos passam por rigorosos processos de inspeção e manutenção.</li>
            <li><strong>Variedade e Opções:</strong> Um portfólio diversificado de carros e motos novos e usados, para atender às suas preferências e orçamento.</li>
            <li><strong>Atendimento Personalizado:</strong> Nossa equipe está sempre pronta para oferecer conselhos especializados e assistência dedicada.</li>
        </ul>
        
        <p>Convidamos você a visitar nossa loja e descobrir a diferença VoinichMotors. Estamos aqui para transformar sua experiência de compra de veículos e garantir que você encontre exatamente o que procura. Venha dirigir conosco rumo ao futuro da mobilidade!</p>

        <!-- Efeito no final -->
        <div class="effect">Drive Your Passion</div>

          <h2>Os Criadores do Site</h2>
        <div class="creators">
            <div class="creator">
                <img src="https://raw.githubusercontent.com/LojaVoinich/LojaVoinich/refs/heads/main/vinicius.png" alt="Criador 1">
                <p>Criador 1</p>
            </div>
            <div class="creator">
                <img src="https://raw.githubusercontent.com/LojaVoinich/LojaVoinich/refs/heads/main/pedro.png" alt="Criador 2">
                <p>Criador 2</p>
            </div>
            <div class="creator">
                <img src="https://raw.githubusercontent.com/LojaVoinich/LojaVoinich/refs/heads/main/raul.png" alt="Criador 3">
                <p>Criador 3</p>
            </div>
            <div class="creator">
                <img src="https://raw.githubusercontent.com/LojaVoinich/LojaVoinich/refs/heads/main/julia.jfif" alt="Criador 4">
                <p>Criador 4</p>
            </div>
            <div class="creator">
                <img src="https://raw.githubusercontent.com/LojaVoinich/LojaVoinich/refs/heads/main/kaue.jfif" alt="Criador 5">
                <p>Criador 5</p>
            </div>
            <div class="creator">
                <img src="https://raw.githubusercontent.com/LojaVoinich/LojaVoinich/refs/heads/main/lucas.png" alt="Criador 6">
                <p>Criador 6</p>
            </div>
        </div> 

    </section>
    
    <footer>
        <p>&copy; 2024 Venda de Veículos de Luxo. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
