<?php
session_start();
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

include 'functions.php';

$id = $_GET['id'];
$id_menus = $_GET['menu_id'];
$menu_name = $_GET['menus_name'];
$price_list = $_GET['price'];

$session = uniqid();
mysqli_query($connection, "INSERT INTO cart (order_session, id, id_menus_image, menus_name, price_list) VALUES
('$session', $id, $id_menus, '$menu_name', $price_list)");
if(mysqli_affected_rows($connection) > 0) {
echo "
<script>
alert('data berhasil ditambahkan!');
window.location = 'index.php#menu';
</script>
";
// header('location: halaman.php');
} else {
echo "
<script>
alert('data galat ditambahkan!');
window.location = 'index.php#menu';
</script>
";
// header('location: halaman.php');
}
?>