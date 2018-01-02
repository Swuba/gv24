<?php
session_start();
include '../../includes/dbh.php';
$target_dir = "../../img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Datei ist kein Bild.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Bild existiert bereits. ";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {
    echo "Sorry, Datei ist zu groß. ";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Es sind nur Bilder erlaubt. ";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Datei konnte nicht hochgeladen werden. ";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Das Bild ". basename( $_FILES["fileToUpload"]["name"]). " wurde erfolgreich hochgeladen. ";
        $username = $_SESSION['username'];
        $bildername = basename( $_FILES["fileToUpload"]["name"]);
        $sql = "INSERT INTO imgs (name, uploadedby) VALUES ('$bildername', '$username')";
        $result = mysqli_query($conn, $sql);
    } else {
        echo "Fehler beim uploaden der Datei. ";
    }
}
?>
