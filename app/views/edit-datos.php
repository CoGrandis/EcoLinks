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
            <div class="perfil-img"></div>
            <div class="perfil-info">
                <h1 class="perfil-nombre">{{ EMPLOYEE_NAME }}</h1>
                <h2 class="perfil-puesto">{{ EMPLOYEE_POSITION }}</h2>
            </div>
        </section>

        <hr class="perfil-divider">

        <!-- formulario para editar datos-->
        <section class="formulario">
            <div class=" forms">
                <form action="">
                  <label>Numeros de contacto<input type="text" id="Name" name="Name" /><input type="text" id="Name" name="Name" /></label>
                  <label>Descripcion<input type="text" id="Description" name="Description" /></label>
                  <label>gmail<input type="text" id="gmail" name="gmail" /></label>
                   <div class="input-group firma">
                   <label>Firma digital</label>
                   <canvas id="signature" width="350" height="120"></canvas>
                   <input type="hidden" name="signature" />
                   <button type="button" class="btn-clear" onclick="clearCanvas()">Borrar firma</button> <button><a href="">tu firma actual</a></button>
                </div>
                <label for="file-upload">Tu CV</label>
                <input type="file" id="file-upload" name="archivo">
                <a href="cv_actual.pdf" target="_blank">Ver CV actual</a> <br>
                <button type="submit" class="btn-submit">Guardar cambios</button>
                </div>
                </form>
            </div>
            <button><a href=""> volver</a></button>
        </section>
    </main>
    </section>
<script src="../../assets/js/firma.js"></script>
</body>
</html>