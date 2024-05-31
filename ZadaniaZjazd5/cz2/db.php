<?php
$servername = "localhost";
$username = "twoja_nazwa_uzytkownika";
$password = "twoje_haslo";
$dbname = "mojaBaza";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
