@extends('head')

<link rel="stylesheet" href="../../../assets/css/reclamos.css">

<body>
    <a href="">volver</a>
    <main class="reclamo-container">
        <h2>Formulario de Quejas de Empleados</h2>

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

            <button type="submit" class="btn-submit">Presentar Queja</button>
        </form>
    </main>
</body>
 <script src="../../assets/js/firma.js">
    </script>
</html>
