module.exports = {
    content: [
        "node_modules/@frostui/tailwindcss/**/*.js",
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: ['class', '[data-mode="dark"]'],
    theme: {

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

        fontFamily: {
            'base': ['Inter', 'sans-serif'],
        },

        extend: {
            colors: {
                'primary': '#3073F1',

                'secondary': '#68625D',

                'success': '#1CB454',

                'warning': '#E2A907',

                'info': '#0895D8',

                'danger': '#E63535',

                'light': '#eef2f7',
                'dark': '#313a46',
            },
        },
    },
    fontSize: {
        'superscript': '0.70em',
      },
      verticalAlign: {
        'super': 'super',
      },
      fontFamily: {
        poppins: ['Poppins', 'sans-serif'],
      },
  
    plugins: [
        require('@frostui/tailwindcss/plugin'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),

    ],
}
