<?php
//ex1
$etudiant = [
    'nom' => 'Nouamane',
    'prenom' => 'Azzat',
    'matricule' => '12345'
];
//ex2
foreach ($etudiant as $cle => $valeur) {
    echo "$cle : $valeur</br>";
}
//ex3
$etudiant['note'] = 15;
echo "Nouvelle note de $etudiant[prenom] : $etudiant[note]";
//ex4
$produits = [
    'pomme' => 1.5,
    'banane' => 0.8,
    'orange' => 1.2
];

foreach ($produits as $produit => $prix) {
    echo "$produit : $prix €<br>";
}


$scores = [8, 12, 15, 10, 13];
$somme = array_sum($scores);
$moyenne = $somme / count($scores);
echo "La moyenne des scores est de $moyenne";

$pays = [
    'France' => 67,
    'Allemagne' => 83,
    'Italie' => 60
];

//ex5
arsort($pays); // Trie le tableau par valeur décroissante
foreach ($pays as $pays => $population) {
    echo "$pays : $population millions<br>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $age = $_POST['age'];
    $nom = $_POST['nom'];
    if (is_numeric($age) && $age > 0) {
        echo "Bienvenue, $nom, vous avez $age ans !";
    } else {
        echo "L'âge doit être un nombre positif.";
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $couleur = $_POST['couleur'];
    echo "Votre couleur préférée est : " . $couleur;
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
if (isset($_GET['nombre1']) && isset($_GET['nombre2'])) {
    $nombre1 = $_GET['nombre1'];
    $nombre2 = $_GET['nombre2'];
    $somme = $nombre1 + $nombre2;
    echo "La somme des deux nombres est : " . $somme;
}
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $typeCompte = $_POST['typeCompte'];
    if ($typeCompte === 'admin') {
        echo "Bienvenue, administrateur !";
    } else {
        echo "Bienvenue, utilisateur !";
    }
}
?>