<?php
/*
 * ENUNCIAT:
 * Exercici 4. Carpeta "ex4".
 * Crea una pàgina que faci una enquesta de quin estil de música t’agrada més
 * (posa uns radio buttons amb 4 estils, mínim) i retorna un missatge que tingui
 * a veure amb l’estil de música escollit.
 *
 * Mètode: POST.
 * Raonament: S'utilitza per registrar el vot o resposta de l'usuari sense mostrar
 * dades a la URL ni guardar la resposta a la memòria cau del navegador.
 */

$missatge_musica = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $estil = $_POST['estil'] ?? '';

    switch ($estil) {
        case 'rock':
            $missatge_musica = "🎸 El Rock mai mor! Prepara les guitarres elèctriques i puja el volum.";
            break;
        case 'pop':
            $missatge_musica = "🎤 Un estil molt enganxós i melòdic! Ideal per cantar i ballar.";
            break;
        case 'hiphop':
            $missatge_musica = "🎧 Molt de ritme i pur flow! Rimes urbanes que marquen tendència.";
            break;
        case 'electronica':
            $missatge_musica = "🔊 Posa't els auriculars i gaudeix dels millors sintetitzadors i beats.";
            break;
        case 'jazz':
            $missatge_musica = "🎷 Pura elegància, improvisació i classe per relaxar la ment.";
            break;
        default:
            $missatge_musica = "No has seleccionat cap estil de música vàlid.";
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Exercici 4 - Enquesta musical</title>
</head>
<body>
    <h2>Enquesta: Quin estil de música t'agrada més?</h2>

    <form action="index.php" method="POST">
        <!-- Tots els radio buttons comparteixen el mateix name="estil" per ser excloents -->
        <input type="radio" id="rock" name="estil" value="rock" required>
        <label for="rock">Rock</label><br>

        <input type="radio" id="pop" name="estil" value="pop">
        <label for="pop">Pop</label><br>

        <input type="radio" id="hiphop" name="estil" value="hiphop">
        <label for="hiphop">Hip-Hop</label><br>

        <input type="radio" id="electronica" name="estil" value="electronica">
        <label for="electronica">Electrònica</label><br>

        <input type="radio" id="jazz" name="estil" value="jazz">
        <label for="jazz">Jazz</label><br><br>

        <input type="submit" value="Enviar enquesta">
    </form>

    <?php if ($missatge_musica !== ""): ?>
        <hr>
        <h3>Resultat de la teva tria:</h3>
        <p style="font-size: 1.1em; color: darkblue;">
            <strong><?php echo $missatge_musica; ?></strong>
        </p>
    <?php endif; ?>
</body>
</html>
