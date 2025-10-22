<nav class="admin-menu" id="adminMenu">
    <div class="menu-toggle" id="menuToggle">
        <i class="fa-solid fa-bars"></i>
    </div>
    <ul>
        <li class=""><a href="{{ APP_URL }}dashboard"></a></li>
        <li class="{{ DASHBOARD_ACTIVE }}"><i class=" icon fa-solid fa-house"></i><a href="{{ APP_URL }}dashboard">Dashboard</a></li>
        <li class="{{ PROFILE_ACTIVE }}"><i class=" icon fa-solid fa-user"></i><a href="{{ APP_URL }}perfil">Perfil</a></li>
        <li class="{{ EMPLOYEES_ACTIVE }}"><i class=" icon fa-solid fa-address-card"></i><a href="{{ APP_URL }}empleados">Empleados</a></li>
        <li class="{{ NEWS_ACTIVE }}"><i class=" icon fa-solid fa-feather-pointed"></i><a href="{{ APP_URL }}noticias">Muro Informativo</a></li>
        <li><i class=" icon fa-solid fa-memo-pad"></i><a href="{{ APP_URL }}curriculums">Curriculums</a></li>
        <li class="{{ RECIBO_ACTIVE }}"><i class=" icon fa-solid fa-pen"></i><a href="{{ APP_URL }}recibo-sueldo">Recibos</a></li>
        <li><i class=" icon fa-solid fa-left-from-bracket"></i><a href="{{ APP_URL }}logout">Cerrar Sesión</a></li>
    </ul>
</nav>

<script src="../../../assets/js/fun.js"></script>