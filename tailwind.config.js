/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
        colors:{
            dark: {
                primary: '#171219'
            },
        },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
  darkMode: 'class'
}

