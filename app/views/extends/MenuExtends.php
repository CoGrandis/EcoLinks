
<nav class="admin-menu">
   
    <ul>
        <img src="../../../assets/img/logo/logo.svg" alt="">
        <li class="{{ PROFILE_ACTIVE }}"><i class=" icon fa-solid fa-user"></i><a href="{{ APP_URL }}/profile/{{ EMPLOYEE }}">Perfil</a></li>
        <li class=""><i class="fa fa-calendar" aria-hidden="true"></i> Calendario</li>
        <li class="{{ FILES_ACTIVE }}"><i class=" icon fa-solid fa-file"></i><a href="{{ APP_URL }}/files">Documentos</a></li>
        <li class="{{ NEWS_ACTIVE }}"><i class=" icon fa-solid fa-feather-pointed"></i><a href="{{ APP_URL }}/news">Muro Informativo</a></li>
        <li><i class=" icon fa-solid fa-left-from-bracket"></i><a href="{{ APP_URL }}auth/logout">Cerrar Sesión</a></li>
    </ul>
</nav>