# Classe `Deck`

**Fichier :** `classes/Deck.php`  
**Rôle :** Transforme la liste des arcanes en **tas de cartes prêtes à jouer** (paires + mélange).

&gt; Analogie : c’est le **croupier** qui **double** les cartes, **mélange** le paquet et **pose le plateau**.

## Constructeur `__construct(array $arcanes)`

- Je reçois un tableau `[id =&gt; nom]` (sorti de `Card::getRandomArcanes()`).  
- Pour **chaque nom**, je **crée 2 cartes identiques** (les **paires**).  
- Chaque carte contient :  
  – `id` : numéro 0-21  
  – `name` : nom de l’arcane  
  – `image` : chemin vers **l’arcane noir & blanc** (`nb/`)  
- Je **mélange** le tout pour que l’ordre soit **aléatoire**.  
- Je stocke le résultat dans `$this-&gt;cards`.

## Méthode `getCards()`

Renvoie le **tableau final** des cartes, prêt à être **affiché** sur le plateau.  
Chaque élément est une **carte physique** (on en aura **2 × n** au total).

## Exemple d’usage (CLI)

```bash
php test/test-deck.php