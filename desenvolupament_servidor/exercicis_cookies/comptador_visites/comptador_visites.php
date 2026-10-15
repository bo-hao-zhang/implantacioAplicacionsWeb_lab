<?php
/*
 * Exercici 1: Comptador de visites
 * Fitxer: comptador_visites.php
 */

// Opcio per reiniciar les cookies durant les proves
if (isset($_GET['reiniciar'])) {
    setcookie("contador", "", time() - 3600, "/");
    setcookie("ha_comprat_descompte", "", time() - 3600, "/");
    header("Location: comptador_visites.php");
    exit();
}

// 1. Gestio del comptador de visites
if (isset($_COOKIE['contador'])) {
    $contador = (int)$_COOKIE['contador'] + 1;
} else {
    $contador = 1;
}

// Guardar la cookie actualitzada abans de qualsevol sortida HTML
setcookie("contador", $contador, time() + (3600 * 24 * 30), "/");

// 2. Comprovar si ja ha fet una compra amb descompte
$haCompratAmbDescompte = false;
if (isset($_COOKIE['ha_comprat_descompte']) && $_COOKIE['ha_comprat_descompte'] === "si") {
    $haCompratAmbDescompte = true;
}

// 3. Processar la compra
$missatgeCompra = "";
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['boto_compra'])) {
    $codi = strtoupper(trim($_POST['codi_descompte'] ?? ''));

    if ($codi === "BOTIGA20") {
        $missatgeCompra = "Compra realitzada amb un 20% de descompte aplicat.";
        setcookie("ha_comprat_descompte", "si", time() + (3600 * 24 * 30), "/");
        $haCompratAmbDescompte = true;
    } elseif ($codi === "BOTIGA50") {
        $missatgeCompra = "Compra realitzada amb un 50% de descompte aplicat.";
        setcookie("ha_comprat_descompte", "si", time() + (3600 * 24 * 30), "/");
        $haCompratAmbDescompte = true;
    } elseif (!empty($codi)) {
        $missatgeCompra = "El codi introduit no es valid. Compra realitzada sense descompte.";
    } else {
        $missatgeCompra = "Compra realitzada sense descompte.";
    }
}

// 4. Missatges d'oferta segons el numero de visites
$missatgeOferta = "";
if ($contador >= 10) {
    if (!$haCompratAmbDescompte) {
        $missatgeOferta = "Oferta exclusiva sols per a tu! Utilitza el codi BOTIGA50 per obtenir un 50% de descompte en les teves primeres compres a la botiga";
    }
} elseif ($contador >= 5) {
    $missatgeOferta = "Oferta exclusiva! Utilitza el codi BOTIGA20 per obtenir un 20% de descompte en les teves primeres compres a la botiga";
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Exercici 1 - Comptador de visites</title>
</head>
<body>
    <h1>Comptador de visites</h1>

    <p>Numero de visites: <?php echo $contador; ?></p>

    <?php if (!empty($missatgeOferta)): ?>
        <p><strong><?php echo $missatgeOferta; ?></strong></p>
    <?php endif; ?>

    <?php if (!empty($missatgeCompra)): ?>
        <p><?php echo $missatgeCompra; ?></p>
    <?php endif; ?>

    <form action="comptador_visites.php" method="POST">
        <label for="codi_descompte">Codi de descompte:</label>
        <input type="text" id="codi_descompte" name="codi_descompte">
        <input type="submit" name="boto_compra" value="Comprar">
    </form>

    <p><a href="comptador_visites.php?reiniciar=1">Reiniciar visites</a></p>
</body>
</html>
