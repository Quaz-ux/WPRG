<?php
include 'db.php';
$id = $_GET['id'];
$query = "SELECT * FROM samochody WHERE id = $id";
$result = mysqli_query($conn, $query);
$car = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Szczegóły Samochodu</title>
</head>
<body>
    <h1>Szczegóły Samochodu</h1>
    <p>Marka: <?= $car['marka'] ?></p>
    <p>Model: <?= $car['model'] ?></p>
    <p>Cena: <?= $car['cena'] ?></p>
    <p>Rok: <?= $car['rok'] ?></p>
    <p>Opis: <?= $car['opis'] ?></p>
    <a href="index.php">Powrót do strony głównej</a>
</body>
</html>
