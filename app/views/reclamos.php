@extends(head)

<link rel="stylesheet" href="../../../assets/css/reclamos.css">

<body>
    <section class="admin-dashboard">
        @extends(menuEmployee)
    <main class="main-dashboard">
        <main class="reclamo-container">
            <h2>Formulario de Reclamo</h2>

            <form class="reclamo-form" action="" method="post" onsubmit="return onSubmit(this)">
                <div class="input-group">
                    <label>Nombre de empresa</label>
                    <input type="text" name="empresa" placeholder="Ej: EchoLinks S.A." required>
                </div>

                <div class="input-group">
                    <label>Asunto</label>
                    <input type="text" name="asunto" placeholder="Ej: Problema con el servicio" required>
                </div>

                <div class="input-group">
                    <label>Fecha de la denuncia</label>
                    <input type="date" name="fecha" required>
                </div>

                <div class="input-group">
                    <label>Supervisor</label>
                    <div class="dual-input">
                        <select name="supervisor" id="supervisor">
                            <option value="">Seleccione un supervisor</option>
                            <?php foreach($employees as $employee): ?>
                                <option value="<?php echo $employee['ID_EMPLEADO']; ?>"><?php echo $employee['Nombre'] . ' ' . $employee['Apellido']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="input-group">
                    <label>Describa con precisión los detalles de su queja y a quién involucra</label>
                    <textarea name="descripcion" rows="4" required></textarea>
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
