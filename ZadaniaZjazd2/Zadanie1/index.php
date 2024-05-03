<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
</head>
<body>
    <h2>kalkulator</h2>
    <form method="post">
        <label for="liczba1">Liczba 1:</label>
        <input type="number" name="liczba1" id="liczba1" required>
        <br>
        <label for="liczba2">Liczba 2:</label>
        <input type="number" name="liczba2" id="liczba2" required>
        <br>
        <label for="dzialanie">Działanie:</label>
        <select name="dzialanie" id="dzialanie">
            <option value="dodawanie">Dodawanie</option>
            <option value="odejmowanie">Odejmowanie</option>
            <option value="mnozenie">Mnożenie</option>
            <option value="dzielenie">Dzielenie</option>
        </select>
        <br>
        <input type="submit" name="submit" value="Oblicz">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $liczba1 = $_POST["liczba1"];
        $liczba2 = $_POST["liczba2"];
        $dzialanie = $_POST["dzialanie"];
        $wynik = "Nieprawidłowe działanie";
        
        switch ($dzialanie) {
            case "dodawanie":
                $wynik = $liczba1 + $liczba2;
                break;
            case "odejmowanie":
                $wynik = $liczba1 - $liczba2;
                break;
            case "mnozenie":
                $wynik = $liczba1 * $liczba2;
                break;
            case "dzielenie":
                if ($liczba2 != 0) {
                    $wynik = $liczba1 / $liczba2;
                } else {
                    $wynik = "Nie można dzielić przez zero!";
                }
                break;
        }
        echo "<div id='wynik'><strong>Wynik działania:</strong> $wynik</div>";
    }
    ?>
    
</body>
</html>
