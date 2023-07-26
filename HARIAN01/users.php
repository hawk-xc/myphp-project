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
    $arr = sqlquery("SELECT * FROM user WHERE id=$id");
    $media = sqlquery("SELECT image FROM media WHERE id=$id");
    $desc = sqlquery("SELECT * FROM description WHERE id=$id");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Manager : <?php echo $arr['username']; ?></title>
</head>
<body>
    <div class="container">
        <div class="left-box">
            <a href="">user manager</a>
        </div>
        <div class="right-box">
            <div class="page">
                <a href="index.php">Dashboard</a> > <a href="">Users</a>
            </div>
            <div class="image">
                <img src="<?php echo $media['image']; ?>" alt="image <?php echo $_COOKIE['host']; ?>">

                <form action="" method="post">
                    <input class="image-input" type="submit" name="ubah" value="ubah gambar">
                    <input class="image-input" type="submit" name="ubah" value="hapus gambar">
                </form>
            </div>
            <span class="title-header" style="font-weight: 800">Hello <?php echo $arr['username']. ", Today is ", date("D-m-Y"); ?></span>
            <div class="user-form">
                <form action="" method="post">
                    <div class="box-input">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="<?php echo $arr['username']; ?>">
                    </div>
                    <div class="box-input">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" value="<?php echo $desc['address']; ?>">
                    </div>
                    <div class="box-input">
                        <label for="telp">Telp</label>
                        <input type="text" id="telp" name="telp" value="<?php echo $desc['telp']; ?>">
                    </div>
                    <div class="box-input">
                        <label for="id">Id User</label>
                        <input type="text" id="id" name="id" value="<?php echo $desc['id']; ?>" disabled>
                    </div>
                    <div class="box-input">
                        <label for="role">Role</label>
                        <input type="text" id="role" name="role" value="<?php echo $desc['role']; ?>" disabled>
                    </div>
                    <div class="box-input">
                        <label for="date">Create Date</label>
                        <input type="text" id="date" name="date" value="<?php echo $desc['date']; ?>" disabled>
                    </div>
                </form>
            </div>
            <div class="panel">
                <form action="" method="post">
                    <input class="save" type="button" name="save" value="Save Update">
                    <input class="delete" type="button" name="delete" value="Delete User" onclick="return confirm('apakah anda yakin?');">
                </form>
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
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #414a4c;
    flex-wrap: nowrap;
}

.container .left-box {
    width: 20%;
    background-color: #f6f6f6;
    height: 100%;
    padding-top: 5rem;
    padding-left: 2rem;
}

.container .right-box {
    width: 80%;
    background-color: white;
    height: 100%;
    padding-top: 5rem;
    padding-left: 2rem;
    display: flex;
    flex-direction: column;
}

.container .right-box .page {
    background-color: #d9eaf7;
    padding-inline: 1rem;
    padding-block: 0.5rem;
    border-radius: 10px;
    font-weight: 800;
    width: 200px;
}

.container .right-box .page a {
    text-decoration: none;
}

.container .right-box .image {
    width: 30%;
    display: flex;
}

.container .right-box .image img {
    border-radius: 100%;
    width: 80px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    margin: 1rem;
}

.container .right-box .image form {
    margin: 1rem;
}

.container .right-box .image form .image-input {
    margin-block: 0.3rem;
    width: 140px;
    height: 30px;
}

.container .right-box .user-form {
    display: flex;
    flex-direction: column;
    width: 100%;
    margin-top: 2rem;
}

.container .right-box .user-form .box-input {
    display: flex;
    flex-direction: column;
}

.container .right-box .user-form input {
    width: 280px;
    height: 30px;
    flex: 1;
    margin-bottom: 1rem;
}

.save {
    width: 120px;
    height: 30px;
    background-color: #78C1F3;
    border: 0px;
    border-radius: 5px;
    font-weight: 800;
    transition: 0.2s;
}

.save:hover {
    background-color: #9BE8D8;
}

.save:active {
    background-color: #ffff;
}

.delete {
    width: 120px;
    height: 30px;
    background-color: #ED2B2A;
    border: 0px;
    border-radius: 5px;
    font-weight: 800;
    color: white;
    transition: 0.2s;
}

.delete:hover {
    background-color: #D21312;
}

.delete:active {
    background-color: #CD1818;
}

</style>
</html>