@extends(head)
<link rel="stylesheet" href="../../assets/css/login.css">
<body>
    <header class="header-container">
        <section class="logo">
            <h1>EchoLinks</h1>
        </section>
        <nav class="navegacion">
            <a href="/">Home</a>
            <a href="/auth/login">Inicia Sesion</a>
            <a href="/auth/register">Registrarse</a>

        </nav>
    </header>
    <section class="login-container">
        <div class="form-container">
            <form class="form-login" method="POST" action="/auth/login">
                <h1>Iniciar sesion</h1><br>
                <input class="input" type="text" name="username" placeholder="Username" >
                <input class="input" type="password" name="password" placeholder="Password" >
                <input class="boton-login" type="submit" value="Login">
                <br>
                <p class="link-register">¿Todavia no te registraste? </p><a href="register.php">Registarte</a>
            </form>
            <div class="imagen-login-registro">
                <img src="../../assets/img/logo/login.png" >
            </div>
        </div>
        

    </section>
</body>

</html>