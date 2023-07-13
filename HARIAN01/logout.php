<?php
session_start();
session_destroy();
session_unset();


include 'functions.php';
$id = $_COOKIE['id'];
$host = $_COOKIE['host'];
// $result = mysqli_query($connection, "SELECT * FROM user WHERE id=$id");
// $result_assoc = mysqli_fetch_assoc($result);
$_SESSION['login'] = '';
setcookie('id', '$id', time() - 3600);
setcookie('host', '$host', time() - 3600);
header('Location: login.php');
?>