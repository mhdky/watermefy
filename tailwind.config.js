const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
    extend: {
    fontFamily: {
        'poppins': ['Poppins', 'sans-serif',],
        'kanit': ['Kanit', 'sans-serif'],
    },
    screens: {
        'sm-393': '393px',
        'sm-428': '428px',
        'md-768': '768px',
        'md-820': '820px',
        'md-900': '900px',
        'md-973': '983px',
        'lg-1000': '1000px',
        'lg-1094': '1094px',
        'lg-1100': '1100px',
        'lg-1130': '1130px',
        'lg-1200': '1200px',
    },
    colors: {
        'primary': '#002868',
        'white-primary': '#E6E6E6',
        'gray-dark': '#d4d4d4',
        'gray-light': '#E8E8E8',
        'blue-secondary': '#1b376b',
        'footer-color': '#656565',
        'admin-body': '#E9DDEF',
        'nav-admin-nonactive': '#022C70',
        'nav-admin-active': '#03327E',
        'sprite': '#EEEEEE',
        'black-primary': '#3C3C3C',
        'gray-scroll': '#E0E0E0',
        },
    },
},
plugins: [require('@tailwindcss/forms')],
}  