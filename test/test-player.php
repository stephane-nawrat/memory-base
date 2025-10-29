<?php
// test/test-player.php
// Test autonome : je crée un joueur, j’affiche ses infos, je vérifie la base

require_once __DIR__ . '/../config/config.php';   // PDO + constantes
require_once __DIR__ . '/../classes/Player.php';

echo "=== Test Player ===\n\n";

// Je choisis un pseudo et un avatar
$pseudo = 'Testeur' . rand(100, 999);   // pseudo unique à chaque test
$avatar = '🧪';

try {
    // J’essaie de créer (ou de retrouver) le joueur
    $player = new Player($pseudo, $avatar);

    // J’affiche ce que j’ai récupéré
    echo "  Joueur prêt :\n";
    echo "  ID     : " . $player->getId() . "\n";
    echo "  Pseudo : " . $player->getName() . "\n";
    echo "  Avatar : " . $player->getAvatar() . "\n";
} catch (InvalidArgumentException $e) {
    echo "❌ Erreur : " . $e->getMessage() . "\n";
} catch (PDOException $e) {
    echo "❌ Problème base : " . $e->getMessage() . "\n";
}

echo "\n=== Fin test Player ===\n";
