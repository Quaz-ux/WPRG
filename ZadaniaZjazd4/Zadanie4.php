<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Różne strony dla różnych adresów IP</title>
</head>
<body>
<h2>Zadanie 4: Różne strony dla różnych adresów IP</h2>

<?php
$allowedIPsFile = 'allowed_ips.txt';
$currentIP = $_SERVER['REMOTE_ADDR'];
$allowedIPs = file($allowedIPsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if (in_array($currentIP, $allowedIPs)) {
    include 'allowed_page.php';
} else {
    include 'other_page.php';
}
?>
</body>
</html>
