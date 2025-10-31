<?php
// public/end.php
// Page fin : score, temps, coups, classement

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../classes/Score.php';

session_start();

// On récupère le score depuis la session
$scoreMoves = $_SESSION['score_moves'] ?? 0;
$scoreDuration = $_SESSION['score_duration'] ?? 0.0;
$scorePairCount = $_SESSION['score_pair_count'] ?? 0;
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

        <!-- Score -->
        <section class="end-score">
            <p class="end-score-moves">Coups : <?= htmlspecialchars($scoreMoves) ?></p>
            <p class="end-score-duration">Temps : <?= htmlspecialchars(number_format($scoreDuration, 3)) ?> s</p>
            <p class="end-score-pairs">Paires : <?= htmlspecialchars($scorePairCount) ?></p>
        </section>

        <!-- Classement (on le fera plus tard) -->
        <section class="end-leaderboard">
            <!-- on remplira plus tard -->
        </section>

    </main>
</body>

</html>