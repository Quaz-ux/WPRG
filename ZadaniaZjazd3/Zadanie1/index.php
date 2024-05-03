<?php
function getDayOfWeek($date) {
    $dateObj = new DateTime($date);
    return $dateObj->format('l');
}

function getAge($date) {
    $dateObj = new DateTime($date);
    $now = new DateTime();
    return $now->diff($dateObj)->y;
}

function daysToNextBirthday($date) {
    $dateObj = new DateTime($date);
    $now = new DateTime();
    $currentYearBirthday = new DateTime(date('Y') . '-' . $dateObj->format('m') . '-' . $dateObj->format('d'));

    if ($currentYearBirthday < $now) {
        $currentYearBirthday->modify('+1 year');
    }
    return $now->diff($currentYearBirthday)->days;
}

if (isset($_GET['birthday'])) {
    $birthday = $_GET['birthday'];
    $dayOfWeek = getDayOfWeek($birthday);
    $age = getAge($birthday);
    $daysUntilBirthday = daysToNextBirthday($birthday);
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Data urodzenia</title>
</head>
<body>
    <h1>Podaj datę urodzenia</h1>
    <form action="" method="GET">
        <input type="date" name="birthday" required>
        <input type="submit" value="Wyślij">
    </form>
    <?php
    if (isset($birthday)) {
        echo "<p>Dzień tygodnia: $dayOfWeek</p>";
        echo "<p>Ukończone lata: $age</p>";
        echo "<p>Dni do najbliższych urodzin: $daysUntilBirthday</p>";
    }
    ?>
</body>
</html>
