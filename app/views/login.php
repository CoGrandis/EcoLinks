
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/fonts/fontawesom/fawesome-all.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="icon" href="../assets/img/logo/logo.png" type="image/x-icon">
    <title>Ecolinks</title>
</head>

<body>
  <div class="login-wrapper">
    <!-- Panel de la izquierda con imagen -->
    <div class="login-image">
      <img src="../../assets/img/pattern.svg" alt="Login ilustración">
    </div>

    <!-- Panel de la derecha con formulario -->
    <div class="login-form">
      <h1 class="logo">EchoLinks</h1>
      <h2>Iniciar Sesión</h2>
        <p class="subtitle">Bienvenido de nuevo! Por favor ingresa tus datos.</p>

      <form method="POST" action="procesar_login.php">
        <div class="input-group">
          <label for="email">Correo</label>
          <input type="email" id="email" name="email" placeholder="ejemplo@email.com" required>
        </div>
        <div class="input-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" placeholder="••••••••" required>
        </div>
        <button type="submit" class="btn-login">Ingresar</button>
      </form>

      <p class="extra-link">¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
    </div>
  </div>
</body>
</html>