-- Base: phase01_memorybase
CREATE DATABASE IF NOT EXISTS phase01_memorybase CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE phase01_memorybase;

-- Table des joueurs
CREATE TABLE IF NOT EXISTS players (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    name       VARCHAR(30)  NOT NULL UNIQUE,
    avatar     VARCHAR(50)  NOT NULL,
    created_at DATETIME     DEFAULT CURRENT_TIMESTAMP
);

-- Table des scores
CREATE TABLE IF NOT EXISTS scores (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    player_id  INT          NOT NULL,
    mode       VARCHAR(10)  NOT NULL DEFAULT 'basic',
    pairs      TINYINT      NOT NULL CHECK (pairs BETWEEN 3 AND 12),
    moves      INT          NOT NULL,
    duration   INT          NOT NULL, -- secondes
    created_at DATETIME     DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (player_id) REFERENCES players(id) ON DELETE CASCADE
);