<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>

    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    >
    <link rel="stylesheet" href="style.css">

</head>

<script>
 
  function spawnConfetti(x, y, count=18){
    for(let i=0;i<count;i++){
      const el = document.createElement('div');
      el.className = 'confetti-piece';
      el.style.left = (x + (Math.random()-0.5)*80) + 'px';
      el.style.top  = (y + (Math.random()-0.5)*40) + 'px';
      el.style.background = ['#FFD166','#EF476F','#06D6A0','#118AB2','#FFB4A2'][Math.floor(Math.random()*5)];
      document.body.appendChild(el);

      const dx = (Math.random()-0.5)*600;
      const dy = (Math.random()*600)+100;
      const rot = (Math.random()-0.5)*720;

      el.animate([
        { transform: 'translate(0,0) rotate(0deg)', opacity:1 },
        { transform: translate(${dx}px, ${dy}px) rotate(${rot}deg), opacity:0 }
      ], {
        duration: 800 + Math.random()*700,
        easing: 'cubic-bezier(.2,.6,.2,1)'
      }).onfinish = () => el.remove();
    }
  }

  function showBanner(text='Bravo!'){
    let b = document.querySelector('.celebration-banner');
    if(!b){
      b = document.createElement('div');
      b.className = 'celebration-banner';
      document.body.appendChild(b);
    }
    b.textContent = text;
    b.classList.add('show');
    setTimeout(()=> b.classList.remove('show'), 1400);
  }

  document.addEventListener('DOMContentLoaded', ()=> {
   
    document.querySelectorAll('button[name="action"][value="toggle"]').forEach(btn=>{
      btn.addEventListener('click', function(e){
        
        e.preventDefault();
        const rect = btn.getBoundingClientRect();
        showBanner('Tâche marquée comme faite ✨');
        spawnConfetti(rect.left + rect.width/2, rect.top + rect.height/2, 20);
       
        setTimeout(()=> {
         
          const f = btn.closest('form');
          if(f) f.submit();
        }, 520);
      });
    });
  });
</script>

<body class="container py-4">
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
<?php endforeach;?>
</ul>




</body>
</html>
