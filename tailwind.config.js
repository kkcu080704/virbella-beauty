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
                serif: ['Playfair Display', 'serif'], // Font Elegan untuk Judul
            },
            colors: {
                // Palet Warna Virbella
                virbella: {
                    pink: '#FCE7F3',      // Latar Pink Lembut
                    darkpink: '#BE185D',  // Pink Tua (Tombol/Aksen)
                    gold: '#D4AF37',      // Emas Mewah (Judul/Border)
                    text: '#4A4A4A',      // Abu tua (Teks Bacaan)
                }
            }
        },
    },

    plugins: [forms,
        require('@tailwindcss/typography'),
    ],
};