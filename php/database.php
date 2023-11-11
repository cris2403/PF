<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'ya';

$connection = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

function searchInventoryItem($conn, $productID) {
    $stmt = $conn->prepare("SELECT * FROM inventory WHERE i_id = ?");
    
    if (!$stmt) {
        die("Error in query: " . mysqli_error($conn));
    }

    $stmt->bind_param('i', $productID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $itemData = new stdClass();
        $itemData->i_id = $row['i_id'];
        $itemData->nome = $row['nome'];
        $itemData->stock = $row['stock'];
        $itemData->preco = $row['preco'];
        $itemData->desc = $row['desc'];
        $itemData->img = $row['img'];
        $itemData->trailer = $row['trailer'];

        return $itemData;
    } else {
        return null;
    }
}

function addToCart($userID, $productID) {
    global $connection;

    $stmt = $connection->prepare("INSERT INTO cart (user_id, product_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $userID, $productID);

    return $stmt->execute();
}

function isProductInCart($userID, $productID) {
    global $connection;

    $stmt = $connection->prepare("SELECT COUNT(*) FROM cart WHERE user_id = ? AND product_id = ?");
    $stmt->bind_param("ii", $userID, $productID);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();

    return $count > 0;
}
?>