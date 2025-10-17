@extends(head)
<link rel="stylesheet" href="../../assets/css/postulaciones.css">

<body>
  <section class="admin-dashboard">
    <?php if ($_SESSION['user']['FK_ID_ROL'] === 3) : ?>
      @extends(menuEmployee)
    <?php else: ?>
      @extends(menu)
    <?php endif; ?>

    <main class="main-dashboard">
      <section class="postulaciones-section">
        <h2>Últimas postulaciones</h2>

        <div class="postulaciones-list">
          <!-- Tarjeta 1 -->
          <div class="post-card">
            <div class="post-header">
              <div class="post-logo"></div>
              <div class="post-info">
                <h3>Diseñador UX/UI</h3>
                <p>Echolinks.S.A</p>
              </div>
              <i class="bi bi-three-dots"></i>
            </div>
            <div class="post-body">
              <p>Buscamos un diseñador con experiencia en interfaces modernas y herramientas Figma / Adobe XD.</p>
              <button class="btn-cv">Enviar CV</button>
            </div>
          </div>

          <!-- Tarjeta 2 -->
          <div class="post-card">
            <div class="post-header">
              <div class="post-logo"></div>
              <div class="post-info">
                <h3>Analista de RRHH</h3>
                <p>Echolinks.S.A</p>
              </div>
              <i class="bi bi-three-dots"></i>
            </div>
            <div class="post-body">
              <p>Responsable de procesos de selección, onboarding y capacitación para nuevas incorporaciones.</p>
              <button class="btn-cv">Enviar CV</button>
            </div>
          </div>

          <!-- Tarjeta 3 -->
          <div class="post-card">
            <div class="post-header">
              <div class="post-logo"></div>
              <div class="post-info">
                <h3>Desarrollador Full Stack</h3>
                <p>Echolinks.S.A</p>
              </div>
              <i class="bi bi-three-dots"></i>
            </div>
            <div class="post-body">
              <p>Participarás en proyectos web con tecnologías modernas: Django, React y PostgreSQL.</p>
              <button class="btn-cv">Enviar CV</button>
            </div>
          </div>

        </div>
      </section>
    </main>
  </section>
</body>
</html>
