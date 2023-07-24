<?php
$connection = mysqli_connect('localhost', 'popo', 'password', 'register');

function sqlquery($data) {
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