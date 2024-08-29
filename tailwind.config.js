import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    'node_modules/preline/dist/*.js',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Bank Gothic', ...defaultTheme.fontFamily.sans],
        serif: ['ArchTitl', ...defaultTheme.fontFamily.sans],
      },
      animation: {
        'infinite-scroll': 'infinite-scroll linear infinite',
      },
      keyframes: {
        'infinite-scroll': {
          from: { transform: 'translateX(0)' },
          to: { transform: 'translateX(-100%)' },
        },
      },
    },
  },

  plugins: [forms, require('preline/plugin')],

  darkMode: 'class',
};
