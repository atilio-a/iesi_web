import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                iesi: {
                    background: '#F8F6F2',
                    nav: '#AFC8E6',
                    button: '#B8E0C2',
                    buttonHover: '#F6C49A',
                    highlight: '#F5E6A3',
                    card: '#FFFFFF',
                    decorative: '#D4B8E6',
                    red: '#E8A1A1',
                    orange: '#F6C49A',
                    yellow: '#F5E6A3',
                    green: '#B8E0C2',
                    blue: '#AFC8E6',
                    purple: '#D4B8E6',
                },
            },
        },
    },

    plugins: [forms],
};
