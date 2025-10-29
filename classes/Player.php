<?php
// classes/Player.php
// Je gère le profil du joueur : pseudo, avatar, base, session

class Player
{
    // Je stocke l’identifiant du joueur (numéro dans la base)
    private int $id;
    // Je stocke son pseudo (nom affiché partout)
    private string $name;
    // Je stocke son avatar (emoji ou nom de fichier)
    private string $avatar;

    // Constructeur : je reçois un pseudo et un avatar, je trouve ou je crée le joueur
    public function __construct(string $name, string $avatar)
    {
        // Je nettoie le pseudo : j’enlève les espaces avant et après
        $name = trim($name);
        // Je nettoie l’avatar : j’enlève les espaces avant et après
        $avatar = trim($avatar);

        // Je regarde si le pseudo est vide après le nettoyage
        if ($name === '') {
            // Si c’est vide, je lève une erreur claire
            throw new InvalidArgumentException('Le pseudo ne peut pas être vide.');
        }

        // Je me connecte à la base de données (déjà prêt dans config.php)
        global $pdo;

        // Je cherche si un joueur porte déjà ce pseudo
        $stmt = $pdo->prepare('SELECT id, name, avatar FROM players WHERE name = :name');
        $stmt->execute(['name' => $name]);
        $row = $stmt->fetch();

        // Si je ne trouve personne, j’insère le nouveau joueur
        if (!$row) {
            $stmt = $pdo->prepare('INSERT INTO players (name, avatar) VALUES (:name, :avatar)');
            $stmt->execute([
                'name'   => $name,
                'avatar' => $avatar
            ]);
            // Je récupère l’identifiant fraîchement créé
            $this->id      = (int) $pdo->lastInsertId();
            $this->name    = $name;
            $this->avatar  = $avatar;
        } else {
            // Sinon, j’utilise l’existants
            $this->id      = (int) $row['id'];
            $this->name    = $row['name'];
            $this->avatar  = $row['avatar'];
        }
    }

    // Renvoie l’identifiant du joueur
    public function getId(): int
    {
        return $this->id;
    }

    // Renvoie le pseudo
    public function getName(): string
    {
        return $this->name;
    }

    // Renvoie l’avatar
    public function getAvatar(): string
    {
        return $this->avatar;
    }
}
