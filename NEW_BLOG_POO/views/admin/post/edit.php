
<h1>Modifier <?= $params['post']->title ?></h1>

<form action="http://localhost/NEW_BLOG_POO/admin/posts/edit/<?= $params['post']->id ?>" method="POST">
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $params['post']->title?>">
    </div>
    <div class="form-group">
        <label for="content">Contenu de l'article</label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control"><?= $params['post']->content ?></textarea>
    </div>
    <div class="form-group">
        <label for="tags">Tags</label>
        <select multiple class="form-control" id="tags" name="tags[]">
            <?php foreach($params['tags'] as $tag) : ?>
                <option value="<?= $tag->id ?>"
                    <?php foreach($params['post']->getTags() as $postTag)
                        echo ($tag->id === $postTag->id) ? 'selected' : "";
                    ?>
                ><?= $tag->name ?></option>
            <?php endforeach ?>
        </select>
    </div>




<button type="submit" class="btn btn-info">Modifier</button>




</form>