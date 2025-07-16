<?php
$file = 'attendance.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $zhauap = trim($_POST['zhauap']);

    // Combine fields into a single tab-separated line
    $data = "$name\t$zhauap\n";

    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
        echo "Success";
    } else {
        http_response_code(500);
        echo "Failed to write to file.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (file_exists($file)) {
        header('Content-Type: text/plain; charset=UTF-8');
        header('Content-Disposition: inline; filename="attendance.txt"');
        readfile($file);
    } else {
        http_response_code(404);
        echo "File not found.";
    }
} else {
    http_response_code(405);
    echo "Method not allowed";
}
?>