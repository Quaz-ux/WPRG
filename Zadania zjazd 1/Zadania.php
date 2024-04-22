<?php

echo "\n Zadanie 1 \n";
// Zadanie 1
$owoce = ["jablko", "banan", "pomarancza"];
foreach ($owoce as $owoc) {
    $owocOdTylu = '';
    for ($i = strlen($owoc) - 1; $i >= 0; $i--) {
        $owocOdTylu .= $owoc[$i];
    }
    echo $owocOdTylu . (strtolower($owoc[0]) === 'p' ? " - zaczyna sie na 'p'" : "") . "\n";
}

echo "\n Zadanie 2 \n";
// Zadanie 2
function czyPierwsza($liczba) {
    if ($liczba <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($liczba); $i++) {
        if ($liczba % $i == 0) {
            return false;
        }
    }
    return true;
}

for ($i = 2; $i <= 60; $i++) {
    if (czyPierwsza($i)) {
        echo $i . "\n";
    }
}

echo "\n Zadanie 3 \n";
// Zadanie 3
function fibonacciego($n) {
    $fib = [0, 1];
    for ($i = 2; $i <= $n; $i++) {
        $fib[] = $fib[$i - 1] + $fib[$i - 2];
    }
    return $fib;
}

$N = 10; // przykładowe N
$fibSeq = fibonacciego($N);
foreach ($fibSeq as $index => $value) {
    if ($value % 2 != 0) {
        echo ($index + 1) . ". " . $value . "\n";
    }
}

echo "\n Zadanie 4 \n";
// Zadanie 4
$tekst = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum 
has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of 
type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic 
typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem 
Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
$tablica = explode(" ", $tekst);

for ($i = 0; $i < count($tablica); $i++) {
    if (preg_match('/[^\w]/', $tablica[$i])) {
        array_splice($tablica, $i, 1);
        $i--;
    }
}

$asocjacyjna = [];
for ($i = 0; $i < count($tablica); $i += 2) {
    if (isset($tablica[$i + 1])) {
        $asocjacyjna[$tablica[$i]] = $tablica[$i + 1];
    }
}

foreach ($asocjacyjna as $klucz => $wartosc) {
    echo "$klucz: $wartosc\n";
}

?>
