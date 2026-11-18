<?php require_once 'inc/fonctions.php';

// Petit exercice : mettez ces variables dans
// "inc/fonctions.php", dans une fonction "aPropos"
// Appelez la fonction "aPropos" ici.
// Inspirez-vous de index.php
$titre = 'A propos de nous';
$css = [
    'global.css'
];
require_once 'partiel/header.php';
?>

<h1>A propos</h1>
<p>J'écris ce que je veux</p>

<?php require_once 'partiel/footer.php'; ?>