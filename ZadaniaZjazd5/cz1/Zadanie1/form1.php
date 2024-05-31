<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['card_number'] = $_POST['card_number'];
    $_SESSION['customer_name'] = $_POST['customer_name'];
    $_SESSION['number_of_people'] = $_POST['number_of_people'];
    header("Location: form2.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Formularz zamówienia</title>
</head>
<body>
    <h1>Podaj dane zamówienia</h1>
    <form method="post">
        Numer karty: <input type="text" name="card_number" required><br>
        Imię zamawiającego: <input type="text" name="customer_name" required><br>
        Ilość osób: <input type="number" name="number_of_people" min="1" required><br>
        <input type="submit" value="Dalej">
    </form>
</body>
</html>
