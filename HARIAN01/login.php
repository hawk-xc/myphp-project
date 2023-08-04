<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
  </head>
  <body>
    <div class="container">
      <h3>Warmindo Kenangan</h3>
      <span class="text-tip">login here</span>
      <form action="" method="post">
        <input
          class="input-form"
          type="text"
          name="username"
          placeholder="username"
          autofocus
          required
        />
        <input
          class="input-form"
          type="text"
          name="password"
          placeholder="password"
          required
        />
        <input class="submit-form" type="submit" name="submit" value="login" />
      </form>
      <div class="box-signin">
        <span>Don't have an account?</span> <a href="register_form.php">Sign Up</a>
      </div>
    </div>
  </body>
  <?php
    include 'functions.php';

    session_start();
    if(isset($_SESSION['login'])) {
        header('Location: index.php');
        exit;
    }

    if(isset($_POST['submit']) > 0) {
      if(login($_POST) === 1) {
          if ($_SESSION['login'] === true) {
              if(isset($_COOKIE['id']) && isset($_COOKIE['host']))
              {
                  $id = $_COOKIE['id'];
                  $host = $_COOKIE['host'];

                  $result = mysqli_query($connection, "SELECT username FROM user WHERE id=$id");
                  $res = mysqli_fetch_assoc($result);

                  if ($host === hash('sha256', $res['username'])){
                      $_SESSION['login'] = true;
                  }
              }
          }

          $_SESSION['login'] = true;
          // if(isset($_POST['remember'])) {
          $username = $_POST['username'];
          $query = mysqli_query($connection, "SELECT * FROM user WHERE username='$username'");
          $row = mysqli_fetch_assoc($query);
          setcookie('id', $row['id'], time() + 60 * 60 * 24 * 30);
          setcookie('host', hash('sha256', $row['username']), time() + 60 * 60 * 24 * 30);
          // }
          header('Location: index.php');
      } elseif (login($_POST) === 2) {
            echo "
            <script>
            alert('login gagal');
            </script>";
      } else {
            echo "
            <script>
            alert('error occur!!!');
            </script>";
      }
    }
  ?>
  <style type="text/css">
    :root {
      --hitam: #3b4252;
      --hitam-soft: #43454b5b;
      --shadow-box-1: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
      --shadow-box-2: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
      --soft-border: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px;
      --soft-border-1: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px,
        rgb(209, 213, 219) 0px 0px 0px 1px inset;
      --button-background: dodgerblue;
      --button-color: white;

      --soft-white: #f3f3f3;
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

    html,
    body {
      display: flex;
      width: 100%;
      height: 100%;
      justify-content: center;
      align-items: center;
    }

    .container {
      display: flex;
      flex-direction: column;
      width: 400px;
      justify-content: center;
      align-items: center;
      padding: 2rem;
      box-sizing: border-box;
      transition: 0.3s;
      border: 1px solid #f3f3f3;
      &:hover {
        box-shadow: var(--shadow-box-2);
      }
    }

    .container .text-tip {
      margin-top: 2rem;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: row;
    }

    .container .text-tip::before,
    .text-tip::after {
      content: "";
      border: 1px solid var(--hitam-soft);
      width: 100px;
      margin-inline: 10px;
    }

    .container .input-form {
      width: 300px;
      border: 0px;
      background-color: #f3f3f3;
      display: block;
      padding: 0.5rem;
      border-radius: 50px;
      margin-block: 0.5rem;
    }

    .container .submit-form {
      width: 300px;
      border: 0px;
      border: 1px solid lightblue;
      display: block;
      padding: 0.5rem;
      border-radius: 50px;
      margin-block: 0.5rem;
      transition: 0.5s;
      margin-bottom: 3rem;
      &:hover {
        background-color: #ab7af1;
        color: white;
      }
    }

    .container .box-signin a {
      border: 1px solid #ab7af1;
      padding: 0.5rem;
      text-decoration: none;
      border-radius: 10px;
      margin-inline-start: 0.5rem;
      box-sizing: border-box;
      transition-duration: 0.3s;
      &:hover {
        background-color: #ab7af1;
        color: white;
      }
    }
  </style>
</html>
