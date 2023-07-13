<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/mona-sans" rel="stylesheet">
    <title>Login Page</title>
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
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me!</label>
            </div>
            <div class="box">
                <input class="submit_button" type="submit" name="submit" value="Login Now">
            </div>
        </form>
        <?php
        include 'functions.php';
        
        session_start();
        if(isset($_SESSION['login'])) {
            header('Location: halaman.php');
            exit;
        }
        
        
        if(isset($_POST['submit']) > 0) {
            if(login($_POST) === 1) {
                if ($_SESSION['login'] === true) {
                    if(isset($_COOKIE['id']) && isset($_COOKIE['host'])){
                        $id = $_COOKIE['id'];
                        $host = $_COOKIE['host'];

                        $result = mysqli_query($connection, "SELECT username FROM user WHERE id=$id");
                        $res = mysqli_fetch_assoc($result);

                        if ($host === hash('sha256', $res['username'])){
                            $_SESSION['login'] = true;
                        }
                    }
                }
                
                $_SESSION['login'] = true;
                if(isset($_POST['remember'])) {
                    $username = $_POST['username'];
                    $query = mysqli_query($connection, "SELECT * FROM user WHERE username='$username'");
                    $row = mysqli_fetch_assoc($query);

                    setcookie('id', $row['id'], time() + 60 * 60 * 24 * 30);
                    setcookie('host', hash('sha256', $row['username']), time() + 60 * 60 * 24 * 30);
                }
                header('Location: halaman.php');
            } elseif (login($_POST) === 2) {
                echo "
                <script>
                alert('login gagal');
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

.form_input:active,
.form_input:hover {
    border: 1px solid white;
}
</style>

</html>