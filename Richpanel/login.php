<?php
    $pdo = new PDO('mysql:host = localhost; port = 3306; dbname=id17401537_richpanel', 'id17401537_manoj', 'PwdM4s$]I)Y%=QT5');
    session_start();
    if ( isset($_POST["email"]) && isset($_POST["password"]) ) {
        unset($_SESSION["user"]);  // Logout current user
        $sql = "SELECT * FROM users where email = :em";
        $st = $pdo->prepare($sql);
        $st->execute(array(
            ':em' => $_POST['email'])
        );

        $row = $st->fetch(PDO::FETCH_ASSOC);

        $email = $row['email'];
        $pw = $row['password'];

        if ( $_POST['password'] == $pw && $_POST['email'] = $email) {
            header( 'Location: facebook.php' ) ;
            return;
        } else {
            
            $_SESSION["error"] = "Incorrect email or password.";
            header( 'Location: login.php' ) ;
            return;
        }
    }
?>

<html>
  <head>
    <title>Web app:Login</title>
    <link rel="stylesheet" href="web-page-css.css">
  </head>
  <body class="login-body">
    <div class="login-container">
      <h2>Login</h2><br>

      <?php
      if(isset($_SESSION["error"])){
          echo("<p style='color:red;font-weight:bold;'>".$_SESSION["error"]."</p>");
          unset($_SESSION["error"]);
      }
      ?>

      <form method="POST">
        <input class="login_input" type="text" name="email" id="email" placeholder="Email" required><br/><br/>
        <input class="login_input" type="password" name="password" id="password" placeholder="Password" required><br/><br/>
        <input type="submit" class="loginbtn"/>
      </form>
    </div>
  </body>
</html>