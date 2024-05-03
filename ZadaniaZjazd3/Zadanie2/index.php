<?php
function fibonacciIterative($n) {
    $fib = [0, 1];
    for ($i = 2; $i <= $n; $i++) {
        $fib[$i] = $fib[$i - 1] + $fib[$i - 2];
    }
    return $fib[$n];
}

function fibonacciRecursive($n) {
    if ($n <= 1) {
        return $n;
    }
    return fibonacciRecursive($n - 1) + fibonacciRecursive($n - 2);
}

if (isset($_GET['fibonacci'])) {
    $n = intval($_GET['fibonacci']);

    $start = microtime(true);
    $fibIterative = fibonacciIterative($n);
    $iterativeTime = microtime(true) - $start;

    $start = microtime(true);
    $fibRecursive = fibonacciRecursive($n);
    $recursiveTime = microtime(true) - $start;

    $faster = $iterativeTime < $recursiveTime ? "iteracyjna" : "rekurencyjna";
    $difference = abs($iterativeTime - $recursiveTime);
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Fibonacci</title>
</head>
<body>
    <h1>Obliczanie Fibonacciego</h1>
    <form action="" method="GET">
        <input type="number" name="fibonacci" min="0" required>
        <input type="submit" value="Oblicz">
    </form>
    <?php
    if (isset($n)) {
        echo "<p>Wartość Fibonacciego (iteracyjnie): $fibIterative</p>";
        echo "<p>Wartość Fibonacciego (rekurencyjnie): $fibRecursive</p>";
        echo "<p>Funkcja szybsza: $faster</p>";
        echo "<p>Różnica czasu: $difference sekund</p>";
    }
    ?>
</body>
</html>
