<h1>Modifier "<?= $params['post']->title  ?>"</h1>

<form action="/admin/posts/edit/<?= $params['post']->id ?>" method="POST">
    <div class="form-group">
        <label for="title">Titre de l'article</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $params['post']->title ?>">
    </div>
    <div class="form-group">
        <label for="content">Contenu de l'article</label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control"><?= $params['post']->content ?></textarea>
    </div>

    <label for="Tags">Les tags de l'article :</label>
<select class="form-select" multiple aria-label="Tags" name="tags[]">
    <?php foreach ($params['tags'] as $tag): ?>
        <option value="<?= $tag->id ?>"
            <?php
            $postTags = $params['post']->getTags();
            foreach ($postTags as $postTag) {
                echo ($tag->id == $postTag->id) ? 'selected' : '';
            }
            ?>
        ><?= $tag->name ?></option>
    <?php endforeach ?>
</select>


    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
</form>