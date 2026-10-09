<?php
/*
 * ENUNCIAT:
 * Exercici 5. Carpeta "ex5".
 * Crea una pàgina web que et demani un preu i puguis escollir el tipus d’iva
 * i et retorni la quantitat amb l’iva.
 *
 * Mètode: POST (o GET).
 * Raonament: S'utilitza POST per enviar dades numèriques de facturació sense
 * alterar la URL i assegurar un càlcul net a cada petició.
 */

$resultat = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $preu = floatval($_POST['preu'] ?? 0);
    $iva = floatval($_POST['iva'] ?? 21);

    // Càlcul de la quota d'IVA i preu total
    $import_iva = $preu * ($iva / 100);
    $preu_total = $preu + $import_iva;

    // Desglossament en array associatiu
    $resultat = [
        'base'        => round($preu, 2),
        'percentatge' => $iva,
        'quota_iva'   => round($import_iva, 2),
        'total'       => round($preu_total, 2)
    ];
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Exercici 5 - Calculadora d'IVA</title>
</head>
<body>
    <h2>Calculadora de preu amb IVA</h2>

    <form action="index.php" method="POST">
        <label for="preu">Preu base sense impostos (€):</label><br>
        <input type="number" step="0.01" id="preu" name="preu" required><br><br>

        <label for="iva">Tipus d'IVA:</label><br>
        <select id="iva" name="iva">
            <option value="21">General (21%)</option>
            <option value="10">Reduït (10%)</option>
            <option value="4">Superreduït (4%)</option>
        </select><br><br>

        <input type="submit" value="Calcular total">
    </form>

    <?php if ($resultat !== null): ?>
        <hr>
        <h3>Desglossament:</h3>
        <ul>
            <li>Preu base: <strong><?php echo $resultat['base']; ?> €</strong></li>
            <li>IVA aplicat (<?php echo $resultat['percentatge']; ?>%): <strong><?php echo $resultat['quota_iva']; ?> €</strong></li>
            <li><strong>Total amb IVA: <?php echo $resultat['total']; ?> €</strong></li>
        </ul>
    <?php endif; ?>
</body>
</html>
