<br><br><br>
<?php
$post = $db->prepare('SELECT * FROM articles WHERE id = ?', [$_GET['id']], 'App\Table\Article', true);
?>

  <h1><?= $post->titre ?></h1>
  <h2><?= $post->contenu ?></h2>
</main>

<?php
