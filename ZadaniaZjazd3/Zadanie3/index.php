<?php
function manageDirectory($path, $directory, $operation = 'read') {
    if (substr($path, -1) !== '/') {
        $path .= '/';
    }

    $fullPath = $path . $directory;

    switch ($operation) {
        case 'read':
            if (file_exists($fullPath) && is_dir($fullPath)) {
                $files = scandir($fullPath);
                echo "Zawartość katalogu '$directory':\n";
                foreach ($files as $file) {
                    if ($file !== "." && $file !== "..") {
                        echo $file . "\n";
                    }
                }
            } else {
                echo "Katalog '$directory' nie istnieje.\n";
            }
            break;
        case 'delete':
            if (file_exists($fullPath) && is_dir($fullPath)) {
                $files = scandir($fullPath);
                if (count($files) > 2) {
                    echo "Katalog '$directory' nie jest pusty.\n";
                } else {
                    rmdir($fullPath);
                    echo "Katalog '$directory' został usunięty.\n";
                }
            } else {
                echo "Katalog '$directory' nie istnieje.\n";
            }
            break;
        case 'create':
            if (!file_exists($fullPath)) {
                mkdir($fullPath, 0777, true);
                echo "Katalog '$directory' został utworzony.\n";
            } else {
                echo "Katalog '$directory' już istnieje.\n";
            }
            break;
        default:
            echo "Nieznana operacja.\n";
    }
}

if ($argc > 3) {
    $path = $argv[1];
    $directory = $argv[2];
    $operation = $argv[3];
    manageDirectory($path, $directory, $operation);
} else {
    echo "Za mało argumentów. Użycie: php manageDirectories.php [ścieżka] [nazwa katalogu] [operacja]\n";
}
?>
