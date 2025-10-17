@extends(head)
    <link rel="stylesheet" href="../../assets/css/perfil.css">
<body>
    <section  class="admin-dashboard">
     
    <?php if ($_SESSION['user']['FK_ID_ROL'] === 3) : ?>
        @extends(menuEmployee)
    <?php else: ?>
        @extends(menu)
    <?php endif; ?>


      <main class="main-dashboard"> 
        <!-- Cabecera perfil -->
        <section class="perfil-header">
            <div class="perfil-img"></div>
            <div class="perfil-info">
                <h1 class="perfil-nombre">{{ EMPLOYEE_NAME }}</h1>
                <h2 class="perfil-puesto">{{ EMPLOYEE_POSITION }}</h2>
            </div>
        </section>

        <hr class="perfil-divider">

        <!-- Trayectoria -->
        <section class="perfil-body">
            <div class="perfil-trayectoria">
                <h3>Trayectoria</h3>
                <p>
                    {{ EMPLOYEE_HIRING_DATE }} - Fecha de contratación<br>
                </p>
            </div>

            <!-- Accesos laterales -->
            <aside class="perfil-sidebar">
                <button class="perfil-btn"> <i class="bi bi-file-earmark-person"></i> Mis datos</button>
                <button class="perfil-btn"> <i class="bi bi-exclamation-diamond"></i>Mis Reclamos</button>
                <button class="perfil-btn"><i class="bi bi-inbox-fill"></i>mis archivos</button>
            
            </aside>
        </section>
    </main>
    </section>

</body>
</html>
