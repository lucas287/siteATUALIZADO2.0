<?php
    session_start();
    include_once("conexao.php")
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda de Veículos de Luxo</title>
    <link rel="stylesheet" href="telainicial.css">
    <link rel="stylesheet" href="efeitoprocarro.css">
    <link rel="stylesheet" href="loading.css">
    <link rel="stylesheet" href="cssmenuexpansivel.css">
    <link rel="stylesheet" type="text/css" href="cssindex.css">
</head>
<style type="text/css">
    p{
        font-size: 14;
        font-weight: bold;
        color: black;
    }
    #loading-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #161616;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999; /* Garantir que fique sobre todo o conteúdo */
}

.logo-loading img {
    width: 150px;
    animation: spin 2s linear infinite;
}

@keyframes rotateAndPulse {
    0% {
        transform: rotate(0deg);
        opacity: 1;
    }
    50% {
        transform: rotate(180deg) scale(1.2); /* Meio da rotação com pulsação */
        opacity: 1;
    }
    100% {
        transform: rotate(360deg) scale(1); /* Rotaçao completa e volta ao tamanho original */
        opacity: 1;
    }
}
    h5{
        font-size: 40px;
        text-align: center;
        font-weight: bold;
    }

    .logodev img{
        width: 25px;
        height: 25px;
        padding-left: fill;
    }

    .logodev:hover img{
        background-color: ; 
    transform: scale(1.2); 
    }

    .fontdomenu p {
        font-size: 20px;
        color: #ed3338;
        font-weight: bold;
    }

    .fontdomenu2 p {
        font-size: 20px;
        color: white;
        font-weight: bold;
    }

    .fontdomenu2:hover{
    background-color: ; 
    transform: scale(1.2); 
    }

    .fontdomenu:hover{
    background-color: ; 
    transform: scale(1.2); 
    }

    .fontdomenu3{
        font-size: 20px;
        color: black;
        font-weight: bold
    }


    .fontdomenu3:hover{
         background-color: ; 
    transform: scale(1.2); 
    }
    
    .fontdocarross h2{
        font-size: 45px;
        color: #ed3338;
        font-weight: bold;
    }
    .footer-container {
    display: flex;
    justify-content: space-between; /* Deixa texto à esquerda e logo à direita */
    align-items: center;
    padding: 10px 20px;
    background-color: #f1f1f1; /* Ou a cor do seu layout */
    border-top: 1px solid #ccc;
    flex-wrap: wrap;
}

.footer-container p {
    margin: 0;
    font-size: 14px;
    font-weight: bold;
    color: black;
}

.footer-logo img {
    width: 30px;
    height: 30px;
    transition: transform 0.3s ease;
}

.footer-logo img:hover {
    transform: scale(1.2);
}

</style>
<body>

    <!-- Tela de Carregamento -->
    <div id="loading-container">
        <div class="logo-loading">
            <img src="logom-VMFinal.png" alt="Logo da Empresa" class="logo-img">
        </div>
    </div>

    <!-- Conteúdo principal -->
    <div id="main-content" style="display: none;">
        <!-- Menu Superior -->
        <header>
            <div id="header">
                <img id="logo" src="logom-VMFinal.png" alt="Logo">
                <button id="menu-btn">☰ㅤ𝑽𝒐𝒊𝒏𝓲𝑐𝓱𝑴𝒐𝓽𝓸𝓻𝓼</button>
            </div>
        </header>

<div id="sidebar" class="sidebar">
    <button id="close-btn" class="close-btn">&times;</button>
    <center><img id="menu-logo" src="logom-VMFinal.png" alt="Logo" class="menu-logo"></center>
    <ul>
        
        <div class="fontdomenu"><li><a href="#vehicles"><p>DESTAQUE</p></a></li></div>
        <div class="fontdomenu2"><li><a href="contato.php"><p>CONTATO</a></p></li></div>
        <div class="fontdomenu2"><li><a href="sobrenos.php"><p>SOBRE NÓS</a></p></li></div>
        <div class="fontdomenu2"><li><a href="login_tela2.php"><p>LOGIN</a></p></li></div>
        <div class="fontdomenu2"><li><a href="logintela1.php"><p>SIGNUP</a></p></li></div>
       
