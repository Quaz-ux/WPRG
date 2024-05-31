<?php
if (!isset($_COOKIE['visited'])) {
    setcookie('visited', true, time() + 10);
    if (isset($_COOKIE['visit_count'])) {
        $visitCount = $_COOKIE['visit_count'] + 1;
    } else {
        $visitCount = 1;
    }
    setcookie('visit_count', $visitCount, time() + 3600 * 24 * 365);
    echo "To Twoja $visitCount wizyta na naszej stronie.";
}
?>
