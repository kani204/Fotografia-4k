<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php"><?php echo TITULO_SITIO; ?></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="servicios.php">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="portfolio.php">Portafolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nosotros.php">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacto.php">Contacto</a>
                </li>
                <?php if (isset($_SESSION['usuario'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="panel-admin.php">Panel de Admin</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>