<?php
  include 'includes/adminheader.php';
  if (isset($_SESSION['logged_in'])) {
    if (isset($_POST['delete'])) {
      $id = mysqli_real_escape_string($conn, $_POST['id']);
      $sql = "DELETE FROM categories WHERE id='$id'";
      $result = $conn->query($sql);
      $sql2 = "ALTER TABLE `categories` AUTO_INCREMENT=1";
      $result2 = $conn->query($sql2);
    }
    if (isset($_POST['name'])) {
      $id = mysqli_real_escape_string($conn, $_POST['id']);
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $titleheader = mysqli_real_escape_string($conn, $_POST['titleheader']);
      $beschreibung = mysqli_real_escape_string($conn, $_POST['beschreibung']);
      $bild = mysqli_real_escape_string($conn, $_POST['bild']);
      $farbe = mysqli_real_escape_string($conn, $_POST['farbe']);
      $banner = mysqli_real_escape_string($conn, $_POST['banner']);
      $username = mysqli_real_escape_string($conn, $_SESSION['username']);
      $sql = "UPDATE categories SET name = '$name', titleheader='$titleheader', banner='$banner', beschreibung='$beschreibung', bild='$bild', farbe='$farbe', bearbeitetvon='$username' WHERE id='$id'";
      $result = $conn->query($sql);
      $_SESSION['success'] = $name." erfolgreich bearbeitet";
      ?>
      <meta http-equiv="refresh" content="0; URL=index.php">
      <?php
    }
    if(isset($_POST['category'])){
      mysqli_real_escape_string($conn, $category = $_POST['category']);
      $sql = "SELECT * FROM categories WHERE id='$category'";
      $result = $conn->query($sql);
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
                <a href="editcategory.php" class="list-group-item active"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Kategorie bearbeiten</a>
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
                  <h3 class="panel-title">Kategorie bearbeiten</h3>
                </div>
                <div class="panel-body">
                  <form action="editcategory.php" method="post">
                     <div class="modal-body">
                       <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                       <div class="form-group">
                         <label>Kategoriename</label>
                         <input type="text" name="name" class="form-control" value="<?php echo $row['name'];?>">
                       </div>
                       <div class="form-group">
                         <label>Titel - beschreibung</label>
                         <input type="text" name="titleheader" class="form-control" value="<?php echo $row['titleheader']; ?>">
                       </div>
                       <div class="form-group">
                         <label>Kategoriebeschreibung</label>
                         <textarea name="beschreibung" class="form-control"><?php echo $row['beschreibung'];?></textarea>
                       </div>
                       <div class="form-group">
                         <label>Kategoriebild-klein (Mit Deiteiendung z.B. .png, jpeg, ...)</label>
                         <input type="text" name="bild" class="form-control" value="<?php echo $row['bild']; ?>">
                       </div>
                       <div class="form-group">
                         <label>Bild Hintergrundfarbe(In #000000 angeben)</label>
                         <input type="text" name="farbe" class="form-control" value="<?php echo $row['farbe']; ?>">
                       </div>
                       <div class="form-group">
                         <label>Kategoriebild-Banner (Mit Deiteiendung z.B. .png, jpeg, ...)</label>
                         <input type="text" name="banner" class="form-control" value="<?php echo $row['banner']; ?>">
                       </div>
                     <div class="modal-footer">
                       <button type="delete" name="delete" class="btn btn-danger">Kategorie Löschen</button>
                       <button type="submit" class="btn btn-primary">Kategorie bearbeiten</button>
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
                <a href="editcategory.php" class="list-group-item active"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Kategorie bearbeiten</a>
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
                  <h3 class="panel-title">Kategorie bearbeiten</h3>
                </div>
                <div class="panel-body">
                  <form action="editcategory.php" method="post">
                     <div class="modal-body">
                       <div class="form-group">
                         <label>Kategorie auswählen</label><br>
                         <?php
                         $sql = "SELECT * FROM categories";
                         $result = $conn->query($sql);

                          ?>
                        <select name="category">
                           <?php
                           while($row = mysqli_fetch_assoc($result)) {
                             ?>
                             <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                             <?php
                           }
                           ?>

                        </select>
                       </div>
                     <div class="modal-footer">
                       <button type="submit" class="btn btn-primary">Kategorie auswählen</button>
                     </div>
                 </form>
                </div>
                </div>
          </div>
        </div>
      </section>
      <?php
    }
    ?>

    <?php
  }
