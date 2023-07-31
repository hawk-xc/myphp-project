<?php
$connection = mysqli_connect('127.0.0.1', 'popo', 'password', 'register');

function sqlquery($data) {
    global $connection;
    
    $query = mysqli_query($connection, $data);
    $result = mysqli_fetch_assoc($query);
    return $result;
}

function register($data, $img) {
    global $connection;
    
    // string input
    $firstname = $data['f-name'];
    $lastname = $data['l-name'];
    $date = $data['date'];
    $gender = $data['gender'];
    $mail = $data['mail'];
    $phone = $data['phone'];
    $address = $data['address'];
    $username = $data['username'];
    $password = mysqli_escape_string($connection, $data['password']);

    // file input
    $image_name = $img['media']['name'];
    $image_temp = $img['media']['tmp_name'];
    $image_size = $img['media']['size'];
    $image_type = $img['media']['type'];

    $image_ext = explode(".", $image_name);
    $image_ext = strtolower(end($image_ext));
    $ext = ['png', 'jpg', 'jpeg', 'gif'];

    $statusOk = true;

    // cek username is exist
    $result = mysqli_query($connection, "SELECT * FROM user WHERE username='$username'");
    if(mysqli_num_rows($result)){
        $statusOk = false;
        return 2;
    }

    if(!in_array($image_ext, $ext)) { 
        return 3;
        $statusOk = false;
        exit;
    }

    if($statusOk) {
        // set path directory
        $target_dir = "media/images/";
        $img = $target_dir;
        $img .= uniqid();
        $img .= ".";
        $img .= $image_ext;

        // add user login credential
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($connection, "INSERT INTO user (username, password) VALUES ('$username', '$password')");
        // cek id apakah sudah exist
        $id_exist = mysqli_query($connection, "SELECT id from user WHERE name='$username'");
        if (mysqli_num_rows($id_exist)) {
            mysqli_query($connection, "INSERT INTO user_desc (id, first_name, last_name, username, password, mail, phone, address) VALUES ($id_exist, '$firstname', '$lastname', '$username', '$password', '$mail', '$phone', '$address'");
            move_uploaded_file($image_temp, $img);
            if (mysqli_affected_rows($connection)){
                return 1;
            }
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

function menu_register($data_str, $data_image) {
    global $connection;
    
    $media_name = $data_str['name'];
    $media_kind = $data_str['kind'];
    $media_tags = $data_str['tag'];

    $image_name = $data_image['media']['name'];
    $image_temp = $data_image['media']['tmp_name'];
    $image_size = $data_image['media']['size'];
    $image_type = $data_image['media']['type'];

    $image_ext = explode(".", $image_name);
    $image_ext = strtolower(end($image_ext));
    $ext = ['png', 'jpg', 'jpeg', 'gif'];

    $statusOk = true;

    if(!in_array($image_ext, $ext)) { 
        return 5;
        $statusOk = false;
        exit;
    }

    if($statusOk) {
        $target_dir = "media/images/";
        $img = $target_dir;
        $img .= uniqid();
        $img .= ".";
        $img .= $image_ext;

        move_uploaded_file($image_temp, $img);

        mysqli_query($connection, "INSERT INTO menus_image (name, kind, tag, path, ext, size) values ('$media_name', '$media_kind', '$media_tags', '$img', '$image_type', $image_size)");
        return 1;
    }
}

function setprice($price) {
    if(strlen($price) === 5) {
        return substr($price, 0, 2);
    } else if(strlen($price) === 6) {
        return substr($price, 0, 3);
    } else {
        return substr($price, 0, 1);
    }
}

function add_cart($id, $menu_id) {
    global $connection;
    $order_id = uniqid();
    $data = mysqli_query($connection, "INSERT INTO cart (order_session, id, id_menus_image) VALUES ('$order_id', $id, $menu_id)");
    if (mysqli_affected_rows($connection)) {
        return 1;
    }
}
?>