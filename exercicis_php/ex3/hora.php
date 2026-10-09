<?php
/*
 * ENUNCIAT:
 * Exercici 3. Carpeta "ex3".
 * Crea un script hora.php que et retorni una salutació depenent de l’hora del servidor.
 * Si l’hora està entre les 5h del dematí i les 14h et dirà “Bon dia”, si l’hora està
 * entre les 14h i les 19h et dirà “Bona tarda”, altrament, dirà “Bona nit”.
 * Ha de mostrar també l’hora del servidor.
 *
 * Mètode: GET.
 * Raonament: No hi ha formulari; l'usuari només consulta una pàgina web al servidor.
 */

date_default_timezone_set('Europe/Madrid');

// 'G' retorna l'hora en format 24h (0-23) per avaluar condicions
$hora_num = (int)date('G');
$hora_completa = date('H:i:s');

if ($hora_num >= 5 && $hora_num < 14) {
    $salutacio = "Bon dia";
} elseif ($hora_num >= 14 && $hora_num < 19) {
    $salutacio = "Bona tarda";
} else {
    $salutacio = "Bona nit";
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Exercici 3 - Hora del servidor</title>
</head>
<body>
    <h2>Salutació segons l'hora</h2>
    <p>Hora actual del servidor: <strong><?php echo $hora_completa; ?></strong></p>
    <h1 style="color: navy;"><?php echo $salutacio; ?>!</h1>
</body>
</html>
