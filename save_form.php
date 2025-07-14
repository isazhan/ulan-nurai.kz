<?php
// Get form data
$name = htmlspecialchars($_POST['name']);
$shaqyruid = htmlspecialchars($_POST['shaqyruid']);
$konakid = htmlspecialchars($_POST['konakid']);
$zhauap = htmlspecialchars($_POST['zhauap']);

// Format data
$data = "Name: $name\nShaqyruid: $shaqyruid\nKonakid: $konakid\nZhauap: $zhauap\n---\n";

// Save to file
$file = 'responses.txt';
file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

// Redirect back or show success
echo "Thanks! Your response has been recorded.";
?>