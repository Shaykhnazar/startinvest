import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        'node_modules/preline/dist/*.js'
    ],

    theme: {
        extend: {
          fontFamily: {
            sans: ['Figtree', ...defaultTheme.fontFamily.sans],
          },
          typography: {
            DEFAULT: {
              css: {
                maxWidth: 'none',
                h1: {
                  marginTop: '2rem',
                  marginBottom: '1rem',
                },
                h2: {
                  marginTop: '1.5rem',
                  marginBottom: '0.75rem',
                },
                h3: {
                  marginTop: '1.25rem',
                  marginBottom: '0.75rem',
                }
              }
            }
          }
        },
    },

    darkMode: 'class',

    plugins: [
      forms,
      require('preline/plugin'),
      require('@tailwindcss/typography')
    ],
};
