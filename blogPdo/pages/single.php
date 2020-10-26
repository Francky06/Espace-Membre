<br><br><br>
<?php
$post = App\App::getDb()->prepare('SELECT * FROM articles WHERE id = ?', [$_GET['id']], 'App\Table\Article', true);
?>

  <h1><?= $post->titre ?></h1>
  
<?php
  if($post->category_id === 1) {
    $post->category_id = 'Piscine';
  } else {
    $post->category_id = 'Longboard';
  }
?>
<h3><em><?= $post->category_id ?></em></h3>
<h5><?= $post->contenu ?></h5>
