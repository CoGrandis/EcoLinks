@extends(head)
    <link rel="stylesheet" href="../../assets/css/perfil.css">
<body>
    <section  class="admin-dashboard">
     
    <?php if ($_SESSION['user']['FK_ID_ROL'] === 3) : ?>
        @extends(menuEmployee)
    <?php else: ?>
        @extends(menu)
    <?php endif; ?>


      <main class="main-dashboard"> 
        <!-- Cabecera perfil -->
        <section class="perfil-header">
            <div class="perfil-img" >
            <img src="https://ui-avatars.com/api/?name={{ EMPLOYEE_NAME }}&background=random&color=fff&size=150" alt="Avatar empleado">
            </div>
            <div class="perfil-info">
                <h1 class="perfil-nombre">{{ EMPLOYEE_NAME }}</h1>
                <h2 class="perfil-puesto">{{ EMPLOYEE_POSITION }}</h2>
            </div>
        </section>

        <hr class="perfil-divider">

        <!-- formulario para editar datos-->
        <section class="formulario">
            <div class="forms">
                <form method="POST" onsubmit="return onSubmit(this)">
    <!-- ID oculto -->
    <input type="hidden" name="id" value="{{ EMPLOYEE_ID }}">

    <!-- Nombre y Apellido -->
    <label>Nombre
        <input type="text" name="name" value="{{ EMPLOYEE_FIRSTNAME }}" required />
    </label>
    <label>Apellido
        <input type="text" name="surname" value="{{ EMPLOYEE_SURNAME }}" required />
    </label>

    <!-- Dirección -->
    <label>Dirección
        <input type="text" name="address" value="{{ EMPLOYEE_ADDRESS }}" />
    </label>

    <!-- Fecha de Nacimiento -->
    <label>Fecha de Nacimiento
        <input type="date" name="dateBirth" value="{{ EMPLOYEE_BIRTH_DATE }}" />
    </label>

    <!-- Fecha de Contratación -->

    <!-- Email -->
    <label>Email
        <input type="email" name="email" value="{{ EMPLOYEE_EMAIL }}" required />
    </label>

    <!-- Firma digital -->
    <div class="input-group firma">
        <label>Firma digital</label>
        <canvas id="signature" width="350" height="120"></canvas>
        <input type="hidden" name="firma_digital" id="firma_digital" value="{{ EMPLOYEE_FIRMA }}" />
        <button type="button" onclick="clearCanvas()">Borrar firma</button>
        <label>Tu firma actual:</label>
        <img src="{{ EMPLOYEE_FIRMA }}" width="350" height="120" alt="No hay se ha registrado una firma"/>
    </div>

    <!-- Botón enviar -->
    <button type="submit">Guardar cambios</button>
</form>

            </div>
        </section>
    </main>
    </section>
<script src="../../assets/js/firma.js"></script>
</body>
</html>