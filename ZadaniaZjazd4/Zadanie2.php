<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Licznik odwiedzin</title>
</head>
<body>
<h2>Zadanie 2: Licznik odwiedzin</h2>

<?php
$counterFile = 'licznik.txt';
if (file_exists($counterFile)) {
    $count = (int)file_get_contents($counterFile);
} else {
    $count = 0;
}
$count++;
file_put_contents($counterFile, $count);
echo "Liczba odwiedzin: " . $count;
?>
</body>
</html>
