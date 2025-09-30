@extends(head)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muro | EchoLink</title>
    <link rel="stylesheet" href="assets/css/muro.css">
</head>
<body>
    @extends(menu)

    <main class="muro-container">
        <!-- Caja para crear post -->
        <section class="post-box">
            <div class="post-header">
                <div class="avatar"></div>
                <input type="text" class="post-input" placeholder="¿Qué vamos a informar hoy?">
            </div>
            <div class="post-actions">
                <button class="icon-btn"><i class="bi bi-calendar"></i></button>
                <button class="icon-btn"><i class="bi bi-paperclip"></i></button>
                <button class="submit-btn">Subir</button>
            </div>
        </section>

        <!-- Ejemplo de un post publicado -->
        <section class="post-card">
            <div class="post-top">
                <div class="avatar"></div>
                <span class="username">Usuario</span>
                <span class="date">Hoy</span>
            </div>
            <div class="post-content">
                <p>Aquí iría el contenido de la publicación...</p>
            </div>
            <div class="post-footer">
                <button class="like-btn">👍 Me gusta</button>
                <button class="comment-btn">💬 Comentar</button>
            </div>
        </section>

        <!-- Más posts debajo -->
    </main>
</body>
</html>
