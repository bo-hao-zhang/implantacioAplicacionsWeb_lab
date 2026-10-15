<?php
session_start();

$unitats_teclat = $_SESSION['cistella']['teclat'] ?? 0;
$unitats_ratoli = $_SESSION['cistella']['ratoli'] ?? 0;

$preu_teclat = 30;
$preu_ratoli = 15;

$subtotal_teclat = $unitats_teclat * $preu_teclat;
$subtotal_ratoli = $unitats_ratoli * $preu_ratoli;
$total = $subtotal_teclat + $subtotal_ratoli;
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Resum de la compra</title>
</head>
<body>
    <h1>Resum de la compra</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Producte</th>
                <th>Preu unitari</th>
                <th>Quantitat</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Teclat</td>
                <td>30 EUR</td>
                <td><?php echo $unitats_teclat; ?></td>
                <td><?php echo $subtotal_teclat; ?> EUR</td>
            </tr>
            <tr>
                <td>Ratoli</td>
                <td>15 EUR</td>
                <td><?php echo $unitats_ratoli; ?></td>
                <td><?php echo $subtotal_ratoli; ?> EUR</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total de la compra</th>
                <th><?php echo $total; ?> EUR</th>
            </tr>
        </tfoot>
    </table>

    <br>

    <form action="confirmar.php" method="POST">
        <button type="submit">Confirmar compra</button>
    </form>

    <p><a href="index.html">Seguir comprant</a></p>
</body>
</html>
