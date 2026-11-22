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

    // Keep the themed picker label in sync with the chosen file. The native
    // input text is hidden by CSS (it follows the browser language), so the
    // wrapper's data-file-name drives what is displayed.
    const updateFileName = (input) => {
        const dropzone = input.closest('.form-group-dropzone');

        if (! dropzone) {
            return;
        }

        const [file] = input.files;
        const isRu = (document.documentElement.lang || '').startsWith('ru');

        dropzone.dataset.fileName = file ? file.name : (isRu ? 'Файл не выбран' : 'No file chosen');
    };

    document.addEventListener('change', (event) => {
        const input = event.target;

        if (input instanceof HTMLInputElement && input.type === 'file') {
            updateFileName(input);
        }
    });

    const initFileNames = () => {
        document
            .querySelectorAll('.form-group-dropzone input[type="file"]')
            .forEach(updateFileName);
    };

    // Image fields in MoonShine core render no remove button (isRemovable
    // is File-only). The theme adds one so an already uploaded image can
    // be deleted before saving.
    const ensureRemoveButtons = () => {
        document
            .querySelectorAll('.form-group-dropzone .dropzone-item')
            .forEach((item) => {
                if (item.querySelector('.dropzone-remove')) {
                    return;
                }

                const button = document.createElement('button');
                button.type = 'button';
                button.className = 'dropzone-remove';
                button.setAttribute('aria-label', 'Remove file');
                button.innerHTML =
                    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="14" height="14" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/></svg>';
                item.appendChild(button);
            });
    };

    document.addEventListener('click', (event) => {
        const button = event.target.closest('.dropzone-remove');

        if (! button) {
            return;
        }

        event.preventDefault();
        button.closest('.x-removeable')?.remove();
    });

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFileNames);
    } else {
        initFileNames();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', ensureRemoveButtons);
    } else {
        ensureRemoveButtons();
    }

    document.addEventListener('change', (event) => {
        if (event.target instanceof HTMLInputElement && event.target.type === 'file') {
            ensureRemoveButtons();
        }
    });

    // MoonShine replaces form fragments after a Save without a page reload,
    // so also watch for newly inserted dropzone items.
    const observer = new MutationObserver(() => ensureRemoveButtons());

    const startObserver = () => {
        observer.observe(document.body, { childList: true, subtree: true });
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', startObserver);
    } else {
        startObserver();
    }
})();
