<?php $layout = 'base.html.php'; ?>

<div class="container py-5">
    <h1>Ajouter une nouvelle habitude</h1>

    <form action="/habits/create" method="post" class="mt-4">
        <div class="mb-3">
            <label for="habit_name" class="form-label">Nom de l'habitude</label>
            <input type="text" name="habit[name]" id="habit_name" class="form-control" 
                   value="<?= htmlspecialchars($_POST['habit']['name'] ?? '') ?>">
            <?php if (!empty($errors['name'])): ?>
                <div class="text-danger mt-1"><?= $errors['name'] ?></div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="habit_description" class="form-label">Description</label>
            <textarea name="habit[description]" id="habit_description" class="form-control" rows="3"><?= htmlspecialchars($_POST['habit']['description'] ?? '') ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Créer l’habitude</button>
        <a href="/habits" class="btn btn-outline-secondary">Annuler</a>
    </form>
</div>
