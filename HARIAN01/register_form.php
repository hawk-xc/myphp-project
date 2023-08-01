<!DOCTYPE html>
<html lang="en">
<?php
    // this is session start
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register-styling.css">
</head>
<body>
    <div class="container" id="container">
        <h4>Registration Form</h4>
        <form action="" method="post" enctype="multipart/form-data" class="box"> 
            <div class="f-name">
                <label for="f-name">first name</label>
                <input type="text" name="f-name" placeholder="first name" id="f-name" required>
            </div> 
            <div class="l-name">
                <label for="l-name">last name</label>
                <input type="text" name="l-name"  placeholder="last name" id="l-name" required>
            </div>
            <div class="date">
                <label for="date">birth date</label>
                <input type="date" name="date" required>
            </div>
            <div class="radio">
                <span>gender</span>
                <div class="input-box">
                    <input type="radio" name="gender" id="radio-ch" value="pria">
                    <label for="radio-ch">pria</label>
                    <div class="null"></div>
                    <div class="null"></div>
                    <div class="null"></div>
                    <input type="radio" name="gender" id="radio-ch-" value="wanita">
                    <label for="radio-ch-">wanita</label>
                </div>
            </div>
            <div class="mail">
                <label for="mail">mail address</label>
                <input type="email" name="mail" placeholder="johndoe@outlook.com" required>
            </div>
            <div class="phone">
                <label for="phone">phone number</label>
                <input type="text" name="phone" placeholder="+1 616 2121" required>
            </div>
            <div class="username">
                <label for="username">username</label>
                <input type="text" name="user" placeholder="username" required>
            </div>
            <div class="password">
                <label for="password">password</label>
                <input type="text" name="password" placeholder="password" required>
            </div>
            <!-- file upload area -->
            <div class="box-input-file">
                <input type="file" name="gambar">
                <input class="submit" type="submit" name="submit" value="kirim" onclick="return confirm('are you sure?')">
            </div>  
        </form>
    </div>
    <?php
        include 'functions.php';
        if(isset($_POST['submit']) > 0) {
            if(register($_POST, $_FILES) === 1) {
                echo "
                <script>
                alert('account successfull created');
                </script>";
            } elseif (register($_POST) === 2) {
                echo "
                <script>
                alert('username exist');
                </script>";
            } 
            elseif (register($_POST) === 3) {
                echo "
                <script>
                alert('bukan ekstensi gambar');
                </script>";
            } else {
                echo "
                <script>
                alert('error occur!!!');
                </script>";
            }
        }
    ?>
</body>
</html>