<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/mona-sans" rel="stylesheet">
    <title>Register Account</title>
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="box">
                <label for="username">Username</label>
                <br>
                <input class="form_input" type="text" name="username" placeholder="username" id="username"
                    autofocus="on" required>
            </div>
            <div class="box">
                <label for="password">Password</label>
                <br>
                <input class="form_input" type="password" name="password" placeholder="password" id="password" required>
            </div>
            <div class="box">
                <label for="confirm_password">Confirm Password</label>
                <br>
                <input class="form_input" type="password" name="re_password" placeholder="password_confirm"
                    id="confirm_password" required>
            </div>
            <div class="box">
                <input class="submit_button" type="submit" name="submit" value="Register Now"
                    onclick="return confirm('are you sure?');">
            </div>
            <div class="menu">
                <a href="halaman.php"><code>dashboard  </code></a>
                <a href="logout.php"><code>  login</code></a>
            </div>
        </form>
        <?php
        include 'functions.php';
        
        if(isset($_POST['submit']) > 0) {
            if(register($_POST) === 1) {
                echo "
                <script>
                alert('account successfull created');
                </script>";
            } elseif (register($_POST) === 2) {
                echo "
                <script>
                alert('username exist');
                </script>";
            } else {
                echo "
                <script>
                alert('error occur!!!');
                </script>";
            }
        }
        ?>
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
    display: block;
    background-color: #161b22;
    border: 1px solid #4e3e6c;
    padding: 1rem;
    border-radius: 10px 0px 10px 0px;
}

.container .box {
    margin: 0.5rem;
    width: 100%;
}

.submit_button {
    margin-top: 1rem;
    width: 90%;
    font-weight: 800;
    border: 0px;
    border-radius: 5px;
    padding-block: 0.5rem;
    color: #ffff;
    background-color: #161b22;
    border: 1px solid #4e3e6c;
    transition: 0.2s;
}

.submit_button:hover {
    background-color: #703fc8;
}

.form_input {
    color: #ffff;
    font-weight: 800;
    background-color: #161b22;
    border: 1px solid #032861;
    transition: 0.2s;
    padding: 0.1rem;
}

.menu {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    text-decoration: none;
    gap: 1rem;
}

.menu a {
    color: white;
    text-decoration: none;
    transition: 0.5s;
}

.menu a:hover {
    text-decoration: underline;
}

.form_input:active,
.form_input:hover {
    border: 1px solid white;
}
</style>

</html>