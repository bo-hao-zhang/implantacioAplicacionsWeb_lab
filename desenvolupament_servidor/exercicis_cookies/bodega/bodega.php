<?php
/*
 * Exercici 2: Bodega
 * Fitxer: bodega.php
 */

// Opcio per reiniciar cookies
if (isset($_GET['reiniciar'])) {
    setcookie("majoredat", "", time() - 3600, "/");
    setcookie("idioma", "", time() - 3600, "/");
    setcookie("moneda", "", time() - 3600, "/");
    header("Location: bodega.php");
    exit();
}

// Processar formulari
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $majoredat = $_POST['majoredat'] ?? '';
    $idioma = $_POST['idioma'] ?? '';
    $moneda = $_POST['moneda'] ?? '';

    // Guardem les tres cookies abans de qualsevol sortida HTML
    setcookie("majoredat", $majoredat, time() + (3600 * 24 * 30), "/");
    setcookie("idioma", $idioma, time() + (3600 * 24 * 30), "/");
    setcookie("moneda", $moneda, time() + (3600 * 24 * 30), "/");

    header("Location: informacio.php");
    exit();
}

$teCookies = isset($_COOKIE['majoredat']) && isset($_COOKIE['idioma']) && isset($_COOKIE['moneda']);
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Exercici 2 - Bodega</title>
</head>
<body>
    <h1>Configuracio de la Bodega</h1>

    <?php if ($teCookies): ?>
        <p><a href="informacio.php">Anar a la pagina d'informacio</a></p>
    <?php endif; ?>

    <form action="bodega.php" method="POST">
        <p>Ets major d'edat?</p>
        <input type="radio" id="major_si" name="majoredat" value="si" required <?php if (isset($_COOKIE['majoredat']) && $_COOKIE['majoredat'] === 'si') echo 'checked'; ?>>
        <label for="major_si">Si</label>
        <br>
        <input type="radio" id="major_no" name="majoredat" value="no" required <?php if (isset($_COOKIE['majoredat']) && $_COOKIE['majoredat'] === 'no') echo 'checked'; ?>>
        <label for="major_no">No</label>
        <br><br>

        <label for="idioma">Idioma:</label>
        <select name="idioma" id="idioma" required>
            <option value="">-- Selecciona un idioma --</option>
            <option value="catala" <?php if (isset($_COOKIE['idioma']) && $_COOKIE['idioma'] === 'catala') echo 'selected'; ?>>Catala</option>
            <option value="espanyol" <?php if (isset($_COOKIE['idioma']) && $_COOKIE['idioma'] === 'espanyol') echo 'selected'; ?>>Espanyol</option>
            <option value="angles" <?php if (isset($_COOKIE['idioma']) && $_COOKIE['idioma'] === 'angles') echo 'selected'; ?>>Angles</option>
        </select>
        <br><br>

        <label for="moneda">Moneda:</label>
        <select name="moneda" id="moneda" required>
            <option value="">-- Selecciona una moneda --</option>
            <option value="euro" <?php if (isset($_COOKIE['moneda']) && $_COOKIE['moneda'] === 'euro') echo 'selected'; ?>>Euros</option>
            <option value="lliura" <?php if (isset($_COOKIE['moneda']) && $_COOKIE['moneda'] === 'lliura') echo 'selected'; ?>>Lliures</option>
            <option value="dolar" <?php if (isset($_COOKIE['moneda']) && $_COOKIE['moneda'] === 'dolar') echo 'selected'; ?>>Dolars</option>
        </select>
        <br><br>

        <input type="submit" value="Enviar">
    </form>

    <?php if ($teCookies): ?>
        <p><a href="bodega.php?reiniciar=1">Esborrar cookies</a></p>
    <?php endif; ?>
</body>
</html>
