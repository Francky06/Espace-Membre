
<br><br><br><br>
<?php
use App\Table\Article;
use App\Table\Categorie;

$categorie = Categorie::find($_GET['id']);
$article = Article::lastByCategory($_GET['id']);
$categories = Categorie::all();

?>

<h1 style="color: green;"><?= $categorie->titre ?></h1>
<div class="row">

    <div class="col-8">
        <ul>
            <?php foreach($article as $post): ?> 
                <h2><a href="<?= $post->getUrl() ?>"><?= $post->titre; ?></a></h2>
                <p><em><?= $post->categorie; ?></em></p>
                <p><?= $post->getExtrait() ?></p>
            <?php endforeach ?>   
        </ul>
    </div>

    <div class="col-4">
        <ul>    
            <?php foreach(App\Table\Categorie::all() as $categorie): ?> 
                <li><a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></li>
                
            <?php endforeach ?>
        </ul>
    </div>



</div>
