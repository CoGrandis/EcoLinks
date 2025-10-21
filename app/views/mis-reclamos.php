@extends(head)
<link rel="stylesheet" href="../../../assets/css/perfil.css">
<link rel="stylesheet" href="../../assets/css/listaReclamos.css">
<link rel="stylesheet" href="../../assets/fonts/fontawesom/fawesome-all.css">

<body>
<section class="admin-dashboard">

    <?php if ($_SESSION['user']['FK_ID_ROL'] === 3) : ?>
        @extends(menuEmployee)
    <?php else: ?>
        @extends(menu)
    <?php endif; ?>

    <main class="main-dashboard">
        <!-- PERFIL DEL EMPLEADO -->
        <section class="perfil-header">
            <div class="perfil-img">
                <img src="https://ui-avatars.com/api/?name={{ EMPLOYEE_NAME }}&background=random&color=fff&size=150" alt="Avatar empleado">
            </div>
            <div class="perfil-info">
                <h1 class="perfil-nombre">{{ EMPLOYEE_NAME }}</h1>
                <h2 class="perfil-puesto">{{ EMPLOYEE_POSITION }}</h2>
            </div>
        </section>

        <hr class="perfil-divider">

        <div class="perfil-body">
            <!-- SIDEBAR LATERAL -->
            <aside class="perfil-sidebar">
                <button class="perfil-btn" onClick="window.location.href='/perfil'">
                    <i class="bi bi-file-earmark-person"></i> Mis datos
                </button>
                <button class="perfil-btn" onClick="window.location.href='/mis-reclamos'">
                    <i class="bi bi-exclamation-diamond"></i> Mis Reclamos
                </button>
                <button class="perfil-btn" onClick="window.location.href='/documentos'">
                    <i class="bi bi-inbox-fill"></i> Mis archivos
                </button>
            </aside>

            <!-- SECCIÓN DE RECLAMOS -->

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Asunto</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Empleado</th>
                                <th>Supervisor</th>
                                <th>PDF</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($reclamos as $reclamo) : ?>
                            <tr>
                                <td data-label="Fecha"><?= htmlspecialchars($reclamo['fecha_denuncia']) ?></td>
                                <td data-label="Asunto"><?= htmlspecialchars($reclamo['asunto']) ?></td>
                                <td data-label="Descripción"><?= htmlspecialchars($reclamo['descripcion']) ?></td>
                                <td data-label="Estado">
                                    <span class="estado <?= strtolower($reclamo['estado']) ?>">
                                        <?= htmlspecialchars($reclamo['estado']) ?>
                                    </span>
                                </td>
                                <td data-label="Empleado"><?= htmlspecialchars($reclamo['nombre_empleado'] . ' ' . $reclamo['apellido_empleado']) ?></td>
                                <td data-label="Supervisor"><?= htmlspecialchars($reclamo['nombre_supervisor'] . ' ' . $reclamo['apellido_supervisor']) ?></td>
                                <td data-label="PDF">
                                    <button class="boton-revisar" onClick="location.href='/reclamo/pdf/<?= $reclamo['ID_RECLAMO'] ?>'">
                                        <i class="fas fa-file-pdf"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </main>
</section>
</body>
