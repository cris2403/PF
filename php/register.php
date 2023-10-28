<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("database.php");

    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];
    $birth = $_POST["birth"];
    $email = $_POST["email"];

    if ($password !== $confirmPassword) {
        echo "As Password têm de ser iguais.";
    } else {
        $sql = "INSERT INTO `users` (`nome`, `pass`, `nasc`, `email`) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssss", $username, $password, $birth, $email);

        if ($stmt->execute()) {
            echo "Registado Com Sucesso!";
            header("Location: ../login.html");
            exit();
        } else {
            echo "Registo Falhou.";
        }

        $stmt->close();
        $connection->close();
    }
} else {
    echo "Erro Ao Submeter O Form.";
}
?>
