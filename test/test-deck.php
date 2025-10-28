<?php
// test/test-deck.php
require_once __DIR__ . '/../config/config.php';   // autoloader simple
require_once __DIR__ . '/../classes/Card.php';
require_once __DIR__ . '/../classes/Deck.php';

// 1. Je tire 3 noms d’arcanes
$arcanes = Card::getRandomArcanes(3);

// 2. Je crée le deck (paires + mélange)
$deck = new Deck($arcanes);

// 3. J’affiche les cartes finalisées
$cards = $deck->getCards();

echo "Deck créé : " . count($cards) . " cartes (3 paires en NB)\n\n";
foreach ($cards as $index => $card) {
    echo "Carte $index : {$card['name']} (id {$card['id']}) → {$card['image']}\n";
}
