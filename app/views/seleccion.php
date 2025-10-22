@extends(head)
<link rel="stylesheet" href="../../assets/css/calendario.css">
<link rel="stylesheet" href="../../../assets/css/seleccion.css">

<body>
  <section class="admin-dashboard">
    @extends(menu)

    <main class="main-dashboard">
      <section class="cv-upload-container">
        <h2><i class="bi bi-cloud-upload"></i> Subir CVs</h2>

        <form id="uploadForm" method="POST" action="/seleccion/subir_cv" enctype="multipart/form-data">
          <div class="upload-dragdrop" id="dropArea">
            <input type="file" name="cvs[]" id="fileInput" multiple accept=".pdf" hidden>
            <p>Arrastrá y soltá los CVs aquí o <label for="fileInput" class="upload-btn">seleccionalos</label></p>
          </div>

          <button type="submit" class="btn-upload">Procesar CVs con IA</button>
        </form>

        <div id="mensaje" class="mensaje"></div>
      </section>
    </main>
  </section>

  <script>
    const dropArea = document.getElementById('dropArea');
    const fileInput = document.getElementById('fileInput');
    const mensaje = document.getElementById('mensaje');

    dropArea.addEventListener('dragover', (e) => {
      e.preventDefault();
      dropArea.classList.add('dragover');
    });

    dropArea.addEventListener('dragleave', () => {
      dropArea.classList.remove('dragover');
    });

    dropArea.addEventListener('drop', (e) => {
      e.preventDefault();
      fileInput.files = e.dataTransfer.files;
      dropArea.classList.remove('dragover');
    });

    document.getElementById('uploadForm').addEventListener('submit', () => {
      mensaje.textContent = "⏳ Procesando CVs con IA...";
      mensaje.style.display = "block";
    });
  </script>
</body>


</body>
</html>
