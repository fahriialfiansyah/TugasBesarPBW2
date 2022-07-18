const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    content: [
        './pages/**/*.{html,js}',
        './components/**/*.{html,js}',
    ],
    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            'blue': '#1fb6ff',
            'purple': '#7e5bef',
            'pink': '#ff49db',
            'orange': '#ff7849',
            'green': '#13ce66',
            'yellow': '#ffc82c',
            'gray-dark': '#273444',
            'gray': '#8492a6',
            'gray-light': '#d3dce6',
            'white': '#ffffff',
            'purple': '#3f3cbb',
            'midnight': '#121063',
            'metal': '#565584',
            'tahiti': '#3ab7bf',
            'silver': '#ecebff',
            'bubble-gum': '#ff77e9',
            'bermuda': '#78dcca',
        },
        fontFamily: {
            sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            // serif: ['Merriweather', 'serif'],
        },
        extend: {
            spacing: {
                '8xl': '96rem',
                '9xl': '128rem',
            },
            borderRadius: {
                '4xl': '2rem',
            },
            gridTemplateColumns: {
                // Simple 3 column grid
                '3': 'repeat(3, minmax(0, 1fr))',
            }
        }
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/typography'),
        require('tailwindcss-children'),
    ],
};