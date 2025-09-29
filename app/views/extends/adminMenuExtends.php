<nav class="admin-menu">
    <ul>
        <li class=""><a href="{{ APP_URL }}admin/dashboard"></a></li>
        <li class="{{ DASHBOARD_ACTIVE }}"><i class=" icon fa-solid fa-house"></i><a href="{{ APP_URL }}admin/dashboard">Dashboard</a></li>
        <li class="{{ EMPLOYEES_ACTIVE }}"><i class=" icon fa-solid fa-address-card"></i><a href="{{ APP_URL }}admin/employee">Empleados</a></li>
        <li><i class=" icon fa-solid fa-file"></i><a href="{{ APP_URL }}admin/news">Documentos</a></li>
        <li class="{{ NEWS_ACTIVE }}"><i class=" icon fa-solid fa-feather-pointed"></i><a href="{{ APP_URL }}admin/news">Muro Informativo</a></li>
        <li><i class=" icon fa-solid fa-memo-pad"></i><a href="{{ APP_URL }}admin/news">Curriculums</a></li>
        <li><i class=" icon fa-solid fa-left-from-bracket"></i><a href="{{ APP_URL }}auth/logout">Cerrar Sesión</a></li>
    </ul>
</nav>