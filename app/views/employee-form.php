@extends(head)
<link rel="stylesheet" href="../../assets/css/formu.css">

<body>
    <section class="admin-dashboard">
        @extends(menu)
  
        <main class="main-dashboard"> 
            <h1 class="form-title">Registra un empleado</h1>

            <form action="" method="POST" class="employee-form">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="surname">Apellido</label>
                    <input type="text" id="surname" name="surname" required>
                </div>

                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="dateBirth">Fecha de nacimiento</label>
                    <input type="date" id="dateBirth" name="dateBirth" required>
                </div>

                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" id="address" name="address">
                </div>

                <div class="form-group">
                    <label for="hiringDate">Fecha de contratación</label>
                    <input type="date" id="hiringDate" name="hiringDate" required>
                </div>

                <div class="form-group">
                    <label for="department">Departamento</label>
                    <select id="department" name="department" >
                        <option value="" disabled selected>Seleccione...</option>
                        {{ DEPARTMENT_OPTIONS }}
                    </select>
                </div>

                <div class="form-group">
                    <label for="position">Puesto</label>
                    <select id="position" name="position" >
                        <option value="" disabled selected>Seleccione...</option>
                        {{ POSITION_OPTIONS }}
                    </select>
                </div>

                <div class="form-actions">
                    <input type="submit" value="Registrar" class="submit-btn">
                </div>
            </form>
        </main>
    </section>
</body>
