@extends(head)

<link rel="stylesheet" href="../../assets/css/emple.css">
 <link rel="stylesheet" href="../../assets/fonts/fontawesom/fawesome-all.css">
<body>
<section class="admin-dashboard">
     @extends(menu)
    <main class="main-dashboard">
    <article class="emple-container">
        <!-- panel de acciones -->
        <aside class="emple-actions-panel">
            <button><i class="fa-solid fa-bullhorn"></i> Reclamos</button>
            <button><i class="fa-solid fa-bell"></i> Pendientes</button>
            <button><i class="fa-solid fa-file-lines"></i> Informe</button>
            <button><a href="/empleados/register"><i class="fa-solid fa-user-plus"></i> Agregar personal</a></button>
        </aside>
         
        <div class="emple-card">
            <h2>Gestión de Empleados</h2>
            <form method="POST" class="emple-searchbar">
                <input type="text" name="search" placeholder="Buscar empleado...">
                <button type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>

            <!-- lista de empleados -->
            <div class="emple-list">
                <section>
                    <h3>Empleados</h3>
                    <ul>
                        <?php foreach ($employees as $employee) : ?>
                            <li>
                                <div class="emple-info">
                                    <i class="fa-solid fa-user-circle"></i>
                                    <span><?= $employee["Nombre"]." ".$employee["Apellido"] ?></span>
                                </div>
                                <div class="emple-actions">
                                    <i class="fa-solid fa-eye"></i>
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </section>
            </div>
        </div>

        
    </article>

    </main>
</section>
</body>
</html>
