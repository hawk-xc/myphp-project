<?php
session_start();
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'];
$menu_id = $_GET['menu_id'];
$limit = $_GET['value'];

include 'functions.php';
$session = $_GET['menu_session'];


mysqli_query($connection, "DELETE FROM cart WHERE id_menus_image=$menu_id AND id=$id LIMIT $limit");
if(mysqli_affected_rows($connection) > 0) {
    echo "
    <script>
    alert('data order berhasil dihapus!');
    window.location = 'cart2.php?id=$id';
    </script>
    ";
    exit;
} else {
    echo "
    <script>
    alert('data order galat dihapus!');
    window.location = 'cart2.php?id=$id';
    </script>
    ";
    exit;
}
?>