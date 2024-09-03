import Quill from 'quill';

document.addEventListener('DOMContentLoaded', function() {
    // Initialize the Quill editor
    var quill = new Quill('#snow-editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ font: [] }, { size: [] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ color: [] }, { background: [] }],
                [{ script: 'super' }, { script: 'sub' }],
                [{ header: [false, 1, 2, 3, 4, 5, 6] }, 'blockquote', 'code-block'],
                [{ list: 'ordered' }, { list: 'bullet' }, { indent: '-1' }, { indent: '+1' }],
                ['direction', { align: [] }],
                ['link', 'image', 'video'],
                ['clean'],
            ],
        },
    });


   

    // Reference to the hidden input field
    var descriptionInput = document.querySelector('input[name=description]');

    // On form submission, copy the Quill content into the hidden input field
    var form = document.querySelector('#form-blog');
    form.onsubmit = function(event) {
        descriptionInput.value = quill.root.innerHTML;
    }
});
