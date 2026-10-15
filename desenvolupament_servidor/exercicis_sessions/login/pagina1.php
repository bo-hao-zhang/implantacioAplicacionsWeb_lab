<?php
session_start();

if (!isset($_SESSION['usuari'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Pagina 1</title>
</head>
<body>
    <p>Usuari connectat: <?php echo htmlspecialchars($_SESSION['usuari']); ?></p>
    <hr>
    <h1>Pagina 1 d'informacio</h1>
    <p>Aquesta es la primera pagina de contingut protegit per sessio.</p>
    <p><a href="pagina2.php">Anar a la Pagina 2</a></p>
</body>
</html>
