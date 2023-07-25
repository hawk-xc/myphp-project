<!DOCTYPE html>
<html lang="en">

<?php
include 'functions.php';

session_start();

if(isset($_SESSION['login'])) {
    if(isset($_COOKIE['host'])):
        $id = $_COOKIE['id'];
        $arr = sqlquery("SELECT * FROM user WHERE id=$id");
    endif;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="dummy/3.png">
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Halaman Utama</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header-title">
                <!-- title header -->
                <img src="media/noodles/1.png" alt="">
                <span style="color:Orange;">W</span>armindo<span style="color:lightblue;">K</span>enangan
                <!-- end title header -->
            </div>
            <div class="content">
                <ul>
                    <li><a href="#menu">Product</a></li>
                    <li><a href="">Community</a></li>
                    <?php
                    if(!isset($_COOKIE['host'])) {
                    ?>
                    <li><a href="register.php">Sign Up</a></li>
                    <li><a href="logout.php">Login</a></li>
                    <?php
                    } else {
                        if(isset($_COOKIE['host'])): 
                            $id = $_COOKIE['id'];
                            $user_check = mysqli_query($connection, "SELECT * FROM user WHERE id=$id");
                            $data_user = mysqli_fetch_assoc($user_check);
                            echo "<li><a href='cart.php?id=". $_COOKIE['id']. "'>Keranjang</a></li>";
                            echo "<li><a href='user.php' class='label'>hello ". $data_user['username'] . "</a></li>";
                        endif;
                    }
                    ?>
                </ul>
            </div>
            <div class="search">
                <form action="" method="post">
                    <input type="text" placeholder="search here ...">
                </form>
            </div>
        </div>
    </div>
    <div class="body-of-content">

        <!-- banner section -->
        <div class="hello-world">
            <div class="typography">
                <span class="mini-text">website Warmindo kenangan tugu keris </span>
                <span class="banner-text">Warmindo Kenangan</span>
                <div class="nav-button">
                    <a href="cart.php?id=<?php echo $id; ?>">
                        <button class="button-52" role="button">Cart</button>
                    </a>
                    <a href="#menu">
                        <button class="button-52" role="button">Menu</button>
                    </a>
                </div>
            </div>
            <div class="banner">
                <img src="media/banner.png" alt="">
            </div>
        </div>

        <!-- menu section -->
        <div class="menu-container" id="menu">

            <?php
        $arr_menus = sqlquery("SELECT * FROM menus_image");
        $menus = mysqli_query($connection, "SELECT * FROM menus_image");
        while ($arr_menus = mysqli_fetch_assoc($menus)):
            $hitungan = 1;
        ?>
            <div class="card-box">
                <div class="card-image">
                    <div class="label-harga">
                        <?php echo "Rp. ". setprice($arr_menus['price']). "K<br>"; ?>
                    </div>
                    <img src="<?php echo $arr_menus['path']; ?>" alt="">
                </div>
                <div class="card-description">
                    <h3><?php echo $arr_menus['name']; ?></h3>
                    <p><?php echo $arr_menus['kind']; ?></p>
                </div>
                <!-- menu price button -->
                <!-- add to cart button -->
                <div class="order-button">
                    <form action="" method="post">
                        <?php
                            if(!isset($_COOKIE['id']) and !isset($_COOKIE['host'])) {
                        ?>
                        <input class="addchartbutton" type="submit" name="login_page" value="Keranjang"
                            onclick="confirm('login?')">
                        <?php
                            if(isset($_POST['login_page'])) {
                                header('Location: login.php');
                            }
                            } else {
                        ?>
                        <a
                            href="addcart.php?id=<?php echo $_COOKIE['id']; ?>&menu_id=<?php echo $arr_menus['id_menus_image']; ?>&menus_name=<?php echo $arr_menus['name']; ?>&price=<?php echo $arr_menus['price']; ?>">
                            <input class="addchartbutton" type="button" value="Keranjang"
                                onclick="confirm('tambahkan ke cart?')">
                        </a>
                        <?php
                            }
                        ?>
                    </form>
                </div>
            </div>
            <?php
            $hitungan+=1;
            endwhile;
            if(isset($_POST['add']) > 0) {
                if(add_cart($_COOKIE['id'], $arr_menus['id_menus_image'])) {
                    echo "
                    <script>
                    alert('menu berhasil ditambahakan dicart');
                    </script>";
                } else {
                    echo "
                    <script>
                    alert('menu gagal ditambahakan dicart');
                    </script>";
                }
            }
            // var_dump($arr_menus);
        ?>
            <!-- <img src="media/ayam-gif.gif" alt=""> -->
        </div>

    </div>
</body>
<script>
feather.replace()
</script>
<style type="text/css">
* {
    font-family: "Roboto Regular", Tahoma, sans-serif;
    font-size: 12px;
    color: #232B2B;
    scroll-behavior: smooth;
}

html,
body {
    padding: 0;
    margin: 0;
    width: 100%;
    height: 100%;
}

.container {
    background-color: #f6f6f6;
    border-top: 3px solid #f48225;
    border-bottom: 1px solid #babfc4;
    cursor: pointer;
    /* width: 100%; */
    /* position: fixed; */
}

.container .header {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    box-sizing: border-box;
    padding: 1rem;
}

.container .header .header-title,
span {
    display: inline;
    font-weight: 800;
    font-size: 17px;
}

.container .header .header-title img {
    width: 20px;
}

.container .header ul,
li {
    list-style: none;
    list-style-type: none;
    overflow: hidden;
    display: inline;
    margin: 0.7rem;
    text-decoration: none;
    box-sizing: border-box;
}

.container .header ul li .label {
    background-color: lightblue;
    padding: 0.4rem;
    border-radius: 5px;
}

.content a {
    display: inline-block;
    position: relative;
    color: #232B2B;
    text-decoration: none;
}

.content a:after {
    content: '';
    position: absolute;
    width: 100%;
    transform: scaleX(0);
    height: 1px;
    bottom: 0;
    left: 0;
    background-color: orangered;
    transform-origin: bottom right;
    transition: transform 0.25s ease-out;
}

a:hover:after {
    transform: scaleX(1);
    transform-origin: bottom left;
}

/* body code */
.body-of-content {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.body-of-content .hello-world {
    width: 100%;
    display: flex;
    justify-content: space-between;
    /* flex-wrap: wrap; */
}

.body-of-content .hello-world .typography {
    display: flex;
    flex-direction: column;
    justify-content: center;
    /* align-items: center; */
    padding: 9rem;
    width: 100%;
}

.body-of-content .hello-world .typography .mini-text {
    font-size: 16px;
    text-transform: uppercase;
    font-weight: 800;
    font-family: cursive;
}

.body-of-content .hello-world .typography .banner-text {
    font-family: cursive;
    font-size: 55px;
    color: #f48225;
}

.body-of-content .hello-world .typography .banner-text:hover {
    outline: #232B2B;
}

.body-of-content .hello-world .banner {
    position: sticky;
    width: 100%;
}

.body-of-content .hello-world .banner img {
    width: 550px;
    /* if responsive breakpoint reached */
    /* display: none; */
}

.body-of-content .menu-container {
    display: flex;
    width: 100%;
    flex-wrap: wrap;
    margin-top: 2rem;
    margin-inline: 4rem;
    justify-content: space-evenly;
}

.body-of-content .menu-container .card-box {
    width: 230px;
    height: 420px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    border-radius: 5px 5px 5px 5px;
    margin: 2rem;
    transition: 0.2s;

}

.body-of-content .menu-container .card-box .card-image {
    background: linear-gradient(#FDEB71, #F8D800);
    width: 100%;
    display: flex;
    justify-content: center;
    border-radius: 5px 5px 0px 0px;
}

.body-of-content .menu-container .card-box .card-image .label-harga {
    padding: 0.5rem;
    margin-right: 13rem;
    margin-top: 1rem;
    border-radius: 10px 10px 10px 10px;
    background-color: #babfc4;
    position: absolute;
}

.body-of-content .menu-container .card-box .card-image img {
    width: 200px;
    transition: 0.5s;
}

.body-of-content .menu-container .card-box .card-image img:hover {
    width: 210px;
}

.body-of-content .menu-container .card-box .card-image img:hover {
    -webkit-filter: drop-shadow(2px 2px 0 white) drop-shadow(-2px 2px 0 white) drop-shadow(2px -2px 0 white) drop-shadow(-2px -2px 0 white);

    filter: drop-shadow(2px 2px 0 white) drop-shadow(-2px 2px 0 white) drop-shadow(2px -2px 0 white) drop-shadow(-2px -2px 0 white);
}

.body-of-content .menu-container .card-box .card-description {
    padding: 1rem;
    height: 34%;
}

.body-of-content .menu-container .card-box .order-button {
    position: sticky;
    width: 100%;
    display: flex;
    justify-content: center;
}

.body-of-content .menu-container .card-box .order-button .addchartbutton {
    background-color: #c2fbd7;
    border-radius: 100px;
    box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset, rgba(44, 187, 99, .15) 0 1px 2px, rgba(44, 187, 99, .15) 0 2px 4px, rgba(44, 187, 99, .15) 0 4px 8px, rgba(44, 187, 99, .15) 0 8px 16px, rgba(44, 187, 99, .15) 0 16px 32px;
    color: green;
    cursor: pointer;
    display: inline-block;
    font-family: CerebriSans-Regular, -apple-system, system-ui, Roboto, sans-serif;
    padding: 7px 20px;
    text-align: center;
    text-decoration: none;
    transition: all 250ms;
    border: 0;
    font-size: 16px;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
}

.addchartbutton:hover {
    box-shadow: rgba(44, 187, 99, .35) 0 -25px 18px -14px inset, rgba(44, 187, 99, .25) 0 1px 2px, rgba(44, 187, 99, .25) 0 2px 4px, rgba(44, 187, 99, .25) 0 4px 8px, rgba(44, 187, 99, .25) 0 8px 16px, rgba(44, 187, 99, .25) 0 16px 32px;
    transform: scale(1.05) rotate(-1deg);
}

/* CSS */
.button-52 {
    margin-block: 3rem;
    margin-inline: 1rem;
    font-size: 16px;
    font-weight: 200;
    letter-spacing: 1px;
    padding: 13px 20px 13px;
    outline: 0;
    border: 1px solid black;
    cursor: pointer;
    position: relative;
    background-color: rgba(0, 0, 0, 0);
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
}

.button-52:after {
    content: "";
    background-color: #ffe54c;
    width: 100%;
    z-index: -1;
    position: absolute;
    height: 100%;
    top: 7px;
    left: 7px;
    transition: 0.2s;
}

.button-52:hover:after {
    top: 0px;
    left: 0px;
}

@media (min-width: 768px) {
    .button-52 {
        padding: 13px 50px 13px;
    }
}
</style>

<!-- set media query -->
<style type="text/css">
@media screen and (max-width: 730px) {
    .body-of-content .hello-world .banner img {
        display: none;
    }
}
</style>

</html>