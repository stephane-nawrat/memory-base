<?php
// public/end.php
// Page fin : score, temps, coups, classement

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../classes/Score.php';

session_start();

// On récupère le score depuis la session (on le stockera plus tard)
$score = $_SESSION['score'] ?? null; // on le stockera plus tard

// On récupère le nom du joueur (on le stockera plus tard)
$playerName = $_SESSION['player_name'] ?? 'Joueur';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Memory Base - Fin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/var.css">
    <link rel="stylesheet" href="./assets/css/global.css">
    <link rel="stylesheet" href="./assets/css/end.css">
</head>

<body class="page end">
    <main class="main-end">

        <h1 class="end-title">Partie terminée</h1>

        <p class="end-subtitle">Bravo <?= htmlspecialchars($playerName) ?> !</p>

        <!-- Score vide pour l’instant -->
        <section class="end-score">
            <!-- on remplira plus tard -->
        </section>

        <!-- Classement vide pour l’instant -->
        <section class="end-leaderboard">
            <!-- on remplira plus tard -->
        </section>

    </main>
</body>

</html>