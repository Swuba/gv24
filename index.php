<?php
 include "includes/header.php";
?>
<!-- Headerbanner und Überschrift -->
<article class="index-intro">
  <div class="container">
    <div class="row">
      <div class="col-xs-3">

      </div>
      <div class="col-xs-6">
        <h2>DeinTutorial24</h2>
        <h1>Eine Seite für alles!</h1>
        <a id="index-cta" href="tutorials.php">Zu den Tutorials</a>
      </div>
      <div class="col-xs-3">

      </div>
    </div>
  </div>
</article>
<!-- Seiteninfo -->
<article class="index-info">
  <div class="container">
    <div class="row">
      <div class="col-xs-2">

      </div>
      <div class="col-xs-8">
        <h2>Was wir bieten</h2>
        <p>
          Hauptsächlich findest du hier kostenlose, aktuelle und verständliche Schritt für Schritt Tutorials auf Deutsch.
          Von Tutorials für den Raspberry Pi wie z.B das aufsetzten des Pi´s, Webserver erstellen, Temperatur und Luftfeuchtigkeit messen und abrufbar machen, LED´s ansteuern und vieles mehr...
        </p>
      </div>
      <div class="col-xs-2">

      </div>
    </div>
  </div>
</article>

<article class="index-courses">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>Direkt loslegen mit dem Raspberry Pi</h2><br><br>
        <div class="row">
            <div class="col-xs-6">
              <?php
              include 'includes/dbh.php';
              $sql = "SELECT * FROM tutorials WHERE name_link='raspberry-pi-einstieg'";
              $result = $conn->query($sql);
              while($row = mysqli_fetch_assoc($result)) {

                  ?>
                  <a href="tutorial.php?tutorial=<?php echo $row['name_link'];?>">
                    <div class="index-courses-outerbox" style="background-color: <?php echo $row['farbe'];?> !important;">
                      <div class="index-courses-icon">
                        <div>
                          <img src="img/<?php echo $row['bild'];?>" alt="">
                        </div>
                      </div>
                      <div class="index-courses-box">
                        <div>
                          <h3><?php echo $row['title']; ?></h3>
                          <p><?php echo $row['beschreibung']; ?></p>
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php

              }
               ?>
            </div>
            <div class="col-xs-6">
              <?php
              $sql = "SELECT * FROM tutorials WHERE name_link='webserver-erstellen'";
              $result = $conn->query($sql);
              while($row = mysqli_fetch_assoc($result)) {
                  ?>
                  <a href="tutorial.php?tutorial=<?php echo $row['name_link'];?>">
                    <div class="index-courses-outerbox" style="background-color: <?php echo $row['farbe'];?> !important;">
                      <div class="index-courses-icon">
                        <div>
                          <img src="img/<?php echo $row['bild'];?>" alt="">
                        </div>
                      </div>
                      <div class="index-courses-box">
                        <div>
                          <h3><?php echo $row['title']; ?></h3>
                          <p><?php echo $row['beschreibung']; ?></p>
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php
              }
               ?>
            </div>
        </div>
      </div>
    </div>
  </div>
</article>
<?php include "includes/footer.php"; ?>
  </body>
</html>
