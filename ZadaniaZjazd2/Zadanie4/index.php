<?php
function isPrime($number, &$iterations) {
    $iterations = 0;
    if ($number <= 1) {
        return false;
    }
    if ($number <= 3) {
        return true;
    }
    if ($number % 2 == 0 || $number % 3 == 0) {
        return false;
    }
    for ($i = 5; $i * $i <= $number; $i += 6) {
        $iterations++;
        if ($number % $i == 0 || $number % ($i + 2) == 0) {
            return false;
        }
    }
    return true;
}

$number = "";
$result = "";
$iterations = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST["number"];
    if (filter_var($number, FILTER_VALIDATE_INT) && $number > 0) {
        $isPrime = isPrime($number, $iterations);
        $result = $isPrime ? "Liczba $number jest liczbą pierwszą." : "Liczba $number nie jest liczbą pierwszą.";
    } else {
        $result = "Proszę wpisać dodatnią liczbę całkowitą.";
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprawdzanie liczby pierwszej</title>
</head>
<body>
    <h2>Sprawdź, czy liczba jest pierwsza</h2>
    <form method="post">
        <label for="number">Wpisz liczbę:</label>
        <input type="text" id="number" name="number" value="<?php echo $number; ?>" required>
        <input type="submit" value="Sprawdź">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<p>$result</p>";
        echo "<p>Liczba iteracji: $iterations</p>";
    }
    ?>
</body>
</html>
