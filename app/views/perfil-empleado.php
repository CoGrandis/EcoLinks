@extends(head)
<link rel="stylesheet" href="../../../assets/css/perfil.css">

<body>
  <section class="admin-dashboard">

    <?php if ($_SESSION['user']['FK_ID_ROL'] === 3) : ?>
      @extends(menuEmployee)
    <?php else: ?>
      @extends(menu)
    <?php endif; ?>

    <main class="main-dashboard">

      <!-- Cabecera perfil -->
      <section class="perfil-header">
        <div class="perfil-img">
          <img src="https://ui-avatars.com/api/?name={{ EMPLOYEE_NAME }}&background=random&color=fff&size=150" alt="Avatar empleado">
        </div>
        <div class="perfil-info">
          <h1 class="perfil-nombre">{{ EMPLOYEE_NAME }}</h1>
          <h2 class="perfil-puesto">{{ EMPLOYEE_POSITION }}</h2>
          <p class="perfil-departamento">{{ EMPLOYEE_DEPARTMENT }}</p>
          <p class="perfil-estado">Estado: {{ EMPLOYEE_STATUS }}</p>
          <p class="perfil-antiguedad">Antigüedad: {{ EMPLOYEE_TENURE }}</p>
        </div>
      </section>

      <hr class="perfil-divider">

      <!-- Información personal -->
      <section class="perfil-body">
        <div class="perfil-section">
          <h3>Información personal</h3>
            <strong>Fecha de nacimiento:</strong> {{ EMPLOYEE_BIRTH_DATE }}</br>
            <strong>Email:</strong> {{ EMPLOYEE_EMAIL }}</br>
            <strong>Dirección:</strong> {{ EMPLOYEE_ADDRESS }}</br>
        </div>

        <!-- Trayectoria -->
        <div class="perfil-section">
          <h3>Trayectoria</h3>
            <strong>Fecha de contratación:</strong> {{ EMPLOYEE_HIRING_DATE }}</br>
        </div>


      </section>
    </main>
  </section>
</body>
</html>
