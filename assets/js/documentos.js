document.addEventListener("DOMContentLoaded", () => {
    const dragArea = document.getElementById('drag-area');
    const fileInput = document.getElementById('fileInput');
    const preview = document.getElementById('preview');

    dragArea.addEventListener('click', () => fileInput.click());

    dragArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dragArea.classList.add('dragover');
    });

    dragArea.addEventListener('dragleave', () => {
        dragArea.classList.remove('dragover');
    });

    dragArea.addEventListener('drop', (e) => {
        e.preventDefault();
        dragArea.classList.remove('dragover');
        const files = e.dataTransfer.files;
        fileInput.files = files;
        showPreview(files);
    });

    fileInput.addEventListener('change', () => {
        showPreview(fileInput.files);
    });

    function showPreview(files) {
        preview.innerHTML = '';
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const div = document.createElement('div');
            div.classList.add('preview-item');
            div.innerHTML = `<span>${file.name}</span>`;
            preview.appendChild(div);
        }
    }
});
