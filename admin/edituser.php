<?php
  include 'includes/adminheader.php';
  if (isset($_SESSION['logged_in'])) {
    if($_SESSION['admin'] == 5)
    {
      if (isset($_POST['edit'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $admin = $_POST['adminlevel'];
        $id = $_POST['id'];
        if (empty($username) or empty($email)) {
          $_SESSION['error'] = "Kein Feld darf leer sein";
        }else {
          $sql = "UPDATE users SET username='$username', email='$email', admin='$admin' WHERE id='$id'";
          $result = mysqli_query($conn, $sql);
          $_SESSION['success'] = "Profil wurde geändert";
          ?>
          <meta http-equiv="refresh" content="0; URL=index.php">
          <?php
        }
      }
      if (isset($_GET['username'])) {
        $username = mysqli_real_escape_string($conn, $_GET['username']);
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

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
                  <a href="createuser.php" class="list-group-item"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> User erstellen</a>
                  <a href="edituser.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> User bearbeiten</a>
                  <a href="fileupload.php" class="list-group-item"><span class="	glyphicon glyphicon-plus" aria-hidden="true"></span> Bilder hochladen</a>
                  <a href="bilder.php" class="list-group-item"><span class="	glyphicon glyphicon-picture" aria-hidden="true"></span> Bilder anzeigen</a>
                </div>
              </div>
              <div class="col-md-9">
                <!-- Website Overview -->
                <div class="panel panel-default">
                  <div class="panel-heading main-color-bg">
                    <h3 class="panel-title">Profil bearbeiten</h3>
                  </div>
                  <div class="panel-body">
                    <form action="edituser.php" method="post">
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
                           <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                           <label>Benutzername</label>
                           <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>">
                         </div>
                         <div class="form-group">
                           <label>E-Mail</label>
                           <input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">
                         </div>
                         <?php if ($_SESSION['admin'] == 5) {
                           ?>
                           <div class="form-group">
                             <label>Adminlevel</label><br>
                       			<select class="custom-select" name="adminlevel">
                               <option value="1" <?php
                               if($row['admin'] == 1){
                                 echo 'selected';
                               }
                                ?>>
                                Abonnent</option>
                               <option value="2" <?php
                               if($row['admin'] == 2){
                                 echo 'selected';
                               }
                                ?>>
                                Mitarbeiter</option>
                               <option value="3" <?php
                               if($row['admin'] == 3){
                                 echo 'selected';
                               }
                                ?>>
                                Autor</option>
                               <option value="4" <?php
                               if($row['admin'] == 4){
                                 echo 'selected';
                               }
                                ?>>
                                Redakteur</option>
                               <option value="5" <?php
                               if($row['admin'] == 5){
                                 echo 'selected';
                               }
                                ?>>
                                Administrator</option>
                       			</select>
                           </div>
                           <?php
                         } ?>

                       <div class="modal-footer">
                         <button type="submit" name="edit" class="btn btn-primary">Benutzer bearbeiten</button>
                       </div>
                   </form>
                  </div>
                  </div>
            </div>
          </div>
        </section>
        <?php
      }else {
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
                  <a href="createuser.php" class="list-group-item"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> User erstellen</a>
                  <a href="edituser.php" class="list-group-item active"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> User bearbeiten</a>
                  <a href="fileupload.php" class="list-group-item"><span class="	glyphicon glyphicon-plus" aria-hidden="true"></span> Bilder hochladen</a>
                  <a href="bilder.php" class="list-group-item"><span class="	glyphicon glyphicon-picture" aria-hidden="true"></span> Bilder anzeigen</a>
                </div>
              </div>
              <div class="col-md-9">
                <!-- Website Overview -->
                <div class="panel panel-default">
                  <div class="panel-heading main-color-bg">
                    <h3 class="panel-title">Benutzer suchen</h3>
                  </div>
                  <div class="panel-body">
                    <form action="edituser.php" method="post">
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
                         <?php
                         if (isset($_POST['search'])) {
                           ?>
                           <div class="form-group">
                             <?php
                             $username = mysqli_real_escape_string($conn, $_POST['username']);
                             $sql = "SELECT * FROM users WHERE username LIKE '%$username%'";
                             $result = mysqli_query($conn, $sql);
                             $queryResult = mysqli_num_rows($result);
                              ?>
                             <label>Ergebnisse: <?php echo $queryResult; ?></label><br>
                             <?php
                             if ($queryResult > 0) {
                               while ($row = mysqli_fetch_assoc($result)) {

                                 ?>
                                 <a href="edituser.php?username=<?php echo $row['username'];?>"><?php echo $row['username']; ?></a><br>
                                 <?php
                               }
                             }else {
                               echo "Keine ergebnisse";
                             }
                           ?>
                           </div>
                           <?php
                         }
                          ?>
                       <div class="modal-footer">
                         <button type="submit" name="search" class="btn btn-primary">Benutzer suchen</button>
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

      <?php
  }
 ?>
