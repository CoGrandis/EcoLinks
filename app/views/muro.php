@extends(head)
<link rel="stylesheet" href="../../assets/css/muro.css">
<body>
<section class="admin-dashboard">
    <?php if ($_SESSION['user']['FK_ID_ROL'] === 3): ?>
        @extends(menuEmployee)
    <?php else: ?>
        @extends(menu)
    <?php endif; ?>

    <main class="main-dashboard">
        <main class="muro-container">

            <?php if ($_SESSION['user']['FK_ID_ROL'] != 3): ?>
            <section class="post-box">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="accion" value="nuevo_post">

                    <div class="post-header">
                        <div class="avatar"></div>
                        <input type="text" name="title" class="post-input" placeholder="Título del post" required>
                    </div>

                    <div class="form-group">
                        <textarea name="content" class="post-input" placeholder="¿Qué vamos a informar hoy?" required></textarea>
                    </div>

                    <div id="file-preview"></div>

                    <div class="post-actions">
                        <button type="button" class="icon-btn" onclick="document.getElementById('fileInput').click()">
                            <i class="fa-solid fa-paperclip"></i>
                        </button>
                        <input type="file" id="fileInput" name="files[]" multiple hidden>
                        <button type="submit" class="submit-btn">Publicar</button>
                    </div>
                </form>
            </section>
            <?php endif; ?>

            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <section class="post-card">
                        <div class="post-top">
                            <div class="avatar">
                                <img src="https://ui-avatars.com/api/?name=<?=htmlspecialchars($post['nombre_empleado'] . ' ' . $post['apellido_empleado'])?>&background=random&color=fff&size=150" alt="Avatar empleado">
                            </div>
                            <span class="username"><?= htmlspecialchars($post['username']) ?></span>
                            <span class="date"><?= date("d/m/Y H:i", strtotime($post['fechaCreado'])) ?></span>
                        </div>

                        <div class="post-content">
                            <h3><?= htmlspecialchars($post['titulo']) ?></h3>
                            <p><?= nl2br(htmlspecialchars($post['contenido'])) ?></p>
                        </div>

                        <?php if (!empty($post['files'])): ?>
                            <div class="post-files">
                                
                                <?php foreach ($post['files'] as $p): ?>
                                <?php if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $p['direccionArchivo'])): ?>
                                    <img src="/<?= htmlspecialchars($p['direccionArchivo']) ?>" alt="Imagen del post" class="post-image">
                                <?php else: ?>
                                    <a href="/<?= htmlspecialchars($p['direccionArchivo']) ?>" target="_blank">📎 Ver archivo adjunto</a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                        <?php endif; ?>

                        <div class="comentarios-section">
                            <button class="toggle-comments">Comentarios (<?= count($post['comentarios']) ?>)</button>

                            <div class="comentarios-container">
                                <?php foreach ($post['comentarios'] as $c): ?>
                                    <div class="comentario">
                                        <strong><?= htmlspecialchars($c['username']) ?>:</strong>
                                        <?= nl2br(htmlspecialchars($c['comentario'])) ?>
                                    </div>
                                <?php endforeach; ?>

                                <form method="POST" class="comentario-form" >
                                    <input type="hidden" name="accion" value="nuevo_comentario">
                                    <input type="hidden" name="post_id" value="<?= $post['ID_POST'] ?>">
                                    <input type="text" name="comentario" placeholder="Escribe un comentario..." required>
                                    <button type="submit" class="icon-btn"><i class="fa-solid fa-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </section>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No hay publicaciones aún.</p>
            <?php endif; ?>

        </main>
    </main>
</section>

<script src="../../../assets/js/muro.js"></script>
</body>
</html>
