<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alpine Modal Example</title>
    @vite('resources/css/app.css')
    <style>
        .modal-content {
            max-height: calc(100vh - 150px); /* Adjust as needed */
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div x-data="{ open: false }" x-init="$watch('open', value => { if (value) loadContent() })">
        <!-- Button to open the modal -->
        <button @click="open = true" class="bg-blue-500 text-white px-4 py-2 rounded">
            Open Services Modal
        </button>

        <!-- Modal -->
        <div x-show="open" x-cloak @keydown.escape.window="open = false" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div @click.away="open = false" class="bg-white rounded-lg shadow-lg w-full max-w-2xl">
                <!-- Modal header -->
                <div class="flex justify-between items-center p-2 border-b border-gray-200">
                    <h2 class="text-xl font-semibold">Add Business</h2>
                    <button @click="open = false" class="text-gray-700">X</button>
                </div>

                <!-- Modal content -->
                <div id="modal-content" class="modal-content p-4">
                    <!-- Blade content will be loaded here via AJAX -->
                </div>

                <!-- Modal footer -->
                <div class="flex justify-center p-4 border-t border-gray-200">
                    <button type="button" class="bg-violet-900 text-white  px-10 py-2 opacity-50 rounded mr-2 cursor-not-allowed" disabled>Add Business</button>
                    <button type="submit" class="bg-white text-gray-700 border-2 border-gray-500 opacity-50 px-10 py-2 rounded cursor-not-allowed" disabled>Save Draft</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function loadContent() {
            fetch('/services')
                .then(response => response.text())
                .then(html => {
                    document.getElementById('modal-content').innerHTML = html;
                })
                .catch(error => {
                    console.error('Error loading modal content:', error);
                });
        }
    </script>
    @vite('resources/js/app.js')
</body>
</html>
