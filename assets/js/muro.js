// Mostrar / ocultar comentarios
document.querySelectorAll('.toggle-comments').forEach(btn => {
  btn.addEventListener('click', () => {
    const cont = btn.nextElementSibling;
    cont.style.display = cont.style.display === 'block' ? 'none' : 'block';
  });
});

// Previsualización de archivos
const fileInput = document.getElementById('fileInput');
const preview = document.getElementById('file-preview');

if (fileInput) {
  fileInput.addEventListener('change', e => {
    preview.innerHTML = '';
    const files = e.target.files;
    if (!files.length) return;

    for (const file of files) {
      if (file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = ev => {
          const img = document.createElement('img');
          img.src = ev.target.result;
          img.classList.add('preview-img');
          preview.appendChild(img);
        };
        reader.readAsDataURL(file);
      } else {
        const p = document.createElement('p');
        p.textContent = `${file.name}`;
        preview.appendChild(p);
      }
    }
  });
}
