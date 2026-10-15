<?php
session_start();

$usuari = $_POST['usuari'] ?? '';
$pwd = $_POST['pwd'] ?? '';

if ($usuari !== '' && $usuari === $pwd) {
    $_SESSION['usuari'] = $usuari;
    header("Location: pagina1.php");
    exit();
} else {
    header("Location: index.html");
    exit();
}
