# Classe `Player`

**Fichier :** `classes/Player.php`  
**Rôle :** **Crée ou retrouve** un joueur (pseudo + avatar) et **garde ses infos** prêtes à être utilisées.

&gt; Analogie : c’est **le guichet** : si tu as déjà un compte, on te retrouve ; sinon on t’en crée un.

## Constructeur `__construct(string $name, string $avatar)`

- Je reçois un **pseudo** et un **avatar** (emoji ou texte).  
- Je **nettoie** les deux (j’enlève les espaces inutiles).  
- Si le pseudo est **vide**, je **lève une erreur** pour éviter les joueurs fantômes.  
- Je **cherche** dans la table `players` si quelqu’un porte déjà ce pseudo.  
  – **Si pas trouvé** : j’**insère** une nouvelle ligne, je récupère l’**identifiant frais**.  
  – **Si trouvé** : je **réutilise** l’identifiant existant.  
- Je **remplis** les propriétés `$id`, `$name`, `$avatar` de l’objet.

**En arrière-plan :**  
- J’utilise la **connexion PDO** déjà prête dans `config.php`.  
- La **requête SQL** est préparée pour éviter les injections.

## Getters simples

- `getId()` : je renvoie le **numéro** du joueur (clé primaire).  
- `getName()` : je renvoie le **pseudo**.  
- `getAvatar()` : je renvoie l’**avatar** (affichage futur).

## Lien avec la suite du jeu

- **Dans 10 minutes**, le formulaire `public/form-player.php` appellera `new Player($_POST['name'], $_POST['avatar'])`.  
- **Dans 1 heure**, quand la partie se termine, on **insèrera** une ligne dans `scores` avec **l’ID de ce joueur**, son **nombre de paires**, ses **coups** et son **temps**.  
- **Ainsi**, le **classement** pourra afficher **pseudo + avatar** grâce à cette classe.

## Test CLI

```bash
php test/test-player.php