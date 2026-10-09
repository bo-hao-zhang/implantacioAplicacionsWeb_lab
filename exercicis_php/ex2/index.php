<?php
/*
 * ENUNCIAT:
 * Exercici 2. Carpeta "ex2".
 * Crea una pàgina web amb un formulari que et demani una quantitat d’euros
 * i et retorna quants dòlars són. Utilitza un valor aproximat per fer la conversió,
 * no cal que busquis les dades reals a una api. Fes el mateix amb la conversió dòlars a euros.
 *
 * Mètode: POST (o GET).
 * Raonament: És una consulta/càlcul matemàtic pur que no modifica dades permanents.
 * S'utilitza POST per mantenir la URL neta i evitar emmagatzematge en memòria cau.
 */

$resultat = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $quantitat = floatval($_POST['quantitat'] ?? 0);
    $tipus = $_POST['tipus'] ?? 'eur_a_usd';
    $taxa = 1.08; // Valor de canvi aproximat: 1 EUR = 1.08 USD

    if ($tipus === 'eur_a_usd') {
        $conversio = $quantitat * $taxa;
        $resultat = "$quantitat € són " . round($conversio, 2) . " $";
    } else {
        $conversio = $quantitat / $taxa;
        $resultat = "$quantitat $ són " . round($conversio, 2) . " €";
    }
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Exercici 2 - Conversor de divises</title>
</head>
<body>
    <h2>Conversor d'Euros i Dòlars</h2>

    <form action="index.php" method="POST">
        <label for="quantitat">Quantitat a convertir:</label><br>
        <input type="number" step="0.01" id="quantitat" name="quantitat" required><br><br>

        <label>Tipus de conversió:</label><br>
        <input type="radio" id="eur_usd" name="tipus" value="eur_a_usd" checked>
        <label for="eur_usd">Euros (€) a Dòlars ($)</label><br>

        <input type="radio" id="usd_eur" name="tipus" value="usd_a_eur">
        <label for="usd_eur">Dòlars ($) a Euros (€)</label><br><br>

        <input type="submit" value="Convertir">
    </form>

    <?php if ($resultat !== ""): ?>
        <hr>
        <h3>Resultat:</h3>
        <p><strong><?php echo $resultat; ?></strong></p>
    <?php endif; ?>
</body>
</html>
