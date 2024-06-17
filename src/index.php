<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style/style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <nav>
        <button><a href="./index.php">Voir les billets</a></button>
        <button><a href="./parts/create-post.php">Ajouter un billet</a></button>
    </nav>
    <div class="post-list">
        <?php require_once './parts/post-list.php'?>
    </div>

    
</body>
</html>