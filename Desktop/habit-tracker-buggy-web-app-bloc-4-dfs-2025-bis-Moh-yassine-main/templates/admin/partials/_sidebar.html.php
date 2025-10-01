<div class="p-3" style="width: 280px; height: 100vh;">
    <a href="/admin/dashboard" class="d-block text-center mb-3 text-decoration-none">
        <img src="/images/logo.png" alt="BugTracker" height="80"/>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="/admin/dashboard" class="nav-link <?= $_SESSION['current_uri'] == '/admin/dashboard' ? 'active' : '' ?>">
                <i class="bi bi-speedometer2 me-2"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="/admin/user" class="nav-link <?= $_SESSION['current_uri'] == '/admin/user' ? 'active' : '' ?>">
                <i class="bi bi-people me-2"></i>
                Utilisateurs
            </a>
        </li>
    </ul>
    <?php if(isset($_SESSION['user'])): ?>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['user']['username'] ?>" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong><?= $_SESSION['user']['username'] ?></strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="/logout">Déconnexion</a></li>
        </ul>
    </div>
    <?php endif; ?>
</div>