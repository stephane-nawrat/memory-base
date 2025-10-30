<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../classes/Player.php';

session_start();

// Récupération du message et type depuis la session (PRG)
$error = $_SESSION['error'] ?? '';
$error_type = $_SESSION['error_type'] ?? '';
unset($_SESSION['error'], $_SESSION['error_type']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');

    if ($name === '') {
        $_SESSION['error'] = "Tu n'as rien écrit !";
        $_SESSION['error_type'] = 'empty';
        header('Location: player.php');
        exit;
    } elseif (strlen($name) < 3 || strlen($name) > 30) {
        $_SESSION['error'] = "Ton nom doit contenir entre 3 et 30 caractères.";
        $_SESSION['error_type'] = 'length';
        header('Location: player.php');
        exit;
    } else {
        $player = new Player($name, '');
        $_SESSION['player_id']     = $player->getId();
        $_SESSION['player_name']   = $player->getName();
        $_SESSION['player_avatar'] = '';
        header('Location: game.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Memory Base</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/var.css">
    <link rel="stylesheet" href="./assets/css/global.css">
    <link rel="stylesheet" href="./assets/css/player.css">
</head>

<body class="page player">
    <main class="main-player">

        <p class="name-player">Quel est ton nom ?</p>

        <form class="form-player" method="post" action="" novalidate>
            <input
                class="input-player"
                type="text"
                name="name"
                placeholder="Écris ton nom ici…"
                value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
            <button class="btn" type="submit">Commencer</button>
        </form>

        <?php if ($error): ?>
            <p class="error-message <?= htmlspecialchars($error_type) ?>" id="error-message">
                <?= htmlspecialchars($error) ?>
            </p>
        <?php endif; ?>

    </main>

    <script src="./assets/js/errorplayer.js"></script>
</body>

</html>