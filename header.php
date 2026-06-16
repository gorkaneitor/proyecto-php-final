<header>
    <a class="button" href="../hasiera/"><img src="../img/logos/TWENTYONEPILOTS.png" alt="TWENTYONEPILOTS"></a>
    <a class="button" href="../saskia/">SASKIA</a>
</header>
<nav id="menu">
    <?php
    require_once 'klaseak/com/leartik/daw24gone/diskoak/kategoria.php';
    require_once 'klaseak/com/leartik/daw24gone/diskoak/diskoa.php';
    require_once 'klaseak/com/leartik/daw24gone/diskoak/kategoria_db.php';
    require_once 'klaseak/com/leartik/daw24gone/diskoak/diskoa_db.php';

    $kategoriak = \com\leartik\daw24gone\diskoak\KategoriaDB::selectKategoriak();
    if (!$kategoriak) $kategoriak = array();
    ?>
    <ul>
        <li>
            <a class="button" href="../katalogoa/">KATALOGOA</a>
            <ul>
                <?php for ($i = 0; $i < count($kategoriak); $i++) {
                    $menuKategoria = $kategoriak[$i]; ?>
                    <li><a class="button" href="../katalogoa/?id=<?php echo $menuKategoria->getId(); ?>"><?php echo $menuKategoria->getIzena(); ?>ak</a></li>
                <?php } ?>
            </ul>
        </li>
        <li><a class="button" href="../mediateka/">MEDIATEKA</a></li>
        <li><a class="button" href="../mezua/">KONTAKTUA</a></li>
    </ul>
</nav>