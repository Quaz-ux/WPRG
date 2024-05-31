<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    for ($i = 1; $i <= $_SESSION['number_of_people']; $i++) {
        $_SESSION["person_{$i}_name"] = $_POST["person_{$i}_name"];
    }
    header("Location: form3.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dane osób</title>
</head>
<body>
    <h1>Wprowadź dane osób</h1>
    <form method="post">
        <?php
        for ($i = 1; $i <= $_SESSION['number_of_people']; $i++) {
            echo "Imię osoby $i: <input type='text' name='person_{$i}_name' required><br>";
        }
        ?>
        <input type="submit" value="Zapisz dane">
    </form>
</body>
</html>
