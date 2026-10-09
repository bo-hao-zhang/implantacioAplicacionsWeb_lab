<?php
/*
 * ENUNCIAT:
 * Exercici 1. Carpeta "ex1".
 * Crea una pàgina web amb un formulari de contacte que et demani en diferents
 * caixes de text el nom, cognoms, email i missatge de contacte. Si s’ha enviat
 * correctament, el servidor retornarà el missatge:
 * "Missatge rebut, $nom. Gràcies per contactar. Et respondrem a $email".
 *
 * Mètode: POST.
 * Raonament: S'envien dades personals i un text llarg. POST viatja al cos de la
 * petició HTTP, no exposa dades a la URL i no té límit estricte de longitud.
 */

// Si s'ha enviat el formulari via POST, processem les dades
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST['nom'] ?? '';
    $cognoms = $_POST['cognoms'] ?? '';
    $email = $_POST['email'] ?? '';
    $missatge = $_POST['missatge'] ?? '';

    echo "Missatge rebut, $nom. Gràcies per contactar. Et respondrem a $email";
} else {
    // Si s'accedeix via GET, mostrem el formulari
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Exercici 1 - Formulari de contacte</title>
</head>
<body>
    <h2>Formulari de contacte</h2>

    <form action="index.php" method="POST">
        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="cognoms">Cognoms:</label><br>
        <input type="text" id="cognoms" name="cognoms" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="missatge">Missatge de contacte:</label><br>
        <textarea id="missatge" name="missatge" rows="4" cols="40" required></textarea><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
<?php
}
?>
