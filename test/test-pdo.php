<?php
// test/test-pdo.php
// Chemin vers la config (on remonte d'un niveau)
require_once __DIR__ . '/../config/config.php';

echo "✅ ENV chargé\n";
echo "🔐 DB_NAME : " . DB_NAME . "\n";
echo "🕑 DB_HOST : " . DB_HOST . "\n";

// Test de connexion
try {
    // On ré-utilise la connexion $pdo déjà créée dans config.php
    $stmt = $pdo->query("SELECT 1 as ok");
    $res  = $stmt->fetch();
    echo "✅ Connexion PDO OK (test SELECT 1 = " . $res['ok'] . ")\n";
} catch (PDOException $e) {
    echo "❌ Erreur PDO : " . $e->getMessage() . "\n";
}
