<?php
// Tableau associatif contenant les informations des employés
$employes = [
    ['nom' => 'Dupont', 'poste' => 'Développeur', 'salaire' => 3000],
    ['nom' => 'Durand', 'poste' => 'Chef de projet', 'salaire' => 4500],
    ['nom' => 'Martin', 'poste' => 'Designer', 'salaire' => 3500],
    ['nom' => 'Bernard', 'poste' => 'Comptable', 'salaire' => 2800],
    ['nom' => 'Thomas', 'poste' => 'Commercial', 'salaire' => 3200]
];

// Vérification si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération du nom saisi par l'utilisateur
    $nomRecherche = $_POST['nom'];

    // Recherche de l'employé dans le tableau
    $employeTrouve = false;
    foreach ($employes as $employe) {
        if (strtolower($employe['nom']) === strtolower($nomRecherche)) {
            $employeTrouve = $employe;
            break;
        }
    }

    // Affichage des résultats
    if ($employeTrouve) {
        echo "<h2>Informations de l'employé :</h2>";
        echo "<p>Nom : " . $employeTrouve['nom'] . "</p>";
        echo "<p>Poste : " . $employeTrouve['poste'] . "</p>";
        echo "<p>Salaire : " . $employeTrouve['salaire'] . " €</p>";
    } else {
        echo "<p>Aucun employé trouvé avec le nom : " . $nomRecherche . "</p>";
    }
}
?>

<h2>Rechercher un employé</h2>
<form method="post">
    <label for="nom">Nom de l'employé :</label>
    <input type="text" id="nom" name="nom">
    <button type="submit">Rechercher</button>
</form>