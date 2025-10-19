@extends(head)
<link rel="stylesheet" href="../../assets/css/listaReclamos.css">
   <link rel="stylesheet" href="../../assets/fonts/fontawesom/fawesome-all.css">

<body>
  <section class="admin-dashboard">
    <?php if ($_SESSION['user']['FK_ID_ROL'] === 3) : ?>
      @extends(menuEmployee)
    <?php else: ?>
      @extends(menu)
    <?php endif; ?>

    <main class="main-dashboard">
      <section class="Reclamos-section">
        <h2>Reclamos</h2>

  <!-- 🔍 BUSCADOR + FILTRO UNIDOS -->
        <div class="search-container">
          <div class="search-bar">
            
            <input type="text" placeholder="Buscar reclamo o empleado...">
            <i class="fas fa-search"></i>
            <div class="filter-group">
              <i class="fas fa-filter"></i>
              <select name="filtro" id="filtro">
                <option value="">Filtrar por...</option>
                <option value="fecha">Fecha</option>
                <option value="prioridad">Prioridad</option>
                <option value="estado">Estado</option>
              </select>
            </div>
            
          </div>
        </div>

        <!-- 📋 TABLA DE RECLAMOS -->
        <div class="table-container">
          <table>
            <thead>
              <tr>
                <th>asunto</th>
                <th>fecha</th>
                <th>prioridad</th>
                <th>estado</th>
                <th>empleado</th>
                <th>supervisor</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <!-- Ejemplo 1 -->
              <tr>
                <td data-label="asunto">problemas de instalación de agua</td>
                <td data-label="fecha">13/07</td>
                <td data-label="prioridad">
                  <span class="prioridad leve">
                    <i class="fas fa-leaf"></i> leve
                  </span>
                </td>
                <td data-label="estado">
                  <span class="estado pendiente">
                    <i class="fas fa-hourglass-half"></i> pendiente
                  </span>
                </td>
                <td data-label="empleado">cosmecito</td>
                <td data-label="supervisor">jose armani</td>
                <td><button class="boton-revisar">revisar</button></td>
              </tr>

              <!-- Ejemplo 2 -->
              <tr>
                <td data-label="asunto">falla en el sistema de control</td>
                <td data-label="fecha">15/07</td>
                <td data-label="prioridad">
                  <span class="prioridad media">
                    <i class="fas fa-exclamation-triangle"></i> media
                  </span>
                </td>
                <td data-label="estado">
                  <span class="estado revision">
                    <i class="fas fa-search"></i> revisión
                  </span>
                </td>
                <td data-label="empleado">maria solis</td>
                <td data-label="supervisor">juan perez</td>
                <td><button class="boton-revisar">revisar</button></td>
              </tr>

              <!-- Ejemplo 3 -->
              <tr>
                <td data-label="asunto">reportes duplicados</td>
                <td data-label="fecha">20/07</td>
                <td data-label="prioridad">
                  <span class="prioridad alta">
                    <i class="fas fa-exclamation-circle"></i> alta
                  </span>
                </td>
                <td data-label="estado">
                  <span class="estado resuelto">
                    <i class="fas fa-check-circle"></i> resuelto
                  </span>
                </td>
                <td data-label="empleado">lucas hernández</td>
                <td data-label="supervisor">carla mendes</td>
                <td><button class="boton-revisar">revisar</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
    </main>
  </section>
</body>
