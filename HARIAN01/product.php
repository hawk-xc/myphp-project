<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD:HARIAN01/user.php
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
    $arr_user = sqlquery("SELECT * FROM user WHERE id=$id");
    $arr_image = sqlquery("SELECT * FROM menus_image WHERE id=$id");
?>

=======
>>>>>>> 9b6e67e44dde0a656c20bb65c4a509d0d3a5774d:HARIAN01/product.php
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD:HARIAN01/user.php
    <title>User Lookup : <?php echo $_GET['id']; ?></title>
=======
    <title>Product Menu</title>
>>>>>>> 9b6e67e44dde0a656c20bb65c4a509d0d3a5774d:HARIAN01/product.php
</head>
<body>
<<<<<<< HEAD:HARIAN01/user.php
    <div class="container">
        <img class="profile_photo" src="<?php echo $arr_image['path']; ?>"
            alt="<?php echo $arr_user['username']; ?> image">
        <h1><?php echo $arr_user['username']; ?></h1>
        <div class="box">
            <div class="box-clasification">
                <a href="">change password</a>
            </div>
            <div class="box-clasification">
                <a href="">change profile photo</a>
            </div>
            <div class="box-clasification">
                <a href="">change data</a>
            </div>
        </div>
        <a href="index.php" style="color: white"><code>dashboard</code></a>
        <a href="logout.php" style="color: white"><code>logout</code></a>
    </div>
</body>
<style type="text/css">
@import url('https://fonts.cdnfonts.com/css/mona-sans');

* {
    font-family: 'Mona-Sans', sans-serif;
    font-family: 'Mona Sans', sans-serif;
}

html,
body {
    padding: 0;
    margin: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #0c1015;
}

.container {
    color: #ffff;
    display: flex;
    flex-direction: column;
    background-color: #161b22;
    border: 1px solid #4e3e6c;
    padding: 1rem;
    border-radius: 10px 0px 10px 0px;
    width: 300px;
    justify-content: center;
    align-items: center;
}

.profile_photo {
    width: 200px;
    border-radius: 100%;
}

.box {
    width: 90%;
    border: 1px solid #4e3e6c;
    display: flex;
    flex-direction: row;
    font-size: 14px;
}

.box-clasification {
    border: 1px solid #4e3e6c;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 0.4rem;
    width: 100%;
}

.box-clasification a {
    color: #ffff;
}
</style>

=======
    
</body>
>>>>>>> 9b6e67e44dde0a656c20bb65c4a509d0d3a5774d:HARIAN01/product.php
</html>