<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Portal Samochodowy</title>
</head>
<body>
    <table>
        <tr>
            <td><a href="index.php">Strona główna</a></td>
            <td><a href="all_cars.php">Wszystkie samochody</a></td>
            <td><a href="add_car.php">Dodaj samochód</a></td>
        </tr>
    </table>
    <h1>Samochody z najniższą ceną</h1>
    <table border="1">
        <tr>
            <th>Marka</th>
            <th>Model</th>
            <th>Cena</th>
        </tr>
        <?php
        $query = "SELECT * FROM samochody ORDER BY cena ASC LIMIT 5";
        $result = mysqli_query($conn, $query);
        while ($car = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$car['marka']}</td>
                    <td>{$car['model']}</td>
                    <td>{$car['cena']}</td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
