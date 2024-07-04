import './bootstrap';
import 'flowbite';
import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'
Alpine.plugin(focus)
window.Alpine = Alpine;
Alpine.start();


function togglePassword() {
    const passwordField = document.getElementById('password');
    const phoneField = document.getElementById('phone-input');
    const svgPaths = document.querySelectorAll('svg path, svg line, svg circle');

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
    } else {
        passwordField.type = 'password';
    }


    if (phoneField.type === 'password') {
        phoneField.type = 'text';
    } else {
        phoneField.type = 'password';
    }

    svgPaths.forEach(path => {
        if (path.classList.contains('hs-password-active:hidden')) {
            path.classList.toggle('hidden');
            path.classList.toggle('block');
        } else if (path.classList.contains('hs-password-active:block')) {
            path.classList.toggle('block');
            path.classList.toggle('hidden');
        }
    });
}

window.togglePassword = togglePassword;

