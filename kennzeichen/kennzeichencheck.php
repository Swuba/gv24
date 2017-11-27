<?php
include "dbh.php";

$kennzeichen = $_GET["kennzeichen"];

$sql = "SELECT * FROM kennzeichen WHERE kennzeichen='$kennzeichen'";
$result = mysqli_query($conn, $sql);
if (!$row = mysqli_fetch_assoc($result)) {
  $bezeichnung = "Wurde nicht gefunden";
}else{
  $bezeichnung = $row['bezeichnung'];
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Saira" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <title>kennzeichen</title>
  </head>
  <body>
    <h1><?php echo $bezeichnung; ?></h1>
    <a href="https://www.google.de/maps/place/<?php echo $bezeichnung; ?>">Maps</a>
    <a href="index.php">Zurück</a>
  </body>
</html>
