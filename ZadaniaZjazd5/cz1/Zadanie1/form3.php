<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Podsumowanie</title>
</head>
<body>
    <h1>Podsumowanie zamówienia</h1>
    <p>Numer karty: <?= htmlspecialchars($_SESSION['card_number']) ?></p>
    <p>Imię zamawiającego: <?= htmlspecialchars($_SESSION['customer_name']) ?></p>
    <p>Ilość osób: <?= $_SESSION['number_of_people'] ?></p>
    <?php
    for ($i = 1; $i <= $_SESSION['number_of_people']; $i++) {
        echo "<p>Osoba $i: " . htmlspecialchars($_SESSION["person_{$i}_name"]) . "</p>";
    }
    ?>
</body>
</html>
