<?php
  include "includes/header.php";
 ?>
<article class="login">
 <div class="container">
   <div class="row">
     <div class="col-xs-2">
     </div>
     <div class="col-xs-8">
       <h1>Anmelden</h1>
       <form class="loginform" action="index.html" method="post">
         <label>Benutzername</label>
         <input type="text" name="username" value="" placeholder="Benutzername" required>
         <label>Passwort</label>
         <input type="password" name="password" value="" placeholder="Passwort" required>
         <button class="submitbtn" type="submit">Login</button>
       </form>
     </div>
     <div class="col-xs-2">

     </div>
   </div>
 </div>
 </article>
<?php include "includes/footer.php"; ?>
