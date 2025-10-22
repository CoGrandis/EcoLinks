@extends(head)
<link rel="stylesheet" href="../../../assets/css/home-Em.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>
    <section class="admin-dashboard">
        @extends(menu)
        <main class="main-dashboard"> 
            <main class="home-main">

                <!-- Encabezado -->
                <section class="home-header">
                    <h1>Bienvenido de nuevo <span>{{ USER }}</span>!</h1>
                    <p>¿Qué vamos a hacer hoy?</p>
                </section>

                <!-- Contenido principal -->
                <section class="home-content">

                    <!-- Panel izquierdo: gráficos -->
                    <div class="left-panel">
                        <!-- Empleados por departamento -->
                        <div class="chart-container">
                            <h3>Empleados por departamento</h3>
                            <canvas id="empleadosDepartamentoChart"></canvas>
                        </div>

                        <!-- Reclamos por estado -->
                        <div class="chart-container">
                            <h3>Reclamos por estado</h3>
                            <canvas id="reclamosEstadoChart"></canvas>
                        </div>
                    </div>

                    <!-- Panel derecho: fecha y estadísticas rápidas -->
                    <div class="right-panel">
                        <!-- Fecha -->
                        <div class="date-card">
                            <p>Hoy es</p>
                            <div class="date-box" id="fecha-box">
                                <span class="day">11</span>
                                <span class="month">noviembre</span>
                            </div>
                        </div>

                        <!-- Estadísticas rápidas -->
                        <div class="stat-card">
                            <h3>Empleados</h3>
                            <p>Total: <strong><?= $estadisticas['total_empleados'] ?></strong></p>
                            <p>Antigüedad promedio: <strong><?= round($estadisticas['antiguedad_promedio'], 1) ?> años</strong></p>
                        </div>

                        <div class="stat-card">
                            <h3>Reclamos</h3>
                            <p>Total: <strong><?= $estadisticas['total_reclamos'] ?></strong></p>
                            <p>Promedio por empleado: <strong><?= round($estadisticas['promedio_reclamos_por_empleado'], 2) ?></strong></p>
                        </div>
                    </div>

                </section>


            </main>
        </main>
    </section>

    <!-- Script para mostrar la fecha actual -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const dayEl = document.querySelector(".date-box .day");
            const monthEl = document.querySelector(".date-box .month");

            const fecha = new Date();
            dayEl.textContent = fecha.getDate();
            monthEl.textContent = fecha.toLocaleString('es-ES', { month: 'long' });
        });
    </script>

    <!-- Script para gráficos -->
    <script>
        // Empleados por departamento
        const deptLabels = <?= json_encode(array_map(fn($d) => $d['departamento'] ?? 'Sin departamento', $estadisticas['empleados_departamento'])) ?>;
        const deptData = <?= json_encode(array_map(fn($d) => (int)$d['total'], $estadisticas['empleados_departamento'])) ?>;

        new Chart(document.getElementById('empleadosDepartamentoChart'), {
            type: 'bar',
            data: {
                labels: deptLabels,
                datasets: [{
                    label: 'Empleados',
                    data: deptData,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    borderRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: { y: { beginAtZero: true } }
            }
        });

        // Reclamos por estado
        const reclamosLabels = <?= json_encode(array_map(fn($r) => $r['estado'], $estadisticas['reclamos_estado'])) ?>;
        const reclamosData = <?= json_encode(array_map(fn($r) => (int)$r['total'], $estadisticas['reclamos_estado'])) ?>;

        new Chart(document.getElementById('reclamosEstadoChart'), {
            type: 'pie',
            data: {
                labels: reclamosLabels,
                datasets: [{
                    label: 'Reclamos',
                    data: reclamosData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
                    ],
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });
    </script>

</body>
</html>
