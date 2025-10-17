@extends(head)
<link rel="stylesheet" href="../../assets/css/ofertas.css">

<body>
  <section class="admin-dashboard">
    <?php if ($_SESSION['user']['FK_ID_ROL'] === 3) : ?>
      @extends(menuEmployee)
    <?php else: ?>
      @extends(menu)
    <?php endif; ?>

    <main class="main-dashboard">
      <section class="ofertas-section">
        <h2>Publicar nueva oferta</h2>
        <div class="postulaciones-container">

    <!-- Formulario para subir oferta -->
    <div class="form-oferta">
    <div class="oferta-header">
      <div class="perfil"></div>
      <input type="text" placeholder="¿Qué puesto quieres publicar?" class="oferta-input">
    </div>

    <div class="oferta-body">
      <textarea placeholder="Descripción, requisitos, horarios..." class="oferta-textarea"></textarea>
    </div>

    <div class="oferta-footer">
      <div class="footer-left">
        <i class="bi bi-calendar4"></i>
        <i class="bi bi-clock"></i>
        <i class="bi bi-briefcase"></i>
      </div>
      <button class="btn-subir">Subir</button>
    </div>
  </div>

  <!-- Postulaciones pendientes -->
  <h3 class="subtitulo">Mis postulaciones pendientes</h3>

  <div class="postulacion-card">
    <div class="postulacion-top">
      <div class="perfil"></div>
      <div class="info">
        <h4>Asistente Administrativo</h4>
        <p>Pyme Innovatech</p>
      </div>
    </div>
    <div class="postulacion-body">
      <p><strong>Horario:</strong> Lunes a Viernes 9-17hs</p>
    </div>
    <div class="postulacion-footer">
        <label
        > Estado
         <select class="nieve" name="nieve">
         <option value="">pendiente</option>
         <option value="chocolate">en proceso</option>
         <option value="sardina">finalizado</option>
         </select>
         </label>
      <button class="btn-cv">Ver CV enviado</button>
    </div>
  </div>

</div>
        </section>
        </main>
    </section>  
</body>
</html>
