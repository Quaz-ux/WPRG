<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Odwracanie wierszy w pliku</title>
</head>
<body>
<h2>Zadanie 1: Odwrócenie kolejności wierszy w pliku tekstowym</h2>
<form method="post" enctype="multipart/form-data">
    Wybierz plik tekstowy: <input type="file" name="file1">
    <input type="submit" name="reverseFile" value="Odwróć wiersze">
</form>

<?php
if (isset($_POST['reverseFile'])) {
    if (isset($_FILES['file1']) && $_FILES['file1']['error'] == 0) {
        $fileContent = file($_FILES['file1']['tmp_name']);
        $reversedContent = array_reverse($fileContent);
        foreach ($reversedContent as $line) {
            echo htmlspecialchars($line) . "<br>";
        }
    } else {
        echo "Błąd w przesyłaniu pliku.";
    }
}
?>
</body>
</html>
