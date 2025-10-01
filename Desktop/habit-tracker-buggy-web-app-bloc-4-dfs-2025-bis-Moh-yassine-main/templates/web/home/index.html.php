<?php $layout = 'base.html.php'; ?>

<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-7">
            <h1>My Habit Tracker</h1>
            <p>Suivez vos habitudes quotidiennes et atteignez vos objectifs plus facilement !</p>
            
            <?php if (!isset($_SESSION['user'])): ?>
                <a href="/login" class="btn btn-primary btn-lg">Se connecter</a>
                <a href="/register" class="btn btn-outline-primary btn-lg">Créer un compte</a>
            <?php else: ?>
                <a href="/dashboard" class="btn btn-primary btn-lg">Voir mon tableau de bord</a>
                <a href="/habits" class="btn btn-outline-primary btn-lg">Gérer mes habitudes</a>
            <?php endif; ?>
        </div>
        <div class="col-md-5">
            <img src="/images/undraw_habit_tracking.svg" alt="Suivi des habitudes" class="img-fluid" />
        </div>
    </div>
</div>
