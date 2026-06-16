<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eskaria - Twenty One Pilots</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/eskaria.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../img/logos/top_logo.png">
</head>

<body>
    <?php include '../header.php'; ?>

    <main class="eskaria-main">
        <section class="eskaria-section">
            <h1>Eskaria</h1>
            <p class="eskaria-breadcrumb"><a href="../index.php">Hasiera</a> &gt; Datuak bete</p>

            <div class="form-container">
                <h2>Eskaria amaitzeko, bete zure datuak</h2>
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label>Izena:</label>
                        <input type="text" name="izena" required>
                    </div>

                    <div class="form-group">
                        <label>Abizena:</label>
                        <input type="text" name="abizena" required>
                    </div>

                    <div class="form-group">
                        <label>Helbidea:</label>
                        <input type="text" name="helbidea" required>
                    </div>

                    <div class="form-group">
                        <label>Herria:</label>
                        <input type="text" name="herria" required>
                    </div>

                    <div class="form-group">
                        <label>Posta Kodea:</label>
                        <input type="number" name="posta_kodea" required>
                    </div>

                    <div class="form-group">
                        <label>Emaila:</label>
                        <input type="email" name="email" required>
                    </div>

                    <button type="submit" name="eskaria_gorde" class="form-submit">
                        Eskaria Egin eta Ordaindu
                    </button>
                </form>
            </div>
        </section>
    </main>

    <?php include '../footer.php'; ?>
</body>

</html>