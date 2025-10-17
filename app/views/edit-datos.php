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
<script>
        const canvas = document.getElementById('signature');
        const ctx = canvas.getContext("2d");
        let drawing = false;
        let prevX, prevY;
        const signature = document.getElementsByName('signature')[0];

        canvas.addEventListener("mousedown", start);
        canvas.addEventListener("mouseup", stop);
        canvas.addEventListener("mousemove", draw);
        canvas.addEventListener("touchstart", start);
        canvas.addEventListener("touchend", stop);
        canvas.addEventListener("touchmove", draw);

        function start(e) {
            drawing = true;
        }

        function stop() {
            drawing = false;
            prevX = prevY = null;
            signature.value = canvas.toDataURL();
        }

        function draw(e) {
            if (!drawing) return;
            e.preventDefault();
            const rect = canvas.getBoundingClientRect();
            const clientX = e.type.includes('touch') ? e.touches[0].clientX : e.clientX;
            const clientY = e.type.includes('touch') ? e.touches[0].clientY : e.clientY;
            const currX = clientX - rect.left;
            const currY = clientY - rect.top;

            if (!prevX && !prevY) {
                prevX = currX;
                prevY = currY;
            }

            ctx.beginPath();
            ctx.moveTo(prevX, prevY);
            ctx.lineTo(currX, currY);
            ctx.strokeStyle = '#000';
            ctx.lineWidth = 2;
            ctx.stroke();
            ctx.closePath();

            prevX = currX;
            prevY = currY;
        }

        function clearCanvas() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            signature.value = "";
        }

        function onSubmit(form) {
            signature.value = canvas.toDataURL();
            return true;
        }
    </script>
</body>
</html>