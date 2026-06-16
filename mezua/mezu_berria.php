<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontaktua - Twenty One Pilots</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mezuak.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../img/logos/top_logo.png">
</head>

<body>
    <?php include '../header.php'; ?>
    <main>
        <h2>Kontaktua</h2>
        <div id="komentarioa">
            <form>
                <p>
                    <label for="izena">Izena:</label>
                    <input type="text" id="izena" name="izena" size="50" maxlength="50">
                </p>
                <p>
                    <label for="email">Email-a:</label>
                    <input type="text" id="email" name="email" size="50" maxlength="50">
                </p>
                <p>
                    <label for="mezua">Mezua:</label>
                    <textarea id="mezua" name="mezua"></textarea>
                </p>
                <p>
                    <input type="button" id="bidali" name="bidali" value="Bidali" onClick="mezuaBidali()">
                </p>
            </form>
        </div>
        </div>
    </main>
    <script src="api.js"></script>
    <?php include '../footer.php'; ?>
</body>

</html>