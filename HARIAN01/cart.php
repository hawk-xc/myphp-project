<!DOCTYPE html>
<html lang="en">
  <script src="https://unpkg.com/feather-icons"></script>
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

    if (mysqli_num_rows($query)) {
?>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>cart</title>
  </head>

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
              <li><a href="users.php?id=<?php echo $id; ?>">Account</a></li>
              <li><a href="cart.php?id=<?php echo $id; ?>">Cart</a></li>
              <li><a href="logout.php">Log out</a></li>
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
      <div class="title-decsription">
        <i data-feather="shopping-cart" class="icon-cart"></i>
        <h1>waiting list cart pesanan</h1>
      </div>
      <table>
        <tr>
          <th>id menu</th>
          <th>nama menu</th>
          <th>total harga</th>
          <th>jumlah</th>
          <th>panel</th>
        </tr>
        <?php
    while ($arr = mysqli_fetch_assoc($query)):
    ?>
        <tr>
          <td><?php echo $arr['id_menus_image']; ?></td>
          <td><?php echo $arr['menus_name']; ?></td>
          <td><?php echo $arr['total_harga']; ?></td>
          <td><?php echo $arr['jumlah']; ?></td>
          <td class="panel">
            <a href="ubah.php">
              <i data-feather="edit" class="icon-edit"></i
            ></a>
            <a
              href="delete_menu.php?menu_session=<?php echo $arr['order_session']; ?>&id=<?php echo $_GET['id']; ?>"
              class="icon-delete"
              onclick="return confirm('hapus?')"
              ><i data-feather="delete" class=""></i
            ></a>
          </td>
        </tr>
        <?php
    endwhile;
    ?>
      </table>
      <?php
    echo $total['jumlah'];
} else {
    ?>
      <div class="no-data">
        <div class="header">
          <a href="index.php">
            <i data-feather="link" class="icon-cart"></i>
            <span>Data Kosong</span>
          </a>
        </div>
        <div class="content">
          <p>untuk saat ini antrian cart kosong, silakan pesan menu</p>
        </div>
      </div>
      <?php } ?>
    </div>
  </body>
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

    .container .title-decsription {
      display: flex;
      flex-direction: row;
      padding: 0;
      justify-content: center;
      align-items: center;
      gap: 1rem;
      margin-block: 1rem;
    }

    .container .title-decsription .icon-cart {
      transform: rotate(-20deg);
    }

    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
      padding-inline: 1.4rem;
      padding-block: 0.2rem;
    }

    tr:hover {
      background-color: lightblue;
    }

    .panel {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .panel .icon-edit {
      color: black;
      transition: 0.5s;
    }

    .panel .icon-edit:hover {
      color: blue;
    }

    .panel .icon-delete {
      color: black;
      transition: 0.5s;
    }

    .panel .icon-delete:hover {
      color: red;
    }

    .no-data {
      width: 300px;
      background-image: linear-gradient(45deg, #85ffbd 0%, #fffb7d 100%);
      height: 250px;
      border-radius: 10px 10px 10px 10px;
      color: #222222;
      padding: 1rem;
      box-sizing: border-box;
      display: flex;
      flex-direction: column;
      gap: 1rem;
      transition: 0.6s;
    }

    .no-data:hover {
      box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }

    .no-data .header a {
      display: flex;
      /* justify-content: center; */
      align-items: center;
      gap: 0.5rem;
      font-weight: 600;
      text-decoration: none;
      color: #222222;
      transition: 0.5s;
    }

    .no-data .header a:hover {
      color: blueviolet;
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
  <script>
    feather.replace();
  </script>
</html>
