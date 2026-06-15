<?php

if (!isset($_COOKIE['erabiltzailea']) || $_COOKIE['erabiltzailea'] !== 'admin') {
    header('Location: ../index.php');
    exit();
} 

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Diskoen administrazio gunea</title>
</head>

<body>
    <h1>Diskoen administrazio gunea</h1>
    <p><a href="..">Hasiera</a> &gt; Diskoa ezabatu</p>
    <h3>Diskoa ondo ezabatu da.</h3>
</body>

</html>