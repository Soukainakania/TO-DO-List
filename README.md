# TO-DO-List

Description
-----------
Une petite application web de type "To-Do List" (PHP + MySQL) pour ajouter, marquer comme faite et supprimer des tâches. L'interface utilise Bootstrap pour la mise en page et un style personnalisé dans `style.css`. Le fichier principal est `index.php`.

Prérequis
---------
- PHP (version 7.0+ recommandée)
- MySQL / MariaDB
- Un serveur local comme XAMPP, WAMP ou LAMP

Installation et exécution
------------------------
1. Placez le dossier du projet dans le répertoire `htdocs` de XAMPP (ou équivalent).
2. Importez la base de données (création d'une table simple `todo`). Exemple SQL :

```sql
CREATE DATABASE IF NOT EXISTS todolist;
USE todolist;

CREATE TABLE IF NOT EXISTS todo (
	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(255) NOT NULL,
	done TINYINT(1) DEFAULT 0,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

3. Vérifiez et, si nécessaire, adaptez les identifiants de connexion à la base de données dans `index.php` (constantes `DB_USER`, `DB_PASS`, `DB_NAME`, `DB_HOST`).
4. Ouvrez le navigateur à l'adresse `http://localhost/TO-DO-List/index.php` (ou le chemin correspondant).

Structure du projet
-------------------
- `index.php` — point d'entrée : logique PHP (connexion DB, gestion des actions) + HTML + JavaScript pour les interactions.
- `style.css` — styles personnalisés et animations.
- `vid_Projet/` — (dossier présent dans le projet, contenu non listé ici).

Vidéo de présentation
---------------------
Une courte vidéo de démonstration est fournie dans `vid_Projet/` :

- `vid_Projet/vid44.mp4`

Comment la lire :

1. Localement (sur ta machine) : ouvre le fichier avec ton lecteur vidéo favori (VLC, Lecteur Windows, etc.).
2. Depuis le navigateur (si tu veux la lire via le navigateur) : place le projet dans `htdocs` et ouvre `file:///` vers le chemin complet du fichier ou crée une page HTML qui embed la vidéo :

```html
<!-- Exemple d'embed simple (fichier local) -->
<video controls width="640">
	<source src="vid_Projet/vid44.mp4" type="video/mp4">
	Votre navigateur ne supporte pas la balise vidéo.
</video>
```

Remarques :
- GitHub ne prend pas en charge la lecture directe de fichiers binaires locaux dans le viewer du dépôt — pour partager la vidéo en ligne il faut l'héberger (YouTube, Vimeo, ou un stockage cloud) et mettre ensuite le lien dans le README.
- Si tu veux, je peux :
	- compresser la vidéo (réduction de taille),
	- déplacer/renommer le fichier, ou
	- générer une page `demo.html` qui intègre la vidéo et un petit lecteur.

Explication rapide des fonctionnalités
------------------------------------
- Ajouter une tâche : formulaire POST avec `action=new` et champ `title`.
- Supprimer une tâche : bouton POST avec `action=delete` et l'id.
- Marquer comme faite / non faite : bouton POST avec `action=toggle` et l'id.
- L'application recharge la page après chaque action (redirection vers `index.php`).

Notes et améliorations possibles
-------------------------------
- Sécurité : le code actuelle insère les valeurs directement dans les requêtes SQL (risque d'injection SQL). Il est conseillé d'utiliser des requêtes préparées (prepared statements) ou d'échapper correctement les entrées.
- Correction JS : le script de confettis contient une interpolation qui semble incorrecte et peut produire une erreur JavaScript — voir l'explication détaillée dans la section "Explication détaillée du code" ci-dessous.

Licence
-------
À adapter selon votre choix (MIT, GPL, etc.).

