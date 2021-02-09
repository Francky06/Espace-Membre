
<h1>Les derniers articles</h1>

<?php foreach($params['posts'] as $post): ?>
    <div class="card">
        <div class="card-body">
            <h2><?= $post->title ?></h2>
                <div>
                    <?php foreach($post->getTags() as $tag): ?>
                        <span class="badge badge-info"> <a href="./tags/<?= $tag->id ?>" class="text-white"><?= $tag->name ?></a></span>
                    <?php endforeach ?>
                </div>
            <small class="text-info">Publié le <?= $post->getCreated_at() ?></small>
            <div class="card-text">
                <p><?= $post->getExcerpt() ?></p>
                <?= $post->getButton() ?>
            </div>
        </div>
</div>
<?php endforeach ?>

