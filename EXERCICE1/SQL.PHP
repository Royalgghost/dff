<?php
// Connexion à la base de données
$mysqli = new mysqli('localhost', 'nom_utilisateur', 'mot_de_passe', 'nom_base');

// Vérifier la connexion
if ($mysqli->connect_error) {
    die('Erreur de connexion : ' . $mysqli->connect_error);
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $age = $_POST['age'];

    // Insertion d'un nouvel utilisateur
    $stmt = $mysqli->prepare("INSERT INTO utilisateurs (nom, age) VALUES (?, ?)");
    $stmt->bind_param('si', $nom, $age);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Utilisateur ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout.";
    }
    $stmt->close();
}

// Récupérer les utilisateurs de plus de 25 ans
$result = $mysqli->query("SELECT * FROM utilisateurs WHERE age > 25");

while ($row = $result->fetch_assoc()) {
    echo "Nom : " . $row['nom'] . " - Âge : " . $row['age'] . "<br>";
}

$id = 1; // Identifiant à supprimer
$stmt = $mysqli->prepare("DELETE FROM utilisateurs WHERE id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Utilisateur supprimé avec succès.";
} else {
    echo "Aucun utilisateur trouvé.";
}
$stmt->close();

$id = 1; // Identifiant de l'utilisateur
$nouveau_mot_de_passe = 'nouveauMotDePasse';

$stmt = $mysqli->prepare("UPDATE utilisateurs SET mot_de_passe = ? WHERE id = ?");
$stmt->bind_param('si', password_hash($nouveau_mot_de_passe, PASSWORD_BCRYPT), $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Mot de passe mis à jour avec succès.";
} else {
    echo "Aucune mise à jour effectuée.";
}
$stmt->close();

$result = $mysqli->query("SELECT * FROM utilisateurs ORDER BY nom ASC");

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nom</th><th>Âge</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['nom'] . "</td>";
    echo "<td>" . $row['age'] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>


<!-- Formulaire HTML -->
<form method="POST">
    <label>Nom :</label>
    <input type="text" name="nom" required>
    <label>Âge :</label>
    <input type="number" name="age" required>
    <button type="submit">Ajouter</button>
</form>
