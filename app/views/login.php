@extends(head)
    <link rel="stylesheet" href="../assets/css/login.css">

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

      <form method="POST" action="">
        <div class="input-group">
          <label for="username">Usuario</label>
          <input type="username" id="username" name="username" placeholder="Usuario" required>
        </div>
        <div class="input-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" placeholder="••••••••" required>
        </div>
        <button type="submit" class="btn-login">Ingresar</button>
      </form>

      <p class="extra-link">¿No tienes cuenta? <a href="{{ APP_URL }}register">Regístrate</a></p>
    </div>
  </div>
</body>
</html>