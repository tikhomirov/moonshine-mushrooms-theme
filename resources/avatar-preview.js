(() => {
    const showPreview = (input) => {
        const dropzone = input.closest('.form-group-dropzone');
        const preview = dropzone?.querySelector('.dropzone-item img');

        const [file] = input.files;

        if (! preview || ! file || ! file.type.startsWith('image/')) {
            return;
        }

        const previousUrl = preview.dataset.previewUrl;

        if (previousUrl) {
            URL.revokeObjectURL(previousUrl);
        }

        const previewUrl = URL.createObjectURL(file);

        preview.dataset.previewUrl = previewUrl;
        preview.src = previewUrl;
        preview.alt = 'Предпросмотр нового аватара';
    };

    document.addEventListener('change', (event) => {
        const input = event.target;

        if (! (input instanceof HTMLInputElement) || input.type !== 'file' || input.name !== 'avatar') {
            return;
        }

        showPreview(input);
    });
})();
