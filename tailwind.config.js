const colors = require('@isf/colours')

module.exports = {
  purge: [
    './public/themes/isf/**/*.php'
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    colors,
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
