<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echolinks</title>
    <link rel="stylesheet" href="./assets/css/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <header class="encabezado-register">

        <div class="logo">
            <h1> ECHOLINKS</h1>
        </div>

        <nav class="navegacion">
            <a href="/">Home</a>
            <a href="/Auth//loginView">Iniciar Sesión</a>
            <a href="/Auth//registerView" class="boton-register">REGISTRARSE</a>
        </nav>
    </header>
    </header>
    <section class="caja-register">

        <div class="caja">
        </div>

        <form class="formu-register" method="post">
            <h1> Registrate</h1> <br>
            <input class="input" type="text" name="nombre" placeholder="Nombre" required><br>
            <input class="input" type="text" name="apellido" placeholder="Apellido" required><br>
            <input class="input" type="text" name="username" placeholder="Usuario" required><br>
            <input class="input" type="email" name="email" placeholder="Email" required><br>
            <input class="input" type="text" name="direccion" placeholder="Dirección" required><br>
            <input class="input" type="password" name="password" placeholder="Contraseña" required><br>
            <input class="fechaNacimiento" type="date" name="fechaNacimiento" placeholder="Fecha de Nacimiento" required><br>
            <select class="departamento" name="departamento">
                <option value="">Departamento</option>
                <option value="1">Administración</option>
                <option value="2">Marketing y Ventas</option>
                <option value="3">Finanzas y Contabilidad</option>
                <option value="4">Producción</option>
                <option value="5">Recursos Humanos</option>
            </select><br>
            <input class="boton-register" type="submit" value="Register">

        </form>


    </section>



</body>

</html>