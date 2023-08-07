<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/feather-icons"></script>
    <title>cart</title>
  </head>
  <?php
session_start();
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

if($_GET['id'] !== $_COOKIE['id']) {
    header('Location: login.php');
    exit;
}

include 'functions.php';

    $id = $_GET['id'];
    $query = mysqli_query($connection, "SELECT order_session, id_menus_image, menus_name, COUNT(*) * price_list AS total_harga, COUNT(*) AS jumlah FROM cart WHERE id=$id GROUP BY menus_name;");
    $total = sqlquery("SELECT SUM(price_list) AS jumlah FROM cart WHERE id=$id");
    $count = mysqli_query($connection, "SELECT count(id) as count FROM cart WHERE id=$id GROUP BY menus_name;");

    // if (mysqli_num_rows($query)) {
  ?>
  <body>
    <div class="header">
      <h3>Warmindo Kenangan</h3>
      <ul class="menu">
        <li><a class="menuItem" href="index.php">home</a></li>
        <?php
        if(!isset($_SESSION['login'])) {
        ?>
        <li><a class="menuItem" href="register_form.php">Sign Up</a></li>
        <li><a class="menuItem" href="login.php">Login</a></li>
        <?php } else { 
          $usercek = mysqli_query($connection, "SELECT username, img_path FROM user WHERE id=$id");
          $cek = mysqli_fetch_assoc($usercek);
        ?>
        <li>
          <a class="menuItem special" href="#"
            >Hi
            <?php echo $cek['username']; ?></a
          >
        </li>
        <li class="image-dropdown">
          <details class="dropdown">
            <summary role="button">
              <img
                class="button"
                src="<?php echo $cek['img_path']; ?>"
                alt=""
                style="width: 30px; height: 30px; border-radius: 100%"
                title="<?php echo $cek['username']. ' account'; ?>"
              />
              <!-- <a class="button">Click on me!</a> -->
            </summary>
            <ul>
              <li><a href="users.php?id=<?php echo $id; ?>" class="social-alert"><i data-feather="user-check" style="width: 15px; height: 15px;"></i> Account</a></li>
              <li><a href="cart2.php?id=<?php echo $id; ?>" class="social-alert"><i data-feather="shopping-cart" style="width: 15px; height: 15px"></i> Cart</a></li>
              <li><a href="logout.php" onclick="return confirm('are you sure?')" class="social-alert"><i data-feather="log-out" style="width: 15px; height: 15px"></i> Log out</a></li>
            </ul>
          </details>
        </li>
        <li class="user-ex"><a href="cart.php">Cart</a></li>
        <li class="user-ex"><a href="logout.php">Log out</a></li>
        <?php } ?>
      </ul>
      <button class="hamburger">
        <!-- material icons https://material.io/resources/icons/ -->
        <i class="menuIcon material-icons" data-feather="menu"></i>
        <i class="closeIcon material-icons" data-feather="x"></i>
      </button>
    </div>
    <div class="container">
      <div class="menu-box">
        <h4>Your cart (<?php echo mysqli_num_rows($count); ?> items)</h4>
        <table>
          <tr class="table-header">
            <td>Item</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Panel</td>
          </tr>
          <?php
          while ($arr = mysqli_fetch_assoc($query)):
          ?>
          <tr>
            <td class="menu-item">
              <span><?php echo $arr['menus_name']; ?></span>
            </td>
            <td><?php echo $arr['total_harga']; ?></td>
            <td>
              <div class="number-input">
                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>
                <form action="" method="post">
                  <input name="jumlah" class="quantity" min="1" max="9" value="<?php echo $arr['jumlah']; ?>" type="number">
                </form>
              <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
              </div>
            </td>
            <td class="delete-col">
              <?php
              if (!empty($_POST['jumlah'])) {
              ?>
              <a href="delete_menu.php?menu_session=<?php echo $arr['order_session']; ?>&id=<?php echo $_GET['id']; ?>&menu_id=<?php echo $arr['id_menus_image']; ?>&value=<?php echo $arr['jumlah']; ?>"
              class="icon-delete"
              onclick="return confirm('hapus?')">
              <?php
              } else {
              ?>
              <a href="delete_menu.php?menu_session=<?php echo $arr['order_session']; ?>&id=<?php echo $_GET['id']; ?>&menu_id=<?php echo $arr['id_menus_image']; ?>&value=1"
              class="icon-delete"
              onclick="return confirm('hapus?')">
              <i data-feather="trash-2" style="width: 15px; height: 15px"></i> delete</a></td>
              <?php
              }
              ?>
          </tr>
          <?php
          endwhile;
          echo var_dump($_POST);
          echo $total['jumlah'];
          // }
          ?>
        </table>
      </div>
    </div>
  </body>
  <footer>
    <div class="message-box">
      <span>if you have some question, send to our WhatsApp</span>
      <button>
        click on it
        <img class="whatsapp-image" src="media/whatsapp-svg.svg" alt="" />
      </button>
    </div>
    <div class="footer-container">
      <div class="title">
        <div class="left-side">
          <h2>warmindo kenangan</h2>
          👋 hello, your at footer site, now all information about this website
          in here! :)
        </div>
        <div class="right-side">
          <i class="social-icon" data-feather="facebook"></i>
          <i class="social-icon" data-feather="linkedin"></i>
          <i class="social-icon" data-feather="twitter"></i>
        </div>
      </div>

      <div class="footer-body">
        <div class="left-side">
          <div class="spoke">
            <h3>documentation</h3>
            <ul>
              <li><a href="">source code</a></li>
              <li><a href="">my github</a></li>
              <li><a href="">sponsor</a></li>
            </ul>
          </div>
          <div class="spoke">
            <h3>about writter</h3>
            <ul>
              <li><a href="">my snippet</a></li>
              <li><a href="">my portofolio</a></li>
              <li><a href="">join our social platform</a></li>
            </ul>
          </div>
          <div class="spoke">
            <h3>about writter</h3>
            <ul>
              <li><a href="">my snippet</a></li>
              <li><a href="">my portofolio</a></li>
              <li><a href="">join our social platform</a></li>
            </ul>
          </div>
        </div>
        <div class="right-side">
          <img class="qrcode-image" src="media/hawkxcsaweria.png" alt="" />
        </div>
      </div>

    </div>
  </footer>
  <div class="copy">
    hawkwebmaster&copy;2023 - GitHub content - 2023 - All rights reserved.
  </div>
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

    .button:active {
      filter: brightness(75%);
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

    /* container menu dump */
    .container {
      width: 100%;
      box-sizing: border-box;
      padding: 1rem;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container .menu-box {
      width: 95%;
      display: flex;
      padding-top: 2rem;
      flex-direction: column;
      align-items: center;
    }

    table {
      /* border: 1px solid black; */
      border-collapse: collapse;
      border-radius: 10px;
      box-sizing: border-box;
      width: 90%;
    }
    
    table .table-header {
      border-bottom: 1px solid #b48ead;
      padding: 0.4rem;
      background: linear-gradient(to left, #00ccff, #eebefa, #f3d9fa, #bcee68);
    }

    table td {
      border-bottom: 1px solid #b48ead;
      padding: 0.4rem;
    }

    input[type="number"] {
      -webkit-appearance: textfield;
      -moz-appearance: textfield;
      appearance: textfield;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
    }

    .number-input {
      border: 0;
      display: inline-flex;
    }

    .number-input,
    .number-input * {
      box-sizing: border-box;
    }

    .number-input button {
      outline:none;
      -webkit-appearance: none;
      background-color: transparent;
      border: none;
      align-items: center;
      justify-content: center;
      width: 25px;
      height: 25px;
      cursor: pointer;
      margin: 0;
      position: relative;
      box-shadow: 0px 0px 1px #474747;
        border-radius: 50%;
    }

    .number-input button:before,
    .number-input button:after {
      display: inline-block;
      position: absolute;
      content: '';
      width: 10px;
      height: 2px;
      background-color: #212121;
      transform: translate(-50%, -50%);
    }
    .number-input button.plus:after {
      transform: translate(-50%, -50%) rotate(90deg);
    }

    .number-input input[type=number] {
      font-family: sans-serif;
      max-width: 2.3rem;
      padding: .1rem;
      border: none;
      border-width: 0 2px;
      font-size: 17px;
      /* font-weight: bold; */
      text-align: center;
    }

    .icon-delete {
      margin: 0;
      display: inline;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .delete-col a {
      color: #3b4252;
      transition: 0.4s;
    }

    .delete-col a:hover {
      color: red;
    }
    footer {
    width: 100%;
    margin-top:10rem;
    height: 40vh; /* 40vh */
    background: linear-gradient(to left, #00ccff, #eebefa, #f3d9fa, #bcee68);
    bottom: 0;
    box-sizing: border-box;
    position: relative;
    display: flex;
    justify-content: center;
    /* align-items: center; */
    padding-top: 1rem;
  }

  /* footer particle */
  .message-box {
    width: 70%;
    padding-block: 0.5rem;
    padding-inline: 0.8rem;
    background-color: #0a0a23;
    position: absolute;
    top: -25px;
    border-radius: 20px;
    color: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1rem;
  }

  .message-box span {
    text-decoration: underline;
  }

  .message-box button {
    text-decoration: none;
    width: 100px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    background-color: #bcee68;
    border: 0px;
    border-radius: 10px;
  }

  .message-box .whatsapp-image {
    width: 20px;
  }

  .footer-container {
    display: flex;
    width: 100%;
    flex-direction: column;
    /* justify-content: center; */
    align-items: center;
    padding: 0.9rem;
    gap: 1rem;
  }

  .footer-container .title {
    display: flex;
    flex-direction: row;
    width: 95%;
    justify-content: space-between;
    /* padding-inline: 2rem; */
    align-items: center;
    color: #222222;
  }

  .footer-container .title .right-side {
    display: flex;
    gap: 1rem;
  }

  .footer-body {
    display: flex;
    justify-content: space-between;
    width: 100%;
    padding-block: 0.5rem;
    box-sizing: border-box;
    padding-inline: 2rem;
  }

  .footer-body .left-side {
    display: flex;
    flex-direction: row;
    gap: 1.8rem;
  }

  .footer-body .left-side .spoke a {
    color: blue;
  }

  .footer-body .left-side ul {
    list-style-type: none;
  }

  /* this copy section */
  .copy {
    padding: 0.5rem;
    /* position: sticky; */
    bottom: 0;
    width: 100%;
    display: flex;
    font-size: 80%;
    justify-content: center;
    align-items: center;
    background-color: #222222;
    color: white;
  }

  .footer-body .right-side .qrcode-image {
    width: 100px;
  }
  </style>

  <!-- set media query -->
  <style type="text/css">
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

      table {
        width: 100%;
        font-size: 70%;
      }

      .delete-col {
      display: flex;
    }
     footer {
      height: 35vh;
    }

    * {
      font-size: 95%;
    }

    .footer-container .title {
      flex-direction: column;
      gap: 1rem;
      justify-content: start;
    }

    .footer-container .title .left-side {
      display: flex;
      width: 100%;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    .footer-container .title .right-side .social-icon {
      background: white;
      padding: 0.4rem;
      transition: 0.3s;
    }

    .footer-container .title .right-side .social-icon:hover {
      background: linear-gradient(to left top, #00ccff, #eebefa, #bcee68);
    }

    .footer-container .copy {
      font-size: 80%;
    }

    .footer-body .right-side .qrcode-image {
      width: 80%;
      margin-left: 1rem;
    }
    }
  </style>
</html>