@extends(head)
<link rel="stylesheet" href="../../../assets/css/perfil.css">
<link rel="stylesheet" href="../../../assets/css/documentos.css">

<body>
  <section class="admin-dashboard">

    <?php if ($_SESSION['user']['FK_ID_ROL'] === 3) : ?>
      @extends(menuEmployee)
    <?php else: ?>
      @extends(menu)
    <?php endif; ?>

    <main class="main-dashboard">
      <!-- Cabecera perfil -->
      <section class="perfil-header">
        <div class="perfil-img" >
          <img src="https://ui-avatars.com/api/?name={{ EMPLOYEE_NAME }}&background=random&color=fff&size=150" alt="Avatar empleado">
        </div>
        <div class="perfil-info">
          <h1 class="perfil-nombre">{{ EMPLOYEE_NAME }}</h1>
          <h2 class="perfil-puesto">{{ EMPLOYEE_POSITION }}</h2>
        </div>
      </section>

      <hr class="perfil-divider">
      
      <section class="perfil-body">
        <!-- Accesos laterales -->
        <aside class="perfil-sidebar">
            <button class="perfil-btn" onClick="window.location.href='/perfil'"> <i class="bi bi-file-earmark-person"></i> Mis datos</button>
            <button class="perfil-btn" onClick="window.location.href='/mis-reclamos'"> <i class="bi bi-exclamation-diamond"></i>Mis Reclamos</button>
            <button class="perfil-btn" onClick="window.location.href='/documentos'"><i class="bi bi-inbox-fill"></i>Mis archivos</button>
        
        </aside>
       <div class="perfil-trayectoria">
          <!-- Formulario de subida -->
          <form id="uploadForm" action="/documentos/subir" method="POST" enctype="multipart/form-data" class="upload-dragdrop">
              <div class="drag-area" id="drag-area">
                  <div class="icon-cloud">
                      <i class="fas fa-cloud-upload-alt"></i>
                  </div>
                  <p>Arrastra y suelta archivos aquí o haz clic para seleccionar</p>
                  <input type="file" id="fileInput" name="files[]" multiple required>
                  <button type="submit" class="btn-import">Subir archivos</button>
              </div>
              <div id="preview"></div>
          </form>

          <!-- Lista de documentos existentes -->
          <div class="mis-documentos-lista">
              <h3>Mis Documentos</h3>
              <div class="mis-documentos-preview">
    <?php if (!empty($DOCUMENTOS)) : ?>
        <?php foreach ($DOCUMENTOS as $doc) : ?>
            <div class="doc-card">
                <div class="doc-icon">
                    <?php
                        $ext = pathinfo($doc['nombre'], PATHINFO_EXTENSION);
                        switch (strtolower($ext)) {
                            case 'pdf': $icon = 'fas fa-file-pdf'; break;
                            case 'doc':
                            case 'docx': $icon = 'fas fa-file-word'; break;
                            case 'xls':
                            case 'xlsx': $icon = 'fas fa-file-excel'; break;
                            case 'jpg':
                            case 'jpeg':
                            case 'png':
                            case 'gif': $icon = 'fas fa-file-image'; break;
                            default: $icon = 'fas fa-file'; break;
                        }
                    ?>
                    <i class="<?= $icon ?> fa-3x"></i>
                </div>
                <div class="doc-info">
                    <span class="doc-name"><?= $doc['nombre'] ?></span>
                    <span class="doc-date"><?= date('d/m/Y H:i', strtotime($doc['fecha_subida'])) ?></span>
                </div>
                <div class="doc-actions">
                <a href="/<?= $doc['ruta'] ?>" target="_blank" class="btn-download">
                  <i class="fas fa-download"></i></a>
                <form method="POST" action="/documentos/eliminar" class="form-delete">
                    <input type="hidden" name="id_documento" value="<?= $doc['ID_DOCUMENTO'] ?>">
                    <button type="submit" class="btn-delete"><i class="fas fa-trash-alt"></i> </button>
                </form>
            </div>

            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No has subido documentos todavía.</p>
    <?php endif; ?>
</div>
</div>


            
        </section>
    </main>
  </section>

</body>
</html>
<script src="../../../assets/js/documentos.js"></script>
