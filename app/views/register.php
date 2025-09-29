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
      <h2>Registrarse</h2>
        <p class="subtitle">Bienvenido de nuevo! Por favor ingresa tus datos.</p>

      <form method="POST" action="">
        <div class="input-group">
          <label for="email">Credencial</label>
          <input type="email" id="email" name="email" placeholder="2123" required>
        </div>
        <div class="input-group">
          <label for="email">Usuario</label>
          <input type="email" id="email" name="email" placeholder="Usuario" required>
        </div>
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

      <p class="extra-link">¿Ya tenes cuenta? <a href="{{ APP_URL }}auth/login">Iniciar Sesion</a></p>
    </div>
  </div>
</body>
</html>