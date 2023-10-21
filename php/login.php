<?php
include('database.php');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE nome = '$username' AND pass = '$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) === 1) {

        session_start();
        $_SESSION['username'] = $username;

        header('Location: ../index.php');
        exit();
    } else {
        echo 'Invalid username or password';
    }
}
?>
