@extends(head)

<link rel="stylesheet" href="../../assets/css/emple.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

<body>
<section class="admin-dashboard">
     @extends(menu)
    <main class="main-dashboard">
    <article class="emple-container">
         
        <div class="emple-card">
            <form method="POST" class="emple-searchbar">
                <input type="text" name="search" placeholder="Buscar empleado...">
                <button type="submit">
                    <i class="bi bi-search"></i>
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
                                <i class="bi bi-person-circle"></i>
                                <span><?= $employee["Nombre"]." ".$employee["Apellido"] ?></span>
                            </div>
                            <div class="emple-actions">
                                <i class="bi bi-eye"></i>
                                <i class="bi bi-pencil-square"></i>
                            </div>
                        </li>
                        <?php endforeach;?>
                        
                    </ul>
                </section>

            </div>
        </div>

        <!--panel de acciones -->
        <aside class="emple-actions-panel">
            <button><i class="bi bi-megaphone"></i> Reclamos</button>
            <button><i class="bi bi-bell"></i> Pendientes</button>
            <button><i class="bi bi-file-earmark-text"></i> Informe</button>
            <a href="/empleados/register"><button><i class="bi bi-person-plus"></i> Agregar personal</button>
        </aside>
    </article>

    </main>
</section>
</body>
</html>
