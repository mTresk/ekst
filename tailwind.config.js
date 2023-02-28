const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './vendor/filament/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                danger: colors.red,
                primary: {
                    50: "#E0F4FF",
                    100: "#BDE7FF",
                    200: "#80D0FF",
                    300: "#3DB8FF",
                    400: "#00A2FF",
                    500: "#0077BD",
                    600: "#006199",
                    700: "#004770",
                    800: "#00304D",
                    900: "#001724"
                },
                success: colors.green,
                warning: colors.yellow,
            },
            fontFamily: {
                sans: ['Ubuntu'],
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
