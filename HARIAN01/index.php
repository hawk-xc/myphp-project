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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="dummy/3.png" />
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Halaman Utama</title>
  </head>

  <body>
    <div class="header">
      <h3>Warmindo Kenangan</h3>
      <ul class="menu">
        <li><a class="menuItem" href="#">home</a></li>
        <?php
        if(!isset($_SESSION['login'])) {
        ?>
        <li><a class="menuItem" href="register_form.php">Sign Up</a></li>
        <li><a class="menuItem" href="login.php">Login</a></li>
        <?php } else { 
          $usercek = mysqli_query($connection, "SELECT username, img_path FROM user WHERE id=$id");
          $cek = mysqli_fetch_assoc($usercek);
        ?>
        <li><a class="menuItem special" href="users.php?id=<?php echo $id; ?>">Hi <?php echo $cek['username']; ?></a></li>
        <li class="image-dropdown">
          <details class="dropdown">
            <summary role="button">
              <img class="button" src="<?php echo $cek['img_path']; ?>" alt="" style="width: 30px; height: 30px; border-radius: 100%" title="<?php echo $cek['username']. ' account'; ?>">
              <!-- <a class="button">Click on me!</a> -->
            </summary>
            <ul>  
              <li><a href="users.php?id=<?php echo $id; ?>" class="social-alert"><i data-feather="user-check" style="width: 15px; height: 15px"></i> Account</a></li>
              <li><a href="cart2.php?id=<?php echo $id; ?>" class="social-alert"><i data-feather="shopping-cart" style="width: 15px; height: 15px"></i> Cart</a></li>
              <li><a href="logout.php" onclick="return confirm('are you sure?')" class="social-alert"><i data-feather="log-out" style="width: 15px; height: 15px"></i> Log out</a></li>
            </ul>
          </details>
        </li>
        <li class="user-ex"><a href="cart2.php?id=<?php echo $id; ?>">Cart</a></li>
        <li class="user-ex"><a href="logout.php">Log out</a></li>
        <?php } ?>
      </ul>
      <button class="hamburger">
        <!-- material icons https://material.io/resources/icons/ -->
        <i class="menuIcon material-icons" data-feather="menu"></i>
        <i class="closeIcon material-icons" data-feather="x"></i>
      </button>
    </div>
    <div class="body-of-content">
      <div class="the-canvas">
        <img src="media/asset.png" alt="">
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
            <img src="<?php echo $arr_menus['path']; ?>" alt="" />
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
              <input
                class="addchartbutton"
                type="submit"
                name="login_page"
                value="Keranjang"
                onclick="confirm('login?')"
              />
              <?php
              if(isset($_POST['login_page'])) {
                  header('Location: login.php');
              }
            } else {
              ?>
              <a
                href="addcart.php?id=<?php echo $_COOKIE['id']; ?>&menu_id=<?php echo $arr_menus['id_menus_image']; ?>&menus_name=<?php echo $arr_menus['name']; ?>&price=<?php echo $arr_menus['price']; ?>"
              >
                <input
                  class="addchartbutton"
                  type="button"
                  value="Keranjang"
                  onclick="confirm('tambahkan ke cart?')"
                />
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
            </script>
            "; 
          } else { 
            echo "
            <script>
              alert('menu gagal ditambahakan dicart');
            </script>
            "; 
          } 
        }
        ?>
        <!-- <img src="media/ayam-gif.gif" alt=""> -->
      </div>
    </div>
  </body>
  <script>
    feather.replace();

    const menu = document.querySelector(".menu");
    const menuItems = document.querySelectorAll(".menuItem");
    const hamburger = document.querySelector(".hamburger");
    const closeIcon = document.querySelector(".closeIcon");
    const menuIcon = document.querySelector(".menuIcon");

    function toggleMenu() {
      if (menu.classList.contains("showMenu")) {
        menu.classList.remove("showMenu");
        closeIcon.style.display = "none";
        menuIcon.style.display = "block";
      } else {
        menu.classList.add("showMenu");
        closeIcon.style.display = "block";
        menuIcon.style.display = "none";
      }
    }

    hamburger.addEventListener("click", toggleMenu);

    menuItems.forEach(function (menuItem) {
      menuItem.addEventListener("click", toggleMenu);
    });
  </script>

  <style type="text/css">
    :root {
      --hitam: #3b4252;
      --shadow-box-1: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
      --shadow-box-2: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
      --soft-border: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;
      --soft-border-1: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px,
        rgb(209, 213, 219) 0px 0px 0px 1px inset;
      --button-background: dodgerblue;
      --button-color: white;

      --dropdown-highlight: dodgerblue;
      --dropdown-width: 160px;
      --dropdown-background: white;
      --dropdown-color: black;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
      color: #6d4079;
    }

    .header {
      background: linear-gradient(to left, #00ccff, #eebefa, #f3d9fa, #bcee68);
      height: 50px;
      display: flex;
      justify-content: space-between;
      padding-inline: 1rem;
      position: relative;
      align-items: center;
      box-sizing: border-box;
      border-bottom: 3px solid orange;
    }

    .menu,
    a {
      display: flex;
      flex-direction: row;
      gap: 1.5rem;
      text-decoration: none;
      list-style: none;
      color: white;
      font-weight: 400;
    }

    .menuItem {
      display: inline;
      list-style: none;
    }

    .special {
      padding: 0.3rem; 
      background: #00ccff; 
      border-radius: 10px;
      /* font-weight: 800; */
      box-sizing: border-box;
      box-shadow: var(--shadow-box-2);
    }

    .special:active {
        background: #009acd;
      }

    .menu li {
      display: flex;
      /* height: 100%; */
      justify-content: center;
      align-items: center;
    }

    .menu .user-ex {
      visibility: hidden;
      display: none;
    }

    .hamburger {
      display: none;
    }

    /* body code */
    .body-of-content {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    /* the canvas */
    .the-canvas {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-evenly;
      width: 100%;
      padding: 1rem;
      box-sizing: border-box;
      background-color: #e5f4fb;
    }

    .the-canvas img {
      width: 300px;
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
      font-size: 14px;
      height: 430px;
      box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
      border-radius: 5px 5px 5px 5px;
      margin: 2rem;
      transition: 0.2s;
    }
    
    .body-of-content .menu-container .card-box .card-image {
      box-sizing: border-box;
      background: linear-gradient(#fdeb71, #f8d800);
      width: 100%;
      display: flex;
      justify-content: center;
      border-radius: 5px 5px 0px 0px;
    }

    .body-of-content .menu-container .card-box .card-image .label-harga {
      padding: 0.5rem;
      margin-right: 8rem;
      margin-top: 1rem;
      border-radius: 10px 10px 10px 10px;
      background-color: white;
      font-weight: 800;
      position: absolute;
      z-index: 5;
    }

    .body-of-content .menu-container .card-box .card-image img {
      width: 200px;
      transition: 0.5s;
    }

    .body-of-content .menu-container .card-box .card-image img:hover {
      width: 210px;
    }

    .body-of-content .menu-container .card-box .card-image img:hover {
      -webkit-filter: drop-shadow(2px 2px 0 white) drop-shadow(-2px 2px 0 white)
        drop-shadow(2px -2px 0 white) drop-shadow(-2px -2px 0 white);

      filter: drop-shadow(2px 2px 0 white) drop-shadow(-2px 2px 0 white)
        drop-shadow(2px -2px 0 white) drop-shadow(-2px -2px 0 white);
    }

    .body-of-content .menu-container .card-box .card-description {
      padding: 1rem;
      height: 40%;
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
      box-shadow: rgba(44, 187, 99, 0.2) 0 -25px 18px -14px inset,
        rgba(44, 187, 99, 0.15) 0 1px 2px, rgba(44, 187, 99, 0.15) 0 2px 4px,
        rgba(44, 187, 99, 0.15) 0 4px 8px, rgba(44, 187, 99, 0.15) 0 8px 16px,
        rgba(44, 187, 99, 0.15) 0 16px 32px;
      color: green;
      cursor: pointer;
      display: inline-block;
      font-family: CerebriSans-Regular, -apple-system, system-ui, Roboto,
        sans-serif;
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
      box-shadow: rgba(44, 187, 99, 0.35) 0 -25px 18px -14px inset,
        rgba(44, 187, 99, 0.25) 0 1px 2px, rgba(44, 187, 99, 0.25) 0 2px 4px,
        rgba(44, 187, 99, 0.25) 0 4px 8px, rgba(44, 187, 99, 0.25) 0 8px 16px,
        rgba(44, 187, 99, 0.25) 0 16px 32px;
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

    .button {
      /* Frame */
      display: inline-block;
      /* padding: 20px 28px; */
      width: 30px;
      border-radius: 50px;
      box-sizing: border-box;

      /* Style */
      border: none;
      background: var(--button-background);
      color: var(--button-color);
      font-size: 24px;
      cursor: pointer;
      transition: 0.4s;
      position: inherit;
      visibility: visible;
    }

    .button:active, .button:focus {
      filter: brightness(100%);
      border: 1px solid white;
    }

    /* Dropdown styles */
    .dropdown {
      position: relative;
      padding: 0;
      margin-right: 1em;
    }

    .dropdown summary {
      list-style: none;
      list-style-type: none;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .dropdown > summary::-webkit-details-marker {
      display: none;
    }

    .dropdown summary:focus {
      outline: none;
    }

    .dropdown summary:focus a.button {
      border: 2px solid white;
    }

    .dropdown summary:focus {
      outline: none;
    }

    .dropdown ul {
      position: absolute;
      margin: 18px 0 0 0;
      padding: 20px 0;
      top: 20px;
      width: var(--dropdown-width);
      left: -100%;
      margin-left: calc((var(--dropdown-width) / 2) * -1);
      box-sizing: border-box;
      z-index: 2;

      background: #fbbbd3;
      /* background: var(--dropdown-background); */
      border-radius: 6px;
      list-style: none;
    }

    .dropdown ul li {
      padding: 0;
      margin: 0;
    }

    .dropdown ul li a:link,
    .dropdown ul li a:visited {
      display: inline-block;
      padding: 10px 0.8rem;
      width: 100%;
      box-sizing: border-box;

      color: var(--dropdown-color);
      text-decoration: none;
    }

    .dropdown ul li a:hover {
      background-color: var(--dropdown-highlight);
      color: var(--dropdown-background);
    }

    /* Dropdown triangle */
    .dropdown ul::before {
      content: " ";
      position: absolute;
      width: 0;
      height: 0;
      top: -9px;
      left: 50%;
      /* geser arrow */
      margin-left: 37px; 
      border-style: solid;
      border-width: 0 10px 10px 10px;
      border-color: transparent transparent #fbbbd3 transparent;
    }

    /* Close the dropdown with outside clicks */
    .dropdown > summary::before {
      display: none;
    }

    .dropdown[open] > summary::before {
      content: " ";
      display: block;
      position: fixed;
      top: 0;
      right: 0;
      left: 0;
      bottom: 0;
      z-index: 1;
    }

    .social-alert {
      display: flex;
      align-items: center;
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

    @media screen and (max-width: 500px) {
      .menu {
        display: block;
      }

      .menuItem {
        display: block;
        flex-direction: column;
        margin: 2rem 4rem;
        font-size: 1.8rem;
        color: white;
        text-decoration: none;
        z-index: 10;
      }

      .menuItem:hover {
        text-decoration: underline;
      }

      .hamburger {
        display: flex;
        /* position: fixed; */
        z-index: 100;
        top: 1rem;
        right: 1rem;
        padding: 4px;
        border: black solid 0px;
        background: #eebefa;
        cursor: pointer;
      }

      .closeIcon {
        display: none;
      }

      .menu {
        position: fixed;
        transform: translateY(-100%);
        transition: transform 0.5s;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 99;
        background: black;
        color: white;
        list-style: none;
        padding-top: 4rem;
      }

      .menu .rata-tengah img {
        display: none;
      }

      .showMenu {
        transform: translateY(0);
        background: linear-gradient(to left top, #fc2c78, #6d4079);
      }

      .button {
        visibility: hidden;
      }

      .menu .image-dropdown {
        display: none;
      }

      .menu .user-ex {
        visibility: visible;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-top: 1rem;
        margin-bottom: 2.5rem;
        font-size: 1.8rem;
        color: white;
        text-decoration: none;
        z-index: 10;
      }

      .menu .menu-ex a {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
      }
    }
  </style>
</html>