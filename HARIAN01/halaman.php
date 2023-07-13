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
    <h1>Dashboard</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum impedit quidem eum? Dolores, earum aliquid!</p>
    <br>
    <a href="user.php?id=<?php echo $arr['id']; ?>"><?php echo $arr['username']; ?></a>
    <a href="register.php">Register</a>
    <a href="logout.php">Logout</a>
</body>

</html>