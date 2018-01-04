<?php
  include 'includes/adminheader.php';
  if (isset($_SESSION['logged_in'])) {
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
              <a href="bilder.php" class="list-group-item active"><span class="	glyphicon glyphicon-picture" aria-hidden="true"></span> Bilder anzeigen</a>
            </div>
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Bilder anzeigen</h3>
              </div>
              <div class="panel-body" style="background-color: #f4f4f4;">
                <div class="col-md-9">
                <?php
              $ordner = "../img"; //auch komplette Pfade möglich ($ordner = "download/files";)

            // Ordner auslesen und Array in Variable speichern
            $allebilder = scandir($ordner); // Sortierung A-Z
            // Sortierung Z-A mit scandir($ordner, 1)

            // Schleife um Array "$alledateien" aus scandir Funktion auszugeben
            // Einzeldateien werden dabei in der Variabel $datei abgelegt
            foreach ($allebilder as $bild) {
              $bildinfo = pathinfo($ordner."/".$bild);
              $size = ceil(filesize($ordner."/".$bild)/1024);
              if ($bild != "." && $bild != "..") {
            ?>




                           <a href="<?php echo $bildinfo['dirname']."/".$bildinfo['basename'];?>">
                           <img src="<?php echo $bildinfo['dirname']."/".$bildinfo['basename'];?>" width="140" alt="Vorschau" /></a>
                           <span><?php echo $bild; ?> (<?php echo $size ; ?>kb)</span><br>

            <?php
            };
            };
            ?>
              </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
}
?>
