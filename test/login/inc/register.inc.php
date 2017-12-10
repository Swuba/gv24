<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password1'];
$password2 = $_POST['password2'];

if(!filter_var($email, FILTER_VALIDATE_EMAIL){
    print("asda");
}
 ?>
