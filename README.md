# Exercice 1 : a-propos.php

Auteure : Claire Naudin, formation CDA 2026-2027

## Objectif

Déplacer les variables de la page `a-propos.php` dans une fonction `aPropos()`
de `inc/fonctions.php`, puis les récupérer avec la déstructuration.

## Structure

```
.
├── a-propos.php
├── css/
│   ├── global.css
│   └── index.css
├── inc/
│   └── fonctions.php
├── partiel/
│   ├── header.php
│   └── footer.php
└── README.md
```

## Code

### inc/fonctions.php

```php
function aPropos()
{
    $titre = 'A propos de nous';
     $ css = [
        'global.css',
    ];

    return [ $ titre, $css];
}
```

Le `return` renvoie les variables dans un tableau. Sans lui, la fonction
renvoie `null` et les variables n'existent pas dans la page.

### a-propos.php

```php
<?php require_once 'inc/fonctions.php';

[$titre, $css] = aPropos();

require_once 'partiel/header.php';
?>

<h1>A propos</h1>
<p>J'écris ce que je veux</p>

<?php require_once 'partiel/footer.php'; ?>
```

La déstructuration crée `$titre` et `$css` à partir du tableau renvoyé.
`header.php` en a besoin pour le `<title>` et les `<link>` CSS.

## Ordre obligatoire dans a-propos.php

1. `require_once 'inc/fonctions.php';` : la fonction existe
2. `[$titre, $css] = aPropos();` : on récupère les variables
3. `require_once 'partiel/header.php';` : le header les utilise

## Tester

Depuis le dossier qui contient `a-propos.php` :

```bash
php -S localhost:8000
```

Ouvrir `http://localhost:8000/a-propos.php`

## Résultat obtenu

- Titre de l'onglet : « A propos de nous »
- Fond beige (`global.css` chargé)
- Aucun warning dans le terminal
- Requêtes serveur : `GET /a-propos.php [200]` et `GET /css/global.css [200]`

Le `404` sur `/.well-known/appspecific/com.chrome.devtools.json` vient de
Chrome DevTools : il est normal et sans conséquence.

## Erreurs rencontrées et corrigées

Premier test : fond blanc, pas de titre d'onglet, et ces warnings :

```
Undefined variable $titre   (header.php ligne 6)
Undefined variable $css     (header.php ligne 8)
foreach() argument must be of type array|object, null given
```

| Cause                                   | Correction                                 |
| --------------------------------------- | ------------------------------------------ |
| `aPropos()` sans `return`               | Ajout de `return [$titre, $css];`          |
| Appel `aPropos();` sans déstructuration | Remplacé par `[$titre, $css] = aPropos();` |

## Ce que j'ai appris

- Une variable créée dans une fonction n'existe plus après elle : il faut `return`.
- La déstructuration `[$a, $b] = fonction();` crée des variables à partir d'un tableau.
- L'ordre des `require_once` et de l'appel de fonction compte : le header a besoin des variables avant d'être chargé.
- Les warnings du terminal PHP permettent de localiser l'erreur (fichier et ligne).

## Statut

Exercice terminé et validé.
