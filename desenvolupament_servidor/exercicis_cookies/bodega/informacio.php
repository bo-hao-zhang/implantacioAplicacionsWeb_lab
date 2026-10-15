<?php
/*
 * Exercici 2: Bodega
 * Fitxer: informacio.php
 */

if (!isset($_COOKIE['majoredat']) || !isset($_COOKIE['idioma']) || !isset($_COOKIE['moneda'])) {
    header("Location: bodega.php");
    exit();
}

$majoredat = $_COOKIE['majoredat'];
$idioma = $_COOKIE['idioma'];
$moneda = $_COOKIE['moneda'];

// Preus segons la moneda
if ($moneda === "lliura") {
    $preu1 = "34 £";
    $preu2 = "21 £";
} elseif ($moneda === "dolar") {
    $preu1 = "42 $";
    $preu2 = "26 $";
} else {
    $preu1 = "39 €";
    $preu2 = "24 €";
}

// Missatges segons idioma
if ($idioma === "espanyol") {
    $titol = "Informacion de la Bodega";
    $missatgeMenor = "No podemos venderte alcohol si eres menor de edad.";
    $producte1 = "Te ofrecemos el vino \"Les Terrasses\" a un precio de " . $preu1;
    $producte2 = "Te ofrecemos el vino \"Marques de Riscal\" a un precio de " . $preu2;
    $textTornar = "Cambiar preferencias";
} elseif ($idioma === "angles") {
    $titol = "Winery Information";
    $missatgeMenor = "We cannot sell you alcohol if you are a minor.";
    $producte1 = "We offer you the wine \"Les Terrasses\" at a price of " . $preu1;
    $producte2 = "We offer you the wine \"Marques de Riscal\" at a price of " . $preu2;
    $textTornar = "Change preferences";
} else {
    // Catala
    $titol = "Informacio de la Bodega";
    $missatgeMenor = "No et podem vendre alcohol si ets menor d'edat.";
    $producte1 = "T'oferim el vi \"Les Terrasses\" a un preu de " . $preu1;
    $producte2 = "T'oferim el vi \"Marques de Riscal\" a un preu de " . $preu2;
    $textTornar = "Canviar preferencies";
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title><?php echo $titol; ?></title>
</head>
<body>
    <h1><?php echo $titol; ?></h1>

    <?php if ($majoredat === "no"): ?>
        <p><?php echo $missatgeMenor; ?></p>
    <?php else: ?>
        <p><?php echo $producte1; ?></p>
        <p><?php echo $producte2; ?></p>
    <?php endif; ?>

    <p><a href="bodega.php"><?php echo $textTornar; ?></a></p>
</body>
</html>
