<?php
  include 'header.php';
  include '../includes/dbh.php';
  if (empty(mysqli_real_escape_string($conn, $_GET['tutorial']))) {
    header("Location: ../index.php");
  }else {
    $tutorial = mysqli_real_escape_string($conn, $_GET['tutorial']);
    $sql = "SELECT * FROM tutorials WHERE name_link='$tutorial'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <article class="tutheader" style="background-image: url('../img/<?php echo $row['banner']; ?>');  !important">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h2><?php echo $row['title']; ?></h2>
          <h1><?php echo $row['titleheader']; ?></h1>
        </div>
      </div>
    </div>
   </article>
   <article class="tutorial">
     <div class="container">
       <div class="row">
         <div class="col-xs-2">
         </div>
         <div class="col-xs-8">
           <?php
           echo $row['content'];
            ?>
         </div>
         <div class="col-xs-2">

         </div>
       </div>
     </div>
   </article>
    <?php
  }
 ?>
