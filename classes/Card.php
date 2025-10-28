<?php
// classes/Card.php
// Représente une carte du Tarot de Marseille

class Card
{
    // Liste secrète des 22 noms
    private const ARCANES = [
        0  => 'Le Mat',
        1  => 'Le Bateleur',
        2  => 'La Papesse',
        3  => 'L\'Impératrice',
        4  => 'L\'Empereur',
        5  => 'Le Pape',
        6  => 'L\'Amoureux',
        7  => 'Le Chariot',
        8  => 'La Justice',
        9  => 'L\'Hermite',
        10 => 'La Roue de la Fortune',
        11 => 'La Force',
        12 => 'Le Pendu',
        13 => 'L\'Arcane sans nom',
        14 => 'Tempérance',
        15 => 'Le Diable',
        16 => 'La Maison-Dieu',
        17 => 'L\'Étoile',
        18 => 'La Lune',
        19 => 'Le Soleil',
        20 => 'Le Jugement',
        21 => 'Le Monde'
    ];

    /**
     * Retourne n cartes au hasard (sans doublon)
     * @param int $n 3 ≤ n ≤ 12
     * @return array [id => nom]
     * @throws InvalidArgumentException
     */
    public static function getRandomArcanes(int $n): array
    {
        if ($n < 3 || $n > 12) {
            throw new InvalidArgumentException('Le nombre d\'arcanes doit être entre 3 et 12.');
        }

        $keys = array_rand(self::ARCANES, $n);
        if (!is_array($keys)) {
            $keys = [$keys];
        }

        return array_intersect_key(self::ARCANES, array_flip($keys));
    }
}
