// Your existing imports
import Quill from 'quill';
import 'quill/dist/quill.snow.css';
import Dropzone from 'dropzone';
import 'dropzone/dist/dropzone.css';
import axios from "axios";
import '@fortawesome/fontawesome-free/js/all.js';
import "@frostui/tailwindcss"
import feather from 'feather-icons';
import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';

Alpine.plugin(focus);

window.Alpine = Alpine;

Alpine.start();
// Make Axios available globally (optional)
window.axios = axios;
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

class App {

    // Components
    initComponents() {

        // Feather Icons
        feather.replace();
        
        var quillEditor = document.querySelector('#quill-editor');

        if (quillEditor) {
            var quill = new Quill('#quill-editor', {
                theme: 'snow'
            });

            // Reference to the hidden input field
            var descriptionInput = document.querySelector('input[name=description]');

            // Update the hidden input field with Quill content on form submission
            var form = document.querySelector('form');
            form.onsubmit = function(event) {
                event.preventDefault();

            // Create a FormData object
            var formData = new FormData(form);
            formData.append('description', quill.root.innerHTML);
            };
        }
        
        // Back To Top
        const mybutton = document.querySelector('[data-toggle="back-to-top"]');

        window.addEventListener('scroll', function () {
            if (window.pageYOffset > 72) {
                mybutton.classList.add('flex');
                mybutton.classList.remove('hidden');

            } else {
                mybutton.classList.remove('flex');
                mybutton.classList.add('hidden');
            }
        });

        mybutton.addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // Topbar Fullscreen Button
    initfullScreenListener() {
        var self = this;
        var fullScreenBtn = document.querySelector('[data-toggle="fullscreen"]');

        if (fullScreenBtn) {
            fullScreenBtn.addEventListener('click', function (e) {
                e.preventDefault();
                document.body.classList.toggle('fullscreen-enable')
                if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement) {
                    if (document.documentElement.requestFullscreen) {
                        document.documentElement.requestFullscreen();
                    } else if (document.documentElement.mozRequestFullScreen) {
                        document.documentElement.mozRequestFullScreen();
                    } else if (document.documentElement.webkitRequestFullscreen) {
                        document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                    }
                } else {
                    if (document.cancelFullScreen) {
                        document.cancelFullScreen();
                    } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if (document.webkitCancelFullScreen) {
                        document.webkitCancelFullScreen();
                    }
                }
            });
        }
    }

    initPasswordIcon(){
        window.addEventListener('toggle', function(){

        });
    }
    
    init() {
        this.initComponents();
        this.initfullScreenListener();
    }
}

// Rest of your ThemeCustomizer class and other code remains the same

// Initialize the App and ThemeCustomizer
new App().init();
new ThemeCustomizer().init();
