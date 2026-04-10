<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Todo App</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f4; padding: 20px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; shadow: 0 2px 5px rgba(0,0,0,0.1); }
        form { display: flex; flex-direction: column; gap: 10px; margin-bottom: 30px; }
        input, textarea, select, button { padding: 10px; border: 1px solid #ddd; border-radius: 4px; }
        button { background: #28a745; color: white; border: none; cursor: pointer; }
        button:hover { background: #218838; }
        .task-list { border-top: 2px solid #eee; padding-top: 20px; }
        .task-item { background: #fafafa; padding: 10px; margin-bottom: 10px; border-left: 5px solid #007bff; display: flex; justify-content: space-between; align-items: center; }
        .priority-haute { border-left-color: #dc3545; }
        .priority-moyenne { border-left-color: #ffc107; }
        .priority-basse { border-left-color: #28a745; }
    </style>
</head>
<body>

<div class="container">
    <h1> Ma Liste de Tâches</h1>

    <form action="" method="POST">
        <input type="text" name="titre" placeholder="Titre de la tâche" required>
        <textarea name="description" placeholder="Description (optionnel)"></textarea>
        
        <label for="priorite">Priorité :</label>
        <select name="priorite">
            <option value="basse">Basse</option>
            <option value="moyenne" selected>Moyenne</option>
            <option value="haute">Haute</option>
        </select>

        <label for="date_limite">Date limite :</label>
        <input type="datetime-local" name="date_limite">

        <button type="submit">Ajouter la tâche</button>
    </form>

    <div class="task-list">
        <h2>Tâches à faire</h2>
        
        <div class="task-item priority-haute">
            <div>
                <strong>Réviser le SQL</strong> - <small>Priorité: Haute</small>
                <p>Pratiquer les requêtes INSERT et UPDATE</p>
            </div>
            <div>
                <button style="background: #ffc107;">Modifier</button>
                <button style="background: #dc3545;">Supprimer</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>