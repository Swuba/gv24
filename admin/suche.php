<?php
  include '../includes/dbh.php';
  $sql = "SELECT * FROM users WHERE username LIKE '%".mysql_real_escape_string($_POST["suchbegriff"])."%'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
    ?>
    <a href="edituser.php?username=<?php echo $row['username'];?>"><?php echo $row['username']; ?></a><br>
    <?php
		}
 ?>
