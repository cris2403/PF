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
    <title>Game On | Cart</title>
</head>
<body>
    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <?php if(!isset($_SESSION['username'])){
                    echo '<a href="index.php">';
                        echo '<img class="logo" src="images/LogoF.png" alt="Logo">';
                    echo '</a>';
                    }
                    else
                    {
                        echo '<a href="index.php">';
                            echo '<img class="logo" src="images/LogoA.png" alt="Logo">';
                        echo '</a>';
                    }
            ?>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>
        <div class="nav-links">
            <a href="catalog.php">Catálogo</a>
            <a href="cart.php">Carrinho</a>
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
    
    

    <br>
    <br>
    <br>
    
    <footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-logo">
            <?php if(!isset($_SESSION['username'])){
                    echo '<img class="logo" src="images/LogoF.png" alt="Logo">';
                    }
                    else
                    {
                        echo '<img class="logo" src="images/LogoA.png" alt="Logo">';
                    }
            ?>
            </div>
            <div class="footer-links">
                <ul>
                    <li><a href="catalog.php">Catálogo</a></li>
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