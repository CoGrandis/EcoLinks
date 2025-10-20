@extends('head')
<link rel="stylesheet" href="../../assets/css/calendario.css">
<body>
    @include('menu')

        <section class="calendar">
            <div class="calendar-container">
                <div class="calendar-header">
                    <button id="prev">&#10094;</button>
                    <div id="monthYear"></div>
                    <button id="next">&#10095;</button>
                </div>
                <div class="calendar-days" id="calendarDays"></div>
            </div>
        </section>

        <aside class="record">
            <h3>Recuerda que hoy es</h3>
            <div id="day">
                <div class="fecha" id="todayDate"></div>
                <div class="mes" id="todayMonth"></div>
            </div>
            <div id="pendiente">
                <h4>Pendiente del día</h4>
                <ul id="tasks">
                    <li>11:50 presentación de tesis</li>
                    <li>2:00 reunión de auto crítica</li>
                </ul>
            </div>
        </aside>

    <script src="../../assets/js/calendario.js"></script>
</body>