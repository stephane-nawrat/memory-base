<?php
// test/test-card.php
// Test autonome de la classe Card (tirage aléatoire)

// Charge l’autoloader minimal (pour PDO plus tard)
require_once __DIR__ . '/../config/config.php';
// Charge la classe à tester
require_once __DIR__ . '/../classes/Card.php';

echo "=== Test Card::getRandomArcanes ===\n\n";

// 1. Test normal : 5 arcanes
try {
    $tirage = Card::getRandomArcanes(5);
    echo "Tirage de " . count($tirage) . " arcanes :\n";
    foreach ($tirage as $id => $nom) {
        echo "  $id : $nom\n";
    }
} catch (Throwable $e) {
    echo "❌ " . $e->getMessage() . "\n";
}

echo "\n";

// 2. Test limite : 3 arcanes (minimum autorisé)
try {
    $mini = Card::getRandomArcanes(3);
    echo "Mini-tirage 3 paires : " . implode(', ', $mini) . "\n";
} catch (Throwable $e) {
    echo "❌ " . $e->getMessage() . "\n";
}

echo "\n";

// 3. Test erreur : 1 arcane (doit échouer)
try {
    Card::getRandomArcanes(1);
    echo "❌ Erreur : 1 arcane a été accepté (pas normal)\n";
} catch (InvalidArgumentException $e) {
    echo "Erreur attendue pour 1 arcane : " . $e->getMessage() . "\n";
}

echo "\n=== Fin du test Card ===\n";
