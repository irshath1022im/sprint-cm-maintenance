/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
          fontFamily: {
            display: 'Oswald, ui-serif',
         },
     },
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}
