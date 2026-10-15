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
    <title>Pagina 2</title>
</head>
<body>
    <p>Usuari connectat: <?php echo htmlspecialchars($_SESSION['usuari']); ?> | <a href="logout.php">Desconnectar</a></p>
    <hr>
    <h1>Pagina 2 d'informacio</h1>
    <p>Aquesta es la segona pagina de contingut protegit per sessio.</p>
    <p><a href="pagina1.php">Tornar a la Pagina 1</a></p>
</body>
</html>
