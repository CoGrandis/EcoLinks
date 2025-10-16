@extends(head)

<link rel="stylesheet" href="../../../assets/css/reclamos.css">

<body>
    <section class="admin-dashboard">
        @extends(menuEmployee)

    <main class="main-dashboard">
        <main class="reclamo-container">
            <h2>Formulario de Reclamo</h2>

            <form class="reclamo-form" action="submit_reclamo.php" method="post" onsubmit="return onSubmit(this)">
                <div class="input-group">
                    <label>Nombre del empleado</label>
                    <div class="dual-input">
                        <input type="text" name="nombre" placeholder="Primer nombre" required>
                        <input type="text" name="apellido" placeholder="Apellido" required>
                    </div>
                </div>

                <div class="input-group">
                    <label>Nombre de empresa</label>
                    <input type="text" name="empresa" placeholder="Ej: EchoLinks S.A." required>
                </div>

                <div class="input-group">
                    <label>Fecha de la denuncia</label>
                    <input type="date" name="fecha" required>
                </div>

                <div class="input-group">
                    <label>Nombre del supervisor</label>
                    <div class="dual-input">
                        <input type="text" name="nombre_supervisor" placeholder="Primer nombre" required>
                        <input type="text" name="apellido_supervisor" placeholder="Apellido" required>
                    </div>
                </div>

                <div class="input-group">
                    <label>Describa con precisión los detalles de su queja y a quién involucra</label>
                    <textarea name="detalle" rows="4" required></textarea>
                </div>

                <div class="input-group">
                    <label>Describa cómo el incidente ha afectado negativamente su trabajo</label>
                    <textarea name="impacto" rows="3" required></textarea>
                </div>

                <div class="input-group">
                    <label>Explique cómo la empresa puede gestionar su reclamación de forma eficaz</label>
                    <textarea name="solucion" rows="3" required></textarea>
                </div>

                <div class="input-group">
                    <label>Proporcione comentarios adicionales que puedan ser importantes</label>
                    <textarea name="comentarios" rows="3"></textarea>
                </div>

                <!-- FIRMA DIGITAL -->
                <div class="input-group firma">
                    <label>Firma digital</label>
                    <canvas id="signature" width="350" height="120"></canvas>
                    <input type="hidden" name="signature" />
                    <p class="firma-text">“Estoy de acuerdo con los términos y soy totalmente responsable de lo que he enviado.”</p>
                    <button type="button" class="btn-clear" onclick="clearCanvas()">Borrar firma</button>
                </div>

                <button type="submit" class="btn-submit">Presentar Reclamo</button>
            </form>
        </main>
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
