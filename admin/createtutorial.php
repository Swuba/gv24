<?php
  include 'includes/adminheader.php';
  if (isset($_SESSION['logged_in'])) {
    if ($_SESSION['admin'] == 5) {
    if (isset($_POST['title'])) {
      $username = mysqli_real_escape_string($conn, $_SESSION['username']);
      $category = mysqli_real_escape_string($conn, $_POST['category']);
      $bild = mysqli_real_escape_string($conn, $_POST['bild']);
      $farbe = mysqli_real_escape_string($conn, $_POST['farbe']);
      $banner = mysqli_real_escape_string($conn, $_POST['banner']);
      $beschreibung = mysqli_real_escape_string($conn, $_POST['beschreibung']);
      $title = mysqli_real_escape_string($conn, $_POST['title']);
      $titleheader = mysqli_real_escape_string($conn, $_POST['titleheader']);
      $content = mysqli_real_escape_string($conn, $_POST['content']);
      $metatags = mysqli_real_escape_string($conn, $_POST['metatags']);
      $metadesc = mysqli_real_escape_string($conn, $_POST['metadesc']);
      if (empty($title) or empty($content)) {
        $_SESSION['error'] = "Titel und Content muss angegeben werden";
      }else {
        $sql1 = "SELECT nummer FROM tutorials WHERE category='$category'";
        $result1 = mysqli_query($conn, $sql1);
        $i = $result1->num_rows;
        if ($i == 0) {
          $i = 1;
        }else {
          $i++;
        }
        $sql = "INSERT INTO tutorials (nummer, category, title, titleheader, beschreibung, content, bild, banner, farbe, metatags, metadesc, erstelltvon) VALUES ('$i', '$category', '$title', '$titleheader', '$beschreibung', '$content', '$bild', '$banner', '$farbe', '$metatags', '$metadesc', '$username')";
        $result = mysqli_query($conn, $sql);
        $_SESSION['success'] = "Tutorial erfolgreich erstellt";
        ?>
        <meta http-equiv="refresh" content="0; URL=index.php">
        <?php
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
           <a href="createtutorial.php" class="list-group-item active"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tutorial erstellen</a>
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
             <h3 class="panel-title">Tutorial erstellen</h3>
           </div>
           <div class="panel-body">
             <form action="createtutorial.php" method="post">
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
                    <label>Kategorie</label><br>
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
                  <div class="form-group">
                    <label>Tutorial Titel</label>
                    <input type="text" name="title" class="form-control" placeholder="Titel">
                  </div>
                  <div class="form-group">
                    <label>Titel - beschreibung</label>
                    <input type="text" name="titleheader" class="form-control" placeholder="Titel">
                  </div>
                  <div class="form-group">
                    <label>Seiteninhalt</label>
                    <textarea name="content" class="form-control" placeholder="Seiteninhalt"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Tutorialbeschreibung</label>
                    <input type="text" name="beschreibung" class="form-control" placeholder="Titel">
                  </div>
                  <div class="form-group">
                    <label>Kategoriebild-klein (Mit Deiteiendung z.B. .png, jpeg, ...)</label>
                    <input type="text" name="bild" class="form-control" placeholder="Titel">
                  </div>
                  <div class="form-group">
                    <label>Kategoriebild-Banner (Mit Deiteiendung z.B. .png, jpeg, ...)</label>
                    <input type="text" name="banner" class="form-control" placeholder="Titel">
                  </div>
                  <div class="form-group">
                    <label>Bild Hintergrundfarbe(In #000000 angeben)</label>
                    <input type="text" name="farbe" class="form-control" placeholder="Titel">
                  </div>
                  <div class="form-group">
                    <label>Meta Tags</label>
                    <input type="text" name="metatags" class="form-control" placeholder="Tags">
                  </div>
                  <div class="form-group">
                    <label>Meta Description</label>
                    <input type="text" name="metadesc" class="form-control" placeholder="Beschreibung">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Tutorial erstellen</button>
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
