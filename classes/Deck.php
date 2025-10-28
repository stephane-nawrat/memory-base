<?php
// classes/Deck.php
// Crée le tas de cartes (paires + mélange) en NOIR & BLANC

class Deck
{
    // Je stocke les cartes finales ici
    private array $cards = [];

    // Constructeur : je reçois les noms, je crée les paires, je mélange
    public function __construct(array $arcanes)
    {
        // Je parcours chaque arcane reçu
        foreach ($arcanes as $id => $name) {
            // Je construis le nom de fichier image en NB
            $fileName = sprintf('%02dn-%s.jpg', $id, strtolower(str_replace([' ', '\''], ['-', ''], $name)));

            // J’ajoute la PREMIÈRE carte (noir & blanc)
            $this->cards[] = [
                'id'    => $id,
                'name'  => $name,
                'image' => '/assets/img/22arcanes/nb/' . $fileName
            ];

            // J’ajoute la DEUXIÈME carte (jumelle, encore NB)
            $this->cards[] = [
                'id'    => $id,
                'name'  => $name,
                'image' => '/assets/img/22arcanes/nb/' . $fileName
            ];
        }

        // Je mélange le tas pour que l’ordre soit aléatoire
        shuffle($this->cards);
    }

    // Renvoie le tableau final des cartes
    public function getCards(): array
    {
        return $this->cards;
    }
}
