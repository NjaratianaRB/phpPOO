<h1>Administration des articles</h1>
<a href="/admin/posts/create" class="btn btn-sucess my-3">Cree un nouvel article</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Publié le</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($params['posts'] as $post): ?>
    <tr>
      <th scope="row"><?=$post->id ?></th>
      <td><?=$post->title ?></td>
      <td><?=$post->getCreatedAt() ?></td>

      <td>
        <a href="/admin/posts/edit/<?= $post->id ?>" class="btn btn-warning">Modifier</a>
        <form action="/admin/posts/delete/<?= $post->id ?>" method="POST" class="d-inline">
          <button type="submit" class="btn btn-danger">Suprimer</button>
        </form>
      </td> 
    </tr>

    <?php endforeach ?>
    
  </tbody>
</table>