<?php
require_once 'config/connexion.php';

// AJOUTER UNE TÂCHE (Requête préparée)
if (!empty($_POST['titre'])) {
    $ins = $pdo->prepare("INSERT INTO taches (titre, description, priorite, statut) VALUES (?, ?, ?, 'a_faire')");
    $ins->execute([$_POST['titre'], $_POST['description'], $_POST['priorite']]);
    header("Location: index.php");
    exit();
}

// SUPPRIMER UNE TÂCHE
if (isset($_GET['delete'])) {
    $del = $pdo->prepare("DELETE FROM taches WHERE id = ?");
    $del->execute([$_GET['delete']]);
    header("Location: index.php");
    exit();
}

// AFFICHER (Trié par priorité : Haute -> Moyenne -> Basse)
$query = $pdo->query("SELECT * FROM taches ORDER BY FIELD(priorite, 'haute', 'moyenne', 'basse') ASC, date_creation DESC");
$taches = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ma Todo App</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>📝 Mes Tâches</h1>

        <form method="POST" id="task-form">
            <input type="text" name="titre" id="titre" placeholder="Titre de la tâche (obligatoire)">
            <textarea name="description" placeholder="Description"></textarea>
            <select name="priorite">
                <option value="basse">Priorité : Basse</option>
                <option value="moyenne" selected>Priorité : Moyenne</option>
                <option value="haute">Priorité : Haute</option>
            </select>
            <button type="submit">Ajouter</button>
        </form>

        <div class="filters">
            <label>Filtrer par statut : </label>
            <select id="filter-select">
                <option value="toutes">Toutes</option>
                <option value="a_faire">À faire</option>
                <option value="termine">Terminées</option>
            </select>
        </div>

        <div class="list">
            <?php foreach ($taches as $t): ?>
                <div class="task-item priority-<?= $t['priorite'] ?>" data-statut="<?= $t['statut'] ?>">
                    <div class="content">
                        <strong><?= htmlspecialchars($t['titre']) ?></strong>
                        <p><?= htmlspecialchars($t['description']) ?></p>
                    </div>
                    <a href="index.php?delete=<?= $t['id'] ?>" class="btn-delete" onclick="return confirm('Supprimer ?')">X</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>