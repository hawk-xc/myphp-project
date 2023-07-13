<?php
$connection = mysqli_connect('localhost', 'popo', 'password', 'register');
$username = 'test';
$password = 'test';
$query = mysqli_query($connection, "SELECT * FROM user WHERE username='$username'");
if (mysqli_num_rows($query)) {
    echo "user exist, and ... ";
    $row = mysqli_fetch_assoc($query);
    if(password_verify($password, $row['password'])) {
        echo "password true";
    } else {
        echo "error";
    }
} else {
    echo "user not found";
}
?>