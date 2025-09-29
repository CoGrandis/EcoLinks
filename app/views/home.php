@extends(head)

<!DOCTYPE html>
<html lang="es">
<html>
    <link rel="stylesheet" href="assets/css/home.css">
    <body>
        <header class="header-container">
            <section class="logo">
                <h1>EchoLinks</h1>
            </section>
            <nav class="navegacion">
                
                <i class="fa-solid fa-bars nav-item menu"></i>
                <div class="nav-links">
                    <a class="nav-item" href="/">Home</a>
                    <a class="nav-item" href="/auth/login">Iniciar Sesión</a>
                    <a class="nav-item btn-registrarse"  href="/auth/register" >Registrarse</a>
                </div>
            </nav>
        </header>

        <main class="main-container">
            <!-- Hero principal -->
            <section class="main-info">
                <div class="main-text">
                    <h1>GESTIÓN <br>EFICAZ Y FÁCIL </h1>
                    <h4>Simplifica la gestión de Recursos Humanos y de empleados. </h4>
                </div>
                <div class="main-img">
                    <img src="assets/img/undraw_data-points_uc3j.svg" alt="">
                </div>
            </section>

            <!-- Funcionalidades -->
            <section class="main-funciones">
                <h2>SIMPLIFICA LA GESTIÓN DE TU EMPRESA</h2>
                <div class="funciones-grid">
                    <div class="funcion-card">
                        <div class="card-header"><i class="fa-solid fa-users-gear"></i></div>
                        <div class="card-info"><p>Gestión Integral de Empleados</p></div>
                    </div>
                    <div class="funcion-card">
                        <div class="card-header"><i class="fa-solid fa-globe"></i></div>
                        <div class="card-info"><p>Acceso desde cualquier lugar</p></div>
                    </div>
                    <div class="funcion-card">
                        <div class="card-header"><i class="fa-solid fa-folder-user"></i></div>
                        <div class="card-info"><p>Selección de personal con IA</p></div>
                    </div>
                    <div class="funcion-card">
                        <div class="card-header"><i class="fa-solid fa-briefcase"></i></div>
                        <div class="card-info"><p>Gestión Integral de RRHH</p></div>
                    </div>
                </div>
            </section>

            <!-- Cartas de presentación -->
            <section class="team-section">
                <div class="team-card">
                    <div class="avatar"></div>
                    <h3>Nahir Fonseca</h3>
                </div>
                <div class="team-card">
                    <div class="avatar"></div>
                    <h3>Alondra Herrera</h3>
                </div>
                <div class="team-card">
                    <div class="avatar"></div>
                    <h3>Aroon Yustiz</h3>
                </div>
                <div class="team-card">
                    <div class="avatar"></div>
                    <h3>Constanza Granids</h3>
                </div>
            </section>
        </main>

        <footer class="footer"></footer>
        <script src="../../assets/js/menu.js"></script>
    </body>
</html>