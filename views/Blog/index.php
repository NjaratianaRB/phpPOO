<h1>Les derniers Articles</h1>

<?php foreach ($params['posts'] as $post): ?>
    <div class="card mb-3">
        <div class="card-body">
            <h2><?= $post->title?></h2>
            <div>
                <?php foreach ($post->getTags() as $tag): ?>

                <span class="badge rounded-pill text-bg-secondary"><a href="/tags/<?=$tag->id?>" class="text-white"><?= $tag->name?></a> </span>  
                        
                <?php endforeach ?>

            </div>
            <small class="text-info" > Publié le <?= $post->getCreatedAt() ?></small>
            <p><?= $post->getExcerpt()?></p>
            <?= $post->getButtom() ?>
        </div>
    </div>
    
<?php endforeach ?>