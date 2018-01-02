<?php
  include 'includes/adminheader.php';
  if (isset($_SESSION['logged_in'])) {
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


       <section id="main">
         <div class="container">
           <div class="row">
             <div class="col-md-2">

             </div>
             <div class="col-md-8">
               <a href="<?php echo $bildinfo['dirname']."/".$bildinfo['basename'];?>">
               <img src="<?php echo $bildinfo['dirname']."/".$bildinfo['basename'];?>" width="140" alt="Vorschau" /></a>
               <span><?php echo $bildinfo['filename']; ?> (<?php echo $size ; ?>kb)</span><br>
           </div>
           <div class="col-md-2">

         </div>
         </div>
       </section>
<?php
};
};
}
?>
