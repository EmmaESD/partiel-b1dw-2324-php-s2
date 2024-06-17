<?php
$connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");
// prepare request(SELECT * FROM posts)
$request = $connectDatabase->prepare("SELECT * FROM post");
// execute request
$request->execute();
// fetch ALL data from table posts
$posts = $request->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach ($posts as $post): ?>

<div class="card column" >
    <div class="infos-match">
        <h2 class="categorie"><?php echo $post['categorie']; ?></h2>
        <h3 class="equipe"><?php echo $post['equipe1']; ?></h3>
        <h3 class="equipe"><?php echo $post['equipe2']; ?></h3>
        <h3 class="groupe"><?php echo $post['groupe']; ?></h3>     
    </div>
    <div class="infos-card">
        <h2 class="date-time"><?php echo $post['date_heure']; ?></h2>
        <h3 class="lieu"><?php echo $post['lieu']; ?></h3>
        <h3 class="prix"><?php echo $post['prix']; ?></h3>
        <h3 class="description"><?php echo $post['description']; ?></h3> 
    </div>          
</div>
<?php endforeach ?>
