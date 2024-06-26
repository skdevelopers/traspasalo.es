# traspasalo.es
traspasalo.es website for business listing real estate listing and other services listing using Laravel 11 and Tailwind TALL Stack

# Installation
use npm install and then run npm run dev for frotnend and php artisan serve to run Laravel 11.
# Author
Mian Salman @Thinkdelivers.com

# Instalation terminal commands
composer create-project --prefer-dist laravel/laravel:^11.0 traspasalo.es
cd traspasalo.es
# Install Tailwindcss
npm install -D tailwindcss postcss autoprefixer
# Initialize Tailwindcss
npx tailwindcss init -p
# Install Node Modules
npm install

# Tailwind Configure
/** @type {import('tailwindcss').Config} */
export default {
content: [
'./resources/**/*.blade.php',
'./resources/**/*.js',
'./resources/**/*.vue',
"./node_modules/flowbite/**/*.js",
],
theme: {
extend: {
//   colors: {
//     white: "#fff",
//     black: "#000",
//     coral: "#ec642a",
//     indigo: "#270b79",
//     dimgray: "#707070",
//     purple: "#270B79",
//     gray: {
//       "100": "#8e8e8e",
//       "200": "#828282",
//     },
//     darkslategray: {
//       "100": "#454545",
//       "200": "#333",
//     },
//     gainsboro: "#e6e6e6",
//     whitesmoke: "#f7f7f7",
//   },
//   spacing: {
//     "spacing-sm": "32px",
//     "spacing-m": "48px",
//   },
//   fontFamily: {
//     "plus-jakarta-sans": "'Plus Jakarta Sans'",
//     poppins: "Poppins",
//     "small-text": "Inter",
//     ubuntu: "Ubuntu",
//   },
// },
// fontSize: {
//   base: "16px",
//   sm: "14px",
//   xl: "20px",
//   "29xl": "48px",
//   "10xl": "29px",
//   "19xl": "38px",
//   xs: "12px",
//   "9xl": "28px",
//   "3xl": "22px",
//   "16xl": "35px",
//   "2xl": "21px",
//   lg: "18px",
//   "41xl": "60px",
//   "17xl": "36px",
//   lgi: "19px",
//   "5xl": "24px",
//   "21xl": "40px",
//   "45xl": "64px",
//   inherit: "inherit",
},

},
plugins: [
require('flowbite/plugin')
],
};

# Vite Configure
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
plugins: [
laravel({
input: ['resources/css/app.css', 'resources/js/app.js'],
refresh: true,
}),
],
});
# Postcss configure
export default {
plugins: {
tailwindcss: {},
autoprefixer: {},
},
}

