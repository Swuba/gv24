<?php
  include 'includes/adminheader.php';
  if (isset($_SESSION['logged_in'])) {
  if (isset($_POST['name'])) {
    $kategoriename = mysqli_real_escape_string($conn, $_POST['name']);
    $titleheader = mysqli_real_escape_string($conn, $_POST['titleheader']);
    $beschreibung = mysqli_real_escape_string($conn, $_POST['beschreibung']);
    $bild = mysqli_real_escape_string($conn, $_POST['bild']);
    $banner = mysqli_real_escape_string($conn, $_POST['banner']);
    $farbe = mysqli_real_escape_string($conn, $_POST['farbe']);
    $username = mysqli_real_escape_string($conn, $_SESSION['username']);
    $name = str_replace(" ","-",$kategoriename);
    $name = strtolower($name);
    if (empty($kategoriename) or empty($beschreibung)) {
      $_SESSION['error'] = "Kategoriename und Beschreibung muss angegeben werden";
    }else {
      $sql = "INSERT INTO categories (name,name_link, titleheader, beschreibung, bild, banner, farbe, erstelltvon) VALUES ('$kategoriename', '$name', '$titleheader', '$beschreibung', '$bild', '$banner', '$farbe', '$username')";
      $result = mysqli_query($conn, $sql);
      $_SESSION['success'] = "Kategorie erfolgreich erstellt";
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
           <a href="createtutorial.php" class="list-group-item"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tutorial erstellen</a>
           <a href="edittutorial.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Tutorial bearbeiten</a>
           <a href="createcategory.php" class="list-group-item active"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Kategorie erstellen</a>
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
             <h3 class="panel-title">Kategorie erstellen</h3>
           </div>
           <div class="panel-body">
             <form action="createcategory.php" method="post">
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
                    <label>Kategoriename</label>
                    <input type="text" name="name" class="form-control" placeholder="Kategoriename">
                  </div>
                  <div class="form-group">
                    <label>Titel - beschreibung</label>
                    <input type="text" name="titleheader" class="form-control" placeholder="Kategoriename">
                  </div>
                  <div class="form-group">
                    <label>Kategoriebeschreibung</label>
                    <textarea name="beschreibung" class="form-control" placeholder="Beschreibung"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Kategoriebild-klein (Mit Deiteiendung z.B. .png, jpeg, ...)</label>
                    <input type="text" name="bild" class="form-control" placeholder="Bild">
                  </div>
                  <div class="form-group">
                    <label>Bild Hintergrundfarbe(In #000000 angeben)</label>
                    <input type="text" name="farbe" class="form-control" placeholder="Hexcode">
                  </div>
                  <div class="form-group">
                    <label>Kategoriebild-Banner (Mit Deiteiendung z.B. .png, jpeg, ...)</label>
                    <input type="text" name="banner" class="form-control" placeholder="Bild">
                  </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Kategorie erstellen</button>
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
