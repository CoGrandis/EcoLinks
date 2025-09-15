@extends(head)
<body>
    <header class="header-container">
        <section class="logo">
            <h1>EchoLinks</h1>
        </section>
        <nav class="navegacion">
            <a href="/">Home</a>
            <a href="/auth/login">Inicia Sesion</a>
            <a href="/auth/register">Registrarse</a>

        </nav>
    </header>
    <main class="main-container">
        <section class="main-info">
            <div class="main-text">
                <h1>GESTIÓN <br>EFICAZ Y FÁCIL </h1>
                <h4>Simplifica la gestión de Recursos Humanos y de empleados. </h4>
            </div>
            <div class="main-img">
                <img src="assets/img/undraw_data-points_uc3j.svg" alt="">
            </div>
        </section>
        <section class="main-funciones">
            <div class="funcion-card">
                <div class="card-header">
                    <i class="fa-solid fa-comments"></i>
                </div>
                <div class="card-info">
                    <p>Comunicación Eficaz</p>
                </div>
                <div class="card-icon"></div>
            </div>
            <div class="funcion-card">
                <div class="card-header">
                    <i class="fa-solid fa-users-gear"></i>
                </div>
                <div class="card-info">
                    <p>Gestión Integral de Empleados</p>
                </div>
                <div class="card-icon"></div>
            </div>
            <div class="funcion-card">
                <div class="card-header">
                    <i class="fa-solid fa-globe"></i>
                </div>
                <div class="card-info">
                    <p>Acceso desde cualquier lugar</p>
                </div>
                <div class="card-icon"></div>
            </div>
            <div class="funcion-card">
                <div class="card-header">
                    <i class="fa-solid fa-folder-user"></i>
                </div>
                <div class="card-info">
                    <p>Selección de personal con IA</p>
                </div>
                <div class="card-icon"></div>
            </div>
        </section>
    </main>
    <footer class="footer"></footer>
</body>

</html>