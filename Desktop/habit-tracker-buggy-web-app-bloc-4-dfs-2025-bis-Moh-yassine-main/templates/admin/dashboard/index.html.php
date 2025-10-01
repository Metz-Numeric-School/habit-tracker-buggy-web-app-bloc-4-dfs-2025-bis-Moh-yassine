<?php $layout = 'admin/base.html.php'; ?>

<div class="container py-5">
    <h1 class="mb-4">Dashboard Admin</h1>

    <!-- Statistiques globales anonymes -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total utilisateurs</h5>
                    <p class="card-text display-6"><?= $totalUsers ?></p>
                    <a href="/admin/user" class="btn btn-outline-primary btn-sm">Gérer les utilisateurs</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total habitudes créées</h5>
                    <p class="card-text display-6"><?= $totalHabits ?></p>
                    <a href="/admin/habits" class="btn btn-outline-primary btn-sm">Gérer les habitudes</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Habitudes complétées aujourd'hui</h5>
                    <p class="card-text display-6"><?= $completedToday ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Section d’information ou conseils -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Conseil</h5>
            <p class="card-text text-muted">
                Vous visualisez uniquement des statistiques globales pour protéger la vie privée des utilisateurs.
                Aucun détail individuel n’est affiché ici.
            </p>
        </div>
    </div>
</div>
