<?php
// config/config.php

require_once __DIR__ . '/bootstrap.php';

// Chemins
define('ROOT', dirname(__DIR__));
define('IMG_ARCANES', '/assets/img/22arcanes/');
define('IMG_BACKCARD', '/assets/img/22arcanes/backcard/bcard-dark.png');

// PDO
try {
    $pdo = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die('❌ Connexion impossible : ' . $e->getMessage());
}
