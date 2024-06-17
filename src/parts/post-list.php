<div class="button-tri">
<?php
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'desc';

switch ($filter) {
    case 'asc':
        $orderBy = "prix ASC";
        break;
    default:
        $orderBy = "prix DESC";
        break;
}

$connectDatabase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");
// prepare request(SELECT * FROM posts)
$request = $connectDatabase->prepare("SELECT * FROM post ORDER BY $orderBy");
// execute request
$request->execute();
// fetch ALL data from table posts
$posts = $request->fetchAll(PDO::FETCH_ASSOC);
?>

<form id="filterForm" method="GET" action="">
    <select name="filter" class="form-select" onchange="submitForm()" aria-label="Order by date">
        <option value="desc" <?= $filter == 'desc' ? "selected" : "" ?>>Prix décroissant</option>
        <option value="asc" <?= $filter == 'asc' ? "selected" : "" ?>>Prix croissant</option>
    </select>
</form>

<script>
    function submitForm() {
        document.getElementById('filterForm').submit();
        console.log('test submit')
    }
</script>
    </div>

<?php foreach ($posts as $post): ?>

<div class="card-row" >
    <div class="card-left">
        <div class="title-card">
            <h1><?php echo $post['equipe1']; ?> vs <?php echo $post['equipe2']; ?></h1>
            <h4 class="date-time"><?php echo $post['date_heure']; ?></h4>
        </div>
        <div class="infos-match">
            <h4 class="categorie">catégorie : <?php echo $post['categorie']; ?></h4>
            <h4 class="groupe">groupe : <?php echo $post['groupe']; ?></h4>     
        </div>
        <div class="infos-card">
            <h3 class="lieu"><?php echo $post['lieu']; ?></h3>
            <h4 class="description"><?php echo $post['description']; ?></h4> 
        </div> 
    </div>
    <div class="card-right">
        <div class="price-container">
        <h3 class="price"><?php echo $post['prix']; ?> €</h3>
        </div>
        <button>Encheres</button>
        <button><a href="./single-post.php?id=<?php echo htmlspecialchars ($post["id"]); ?>">Details</a></button>
    </div>
</div>
<?php endforeach ?>
