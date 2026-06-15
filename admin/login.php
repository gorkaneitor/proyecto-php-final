<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Diskoak</title>
</head>

<body>
    <h1>Administrazio gunea</h1>
    <p><?php echo $mezua ?></p>
    <form action="" method="post">
        <p>
            <label for="erabiltzailea">Erabiltzailea: </label>
            <input type="text" id="erabiltzailea" name="erabiltzailea">
        </p>
        <p>
            <label for="pasahitza">Pasahitza: </label>
            <input type="password" id="pasahitza" name="pasahitza">
        </p>
        <p>
            <input type="submit" name="sartu" value="Sartu">
        </p>
    </form>
</body>

</html>