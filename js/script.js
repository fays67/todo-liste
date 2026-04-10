document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('task-form');
    const inputTitre = document.getElementById('titre');
    const filterSelect = document.getElementById('filter-select');
    const tasks = document.querySelectorAll('.task-item');

    // 1. Vérification Titre Vide
    form.addEventListener('submit', (e) => {
        if (inputTitre.value.trim() === "") {
            e.preventDefault();
            alert("Erreur : Le titre ne peut pas être vide !");
        }
    });

    // 2. Filtre (Toutes / À faire / Terminées)
    filterSelect.addEventListener('change', () => {
        const value = filterSelect.value;
        tasks.forEach(task => {
            if (value === 'toutes' || task.getAttribute('data-statut') === value) {
                task.style.display = 'flex';
            } else {
                task.style.display = 'none';
            }
        });
    });
});