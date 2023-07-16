<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}
?>
<?php
    include 'functions.php';

    $id = $_COOKIE['id'];
    $arr = query("SELECT * FROM user WHERE id=$id");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
</head>

<body>
    <div class="container">
        <div class="box">
            <div class="user">
                <?php
                if(isset($_COOKIE['host'])){
                    echo "<div class='user'>hello ". $arr['username']. "</div>";
                }
                ?>
            </div>
            <img src="2.png" alt="tidak ada">
            <div class="header">Fujiyama Store</div>
            <div class="menus">
                <a href="">product</a>
                <a href="">about us</a>
                <a href="">documentation</a>
                <a href="">github</a>
            </div>
        </div>
    </div>
</body>
<style type="text/css">
@import url('https://fonts.cdnfonts.com/css/mona-sans');

* {
    font-family: 'Mona-Sans', sans-serif;
    font-family: 'Mona Sans', sans-serif;
}

html, body {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    width: 50%;
    height: 400px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #414a4c;
}

.container .box {
    width: 100%;
}

.user {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 3rem;
}

.container .box .header {
    font-size: 35px;
    display: flex;
    width: 100%;
    justify-content: center;
    margin-block: 2rem;
    font-weight: 800;
}

.container .box .header:hover {
    text-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}

.text:hover {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}

.container .box .menus {
    text-transform: uppercase;
    font-weight: 800;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.container .menus a {
    text-decoration: none;
    color: #414a4c;
    transition: 0.3s;
    font-size: 15px;
}

.container .menus a:hover {
    box-shadow: rgba(100, 100, 111, 0.4) 0px 7px 29px 0px;
    font-size: 17px;
    padding: 10px;
    border-radius: 10px;
}
</style>
</html>