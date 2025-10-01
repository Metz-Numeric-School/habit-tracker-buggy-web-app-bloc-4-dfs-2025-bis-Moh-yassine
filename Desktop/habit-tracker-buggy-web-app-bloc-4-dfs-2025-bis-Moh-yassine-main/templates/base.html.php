<!doctype html>
<html lang="en">
    <head>
        <title><?= $title ?? 'Page sans titre' ?> | MNS Buggy App</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="/css/app.css">

    </head>

    <body>
        <header>
            <?php if(!isset($_SESSION['user'])): ?>
            <div class="p-3 text-center">
                <a href="/"><img src="/images/logo.png" alt="BugTracker" height="100"/></a>
            </div>
            <?php else: ?>
                <?php include '../templates/web/partials/_navbar.html.php'; ?>
            <?php endif; ?>
        </header>
        <main>
            <?= $bodyContent ?>
        </main>
        <footer>
            <div class="p-3 text-center">
                <small class="text-muted">A buggy web application by</small>
                <img src="/images/logo-mns.png" alt="Metz Numeric School" height="40"/>
            </div>
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
