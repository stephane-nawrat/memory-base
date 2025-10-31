<?php
// classes/Score.php
// Fin de partie : temps + coups + score

class Score
{
    private int $moves = 0;      // nombre de coups
    private float $startTime;    // temps de début (microsecondes)
    private ?float $endTime = null; // temps de fin (microsecondes)

    public function __construct()
    {
        $this->startTime = microtime(true); // temps Unix en secondes avec microsecondes
    }

    /**
     * J’incrémente un coup
     */
    public function incrementMove(): void
    {
        $this->moves++;
    }

    /**
     * Je termine la partie et je calcule le temps écoulé
     */
    public function endGame(): void
    {
        $this->endTime = microtime(true);
    }

    /**
     * Je renvoie le nombre de coups
     */
    public function getMoves(): int
    {
        return $this->moves;
    }

    /**
     * Je renvoie le temps écoulé en secondes (0 si pas terminé)
     */
    public function getDuration(): float
    {
        if ($this->endTime === null) {
            return 0.0;
        }
        return $this->endTime - $this->startTime;
    }

    /**
     * Je stocke le score en session
     * @param int $playerId ID du joueur
     * @param int $pairCount nombre de paires
     */
    public function storeInSession(int $playerId, int $pairCount): void
    {
        $_SESSION['score_moves'] = $this->moves;
        $_SESSION['score_duration'] = $this->getDuration();
        $_SESSION['score_pair_count'] = $pairCount;
    }
}
