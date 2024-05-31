<?php
$visitCount = 1;
if (isset($_COOKIE['visit_count'])) {
    $visitCount = $_COOKIE['visit_count'] + 1;
}
setcookie('visit_count', $visitCount, time() + 3600 * 24 * 365);

if ($visitCount == 10) {
    echo "Gratulacje, odwiedziłeś nas już 10 razy!";
} else {
    echo "To Twoja $visitCount wizyta na naszej stronie.";
}
?>
