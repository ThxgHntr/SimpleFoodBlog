const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                'maincolor': '#f3f4f6',
                'btncolor': '#059669',
                'btncolor-hover': '#10b981',
                'btncolor-active': '#047857',
            },
        },
    },

    plugins: [require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('flowbite/plugin')],
};
