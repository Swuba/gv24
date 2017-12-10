<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
  </head>
  <body>
    <a href="index.php">Zurück</a>
    <br><br>
    <form class="register" action="inc/register.inc.php" method="post">
      <input type="text" name="username" placeholder="Benutzername"><br>
      <input type="text" name="email" placeholder="E-Mail"><br>
      <input type="password" name="password1" placeholder="Passwort"><br>
      <input type="password" name="password2" placeholder="Passwort bestätigen"><br><br>
      <input type="submit" name="submit" value="Registrieren">
    </form>
  </body>
</html>
