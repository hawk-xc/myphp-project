<!DOCTYPE html>
<html lang="en">
<?php
include 'functions.php';

session_start();

if(isset($_SESSION['login'])) {
    if(isset($_COOKIE['host'])):
        $id = $_COOKIE['id'];
        $arr = sqlquery("SELECT * FROM user WHERE id=$id");
        $total = sqlquery("SELECT SUM(price_list) AS jumlah FROM cart WHERE id=$id");
        $count = sqlquery("SELECT COUNT(*) AS total FROM cart where id=$id");
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
    <div class="body-of-content">
      
<!-- page body of content -->
    <div class="container">
        <div class="main-box main">
          <img class="avatar-foto" src="<?php echo $arr['img_path']; ?>" alt="" />
          <div class="change-image-box">
            <i class="menuIcon material-icons" data-feather="edit-3"></i>
          </div>
          <form action="" method="post" class="user-index">
            <h4>My Dashboard</h4>
            <input
              id="user"
              name="name"
              value="<?php echo $arr['first_name']. " ". $arr['last_name']; ?>"
              placeholder="full names"
            />
            <input
              id="user"
              type="email"
              name="mail"
              value="<?php echo $arr['mail']; ?>"
              placeholder="mail address"
            />
            <input
              id="submit-button"
              type="submit"
              name="submit"
              value="Save"
            />
          </form>
        </div>
        <div class="main-box box-1">
          <form action="" method="post" class="user-index">
            <h4>My Account</h4>
            <input
              id="user"
              type="text"
              name="username"
              placeholder="username"
              value="<?php echo $arr['username']; ?>"
            />
            <input
              id="user"
              type="text"
              name="phone"
              value="<?php echo $arr['phone']; ?>"
              placeholder="Phone"
            />
            <input
              id="user"
              type="text"
              name="address"
              value="<?php echo $arr['address']; ?>"
            />
          </form>
        </div>
        <div class="main-box box-2">
          <h4>My Billing</h4>
          <div class="box" id="billing-box">
            <div class="count-box"><?php echo $count['total']; ?></div>
            <?php
            if (!empty($total['jumlah'])) {
            ?>
            <div class="total-box"><?php echo setprice($total['jumlah']). "K"; ?></div>
            <?php
            } else {
            ?>
            <div class="total-box"><?php echo "0K"; ?></div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>

    </div>
  </body>

  <style type="text/css">
    :root {
      --hitam: #3b4252;
      --shadow-box: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
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

    html, body {
        width: 100%;
        height: 100%;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
      color: #6d4079;
    }

    /* body of content styling */
    .body-of-content {
      display: flex;
      width: 100%;
      height: 100%;
      justify-content: center;
      align-items: center;
    } 

    .container {
      display: grid;
      grid-template-areas:
        "main box-1"
        "main box-2";
      width: 600px;
      height: 400px;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
    }

    .main-box {
      visibility: visible;
      border-radius: 30px;
      box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }

    .main-box .avatar-foto {
        transition: 0.4s;
    }

    .main-box .avatar-foto:hover {
        transform: scale(110%);
        filter: brightness(110%);
        box-shadow: var(--shadow-box);
    }

    .main-box .change-image-box {
        background-color: #6d4079;
        position: absolute;
    }

    .main,
    .box-1 {
      grid-area: main;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      gap: 1.5em;
      padding: 1rem;
      box-sizing: border-box;
    }

    .main img {
      width: 150px;
      height: 150px;
      border-radius: 100%;
    }

    .user-index {
      display: flex;
      justify-content: center;
      float: left;
      align-items: center;
      flex-direction: column;
    }

    .user-index #user {
      color: rgba(56, 56, 63, 0.679);
      /* border-bottom-color: rgba(100, 100, 111, 0.2); */
      font-size: 0.9rem;
      font-weight: 400;
      letter-spacing: 0.009375em;
      text-decoration: inherit;
      text-transform: inherit;
      align-self: flex-end;
      left: 5%;
      box-sizing: border-box;
      padding-block-start: 0.9rem;
      transition: opacity 150ms cubic-bezier(0.4, 0, 0.2, 1);
      box-sizing: border-box;
      border: none;
      border-bottom: 1px solid;
      border-radius: 4px 4px 0 0;
      /* background: rgb(245, 245, 245); */
      &:focus {
        border: 0px;
      }
      &:hover {
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
      }
    }

    .main .user-index #submit-button {
      padding-inline: 1.6rem;
      padding-block: 0.8rem;
      background: linear-gradient(to left, red, orange);
      border: 0px;
      border-radius: 10px;
      color: white;
      font-weight: 800;
      margin-top: 2rem;
      transition: 0.3s;
      font-size: 1em;
      box-sizing: border-box;
      cursor: pointer;
      &:hover {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        padding-inline: 2rem;
      }
    }

    .box-1 {
      grid-area: box-1;
      /* background-color: lightblue; */
    }

    .box-2 {
      grid-area: box-2;
      /* background-color: brown; */
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    .box-2 .box {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      flex-direction: row;
      gap: 1rem;
      margin-top: 1rem;
      box-sizing: border-box;
    }

    .box-2 .box .count-box,
    .total-box {
      width: 50px;
      height: 50px;
      border-radius: 10px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: 800;
      color: #ffffff;
      background: linear-gradient(to left, red, orange);
      transition: 0.5s;
      cursor: pointer;
      &:hover {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        width: 55px;
        height: 55px;
      }
    }

    @media (min-width: 768px) {
      .button-52 {
        padding: 13px 50px 13px;
      }
    }
  </style>

  <!-- set media query -->
  <style type="text/css">

    @media screen and (max-width: 500px) {
        .body-of-content {
            display: flex;
            margin-top: 1rem;
            /* width: 90%; */
        }

        .container {
            grid-template-areas:
              "main"
              "box-1"
              "box-2";
            grid-template-columns: 1fr;
        }
        .box-2 {
            padding: 1rem;
        }
    }
  </style>
</html>