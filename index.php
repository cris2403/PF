<!DOCTYPE html>
<?php
    include "php/database.php";
    $conn=mysqli_connect("LocalHost","root","","ya");
    session_start();
?>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Game On | Index</title>
</head>
<body>
    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <a href="index.php">
				<img class="logo" src="images/LogoA.png" alt="Logo">
			</a>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>
        <div class="nav-links">
            <a href="#">Catálogo</a>
            <a href="#">Carrinho</a>
            <?php if(!isset($_SESSION['username'])){
                    echo '<a href="login.html">Login</a>';
                    }
                    else
                    {
                        echo '<a href="conta.php">Conta</a>';
                        echo '<a href="php/logout.php">Logout</a>';
                    }
            ?>
        </div>
    </div>

    <br>
    <br>
    <br>

    <div class="intro-section">
        <div class="intro-content">
            <h1>Bem-Vindo À Game On</h1>
            <br>
            <p>A tua loja preferida para comprar os últimos jogos digitais</p>
            <p>Clica no botão abaixo para visitar o nosso catálogo ou explora o resto do site.</p>
            <a class="intro-button" href="#">Compra Agora</a>
        </div>
        <div class="intro-image">
            <img src="images/LogoImg.png" alt="Imagem Top">
        </div>
    </div>

    <br>
    <br>
    <br>

    <h2 class="carousel_title">Destaques</h2>
    <br>
    <div class="slideshow-container">
        <!--Adicionar mais-->
        <div class="slide">
            <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
            <img src="images/dishonored.jpg" alt="Dishonored 2">
            <div class="text">
                <h2>Dishonored 2</h2>
                <p>Descrição</p>
                <p>10€</p>
            </div>
            <a class="next" onclick="changeSlide(1)">&#10095;</a>
        </div>
        <!-------------------------------------->
        <div class="slide">
            <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
            <img src="images/prey.jpg" alt="Prey">
            <div class="text">
                <h2>Prey</h2>
                <p>Descrição</p>
                <p>14,99€</p>
            </div>
            <a class="next" onclick="changeSlide(1)">&#10095;</a>
        </div>
        <div class="slide">
            <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
            <img src="images/war.jpeg" alt="Middle-Earth: Shadow of War">
            <div class="text">
                <h2>Middle-Earth: Shadow of War</h2>
                <p>Descrição</p>
                <p>9,99€</p>
            </div>
            <a class="next" onclick="changeSlide(1)">&#10095;</a>
        </div>
    </div>
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll(".slide");
        function showSlide(index) {
            if (index < 0) {
                index = slides.length - 1;
            } else if (index >= slides.length) {
                index = 0;
            }
            slides.forEach((slide) => {
                slide.style.display = "none";
            });
            slides[index].style.display = "block";
            currentSlide = index;
        }
        function changeSlide(n) {
            showSlide(currentSlide + n);
        }
        function autoSlide() {
            changeSlide(1);
        }
        showSlide(0);
        setInterval(autoSlide, 3000);
    </script>

    <br>
    <br>
    <br>
    
    <footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="images/LogoA.png" alt="Logo">
            </div>
            <div class="footer-links">
                <ul>
                    <li><a href="#">Catálogo</a></li>
                    <li><a href="#">Carrinho</a></li>
                    <?php if(!isset($_SESSION['username'])){
                        echo '<a href="login.html">Login</a>';
                        }
                        else
                        {
                            echo '<li><a href="conta.php">Conta</a></li>';
                            echo '<li><a href="php/logout.php">Logout</a></li>';
                        }
                    ?>
                </ul>
            </div>
            <div class="site-description">
                <p>Seja bem-vindo à Game On, a sua loja virtual preferida para adquirir os mais recentes jogos digitais.</p>
                <p>Explore uma vasta seleção de títulos, descubra ofertas incríveis e mergulhe no mundo dos jogos com facilidade.</p>
            </div>
        </div>
    </div>
    </footer>

</html>