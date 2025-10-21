@extends(head)
<link rel="stylesheet" href="../../assets/css/formu.css">

<body>
    <section class="admin-dashboard">
        @extends(menu)
  
        <main class="main-dashboard"> 
            <h1 class="form-title">Recibo de Sueldo</h1>

            <form action="" method="POST" class="employee-form">
                <div class="form-group">
                    <label for="employee">Empleado</label>
                    <select name="employee_id" id="employee" required>
                        <option value="">-- Seleccionar --</option>
                        <?php foreach ($empleados as $empleado) : ?>
                            <option value="<?= $empleado['ID_EMPLEADO'] ?>" <?= ($empleado['ID_EMPLEADO']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($empleado['Nombre'] . ' ' . $empleado['Apellido']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="periodo">Periodo</label>
                    <input type="month" id="periodo" name="periodo" required>
                </div>

                <div class="form-group">
                    <label for="sueldo_base">Sueldo Base</label>
                    <input type="number" step="0.01" id="sueldo_base" name="sueldo_base" required>
                </div>

                <div class="form-group">
                    <label for="bonificaciones">Bonificaciones</label>
                    <input type="number" step="0.01" id="bonificaciones" name="bonificaciones" value="0">
                </div>

                <div class="form-group">
                    <label for="descuentos">Descuentos</label>
                    <input type="number" step="0.01" id="descuentos" name="descuentos" value="0">
                </div>

                <div class="form-actions">
                    <input type="submit" name="generate_pdf" value="Generar Recibo" class="submit-btn">
                </div>
            </form>
        </main>
    </section>
</body>
