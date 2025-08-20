<?php
session_start();
include_once "conexaolistar.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Veículos</title>
    <style>
        /* CSS completo aqui */
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
            height: 100%;
            width: 100%;
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
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            overflow-y: auto;
            box-sizing: border-box;
            height: 100%;
        }

        .listing {
            background-color: white;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
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
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
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
    </style>
</head>
<body>

<div class="container">

   
    <div class="listings">
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

        $query_usuarios = "SELECT id, nome, foto, preco, km FROM veiculos ORDER BY id DESC";
        $result_usuarios = $conn->prepare($query_usuarios);
        $result_usuarios->execute();

        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
            extract($row_usuario);
            echo "<div class='listing'>";
            
            if (!empty($foto) && file_exists("imagens/$id/$foto")) {
                echo "<img src='imagens/$id/$foto' alt='$nome_usuario'>";
            } else {
                echo "<img src='imagens/icon_user.png' alt='Sem imagem'>";
            }

            echo "<div class='details'>";
            echo "<h3>$nome</h3>";
            echo "<div class='price'>RS$preco</div>"; // Pode puxar do banco se tiver preço
            echo "<p>$foto</p>";
            echo "<p>km:$km</p>";
            echo "<a href='visualizar.php?id=$id'><button>Ver Mais</button></a>";
            echo "</div></div>";
        }
        ?>
    </div>
</div>

</body>
</html>
