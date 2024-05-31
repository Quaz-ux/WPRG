<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wszystkie samochody</title>
</head>
<body>
    <h1>Wszystkie samochody</h1>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Marka</th>
            <th>Model</th>
            <th>Cena</th>
            <th>Operacje</th>
        </tr>
        <?php
        $query = "SELECT * FROM samochody ORDER BY rok DESC";
        $result = mysqli_query($conn, $query);
        while ($car = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$car['id']}</td>
                    <td>{$car['marka']}</td>
                    <td>{$car['model']}</td>
                    <td>{$car['cena']}</td>
                    <td><a href='car_details.php?id={$car['id']}'>Szczegóły</a></td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
