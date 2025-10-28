# Classe `Card`

**Fichier :** `classes/Card.php`  
**Rôle :** Représente une carte du Tarot de Marseille et fournit un tirage aléatoire.

> C’est un moule : on n’a pas besoin d’instancier un objet, on appelle directement la méthode.

## Constante `ARCANES`

`private const ARCANES` contient la liste complète des 22 arcanes majeurs.  
Chaque numéro (0 à 21) correspond au nom de la carte.

Le mot `private` signifie que seule la classe `Card` peut lire cette liste.  
Le mot `const` indique que cette liste ne changera jamais.

Sémiologie rapide :  
- 0 Le Mat : départ, spontanéité  
- 21 Le Monde : accomplissement, fin de cycle  
Les 22 cartes décrivent un parcours symbolique de la naissance à l’accomplissement.

## Méthode `getRandomArcanes`

`public static function getRandomArcanes(int $n): array`

- `public` : tout le monde peut utiliser cette méthode.  
- `static` : pas besoin de créer un objet, on écrit `Card::getRandomArcanes(5)`.  
- `int $n` : on doit donner un nombre entier entre 3 et 12.  
- `: array` : la méthode promet de renvoyer un tableau.

**Pseudo-code naturel :**  
1. Vérifier que le nombre demandé est bien entre 3 et 12 **paires**.  
2. Utiliser `array_rand()` pour choisir **n noms** au hasard dans la liste.  
3. Si `array_rand` renvoie un seul entier, le mettre dans un tableau.  
4. Extraire les couples [id =&gt; nom] correspondants.  
5. Renvoyer le résultat.  
**Plus tard, chaque nom sera dupliqué pour former les 2 cartes identiques (paires).**

## Exemple d’usage

Dans le terminal :

```bash
php -r "require 'classes/Card.php'; print_r(Card::getRandomArcanes(3));"
```

## Sortie possible

Array
(
    [5] => Le Pape
    [12] => Le Pendu
    [19] => Le Soleil
)