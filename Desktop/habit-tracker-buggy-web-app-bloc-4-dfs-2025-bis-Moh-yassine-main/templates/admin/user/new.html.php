<?php $layout = 'admin/base.html.php'; ?>
<div class="container">

    <div class="row align-items-center">
        <div class="col">
            <h1>Nouvel utilisateur</h1>
        </div>
        <div class="col-auto">
            <a href="/admin/user" class="btn btn-outline-secondary">Annuler</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <?php if (isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <form action="/admin/user/new" method="post">
                <div class="mb-3">
                    <label for="lastname" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="user[lastname]" id="lastname" aria-describedby="lastnameHelp" placeholder="ex: DOE">
                </div>
                <div class="mb-3">
                    <label for="firstname" class="form-label">Prénom</label>
                    <input type="text" class="form-control" name="user[firstname]" id="firstname" aria-describedby="firstnameHelp" placeholder="ex: John">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="user[email]" id="email" aria-describedby="emailHelp" placeholder="ex: john.doe@email.fr">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="user[password]" id="password">
                </div>
                <div class="mb-3">
                    <div class="form-check form-switch"> 
                        <input type="hidden" name="user[isadmin]" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="user[isadmin]" value="1">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Administrateur</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Envoyer</button>
            </form>
        </div>
    </div>




</div>