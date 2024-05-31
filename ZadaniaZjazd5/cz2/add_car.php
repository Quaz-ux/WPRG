<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $marka = $_POST['marka'];
    $model = $_POST['model'];
    $cena = $_POST['cena'];
    $rok = $_POST['rok'];
    $opis = $_POST['opis'];

    $query = "INSERT INTO samochody (marka, model, cena, rok, opis) VALUES ('$marka', '$model', $cena, $rok, '$opis')";
    mysqli_query($conn, $query);
    header("Location: all_cars.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dodaj Samochód</title>
</head>
<body>
    <h1>Dodaj Nowy Samochód</h1>
    <form method="post">
        Marka: <input type="text" name="marka" required><br>
        Model: <input type="text" name="model" required><br>
        Cena: <input type="number" name="cena" required><br>
        Rok: <input type="number" name="rok" required><br>
        Opis: <textarea name="opis" required></textarea><br>
        <input type="submit" value="Dodaj Samochód">
    </form>
</body>
</html>
