
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
          <div class="search-bar">
            
            <input type="text" placeholder="Buscar reclamo o empleado...">
            <i class="fas fa-search"></i>
            <div class="filter-group">
              <i class="fas fa-filter"></i>
              <select name="filtro" id="filtro">
                <option value="">Filtrar por...</option>
                <option value="fecha">Fecha</option>
                <option value="prioridad">Prioridad</option>
                <option value="estado">Estado</option>
              </select>
            </div>
            
          </div>
        </div>

        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>fecha</th>
                <th>asunto</th>
                <th>descripcion</th>
                <th>prioridad</th>
                <th>estado</th>
                <th>empleado</th>
                <th>supervisor</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($reclamos as $reclamo) : ?>
                <tr>       
                    <td data-label="fecha"><?= htmlspecialchars($reclamo['fecha_denuncia']) ?></td>
                    <td data-label="asunto"><?= htmlspecialchars($reclamo['asunto']) ?></td>
                    <td data-label="descripcion"><?= htmlspecialchars($reclamo['descripcion']) ?></td>
                    <td data-label="prioridad">
                    <span class="prioridad media">
                        <i class="fas fa-exclamation-triangle"></i> 
                        <?= htmlspecialchars($reclamo['prioridad']) ?>
                    </span>
                    </td>
                    <td data-label="estado">
                    <span class="estado revision">
                        <i class="fas fa-search"></i>
                        <?= htmlspecialchars($reclamo['estado']) ?>
                    </span>
                    </td>
                    <td data-label="empleado"><?= htmlspecialchars($reclamo['FK_ID_EMPLEADO']) ?></td>
                    <td data-label="supervisor"><?= htmlspecialchars($reclamo['FK_ID_SUPERVISOR']) ?></td>
                    <td><button class="boton-revisar" onClick="location.href='/reclamo/detalle/<?= htmlspecialchars($reclamo['ID_RECLAMO']) ?>'">Revisar</button></td>
              </tr>
            <?php endforeach; ?>


            </tbody>
          </table>
        </div>
      </section>
    </main>
  </section>
</body>
