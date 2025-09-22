@extends(head)
<link rel="stylesheet" href="../../assets/css/register.css">

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

        <form class="formu-register" method="post">
            <h1> Registrate</h1> <br>
            <input class="input" type="text" name="id" placeholder="Nro Identificacion" required><br>
            <input class="input" type="text" name="username" placeholder="Usuario" required><br>
            <input class="input" type="email" name="email" placeholder="Email" required><br>
            <input class="boton-register" type="submit" value="Register">

        </form>
        <div class="imagen-login-registro">
                <img src="../../assets/img/logo/login.png" >
            </div>
        </div>

    </section>



</body>

</html>