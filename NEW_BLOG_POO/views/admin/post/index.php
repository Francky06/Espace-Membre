<h1>Admin</h1>


<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Publié le</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($params['posts'] as $post): ?>
            <tr>
                <th scope="row"><?= $post->id ?></th>
                <td><?= $post->title ?></td>
                <td><?= $post->getCreated_at() ?></td>
                <td>
                    <a href="../admin/posts/edit/<?= $post->id ?>" class="btn btn-warning">Modifier</a>
                    <form action="../admin/posts/delete/<?= $post->id ?>" method="POST" class="d-inline">
                        <button type="submit" class="btn btn-danger">Supprimer</button> 
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>