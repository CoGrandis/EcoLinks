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
    <link rel="stylesheet" href="../../assets/css/register.css">
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