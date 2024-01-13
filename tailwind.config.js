import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography'
import colors from 'tailwindcss/colors'
import defaultTheme from 'tailwindcss/defaultTheme'

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/views/**/*.blade.php',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
    extend: {
      colors: {
        primary: colors.green,
        secondary: colors.neutral
      },
      minHeight: {
        '(screen-content)': 'calc(100vh - 9.625rem)',
      },
      fontFamily: {
        sans: ['Nunito', ...defaultTheme.fontFamily.sans]
      }
    },
  },
  plugins: [forms, typography],
}

