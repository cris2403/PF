<?php
include "database.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productID = isset($_POST["productID"]) ? $_POST["productID"] : null;

    if (isset($_SESSION["user"]) && isset($_SESSION["user"]->id)) {
        $userID = $_SESSION["user"]->id;

        if (!isProductInCart($userID, $productID)) {
            $success = addToCart($userID, $productID);
            if ($success) {
                echo "Produto adicionado ao carrinho com sucesso.";
            } else {
                echo "Erro ao adicionar o produto ao carrinho.";
            }
        } else {
            echo "O produto já está no carrinho.";
        }
    } else {
        echo "Utilizador não logado. Faça login para adicionar items ao carrinho.";
    }
} else {
    echo "Método de requisição inválido.";
}
