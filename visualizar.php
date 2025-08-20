<?php
session_start();
ob_start();
include_once "conexaolistar.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<link rel="stylesheet" href="telainicial.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<head>
    <meta charset="UTF-8">
    <title>Detalhes da Moto</title>
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
        img {
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
</header><br><br>
<div class="container">
    <div class="listing">
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

        if (!empty($id)) {
            $query = "SELECT id, nome, km, ano, tipo, preco, cor FROM veiculo WHERE id=:id LIMIT 1";
            $result = $conn->prepare($query);
            $result->bindParam(':id', $id);
            $result->execute();

            if ($result->rowCount() > 0) {
                $row = $result->fetch(PDO::FETCH_ASSOC);
                extract($row);

                echo "<h1>$nome</h1>";

                // Carrega todas as imagens da pasta imagens/$id/
                $imageDir = "imagens/$id/";
                $images = array_merge(
                    glob($imageDir . "*.{jpg,jpeg,png,gif,webp,JPG,JPEG,PNG,GIF,WEBP}", GLOB_BRACE)
                );

                echo "<div class='carousel'>
                        <div class='carousel-inner' id='carouselInner'>";
                foreach ($images as $index => $imgPath) {
                    $activeClass = $index === 0 ? "active" : "";
                    echo "<div class='carousel-item $activeClass'>
                            <img src='$imgPath' alt='Foto da moto'>
                          </div>";
                }
                echo "</div>
                        <button class='carousel-control prev' onclick='prevSlide()'>&#10094;</button>
                        <button class='carousel-control next' onclick='nextSlide()'>&#10095;</button>
                      </div>";

                echo "<div class='car-details'>
                        <div class='detail'><span>$ano</span>ANO</div>
                        <div class='detail'><span>$km </span>KM</div>
                        <div class='detail'><span>$cor</span>COR</div>
                      </div>";

                echo "<div class='price'><h2>R$ $preco,00</h2></div>";

                // Verifica se o usuário está logado
                if (isset($_SESSION['id_cliente'])) {
                    $id_cliente = $_SESSION['id_cliente'];  // ID do cliente logado
                    echo "<div class='buttons'>
                            <a href='loginusuario.php?id=$id' class='simulate'>COMPRAR</a>
                          </div>";
                } else {
                    echo "<div class='buttons'>
                            <a href='loginusuario.php?id=$id' class='simulate'>COMPRAR</a>
                          </div>";
                }

            } else {
                echo "<p style='color: red;'>Erro: Moto não encontrada!</p>";
            }

        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Erro: ID inválido!</p>";
            header("Location: index.php");
        }
        ?>
    </div>
</div>

<script>
    let currentIndex = 0;
    const items = document.querySelectorAll('.carousel-item');

    function showSlide(index) {
        items.forEach((item, i) => {
            item.classList.remove('active');
            if (i === index) {
                item.classList.add('active');
            }
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % items.length;
        showSlide(currentIndex);
    }

    function prevSlide() {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        showSlide(currentIndex);
    }
</script>

</body>
</html>
