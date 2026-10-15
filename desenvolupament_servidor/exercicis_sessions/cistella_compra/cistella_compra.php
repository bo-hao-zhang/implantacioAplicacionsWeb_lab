<?php
session_start();

if (!isset($_SESSION['cistella'])) {
    $_SESSION['cistella'] = [
        'teclat' => 0,
        'ratoli' => 0
    ];
}

$producte = $_POST['producte'] ?? '';
$quantitat = (int)($_POST['quantitat'] ?? 0);

if ($quantitat > 0 && isset($_SESSION['cistella'][$producte])) {
    $_SESSION['cistella'][$producte] += $quantitat;
}

header("Location: index.html");
exit();
