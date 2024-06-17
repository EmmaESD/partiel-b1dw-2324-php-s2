<?php
require_once './header.php';
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);

    try {
        $connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");
        $connectDatabase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $connectDatabase->prepare("SELECT * FROM post WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $card = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($card) { ?>

    <h2>Détails de la carte</h2>
    <h3><?php echo htmlspecialchars($card['equipe1']) . ' vs ' . htmlspecialchars($card['equipe2']); ?></h3>
    <p>Catégorie: <?php echo htmlspecialchars($card['categorie']); ?></p>
    <p>Groupe: <?php echo htmlspecialchars($card['groupe']); ?></p>
    <p>Date et Heure: <?php echo htmlspecialchars($card['date_heure']); ?></p>
    <p>Prix: <?php echo htmlspecialchars($card['prix']); ?></p>
    <p>Lieu: <?php echo htmlspecialchars($card['lieu']); ?></p>
    <p>Description: <?php echo htmlspecialchars($card['description']); ?></p>
</body>
</html>
<?php
        } else {
            echo "Carte non trouvée.";
        }
    } catch (PDOException $e) {
        echo 'Erreur de requête : ' . $e->getMessage();
    }
} else {
    echo "ID non spécifié dans l'URL.";
}
?>