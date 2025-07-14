<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $zhauap = trim($_POST['zhauap']);

    // Combine fields into a single tab-separated line
    $data = "$name\t$zhauap\n";

    $file = 'attendance.txt';
    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
        echo "Success";
    } else {
        http_response_code(500);
        echo "Failed to write to file.";
    }
} else {
    http_response_code(405);
    echo "Method not allowed";
}
?>