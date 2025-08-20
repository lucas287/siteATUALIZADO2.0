<?php
    session_start();
    include_once("conexao.php")
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S1000RR</title>
    <link rel="stylesheet" href="telainicial.css">
        <link rel="stylesheet" href="carrossel.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
       <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .listing {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 32px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .carousel {
            position: relative;
            width: 100%;
            max-width: 700px;
            margin: 0 auto 30px;
            overflow: hidden;
            border-radius: 8px;
        }

        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease;
        }

        .carousel-item {
            min-width: 100%;
            transition: opacity 0.5s ease;
            opacity: 0;
            position: relative;
        }

        .carousel-item.active {
            opacity: 1;
        }

        .carousel img {
            width: 100%;
            height: 460px;
            display: block;
            object-fit: cover;
        }

        .carousel-control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            font-size: 28px;
            padding: 12px;
            cursor: pointer;
            z-index: 1;
        }

        .carousel-control.prev {
            left: 10px;
        }

        .carousel-control.next {
            right: 10px;
        }

        .car-details {
            display: flex;
            justify-content: space-around;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .detail {
            text-align: center;
            margin: 10px;
            font-size: 20px;
        }

        .detail span {
            display: block;
            font-size: 24px;
            font-weight: bold;
        }

        .price {
            text-align: center;
            margin-bottom: 25px;
        }

        .price h2 {
            font-size: 36px;
            color: #333;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-top: 40px;
        }

        .simulate, .message, .whatsapp {
            padding: 14px 28px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            text-decoration: none;
            color: white;
        }

        .simulate {
            background-color: grey;
        }

        .message {
            background-color: grey;
        }

        .whatsapp {
            background-color: #25d366;
        }
            img{
        weight: 40px;
        height: 40px;
    }

    </style>
 <header>
    <nav class="navbar"><br>
        <div class="logo">
            <img src="logom-VMFinal.png" alt="Logo">
        
        <ul class="nav-links">
            <li><a href="index.php"><i class="fas fa-home"></i></a></li>

        </ul>
    </nav></div>
</header>
    <div class="container">
        <div class="listing"><br><br>
            <h1>BMW S1000RR</h1>
   

            <div class="carousel">
                <div class="carousel-inner">
                    <img src="https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202501/20250121/bmw-s-1000-rr-wmimagem1735457306.jpg?s=fill&w=552&h=414&q=60"  class="carousel-item active">
                    <img src="https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202501/20250121/bmw-s-1000-rr-wmimagem17363556036.jpg?s=fill&w=552&h=414&q=60"  class="carousel-item active">
                    <img src="https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202501/20250121/bmw-s-1000-rr-wmimagem17371088840.jpg?s=fill&w=552&h=414&q=60"  class="carousel-item active">
                    <img src="https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202501/20250121/bmw-s-1000-rr-wmimagem17391916297.jpg?s=fill&w=552&h=414&q=60"  class="carousel-item active">
                    <img src="https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202501/20250121/bmw-s-1000-rr-wmimagem17373548087.jpg?s=fill&w=552&h=414&q=60"  class="carousel-item active">
                    <img src="https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202501/20250121/bmw-s-1000-rr-wmimagem17394772146.jpg?s=fill&w=552&h=414&q=60"  class="carousel-item active">
                    <img src="http://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202501/20250121/bmw-s-1000-rr-wmimagem17235863167.jpg?s=fill&w=552&h=414&q=60"  class="carousel-item active">
                    <img src="https://image.webmotors.com.br/_fotos/anunciousados/gigante/2025/202501/20250121/bmw-s-1000-rr-wmimagem17383260630.jpg?s=fill&w=552&h=414&q=60"  class="carousel-item active">


                </div>
                <button class="carousel-control prev" onclick="prevSlide()">&#10094;</button>
                <button class="carousel-control next" onclick="nextSlide()">&#10095;</button>
            </div>


            <div class="car-details">
                <div class="detail">
                    <span>Ano</span>
                    <span>2024 / 2024</span>
                </div>
                <div class="detail">
                    <span>Km</span>
                    <span>2.662</span>
                </div>
                <div class="detail">
                    <span>Cor</span>
                    <span>Vermelho</span>
                </div>
                <div class="detail">
                    <span>Câmbio</span>
                    <span>Manual</span>
                </div>

            </div>

            <div class="price">
                <h2>R$ 114,890,00</h2>
                <p>Preço à vista</p>
            </div>

                <center>
                <div class="buttons">
                    <a href="loginusuario.php">
                    <button type="loginusuario.php" class="message">COMPRAR</button>
                </div></a>

              
        </div>
    </div>
</center>
    <script src="carrosseljs.js"></script>
</body>
</html>
