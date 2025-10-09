@extends(head)
    <link rel="stylesheet" href="../../../assets/css/muro.css">

<body>
    <section class="admin-dashboard">
    <?php if ($_SESSION['user']['FK_ID_ROL'] === 3) : ?>
        @extends(menuEmployee)
    <?php else: ?>
        @extends(menu)
    <?php endif; ?>

    <main class="main-dashboard">
    <main class="muro-container">

        <section class="post-box">
            <form method="POST" enctype="multipart/form-data">
                <div class="post-header">
                    <div class="avatar"></div>
                    <input type="text" name="title" class="post-input" placeholder="Título del post" required>
                </div>
                <div class="form-group">
                    <textarea name="content" class="post-input" placeholder="¿Qué vamos a informar hoy?" required></textarea>
                </div>
                <div class="post-actions">
                    <button class="icon-btn"><i class="bi bi-calendar"></i></button>
                    <button type="button" class="icon-btn" onclick="document.getElementById('fileInput').click()">
                        <i class="fa-solid fa-paperclip"></i>
                    </button>
                    <input 
                        type="file" 
                        id="fileInput" 
                        name="files[]" 
                        multiple 
                        hidden
                    >
                    <button type="submit" class="submit-btn">Subir</button>
                </div>
            </form>
        </section>

        <?php if (!empty($posts)) : ?>
            <?php foreach ($posts as $post) : ?>
                <section class="post-card">
                    <div class="post-top">
                        <div class="avatar"></div>
                        <span class="username"><?= htmlspecialchars($post['username']) ?></span>
                        <span class="date"><?= date("d/m/Y H:i", strtotime($post['createdAt'])) ?></span>
                    </div>
                    <div class="post-content">
                        <h3><?= htmlspecialchars($post['title']) ?></h3>
                        <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
                    </div>

                    <?php if (!empty($post['files'])) : ?>
                        <div class="post-files">
                            <h4>Archivos adjuntos:</h4>
                            <ul>
                                <?php foreach ($post['files'] as $file) : ?>
                                    <li>
                                        <a href="<?= htmlspecialchars($file['filepath']) ?>" target="_blank">
                                            <?= htmlspecialchars($file['filename']) ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <div class="post-footer">
                        <button class="comment-btn">Comentar</button>
                    </div>
                </section>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No hay publicaciones aún.</p>
        <?php endif; ?>

    </main>
</main>

</section>
</body>
</html>
