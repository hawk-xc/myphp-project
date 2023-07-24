<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menus register</title>
</head>

<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="menus name">
            <br>
            <input type="text" name="kind" placeholder="description">
            <br>
            <input type="radio" name="tag" value="mie goreng" id="mgrg">
            <label for="mgrg">Mie Goreng</label>
            <input type="radio" name="tag" value="mie goreng" id="mgdk">
            <label for="mgdk">Mie Godog</label>
            <br>
            <input type="file" name="media">
            <br>
            <input type="submit" name="submit">
        </form>
    </div>
</body>
<?php
include 'functions.php';
if (isset($_POST['submit']) > 0) {
    if (menu_register($_POST, $_FILES) === 1) {
        echo "
        <script>
        alert('upload image successfull!');
        </script>
        ";
    } else {
        echo "
        <script>
        alert('upload image failed!');
        </script>
        ";
    }
}
?>

</html>