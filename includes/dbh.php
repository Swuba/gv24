<?php

$conn = mysqli_connect("localhost", "root", "", "deintutorial24");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
