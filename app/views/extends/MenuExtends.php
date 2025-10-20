
<nav class="admin-menu" id="adminMenu">
    <div class="menu-toggle" id="menuToggle">
        <i class="fa-solid fa-bars"></i>
    </div>

    <ul>
        <li class="{{ PROFILE_ACTIVE }}"><i class="icon fa-solid fa-user"></i><a href="{{ APP_URL }}perfil">Perfil</a></li>
        <li class="{{ FILES_ACTIVE }}"><i class="icon fa-solid fa-file"></i><a href="{{ APP_URL }}documentos">Documentos</a></li>
        <li class="{{ NEWS_ACTIVE }}"><i class="icon fa-solid fa-feather-pointed"></i><a href="{{ APP_URL }}noticias">Muro Informativo</a></li>
        <li><i class="icon fa-solid fa-left-from-bracket"></i><a href="{{ APP_URL }}logout">Cerrar Sesión</a></li>
    </ul>
</nav>

<script src="../../../assets/js/fun.js"></script>