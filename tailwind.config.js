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
      screens: {
        'sm': '576px',
        'md': '768px',
        'lg': '992px',
        'xl': '1200px',
        '2xl': '1536px',
      },
      container: {
        center: true,
        padding: '2rem',
        screens: {
          'sm': '100%',
          'md': '100%',
          'lg': '992px',
          'xl': '1200px',
          '2xl': '1536px',
        },
      },
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
    fontSize: {
      'superscript': '0.70em',
    },
    verticalAlign: {
      'super': 'super',
    },
    fontFamily: {
      poppins: ['Poppins', 'sans-serif'],
    },
    },

  },
  plugins: [
    require('flowbite/plugin')
  ],
};

