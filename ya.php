<!DOCTYPE html>
<?php
include "php/database.php";
include "php/items.php";
$conn=mysqli_connect("LocalHost","root","","ya");
session_start();

$productID = isset($_GET['id']) ? $_GET['id'] : null;

$itemData = searchInventoryItem($conn, $productID);

$title = "Game On | " . ($itemData !== null ? $itemData->nome : "Product Not Found");
?>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title><?= $title ?></title>
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

    <div class="product-section">
        <div class="product-section">
        <?php
            if ($itemData !== null) {
                echo '<div class="product-container">';
                echo '<div class="product-image">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($itemData->img) . '" alt="' . $itemData->nome . '">';
                echo '</div>';
                echo '<div class="product_details">';
                echo '<h1 class="product-title">' . $itemData->nome . '</h1>';
                echo '<br>';
                echo '<br>';
                echo '<p class="product-description">' . $itemData->desc . '</p>';
                echo '<br>';
                echo '<br>';
                echo '<br>';
                echo '<br>';
                echo '<br>';
                echo '<strong class="product-price">' . $itemData->preco . '€</strong>';
                echo '<br>';
                echo '<br>';
                echo '<?php if (isset($_SESSION["user"]) && isset($_SESSION["user"]["id"])) : ?>';
                    echo '<form action="php/cartings.php" method="post">';
                        echo '<input type="hidden" name="productID" value="1">';
                        echo '<button type="submit">Adicionar ao Carrinho</button>';
                    echo '</form>';
                echo '<?php else : ?>';
                    echo '<p>Faça login para adicionar ao carrinho.</p>';
                echo '<?php endif; ?>';               
                echo '</div>';
                echo '<div class="product-trailer">';
                echo '<iframe width="100%" height="315" src="https://www.youtube.com/embed/' . $itemData->trailer . '" frameborder="0" allowfullscreen></iframe>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<div class="product-container">';
                echo '<p>Product not found.</p>';
                echo '</div>';
            }
        ?>
        </div>
    </div>

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