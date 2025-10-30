<?php
// public/game.php
// Page plateau : 3 à 12 paires, retournement, victoire

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../classes/Game.php';
require_once __DIR__ . '/../classes/Score.php';

session_start();

// On récupère le nombre de paires depuis la session (on le stockera plus tard)
$pairCount = $_SESSION['pair_count'] ?? 5; // 5 par défaut pour l’instant

// On crée le plateau (on le remplira plus tard)
$game = new Game($pairCount);
$score = new Score();

// On récupère le nom du joueur (on le stockera plus tard)
$playerName = $_SESSION['player_name'] ?? 'Joueur';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Memory Base - Partie</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/var.css">
    <link rel="stylesheet" href="./assets/css/global.css">
    <link rel="stylesheet" href="./assets/css/game.css">
</head>

<body class="page game">
    <main class="main-game">

        <h1 class="game-title">Memory Base</h1>
        <p class="game-subtitle">Retrouve les paires</p>

        <!-- Plateau vide pour l’instant -->
        <section class="game-board">
            <!-- on remplira plus tard -->
        </section>

        <!-- Score vide pour l’instant -->
        <section class="game-score">
            <!-- on remplira plus tard -->
        </section>

    </main>
</body>

</html>