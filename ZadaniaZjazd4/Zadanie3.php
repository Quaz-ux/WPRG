<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Tworzenie listy odnośników</title>
</head>
<body>
<h2>Zadanie 3: Tworzenie listy odnośników</h2>
<form method="post">
    Adres: <input type="text" name="url">
    Opis: <input type="text" name="description">
    <input type="submit" name="addLink" value="Dodaj odnośnik">
</form>

<?php
if (isset($_POST['addLink'])) {
    $url = htmlspecialchars($_POST['url']);
    $description = htmlspecialchars($_POST['description']);
    $linkFile = 'links.txt';
    $linkData = $url . ';' . $description . PHP_EOL;
    file_put_contents($linkFile, $linkData, FILE_APPEND);
    echo "Dodano odnośnik: " . $url . " - " . $description;
}
?>
</body>
</html>
