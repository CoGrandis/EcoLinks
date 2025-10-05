@extends(head)
<link rel="stylesheet" href="../../assets/css/home-Em.css">
<section class="dashboard">
    @extends(menu)

    <main class="home-main">
        <section class="home-header">
            <h1>Bienvenido de nuevo <span>{usuario}</span>!</h1>
            <p>¿Qué vamos a hacer hoy?</p>
        </section>

        <section class="home-content">
            <!-- Panel de estadísticas -->
            <div class="home-card stats-card">
                <h2>Estadísticas del mes</h2>
                <div class="chart-placeholder">
                    <canvas id="statsChart"></canvas>
                </div>
                <a href="#" class="home-link">ver más ></a>
            </div>

            <!-- Panel lateral -->
            <aside class="home-sidebar">
                <div class="date-card">
                    <p>Recuerda que hoy es</p>
                    <div class="date-box">
                        <span class="day">11</span>
                        <span class="month">noviembre</span>
                    </div>
                </div>

                <div class="pending-card">
                    <p>Pendiente del día</p>
                    <p class="no-pending">no hay pendientes!</p>
                </div>

                <a href="#" class="home-link side-link">ver más ></a>
            </aside>
        </section>
    </main>
</section>

<!-- Script para mostrar el día actual -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    const dayElement = document.querySelector(".date-box .day");
    const monthElement = document.querySelector(".date-box .month");

    const fecha = new Date();
    const dia = fecha.getDate();
    const mes = fecha.toLocaleString('es-ES', { month: 'long' });

    dayElement.textContent = dia;
    monthElement.textContent = mes;
});
</script>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('statsChart');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Lun', 'Mar', 'Mié', 'Jue', 'Vie'],
    datasets: [{
      label: 'Productividad (%)',
      data: [75, 90, 60, 85, 70],
      backgroundColor: [
        '#6D50FF', // accent
        '#5E9AAB', // dark
        '#90B3BF', // primary
        '#6D50FF',
        '#5E9AAB'
      ],
      borderRadius: 8
    }]
  },
  options: {
    plugins: {
      legend: { display: false }
    },
    scales: {
      y: { beginAtZero: true }
    }
  }
});
</script>
</body>
</html>
