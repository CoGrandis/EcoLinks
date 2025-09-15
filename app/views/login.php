<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/fonts/fontawesom/fawesome-all.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/login.css">
    <link rel="icon" href="../../assets/img/logo/logo.png" type="image/x-icon">
    <title>Echolinks</title>
</head>

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