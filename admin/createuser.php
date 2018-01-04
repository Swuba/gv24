<?php
  include 'includes/adminheader.php';
    if (isset($_SESSION['logged_in'])) {
      if($_SESSION['admin'] == 5)
      {
        if (isset($_POST['username'])) {
          $username = mysqli_real_escape_string($conn, $_POST['username']);
          $email = mysqli_real_escape_string($conn, $_POST['email']);
          $password = mysqli_real_escape_string($conn, $_POST['password']);
          $adminlevel = mysqli_real_escape_string($conn, $_POST['adminlevel']);
          if (empty($username) or empty($password) or empty($email)) {
            $error = "Alle Felder müssen angegeben werden";
          }else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $_SESSION['error'] = "Email ist nicht korrekt";
            }else {
              $sqlusername = "SELECT username FROM users WHERE username='$username'";
              $sqlemail = "SELECT email FROM users WHERE email='$email'";
              $resultusername = mysqli_query($conn, $sqlusername);
              $resultemail = mysqli_query($conn, $sqlemail);
              $usernamecheck = mysqli_num_rows($resultusername);
              $emailcheck = mysqli_num_rows($resultemail);
              if ($usernamecheck > 0 or $emailcheck > 0) {
                $_SESSION['error'] = "Benutzername oder E-mail ist schon in Benutzung";
              }else {
                $hash_password = password_hash($password, PASSWORD_BCRYPT);
                $sql = "INSERT INTO users (username,email, password, admin) VALUES ('$username','$email', '$hash_password', '$adminlevel')";
                $result = mysqli_query($conn, $sql);
              }
            }
          }
        }
      ?>
      <section id="main">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="list-group">
                <a href="index.php" class="list-group-item active main-color-bg">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
                </a>
                <a href="createtutorial.php" class="list-group-item"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tutorial erstellen</a>
                <a href="edittutorial.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Tutorial bearbeiten</a>
                <a href="createcategory.php" class="list-group-item"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Kategorie erstellen</a>
                <a href="editcategory.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Kategorie bearbeiten</a>
                <a href="createuser.php" class="list-group-item active"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> User erstellen</a>
                <a href="edituser.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> User bearbeiten</a>
                <a href="fileupload.php" class="list-group-item"><span class="	glyphicon glyphicon-plus" aria-hidden="true"></span> Bilder hochladen</a>
                <a href="bilder.php" class="list-group-item"><span class="	glyphicon glyphicon-picture" aria-hidden="true"></span> Bilder anzeigen</a>
              </div>
            </div>
            <div class="col-md-9">
              <!-- Website Overview -->
              <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">Benutzer erstellen</h3>
                </div>
                <div class="panel-body">
                  <form action="createuser.php" method="post">
                     <div class="modal-body">
                       <?php
                       if (isset($_SESSION['error'])) {
                         ?>
                         <div class="alert alert-danger" role="alert">
                          <strong>Fehler</strong> <?php echo $_SESSION['error']; ?>
                        </div>
                        <?php
                        unset($_SESSION['error']);
                      }
                        ?>
                       <div class="form-group">
                         <label>Benutzername</label>
                         <input type="text" name="username" class="form-control" placeholder="Benutzername">
                       </div>
                       <div class="form-group">
                         <label>E-Mail</label>
                         <input type="text" name="email" class="form-control" placeholder="E-Mail">
                       </div>
                       <div class="form-group">
                         <label>Passwort</label>
                         <input type="password" name="password" class="form-control" placeholder="Passwort">
                       </div>
                       <div class="form-group">
                         <label>Adminlevel</label><br>
                   			<select class="custom-select" name="adminlevel">
                           <option value="1">Abonnent</option>
                           <option value="2">Mitarbeiter</option>
                           <option value="3">Autor</option>
                           <option value="4">Redakteur</option>
                           <option value="5">Administrator</option>
                   			</select>
                       </div>
                     <div class="modal-footer">
                       <button type="submit" class="btn btn-primary">Benutzer erstellen</button>
                     </div>
                 </form>
                </div>
                </div>
          </div>
        </div>
      </section>
      <?php
    }
          }
 ?>
