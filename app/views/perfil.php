@extends(head)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil | EchoLink</title>
    <link rel="stylesheet" href="../../assets/css/perfil.css">
</head>
<body>
    <section  class="admin-dashboard">
     
    @extends(menu)


      <main class="main-dashboard"> 
        <!-- Cabecera perfil -->
        <section class="perfil-header">
            <div class="perfil-img"></div>
            <div class="perfil-info">
                <h1 class="perfil-nombre">John Doe</h1>
                <h2 class="perfil-puesto">Administrador</h2>
                <a href="#" class="perfil-link">Insertar link de LinkedIn</a>
            </div>
        </section>

        <hr class="perfil-divider">

        <!-- Trayectoria -->
        <section class="perfil-body">
            <div class="perfil-trayectoria">
                <h3>Trayectoria</h3>
                <p>
                    Aquí va la descripción profesional del usuario, con su experiencia, logros y demás detalles.
                    Este bloque debe mostrar un texto más largo sobre su perfil laboral.
                </p>
            </div>

            <!-- Accesos laterales -->
            <aside class="perfil-sidebar">
                <button class="perfil-btn">📊 Estadísticas</button>
                <button class="perfil-btn">📁 Mis proyectos</button>
                <button class="perfil-btn">📌 Recordatorios pendientes</button>
            </aside>
        </section>
    </main>
    </section>

</body>
</html>
