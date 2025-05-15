<header class="cabecera">
    <nav class="barra-navegacion">
        <div class="contenedor">
            <div class="menu-principal">
                <a class="logo" href="index.php">
                    <i class="fas fa-camera-retro"></i>
                    <?php echo TITULO_SITIO; ?>
                </a>

                <button class="boton-menu" type="button" aria-label="Abrir menú">
                    <span class="linea"></span>
                    <span class="linea"></span>
                    <span class="linea"></span>
                </button>

                <div class="menu-navegacion">
                    <ul class="lista-navegacion">
                        <li class="item-menu <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'activo' : ''; ?>">
                            <a href="index.php">Inicio</a>
                        </li>
                        <li class="item-menu <?php echo basename($_SERVER['PHP_SELF']) == 'servicios.php' ? 'activo' : ''; ?>">
                            <a href="servicios.php">Servicios</a>
                        </li>
                        <li class="item-menu <?php echo basename($_SERVER['PHP_SELF']) == 'portfolio.php' ? 'activo' : ''; ?>">
                            <a href="portfolio.php">Portafolio</a>
                        </li>
                        <li class="item-menu <?php echo basename($_SERVER['PHP_SELF']) == 'nosotros.php' ? 'activo' : ''; ?>">
                            <a href="nosotros.php">Nosotros</a>
                        </li>
                    </ul>

                    <div class="acciones-usuario">
                        <div class="contador-visitas">
                            <div class="visitas-totales">
                                <i class="fas fa-chart-line"></i>
                                <span title="Visitas totales"><?php echo number_format($totalVisitas); ?></span>
                            </div>
                            <div class="visitas-hoy">
                                <i class="fas fa-users"></i>
                                <span title="Visitas hoy"><?php echo number_format($visitasHoy); ?></span>
                            </div>
                        </div>

                        <?php if (isset($_SESSION['usuario'])): ?>
                            <div class="menu-usuario">
                                <button class="boton-usuario">
                                    <i class="fas fa-user-circle"></i>
                                    <span><?php echo htmlspecialchars($_SESSION['usuario']['nombre']); ?></span>
                                </button>
                                <div class="menu-desplegable">
                                    <?php if ($_SESSION['usuario']['rol_id'] == 1): ?>
                                    <a href="panel-admin.php" class="item-desplegable">
                                        <i class="fas fa-cog"></i>
                                        Panel Admin
                                    </a>
                                    <?php else: ?>
                                    <a href="perfil.php" class="item-desplegable">
                                        <i class="fas fa-user"></i>
                                        Mi Perfil
                                    </a>
                                    <?php endif; ?>
                                    <a href="logout.php" class="item-desplegable">
                                        <i class="fas fa-sign-out-alt"></i>
                                        Cerrar Sesión
                                    </a>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="botones-sesion">
                                <a href="login.php" class="boton boton-secundario">Iniciar Sesión</a>
                                <a href="registro.php" class="boton boton-primario">Registrarse</a>
                            </div>
                        <?php endif; ?>

                        <button class="boton-tema" id="botonTema" aria-label="Cambiar tema">
                            <i class="fas fa-moon"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<script src="assets/js/navegacion.js"></script>