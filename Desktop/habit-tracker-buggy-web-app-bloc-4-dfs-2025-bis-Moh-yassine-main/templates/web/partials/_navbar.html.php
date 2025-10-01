<nav
    class="navbar navbar-expand-sm navbar-light"
>
    <div class="container">
        <a class="navbar-brand" href="/"><img src="/images/logo.png" alt="BugTracker" height="50"/></a>
        <button
            class="navbar-toggler d-lg-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <?php if (isset($_SESSION['admin'])): ?>
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/dashboard">Mon dashboard</a>
                </li>
            </ul>
            <?php else: ?>
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Mon dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/habits">Mes habitudes</a>
                </li>
            </ul>
            <?php endif; ?>
            <a href="/logout" class="btn btn-link">Déconnexion</a>
        </div>
    </div>
</nav>
