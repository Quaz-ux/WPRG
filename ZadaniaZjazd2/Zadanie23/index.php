<?php

$submitted = isset($_POST['submit']);
$people = $submitted ? (int)$_POST['people'] : 1;

function generatePeopleForms($numberOfPeople) {
    $html = "";
    for ($i = 1; $i <= $numberOfPeople; $i++) {
        $html .= "<h4>Osoba $i:</h4>";
        $html .= "<label for='person_name_$i'>Imię:</label>";
        $html .= "<input type='text' name='person_name_$i' required><br>";
        $html .= "<label for='person_surname_$i'>Nazwisko:</label>";
        $html .= "<input type='text' name='person_surname_$i' required><br>";
    }
    return $html;
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz rezerwacji hotelu</title>
</head>
<body>
    <h2>Rezerwacja hotelu</h2>
    <form method="post">
        <label for="people">Ilość osób:</label>
        <select name="people" id="people" required onchange="this.form.submit()">
            <?php for ($i = 1; $i <= 4; $i++): ?>
                <option value="<?= $i ?>" <?php if ($i == $people) echo "selected"; ?>><?= $i ?></option>
            <?php endfor; ?>
        </select>
        <br>
        <?= generatePeopleForms($people); ?>
        <label for="name">Imię osoby rezerwującej:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="surname">Nazwisko osoby rezerwującej:</label>
        <input type="text" name="surname" id="surname" required>
        <br>
        <label for="address">Adres:</label>
        <input type="text" name="address" id="address" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="credit_card">Dane karty kredytowej:</label>
        <input type="text" pattern="\d{16}" title="16 cyfrowy numer karty kredytowej" name="credit_card" id="credit_card" required>
        <br>
        <label for="date">Data pobytu:</label>
        <input type="date" name="date" id="date" required>
        <br>
        <label for="arrival_time">Godzina przyjazdu:</label>
        <input type="time" name="arrival_time" id="arrival_time" required>
        <br>
        <label><input type="checkbox" name="child_bed" value="Yes"> Potrzebuję łóżeczka dla dziecka</label>
        <br>
        <label>Udogodnienia:</label>
        <label><input type="checkbox" name="amenities[]" value="Klimatyzacja"> Klimatyzacja</label>
        <label><input type="checkbox" name="amenities[]" value="Popielniczka"> Popielniczka dla palacza</label>
        <br>
        <input type="submit" name="submit" value="Zarezerwuj">
    </form>

    <?php
    if ($submitted) {
        echo "<h3>Podsumowanie rezerwacji:</h3>";
        echo "Ilość osób: " . htmlspecialchars($_POST['people']) . "<br>";
        for ($i = 1; $i <= $_POST['people']; $i++) {
            echo "Osoba $i - Imię: " . htmlspecialchars($_POST["person_name_$i"]) . ", Nazwisko: " . htmlspecialchars($_POST["person_surname_$i"]) . "<br>";
        }
        echo "Imię osoby rezerwującej: " . htmlspecialchars($_POST['name']) . "<br>";
        echo "Nazwisko osoby rezerwującej: " . htmlspecialchars($_POST['surname']) . "<br>";
        echo "Adres: " . htmlspecialchars($_POST['address']) . "<br>";
        echo "Email: " . htmlspecialchars($_POST['email']) . "<br>";
        echo "Dane karty kredytowej: " . htmlspecialchars($_POST['credit_card']) . "<br>";
        echo "Data pobytu: " . htmlspecialchars($_POST['date']) . "<br>";
        echo "Godzina przyjazdu: " . htmlspecialchars($_POST['arrival_time']) . "<br>";
        echo "Łóżeczko dla dziecka: " . (isset($_POST['child_bed']) ? "Tak" : "Nie") . "<br>";
        echo "Udogodnienia: ";
        echo !empty($_POST['amenities']) ? implode(", ", $_POST['amenities']) : "Brak";
    }
    ?>
</body>
</html>
