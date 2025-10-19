@extends(head)
<link rel="stylesheet" href="../../assets/css/VistaDeReclamos.css">

<body>
  <section class="admin-dashboard">
    <?php if ($_SESSION['user']['FK_ID_ROL'] === 3) : ?>
      @extends(menuEmployee)
    <?php else: ?>
      @extends(menu)
    <?php endif; ?>

    <main class="main-dashboard">
      <section class="reclamo-detalle">
        <h2>Reclamo #<?= $reclamo['ID_RECLAMO'] ?></h2>

        <div class="reclamo-info">
          <div class="info-item">
            <strong>Empleado:</strong> <?= $reclamo['FK_ID_EMPLEADO'] ?>
          </div>
          <div class="info-item">
            <strong>Fecha:</strong> <?= $reclamo['fecha'] ?>
          </div>
          <div class="info-item">
            <strong>Supervisor:</strong> <?= $reclamo['supervisor']  ?>
          </div>
        </div>

        <div class="reclamo-detalles">
          <h3>Detalles del Reclamo</h3>
          <p><?= $reclamo['detalle']?></p>

          <h3>Impacto</h3>
          <p><?= $reclamo['impacto']?></p>

          <h3>Propuesta de Solución</h3>
          <p><?= $reclamo['solucion'] ?></p>

          <h3>Comentarios Adicionales</h3>
          <p><?= $reclamo['comentarios']?></p>
        </div>

        <form class="reclamo-gestion" method="POST" action="/reclamo/estado">
          <input type="hidden" name="id_reclamo" value="<?= $reclamo['ID_RECLAMO'] ?>">
          <div class="input-group">
            <label for="estado"><i class="fas fa-flag"></i> Estado del reclamo</label>
            <select name="estado" id="estado">
              <option value="pendiente">Pendiente</option>
              <option value="en_revision">En revisión</option>
              <option value="resuelto">Resuelto</option>
            </select>
          </div>

          <div class="input-group">
            <label for="respuesta"><i class="fas fa-reply"></i> Responder al empleado</label>
            <textarea name="respuesta" id="respuesta" rows="4" placeholder="Escribe tu respuesta aquí..."></textarea>
          </div>

          <button type="submit" class="btn-guardar"><i class="fas fa-save"></i> Guardar cambios</button>
        </form>
      </section>
    </main>
  </section>
</body>
</html>
