<?php
// classes/Game.php
// Logique du plateau : 3 à 12 paires, retournement, victoire

class Game
{
    private array $cards = [];     // 44 cartes (paires)
    private int $pairsFound = 0;   // paires trouvées

    /**
     * Je reçois le nombre de paires (3 à 12) et je prépare le plateau
     * @param int $pairCount nombre de paires (3 ≤ x ≤ 12)
     * @throws InvalidArgumentException si pas entre 3 et 12
     */
    public function __construct(int $pairCount)
    {
        if ($pairCount < 3 || $pairCount > 12) {
            throw new InvalidArgumentException('3 à 12 paires uniquement.');
        }
        // on remplira plus tard
    }

    /**
     * Je renvoie le tableau des cartes (vide pour l’instant)
     * @return array [id => nom]
     */
    public function getCards(): array
    {
        return $this->cards;
    }

    /**
     * Je dis si la partie est gagnée
     * @return bool true si toutes les paires sont trouvées
     */
    public function isWon(): bool
    {
        return $this->pairsFound === count($this->cards) / 2;
    }
}
