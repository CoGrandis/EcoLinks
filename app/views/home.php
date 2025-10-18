@extends(head)
    <link rel="stylesheet" href="../../../assets/css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <body>
        <header class="header-container">
            <section class="logo">
                <img src="../../assets/img/logo/logo.svg" alt="">
                <h1>EchoLinks</h1>
                
            </section>
            <nav class="navegacion">
                
                <div class="nav-links">
                    <a class="nav-item" href="/">que somos</a>
                    <a class="nav-item" href="/login">Iniciar Sesión</a>
                    <a class="nav-item btn-registrarse"  href="/register" >Registrarse</a>
                </div>
            </nav>
        </header>

       
        <main class="main-container">
            <!-- Hero principal -->
            <section class="main-info">
                <div class="main-text">

                    <h1>EchoLinks <br> mas que</h1>

                    <div id="flip">
                        <span>Una aplicación</span>
                        <span>Una comunidad</span>
                        <span>Gestión de RRHH</span>
                        <span>Un equipo</span>
                        <span>Un futuro</span>
                        <span>Un cambio</span>
                        <span>Una solución</span>
                    </div>
                    
                    <h2> al alcance de la mano!</h2>
                </div>
                <div class="main-img">
                    <img src="../../assets/img/ejemplo.svg" alt="">
                </div>
            </section>
             <!-- introducion -->
            <section class="main-intro">
                <img src="" alt="">
                <h2>¿Qué es EchoLinks?</h2>
                <p>EchoLinks es una plataforma de gestión de recursos humanos y empleados diseñada para simplificar y optimizar las operaciones diarias de las empresas. Nuestra solución integral ofrece una amplia gama de herramientas y funcionalidades que permiten a los departamentos de recursos humanos gestionar eficientemente el ciclo de vida del empleado, desde la contratación hasta la jubilación.</p>
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
                <h2>Quienes somos?</h2>
                <div class="team-card">
                    <div class="avatar"> <img src="../../../assets/img/nosotros/nanu.JPG" alt=""></div>
                    <h3>Nahir Fonseca</h3>
                </div>
                <div class="team-card">
                    <div class="avatar"><img src="../../../assets/img/nosotros/alon.JPG" alt=""></div>
                    <h3>Alondra Herrera</h3>
                </div>
                <div class="team-card">
                    <div class="avatar"><img src="../../../assets/img/nosotros/aron.JPG" alt=""></div>
                    <h3>Aroon Yustiz</h3>
                </div>
                <div class="team-card">
                    <div class="avatar"><img src="../../../assets/img/nosotros/coni.JPG" alt=""></div>
                    <h3>Constanza Granids</h3>
                </div>
            </section>
        </main>

        <footer class="footer"></footer>
        <script src="../../../assets/js/menu.js"></script>
    </body>
</html>