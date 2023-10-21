<?php
include "database.php";

mysqli_connect("LocalHost", "root", "", "loja");
session_start();
$_SESSION = array();
session_destroy();
header("Location: ../index.php");
exit();
?>