<h1><?= $params['post']->title?></h1>
<div>
                <?php foreach ($params['post']->getTags() as $tag): ?>

                <span class="badge rounded-pill text-bg-secondary"><?= $tag->name?> </span>  

                <?php endforeach ?>

            </div>

<p><?= $params['post']->content?></p>
<a href="/lists" class="btn-btn-secondary">Retour en arrière</a>