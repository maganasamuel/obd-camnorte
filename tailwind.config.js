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
        'loop-scroll-left': 'loop-scroll-left linear infinite',
        'loop-scroll-up': 'loop-scroll-up linear infinite',
        'loop-scroll-down': 'loop-scroll-down linear infinite',
      },
      keyframes: {
        'loop-scroll-left': {
          from: { transform: 'translateX(0)' },
          to: { transform: 'translateX(-100%)' },
        },
        'loop-scroll-up': {
          from: { transform: 'translateY(0)' },
          to: { transform: 'translateY(-100%)' },
        },
        'loop-scroll-down': {
          from: { transform: 'translateY(-100%)' },
          to: { transform: 'translateY(0)' },
        },
      },
    },
  },

  plugins: [forms, require('preline/plugin')],

  darkMode: 'class',
};
