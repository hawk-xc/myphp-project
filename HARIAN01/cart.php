<!DOCTYPE html>
<html lang="en">
<script src="https://unpkg.com/feather-icons"></script>
<?php
session_start();
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

if($_GET['id'] !== $_COOKIE['id']) {
    header('Location: login.php');
    exit;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
</head>

<body>
    <div class="container">
        <div class="title-decsription">
            <i data-feather="shopping-cart" class="icon-cart"></i>
            <h1>waiting list cart pesanan</h1>
        </div>
        <table>
            <tr>
                <th>id menu</th>
                <th>nama menu</th>
                <th>total harga</th>
                <th>jumlah</th>
            </tr>
            <?php
    include 'functions.php';

    $id = $_GET['id'];
    $query = mysqli_query($connection, "select id_menus_image, menus_name, count(*) * price_list as total_harga, count(*) as jumlah from cart group by menus_name;");
    $total = sqlquery("SELECT SUM(price_list) AS jumlah FROM cart WHERE id=$id");
    while ($arr = mysqli_fetch_assoc($query)):
    ?>
            <tr>
                <td><?php echo $arr['id_menus_image']; ?></td>
                <td><?php echo $arr['menus_name']; ?></td>
                <td><?php echo $arr['total_harga']; ?></td>
                <td><?php echo $arr['jumlah']; ?></td>
            </tr>
            <?php
    endwhile;
    ?>
        </table>
        <?php
    echo $total['jumlah'];
    ?>
    </div>
</body>
<style type="text/css">
* {
    font-family: "Roboto Regular", Tahoma, sans-serif;
    padding: 0;
    margin: 0;
}

html,
body {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {}

.container .title-decsription {
    display: flex;
    flex-direction: row;
    padding: 0;
    justify-content: center;
    align-items: center;
    gap: 1rem;
    margin-block: 1rem;
}

.container .title-decsription .icon-cart {
    transform: rotate(-20deg);
}

table,
th,
td {
    border: 1px solid black;
    border-collapse: collapse;
}

tr:hover {
    background-color: lightblue;
}
</style>
<script>
feather.replace()
</script>

</html>