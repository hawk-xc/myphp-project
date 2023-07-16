<?php
$connection = mysqli_connect('127.0.0.1', 'popo', 'password', 'register');

function query($data) {
    global $connection;
    
    $query = mysqli_query($connection, $data);
    $result = mysqli_fetch_assoc($query);
    return $result;
}

function register($data) {
    global $connection;
    
    $username = $data['username'];
    $password = mysqli_escape_string($connection, $data['password']);
    $re_confirm = mysqli_escape_string($connection, $data['re_password']);

    $statusOk = true;

    // cek password and reconfirm is true
    if($password !== $re_confirm):
        $statusOk = false;
    endif;

    // cek username is exist
    $result = mysqli_query($connection, "SELECT * FROM user WHERE username='$username'");
    if(mysqli_num_rows($result)){
        $statusOk = false;
        return 2;
    }

    if($statusOk) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = mysqli_query($connection, "INSERT INTO user (username, password) VALUES ('$username', '$password')");
        if (mysqli_affected_rows($connection)){
            return 1;
        }
    }
}

function login($data) {
    global $connection;
    
    $username = mysqli_real_escape_string($connection, $data['username']);
    $password = $data['password'];

    $statusOk = true;

    if($statusOk) {
        $query = mysqli_query($connection, "SELECT * FROM user WHERE username='$username'");
        if (mysqli_num_rows($query) === 1) {
            $row = mysqli_fetch_assoc($query);
            if(password_verify($password, $row['password'])) {
                return 1;
            } else {
                return 2;
            }
        }
    }
}
?>