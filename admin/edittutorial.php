<?php
  include 'includes/adminheader.php';
  if (isset($_SESSION['logged_in'])) {
    if ($_SESSION['admin'] >= 2) {
      if (isset($_POST['delete'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $sql = "DELETE FROM tutorials WHERE id='$id'";
        $result = $conn->query($sql);
        $sql2 = "ALTER TABLE `tutorials` AUTO_INCREMENT=1";
        $result2 = $conn->query($sql2);
      }
      if (isset($_POST['title'])) {
        $username = mysqli_real_escape_string($conn, $_SESSION['username']);
        $id = $_POST['id'];
        $bild = mysqli_real_escape_string($conn, $_POST['bild']);
        $farbe = mysqli_real_escape_string($conn, $_POST['farbe']);
        $banner = mysqli_real_escape_string($conn, $_POST['banner']);
        $beschreibung = mysqli_real_escape_string($conn, $_POST['beschreibung']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $name_link = str_replace(" ","-",$title);
        $name_link = strtolower($name_link);
        $titleheader = mysqli_real_escape_string($conn, $_POST['titleheader']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);
        $metatags = mysqli_real_escape_string($conn, $_POST['metatags']);
        $metadesc = mysqli_real_escape_string($conn, $_POST['metadesc']);
        $sql = "UPDATE tutorials SET title='$title', name_link='$name_link',
        titleheader='$titleheader', beschreibung='$beschreibung', content='$content', bild='$bild', banner='$banner',
        farbe='$farbe', metatags='$metatags', metadesc='$metadesc'  WHERE id='$id'";
        $result = $conn->query($sql);
        $_SESSION['success'] = $title." erfolgreich bearbeitet";
        ?>
        <meta http-equiv="refresh" content="0; URL=index.php">
        <?php
      }
      if (isset($_POST['tutorial'])) {
        $tutorial = mysqli_real_escape_string($conn, $_POST['tutorial']);
        $sql = "SELECT * FROM tutorials WHERE id='$tutorial'";
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
                <a href="edittutorial.php" class="list-group-item active"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Tutorial bearbeiten</a>
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
                  <h3 class="panel-title">Tutorial bearbeiten</h3>
                </div>
                <div class="panel-body">
                  <form action="edittutorial.php" method="post">
                     <div class="modal-body">
                       <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
                       <div class="form-group">
                         <label>Tutorial Titel</label>
                         <input type="text" name="title" class="form-control" value="<?php echo $row['title']; ?>">
                       </div>
                       <div class="form-group">
                         <label>Titel - beschreibung</label>
                         <input type="text" name="titleheader" class="form-control" value="<?php echo $row['titleheader']; ?>">
                       </div>
                       <div class="form-group">
                         <label>Seiteninhalt</label>
                         <textarea rows="25" cols="100" name="content" class="form-control"><?php echo htmlentities($row['content'], ENT_QUOTES) ?></textarea>
                       </div>
                       <div class="form-group">
                         <label>Tutorialbeschreibung</label>
                         <input type="text" name="beschreibung" class="form-control" value="<?php echo $row['beschreibung']; ?>">
                       </div>
                       <div class="form-group">
                         <label>Kategoriebild-klein (Mit Deiteiendung z.B. .png, jpeg, ...)</label>
                         <input type="text" name="bild" class="form-control" value="<?php echo $row['bild']; ?>">
                       </div>
                       <div class="form-group">
                         <label>Kategoriebild-Banner (Mit Deiteiendung z.B. .png, jpeg, ...)</label>
                         <input type="text" name="banner" class="form-control" value="<?php echo $row['banner']; ?>">
                       </div>
                       <div class="form-group">
                         <label>Bild Hintergrundfarbe(In #000000 angeben)</label>
                         <input type="text" name="farbe" class="form-control" value="<?php echo $row['farbe']; ?>">
                       </div>
                       <div class="form-group">
                         <label>Meta Tags</label>
                         <input type="text" name="metatags" class="form-control" value="<?php echo $row['metatags']; ?>">
                       </div>
                       <div class="form-group">
                         <label>Meta Description</label>
                         <input type="text" name="metadesc" class="form-control" value="<?php echo $row['metadesc']; ?>">
                       </div>
                     <div class="modal-footer">
                       <?php
                       if ($_SESSION['admin'] >= 4) {
                         ?>
                            <button type="delete" name="delete" class="btn btn-danger">Tutorial Löschen</button>
                         <?php
                       }
                        ?>
                       <button type="submit" class="btn btn-primary">Tutorial bearbeiten</button>
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
                <a href="edittutorial.php" class="list-group-item active"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Tutorial bearbeiten</a>
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
                  <h3 class="panel-title">Kategorie bearbeiten</h3>
                </div>
                <div class="panel-body">
                  <form action="edittutorial.php" method="post">
                     <div class="modal-body">
                       <div class="form-group">
                         <label>Kategorie auswählen</label><br>
                         <?php
                         $sql = "SELECT * FROM tutorials";
                         $result = $conn->query($sql);

                          ?>
                        <select name="tutorial">
                           <?php
                           while($row = mysqli_fetch_assoc($result)) {
                             ?>
                             <option value="<?php echo $row['id']; ?>"><?php echo $row['name_link']; ?></option>
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
    }
  }
 ?>
