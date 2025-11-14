<nav class="navbar navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <span class="navbar-brand">To-Do List</span>
  </div>
</nav>
<form method="post" class="mb-3">
  <input type="hidden" name="action" value="new">
  <div class="input-group">
      <input type="text" name="title" class="form-control" placeholder="Nouvelle tâche" required>
      <button class="btn btn-success">Ajouter</button>
  </div>
</form>
<ul class="list-group">
<?php foreach($taches as $t): ?>
  <li class="list-group-item 
      <?= $t['done'] ? 'list-group-item-success' : 'list-group-item-warning' ?> 
      d-flex justify-content-between align-items-center">

      <?= htmlspecialchars($t['title']) ?>

      <form method="post">
        <input type="hidden" name="id" value="<?= $t['id'] ?>">

        <button name="action" value="toggle" class="btn btn-sm btn-primary">✔</button>
        <button name="action" value="delete" class="btn btn-sm btn-danger">🗑</button>
      </form>
  </li>
<?php endforeach; ?>
</ul>