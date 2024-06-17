<?php 

$connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");

$request = $connectDatabase->prepare("INSERT INTO post (equipe1, equipe2, categorie, groupe, date_heure, prix, lieu, description) VALUES (:equipe1, :equipe2, :categorie, :groupe, :date_heure, :prix, :lieu, :description)");

$request->bindParam(':equipe1', $_POST['equipe1']);
$request->bindParam(':equipe2', $_POST['equipe2']);
$request->bindParam(':categorie', $_POST['categorie']);
$request->bindParam(':groupe', $_POST['groupe']);
$request->bindParam(':date_heure', $_POST['date_heure']);
$request->bindParam(':prix', $_POST['prix']);
$request->bindParam(':lieu', $_POST['lieu']);
$request->bindParam(':description', $_POST['description']);


$request->execute();

header('Location: ../index.php?success=Nouveau billet ajouté !');
?>