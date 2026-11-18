# Exercice 1 : a-propos.php

Exercice d'entraînement sur l'organisation du code PHP : une fonction par page, déstructuration, header et footer communs.

## Objectif

Déplacer les variables de `a-propos.php` dans une fonction `aPropos()` située dans `inc/fonctions.php`.

## Structure

```

minisite/
├── a-propos.php
├── index.php
├── css/
│ └── global.css
├── inc/
│ └── fonctions.php
└── partiel/
├── header.php
└── footer.php

```

## Fonctionnement

1. `inc/fonctions.php` contient la fonction `aPropos()`, qui renvoie `$titre` et `$css` dans un tableau.
2. `a-propos.php` charge ce fichier, appelle la fonction avec la déstructuration, puis charge le header :

```php
require_once 'inc/fonctions.php';
[$titre, $css] = aPropos();
require_once 'partiel/header.php';
```

L'ordre est important : fonctions, appel, header.

## Lancer le projet

Depuis le dossier `minisite` :

```
php -S localhost:8000
```

Puis ouvrir `http://localhost:8000/a-propos.php`.

## Résultat attendu

- Le titre de l'onglet est « A propos de nous ».
- Le style `global.css` est appliqué.
- Aucune erreur PHP.

```

```
