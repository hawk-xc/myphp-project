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

include 'functions.php';

    $id = $_GET['id'];
    $query = mysqli_query($connection, "SELECT order_session, id_menus_image, menus_name, COUNT(*) * price_list AS total_harga, COUNT(*) AS jumlah FROM cart WHERE id=$id GROUP BY menus_name;");
    $total = sqlquery("SELECT SUM(price_list) AS jumlah FROM cart WHERE id=$id");

    if (mysqli_num_rows($query)) {
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
                <th>panel</th>
            </tr>
            <?php
    while ($arr = mysqli_fetch_assoc($query)):
    ?>
            <tr>
                <td><?php echo $arr['id_menus_image']; ?></td>
                <td><?php echo $arr['menus_name']; ?></td>
                <td><?php echo $arr['total_harga']; ?></td>
                <td><?php echo $arr['jumlah']; ?></td>
                <td class='panel'>
                    <a href="ubah.php">
                        <i data-feather="edit" class="icon-edit"></i></a>
                    </a>
                    <a href="delete_menu.php?menu_session=<?php echo $arr['order_session']; ?>&id=<?php echo $_GET['id']; ?>"
                        class="icon-delete" onclick="return confirm('hapus?')"><i data-feather="delete"
                            class=""></i></a>
                </td>
            </tr>
            <?php
    endwhile;
    ?>
        </table>
        <?php
    echo $total['jumlah'];
} else {
    ?>
        <div class="no-data">
            <div class="header">
                <a href="index.php">
                    <i data-feather="link" class="icon-cart"></i>
                    <span>Data Kosong</span>
                </a>
            </div>
            <div class="content">
                <p>untuk saat ini antrian cart kosong, silakan pesan menu</p>
            </div>
        </div>
        <?php } ?>
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
    padding-inline: 1.4rem;
    padding-block: 0.2rem;
}

tr:hover {
    background-color: lightblue;
}

.panel {
    display: flex;
    justify-content: center;
    align-items: center;
}

.panel .icon-edit {
    color: black;
    transition: 0.5s;
}

.panel .icon-edit:hover {
    color: blue;
}

.panel .icon-delete {
    color: black;
    transition: 0.5s;
}

.panel .icon-delete:hover {
    color: red;
}

.no-data {
    width: 300px;
    background-image: linear-gradient(45deg, #85FFBD 0%, #FFFB7D 100%);
    height: 250px;
    border-radius: 10px 10px 10px 10px;
    color: #222222;
    padding: 1rem;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    gap: 1rem;
    transition: 0.6s;
}

.no-data:hover {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}

.no-data .header a {
    display: flex;
    /* justify-content: center; */
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    text-decoration: none;
    color: #222222;
    transition: 0.5s;
}

.no-data .header a:hover {
    color: blueviolet;
}
</style>
<script>
feather.replace()
</script>

</html>