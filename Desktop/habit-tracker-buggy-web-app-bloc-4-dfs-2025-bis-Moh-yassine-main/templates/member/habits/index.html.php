<?php $layout = 'base.html.php'; ?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Mes habitudes</h1>
        <a href="/habits/create" class="btn btn-primary">Ajouter une habitude</a>
    </div>

    <?php if (!empty($habits)): ?>
        <div class="row">
            <?php foreach ($habits as $habit): ?>
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($habit->getName()) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($habit->getDescription()) ?></p>

                            <!-- Bouton pour marquer comme fait -->
                            <form action="/habit/toggle" method="post" class="mb-2">
                                <input type="hidden" name="habit_id" value="<?= $habit->getId() ?>">
                                <button type="submit" 
                                        class="btn <?= $habit->isCompletedToday() ? 'btn-success' : 'btn-outline-success' ?> btn-sm">
                                    <?= $habit->isCompletedToday() ? 'Fait ✅' : 'Marquer comme fait' ?>
                                </button>
                            </form>

                            <!-- Progression sur 7 jours -->
                            <p class="mb-1 text-muted">Progression 7 derniers jours :</p>
                            <div class="progress mb-2">
                                <div class="progress-bar" role="progressbar" 
                                     style="width: <?= $habit->getProgress(7) ?>%;" 
                                     aria-valuenow="<?= $habit->getProgress(7) ?>" 
                                     aria-valuemin="0" aria-valuemax="100">
                                    <?= $habit->getProgress(7) ?>%
                                </div>
                            </div>

                            <!-- Optionnel : petite info -->
                            <small class="text-muted">
                                <?= $habit->isCompletedToday() ? 'Habitude faite aujourd’hui' : 'Non faite aujourd’hui' ?>
                            </small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-muted">Vous n’avez encore aucune habitude. <a href="/habits/create">Créez-en une maintenant</a>.</p>
    <?php endif; ?>
</div>
