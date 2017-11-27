<?php

$conn = mysqli_connect("localhost", "root", "", "filzknoetche");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
