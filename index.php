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