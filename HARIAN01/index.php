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
        <li><a class="menuItem" href="#">Home</a></li>
        <li><a class="menuItem" href="#">Profile</a></li>
        <li><a class="menuItem" href="register_form.php">Sign Up</a></li>
        <li><a class="menuItem" href="login.php">Login</a></li>
      </ul>
      <button class="hamburger">
        <!-- material icons https://material.io/resources/icons/ -->
        <i class="menuIcon material-icons" data-feather="menu"></i>
        <i class="closeIcon material-icons" data-feather="x"></i>
      </button>
    </div>
    <div class="body-of-content">
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
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
      color: #6d4079;
    }

    .header {
      background: linear-gradient(to left, #eebefa, #f3d9fa);
      height: 40px;
      display: flex;
      justify-content: space-between;
      padding-inline: 1rem;
      position: relative;
      align-items: center;
    }

    .menu,
    a {
      display: flex;
      flex-direction: row;
      gap: 1.5rem;
      text-decoration: none;
      list-style: none;
    }

    .menuItem {
      display: inline;
      list-style: none;
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
      outline: #232b2b;
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

      .showMenu {
        transform: translateY(0);
        background: linear-gradient(to left top, #fc2c78, #6d4079);
      }
    }
  </style>
</html>
