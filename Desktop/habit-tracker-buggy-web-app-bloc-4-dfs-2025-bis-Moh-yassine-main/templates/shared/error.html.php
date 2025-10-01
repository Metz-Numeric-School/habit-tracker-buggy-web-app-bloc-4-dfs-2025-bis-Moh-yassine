<?php $layout = 'base.html.php'; ?>
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-12">
            <h1>Oups...</h1>
            <div class="alert alert-danger" role="alert">
                <strong><i class="bi bi-exclamation-triangle"></i>Une erreur s'est produite</strong>
                <p class="mb-0"><?= $message ?></p>
            </div>
            <a href="Javascript:history.go(-1)" class="btn btn-primary">Revenir en arrière</a>
        </div>
    </div>
</div>