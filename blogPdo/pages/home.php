<br><br><br>
<ul>
   <?php foreach($db->select('SELECT * FROM articles', 'App\Table\Article') as $post): ?> 

            <h2><a href="<?= $post->getUrl() ?>"><?= $post->titre; ?></a></h2>
            <p><?= $post->getExtrait() ?></p>


    <?php endforeach ?>
</ul>
 




 

