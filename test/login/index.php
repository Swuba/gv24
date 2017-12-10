<?php
  if (isset($_POST['submit'])) {
    $username = htmlentities($_POST['username']);

    setcookie('username', $username, time()+3600);
    //1Stunde

    header('Location: page2.php');
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login-Test</title>
  </head>
  <body>
      <form class="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="username" placeholder="Benutzername"><br>
        <input type="password" name="password" placeholder="Passwort"><br><br>
        <input type="submit" name="submit" value="Anmelden"><br><br><br>
        Noch keinen <a href="register.php">Account</a>?
      </form>
  </body>
</html>
