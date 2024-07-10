import Dropzone from 'dropzone';
import 'dropzone/dist/dropzone.css';
import axios from 'axios';

document.addEventListener('DOMContentLoaded', function() {
    const dropzoneElement = document.getElementById('my-dropzone');

    if (dropzoneElement) {
        const dropzone = new Dropzone(dropzoneElement, {
            url: '/upload-media',
            method: 'post',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            previewTemplate: document.querySelector('#dropzone-preview-list').innerHTML, // Set the preview template
            init: function() {
                this.on("sending", function(file, xhr, formData) {
                    formData.append('model_type', document.querySelector('#model_type').value);
                    formData.append('model_id', document.querySelector('#model_id').value);
                });
                this.on("addedfile", function(file) {
                    console.log("File added:", file);
                });
                this.on("thumbnail", function(file, dataUrl) {
                    console.log("Thumbnail generated:", dataUrl);
                });
                this.on("success", function(file, response) {
                    console.log("File uploaded successfully:", response);
                    file.uploadedMediaId = response.media_id; // Store the uploaded media ID for later deletion
                    addDeleteIcon(file); // Add delete icon when file is uploaded
                });
                this.on("error", function(file, errorMessage) {
                    console.error("Error uploading file:", errorMessage);
                    let message = 'An error occurred';
                    if (errorMessage && errorMessage.errors) {
                        message = Object.values(errorMessage.errors).flat().join('. ');
                    }
                    file.previewElement.querySelector('[data-dz-errormessage]').textContent = message;
                });
            }
        });

        function addDeleteIcon(file) {
            const deleteButton = file.previewElement.querySelector('.dz-delete');
            deleteButton.addEventListener('click', function(event) {
                event.preventDefault();
                event.stopPropagation();

                // Send a delete request to the server
                axios.delete(`/delete-media/${file.uploadedMediaId}`, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                }).then(response => {
                    console.log('Image deleted successfully.');
                    // Remove the file preview
                    dropzone.removeFile(file);
                }).catch(error => {
                    console.error('Error deleting image:', error);
                });
            });
        }
    }
});
