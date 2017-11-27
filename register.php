<?php
  include "includes/header.php";
 ?>
 <article class="register">
  <div class="container">
    <div class="row">
      <div class="col-xs-2">
      </div>
      <div class="col-xs-8">
        <h1>Registrieren</h1>
        <form class="registerform" action="index.html" method="post">
          <label>Benutzername</label>
          <input type="text" name="username" value="" placeholder="Benutzername" required>
          <label>E-Mail</label>
          <input type="text" name="email" value="" placeholder="E-Mail" required>
          <label>Passwort</label>
          <input type="password" name="password" value="" placeholder="Passwort" required>
          <label>Passwort wiederholen</label>
          <input type="password" name="password2" value="" placeholder="Passwort" required>
          <button class="submitbtn" type="submit">Registrieren</button>
        </form>
      </div>
      <div class="col-xs-2">
      </div>
    </div>
  </div>
  </article>
<?php include "includes/footer.php"; ?>
