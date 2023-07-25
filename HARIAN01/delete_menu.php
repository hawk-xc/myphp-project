<?php
session_start();
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'];

include 'functions.php';
$session = $_GET['menu_session'];

mysqli_query($connection, "DELETE FROM cart WHERE order_session = '$session'");
if(mysqli_affected_rows($connection) > 0) {
    echo "
    <script>
    alert('data order berhasil dihapus!');
    window.location = 'cart.php?id=$id';
    </script>
    ";
    exit;
} else {
    echo "
    <script>
    alert('data order galat dihapus!');
    window.location = 'cart.php?id=$id';
    </script>
    ";
    exit;
}
?>