<?php
  include 'header.php';
  include '../includes/dbh.php';
  if (empty($_GET['kategorie'])) {
    header("Location: ../index.php");
  }else {
    $kategorie = $_GET['kategorie'];
    $sql = "SELECT * FROM categories WHERE name_link='$kategorie'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    ?>
    <article class="tutheader" style="background-image: url('../img/<?php echo $row['banner']; ?>');  !important">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h2><?php echo $row['name']; ?></h2>
          <h1><?php echo $row['titleheader'] ?></h1>
        </div>
      </div>
    </div>
    </article>
    <?php
    $sql = "SELECT * FROM tutorials WHERE category='$id'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    if (empty($row)) {
      ?>
      <article class="index-courses">
        <div class="container">
          <div class="row">
            <div class="col-xs-2">
            </div>
            <div class="col-xs-8">
              <div class="alert alert-danger" role="alert" style="text-align: center; margin-top: 100px; padding: 50px;">
               <strong>Sorry!</strong> <?php echo "Es wurde noch kein Tutorial zu diesem thema erstellt!"?>
             </div>
            </div>
            <div class="col-xs-2">
            </div>
          </div>
        </div>
      </article>
      <?php
    }else {
      ?>
      <article class="index-courses">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <h2>Tutorials</h2><br><br>
              <div class="row">
                  <div class="col-xs-6">
                    <?php
                    $sql = "SELECT * FROM tutorials WHERE category='$id'";
                    $result = $conn->query($sql);
                    while($row = mysqli_fetch_assoc($result)) {
                      if ($row['nummer'] % 2 != 0) {
                        ?>
                        <a href="tutorial.php?tutorial=<?php echo $row['name_link'];?>">
                          <div class="index-courses-outerbox" style="background-color: <?php echo $row['farbe'];?> !important;">
                            <div class="index-courses-icon">
                              <div>
                                <img src="../img/<?php echo $row['bild'];?>" alt="">
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
                    }
                     ?>
                  </div>
                  <div class="col-xs-6">
                    <?php
                    $sql = "SELECT * FROM tutorials WHERE category='$id'";
                    $result = $conn->query($sql);
                    while($row = mysqli_fetch_assoc($result)) {
                      if ($row['nummer'] % 2 == 0) {
                        ?>
                        <a href="tutorial.php?tutorial=<?php echo $row['name_link'];?>">
                          <div class="index-courses-outerbox" style="background-color: <?php echo $row['farbe'];?> !important;">
                            <div class="index-courses-icon">
                              <div>
                                <img src="../img/<?php echo $row['bild'];?>" alt="">
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
                    }
                     ?>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </article>
      <?php
    }
     ?>

    <?php include "footer.php"; ?>
    <?php
  }
 ?>
