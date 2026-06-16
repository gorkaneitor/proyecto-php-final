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
    <title>Mezua</title>
</head>

<body>
    <h1>Diskoen administrazio gunea</h1>
    <p><a href="..">Hasiera</a> &gt; Mezua ezabatu</p>
    <h3>Mezua ondo ezabatu da.</h3>
</body>

</html>