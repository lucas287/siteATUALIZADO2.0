<?php
session_start();
include_once "conexaolistar.php";
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Veículos</title>
    <link rel="stylesheet" href="telainicial.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            height: fill;
            width: 100%;
            overflow: hidden; /* <-- Adicionado */
        }

        .sidebar {
            width: 20%;
            background-color: white;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            overflow-y: auto;
        }

        .sidebar h2 {
            margin-top: 0;
        }

        .sidebar input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-family: monospace;
            font-size: 18px;
        }

        .filters h3, .brand-filter h3 {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .filters label, .brand-filter .brands button {
            display: block;
            margin-bottom: 10px;
            cursor: pointer;
            font-family: monospace;
            font-size: 18px;
        }

        .brand-filter .brands button {
            background-color: #eee;
            border: none;
            padding: 10px;
            margin-bottom: 5px;
            width: 100%;
            text-align: left;
            box-sizing: border-box;
            font-family: monospace;
            font-size: 18px;
        }

        .brand-filter .clear {
            background-color: black;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            cursor: pointer;
            margin-top: 20px;
            box-sizing: border-box;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }

        .brand-filter .clear:hover {
            background-color: #cc0000;
        }

        .listings {
            flex: 1;
            padding: 30px 0 30px 30px; /* <-- alterado para remover o padding da direita */
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* <-- melhor responsividade */
            gap: 20px;
            overflow-y: auto;
            box-sizing: border-box;
        }

        .listing {
            background-color: white;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            height: fill;
            text-align: center;
        }

        .listing:hover {
            transform: translateY(-5px);
        }

        .listing img {
            width: 80%;
            height: auto;
            margin: auto;
            transition: transform 0.5s ease;
        }

        .listing:hover img {
            transform: scale(1.2);
        }

        .details {
            padding: 10%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: fill;
        }

        .details h3 {
            margin-top: 0;
            font-size: 18px;
        }

        .details .price {
            font-size: 24px;
            color: lightgrey;
            margin: 10px 0;
            font-weight: bold;
        }

        .details button {
            background-color: #000;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
            font-family: monospace;
        }

        .details button:hover {
            background-color: #333;
        }

        img {
            width: 40px;
            height: 40px;
        }

        h1 span {
      color:#ed3338;
    }
    </style>
</head>
<body>
    <header>
        <nav class="navbar"><br>
            <div class="logo">
                <img src="logom-VMFinal.png" alt="Logo">
            </div>
            <ul class="nav-links">
                <li><a href="index.php"><i class="fas fa-home"></i></a></li>
            </ul>
        </nav>
    </header><br><br><br><br><br>
    <center><h1>Encontre seu carro <span>PERFEITO</span></h1></center>
    <div class="container">
        <div class="listings">
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }

            $query_usuarios = "SELECT id, nome, km, ano, foto, preco, tipo FROM veiculo WHERE tipo='carro' ORDER BY id DESC";
            $result_usuarios = $conn->prepare($query_usuarios);
            $result_usuarios->execute();

            while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
                extract($row_usuario);
                echo "<div class='listing'>";

                if (!empty($foto) && file_exists("imagens/$id/$foto")) {
                    echo "<img src='imagens/$id/$foto' alt='$nome'>";
                } else {
                    echo "<img src='imagens/icon_user.png' alt='Sem imagem'>";
                }
                echo "<div class='details'>";
                echo "<h3>$nome</h3>";
                echo "<div class='price'><h3>R$: $preco</h3></div>";
                echo "<h3>$ano</h3>";
                echo "<a href='visualizar.php?id=$id'><button>Ver Mais</button></a>";
                echo "</div></div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
