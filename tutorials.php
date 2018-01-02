<?php
  include "includes/header.php";
  include 'includes/dbh.php';
  header("Content-Type: text/html; charset=utf-8");
 ?>
 <article class="tutheader">
 <div class="container">
   <div class="row">
     <div class="col-xs-12">
       <h2>Tutorials</h2>
       <h1>Aktuelle und verständliche Schritt für Schritt Tutorials</h1>
     </div>
   </div>
 </div>
</article>
<article class="index-courses">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>Kategorien</h2>
        <h3 class="index-courses-subheader">Hier findest du alle möglichen Tutorials, wie z.B zu dem Raspberry Pi,
          Programmiersprachen, API nutzungen von z.B.von League of Legend und vieles mehr...</h3>
        <div class="row">
            <div class="col-xs-6">
              <?php
              $sql = "SELECT * FROM categories";
              $result = $conn->query($sql);
              while($row = mysqli_fetch_assoc($result)) {

                if ($row['id'] % 2 != 0) {
                  ?>
                  <a href="tutorials/kategorie.php?kategorie=<?php echo $row['name_link']; ?>">
                    <div class="index-courses-outerbox" style="background-color: <?php echo $row['farbe'];?> !important;">
                      <div class="index-courses-icon">
                        <div>
                          <img src="img/<?php echo $row['bild'];?>" alt="">
                        </div>
                      </div>
                      <div class="index-courses-box">
                        <div>
                          <h3><?php echo $row['name']; ?></h3>
                          <p><?php echo $row['beschreibung']; ?></p>
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php
                }
                ?>


                <?php
              }
               ?>
            </div>
            <div class="col-xs-6">
              <?php
              $sql = "SELECT * FROM categories";
              $result = $conn->query($sql);
              while($row = mysqli_fetch_assoc($result)) {

                if ($row['id'] % 2 == 0) {
                  $name = str_replace(" ","-",$row['name']);
                  $name = strtolower($name);
                  ?>
                  <a href="tutorials/kategorie.php?kategorie=<?php echo $row['name_link']; ?>">
                    <div class="index-courses-outerbox" style="background-color: <?php echo $row['farbe'];?> !important;">
                      <div class="index-courses-icon">
                        <div>
                          <img src="img/<?php echo $row['bild'];?>" alt="">
                        </div>
                      </div>
                      <div class="index-courses-box">
                        <div>
                          <h3><?php echo $row['name']; ?></h3>
                          <p><?php echo $row['beschreibung']; ?></p>
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php
                }
                ?>


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