<section class="vehicle-list">
    

                <li id="carros-link">
                    <div class="fontdomenu3"><a href="#"><p>VEÍCULOS DESTAQUES</p></a></div>

                </div>
                </li>
            </ul>
        </div>

        <div id="submenu2-carros" class="submenu2-carros">
            <button id="close-submenu2-btn" class="close-btn">&times;</button>
            <ul>
                                <li><h5><a href="#">CARROS</a></h5></li>               
                 <li><a href="#">_______________________________</a></li>                 
       <div class="vehicle"><li><a href="golfgticarrossel.php">
        <img src="golf3.webp"></a></li>
        <h2>GOLF</h2>
    </div>  
                <div class="vehicle"><li><a href="opalacarrossel.php">
        <img src="jetta3.webp" alt="Porsche 718"></a></li>
        <h2>JETTA GLI</h2>
    </div>
                <li><h5><a href="#">MOTOS</a></h5></li>
                <li><a href="#">_______________________________</a></li>
                
                
    <div class="vehicle"><li><a href="s1000rcarrossel.php">
        <img src="s1000rrr.jpg"></a></li>
        <h2>S1000RR</h2>
    </div> 
    
        </div>
        

        <div id="submenu3-motos" class="submenu3-carros">
            <button id="close-submenu3-btn" class="close-btn">&times;</button>
            </div>
        <!-- Seção de Vídeo -->
        <section id="home" class="pro">
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/bD_nlDO09f4?autoplay=1&mute=1"
                    frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
            <div class="overlay">
                <div class="cardtrans">
            <div class="loader">
              
              <div class="words">
                <span class="word"></span>
                <span class="word"> ENCONTRE </span>
                <span class="word">𝑪𝑨𝑹𝑹𝑶𝑺</span>
                <span class="word">𝑴𝑶𝑻𝑶𝑺</span>
                <span class="word">𝑽𝒐𝒊𝒏𝓲𝑐𝓱𝑴𝒐𝓽𝓸𝓻𝓼</span>

              </div>
            </div>
          </div>
            </div>
        </section>

        <!-- Lista de Veículos -->
        <section id="vehicles" class="vehicle-list">

            <div class="vehicle">
                <a href="paginadoscarros.php">
                    <img src="gli.jpg" alt="Carro de Luxo 1">
                </a>
                <h3>CARROS</h3>
            </div>
            <div class="vehicle">
                <a href="paginadasmotos.php">
                    <img src="s1000k.jpg" alt="Carro de Luxo 2">
                </a>
                <h3>MOTOS</h3>
            </div>
            <div class="vehicle">
                <a href="https://www.google.com.br/maps/@-21.7929834,-50.8904675,3a,75y,279.84h,87.86t/data=!3m7!1e1!3m5!1sizf8GNh5Wd5cWxoiOiKf4g!2e0!6shttps:%2F%2Fstreetviewpixels-pa.googleapis.com%2Fv1%2Fthumbnail%3Fcb_client%3Dmaps_sv.tactile%26w%3D900%26h%3D600%26pitch%3D2.1364658562586953%26panoid%3Dizf8GNh5Wd5cWxoiOiKf4g%26yaw%3D279.8407075679281!7i16384!8i8192?entry=ttu&g_ep=EgoyMDI1MDUxNS4wIKXMDSoASAFQAw%3D%3D">
                    <img src="mapa.png" alt="Carro destaque 3">
                </a>
                <h3>MAPS</h3>
            </div>
        </section>

        <!-- Rodapé -->
        <footer class="footer-container">
    <p>&copy; 2024 Venda de Veículos de Luxo. Todos os direitos reservados.</p>
    <a href="loginfuncionario.php" class="footer-logo">
        <img src="logom-VMFinal.png" alt="Logo VM">
    </a>
</footer>

    </div>


    <!-- Script JavaScript -->
    <script>
        // Esconder a tela de carregamento e exibir o conteúdo
        setTimeout(function(){
            document.getElementById('loading-container').style.display = 'none';
            document.getElementById('main-content').style.display = 'block';
        }, 4000);

        // Variável para controlar o estado do menu
        let menuAberto = false;

        // Abrir e fechar o menu lateral

        document.getElementById("menu-btn").onclick = function() {
    let sidebar = document.getElementById("sidebar");
    let menuLogo = document.getElementById("menu-logo");
    let items = document.querySelectorAll(".sidebar ul li");

    if (menuAberto) {
        sidebar.style.width = "0";
        menuLogo.style.display = "none"; // Esconde a logo
        items.forEach(item => item.style.display = "none");
        menuAberto = false;
    } else {
        sidebar.style.width = "250px";
        menuLogo.style.display = "block"; // Exibe a logo
        items.forEach(item => item.style.display = "block");
        menuAberto = true;
    }

};

        // Fechar o menu ao clicar no botão de fechar
        document.getElementById("close-btn").onclick = function() {
            let sidebar = document.getElementById("sidebar");
            let items = document.querySelectorAll(".sidebar ul li");
            sidebar.style.width = "0"; // Fecha o menu
            items.forEach(item => {
                item.style.display = "none"; // Esconde os itens do menu
            });
            menuAberto = false; // Atualiza o estado do menu
        };

 document.getElementById("carros-link").onclick = function(event) {
    event.preventDefault();
    
    let submenuCarros = document.getElementById("submenu2-carros");
    let submenuMotos = document.getElementById("submenu3-motos");

    // Fecha o submenu de motos se estiver aberto
    if (submenuMotos.style.display === "block") {
        submenuMotos.style.display = "none";
    }

    // Alterna a exibição do submenu de carros
    submenuCarros.style.display = submenuCarros.style.display === "block" ? "none" : "block";
};

// Fechar os submenus
document.getElementById("close-submenu2-btn").onclick = function() {
    document.getElementById("submenu2-carros").style.display = "none";
};

document.getElementById("close-submenu3-btn").onclick = function() {
    document.getElementById("submenu3-motos").style.display = "none";
};

            
    
        
   

    </script>

</body>
</html>

