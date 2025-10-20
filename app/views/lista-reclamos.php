@extends(head)
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
        <section class="Reclamos-section">
            <h2>Reclamos</h2>

            <div class="search-container">
              <form method="POST" action="/reclamos" class="search-bar">
                  <input 
                      type="text" 
                      name="empleado" 
                      placeholder="Buscar por empleado..." 
                      value="<?= htmlspecialchars($_POST['empleado'] ?? '') ?>"
                  >
                  <div class="filter-group">
                    <select name="estado" id="filtro">
                      <option value="">Estado</option>
                      <option value="pendiente" <?= (($_POST['estado'] ?? '') === 'pendiente') ? 'selected' : '' ?>>Pendiente</option>
                      <option value="en_revision" <?= (($_POST['estado'] ?? '') === 'en_revision') ? 'selected' : '' ?>>En revisión</option>
                      <option value="resuelto" <?= (($_POST['estado'] ?? '') === 'resuelto') ? 'selected' : '' ?>>Resuelto</option>
                  </select>
                  <select name="prioridad" id="filtro">
                      <option value="">Prioridad</option>
                      <option value="Baja" <?= (($_POST['prioridad'] ?? '') === 'Baja') ? 'selected' : '' ?>>Baja</option>
                      <option value="Media" <?= (($_POST['prioridad'] ?? '') === 'Media') ? 'selected' : '' ?>>Media</option>
                      <option value="Alta" <?= (($_POST['prioridad'] ?? '') === 'Alta') ? 'selected' : '' ?>>Alta</option>
                  </select>
                  </div>
                  
                  <button type="submit"><i class="fas fa-search"></i></button>
              </form>
          </div>


            <!-- TABLA DE RECLAMOS -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Asunto</th>
                            <th>Descripción</th>
                            <th>Prioridad</th>
                            <th>Estado</th>
                            <th>Empleado</th>
                            <th>Supervisor</th>
                            <th>Responsable</th>
                            <th>PDF</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reclamos as $reclamo) : ?>
                        <tr>
                            <td data-label="Fecha"><?= htmlspecialchars($reclamo['fecha_denuncia']) ?></td>
                            <td data-label="Asunto"><?= htmlspecialchars($reclamo['asunto']) ?></td>
                            <td data-label="Descripción"><?= htmlspecialchars($reclamo['descripcion']) ?></td>

                            <!-- PRIORIDAD editable -->
                            <td data-label="Prioridad">
                                <form method="POST" action="/reclamo/actualizar" class="inline-form">
                                    <input type="hidden" name="idReclamo" value="<?= $reclamo['ID_RECLAMO'] ?>">
                                    <select name="prioridad" onchange="this.form.submit()">
                                        <option value="baja" <?= ($reclamo['prioridad'] == 'baja') ? 'selected' : '' ?>>Baja</option>
                                        <option value="media" <?= ($reclamo['prioridad'] == 'media') ? 'selected' : '' ?>>Media</option>
                                        <option value="alta" <?= ($reclamo['prioridad'] == 'alta') ? 'selected' : '' ?>>Alta</option>
                                    </select>
                                </form>
                            </td>

                            <td data-label="Estado">
                                <span class="estado <?= strtolower($reclamo['estado']) ?>">
                                    <?= htmlspecialchars($reclamo['estado']) ?>
                                </span>
                            </td>

                            <td data-label="Empleado"><?= htmlspecialchars($reclamo['nombre_empleado']) . ' ' . htmlspecialchars($reclamo['apellido_empleado']) ?></td>
                            <td data-label="Supervisor"><?= htmlspecialchars($reclamo['nombre_supervisor']) . ' ' . htmlspecialchars($reclamo['apellido_supervisor']) ?></td>

                            <!-- RESPONSABLE editable -->
                            <td data-label="Responsable">
                                <form method="POST" action="/reclamo/actualizar" class="inline-form">
                                    <input type="hidden" name="idReclamo" value="<?= $reclamo['ID_RECLAMO'] ?>">
                                    <select name="responsable" onchange="this.form.submit()"  class="filter-group">
                                        <option value="">-- Seleccionar --</option>
                                        <?php foreach ($empleados as $empleado) : ?>
                                            <option value="<?= $empleado['ID_EMPLEADO'] ?>" <?= ($empleado['ID_EMPLEADO'] == $reclamo['FK_ID_RESPONSABLE']) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($empleado['Nombre'] . ' ' . $empleado['Apellido']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </form>
                            </td>

                            <!-- BOTÓN PDF -->
                            <td data-label="PDF">
                                <button class="boton-revisar" onclick="location.href='/reclamo/pdf/<?= $reclamo['ID_RECLAMO'] ?>'">
                                    <i class="fas fa-file-pdf"></i>
                                </button>
                                
                            </td>
                            <td>
                                <button class="boton-revisar" onClick="location.href='/reclamo/detalle/<?= htmlspecialchars($reclamo['ID_RECLAMO']) ?>'">Revisar</button>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</section>
</body>
