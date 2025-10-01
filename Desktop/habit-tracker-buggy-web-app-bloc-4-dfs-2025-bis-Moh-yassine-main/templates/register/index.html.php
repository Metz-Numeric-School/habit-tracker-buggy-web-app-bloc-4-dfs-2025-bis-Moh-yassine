<?php $layout = 'base.html.php'; ?>
<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">

            <h1>Inscription</h1>

            <?php if(isset($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">
                    <form action="/register" method="post">
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
                        <button type="submit" class="btn btn-primary w-100">Envoyer</button>
                    </form>
                </div>
            </div>

            <div class="text-center">
                <p class="text-muted">Vous avez déjà un compte ? <a href="/login">Connectez-vous</a></p>
            </div>

        </div>
    </div>




</div>