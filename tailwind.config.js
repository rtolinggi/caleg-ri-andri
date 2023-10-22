const colors = require("tailwindcss/colors");

const colorPrimary = {
    50: "#e0e7ff",
    100: "#c7d2fe",
    200: "#a5b4fc",
    300: "#818cf8",
    400: "#6366f1",
    500: "#4f46e5",
    600: "#4338ca",
    700: "#3730a3",
    800: "#312e81",
    900: "#1e1b4b",
};

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/filament/**/*.blade.php",
        "./ node_modules / flowbite/**/ *.js",
    ],
    darkMode: "class",
    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: "1.25rem",
                sm: "2rem",
                lg: "4rem",
                xl: "5rem",
                "2xl": "6rem",
            },
        },
        colors: {
            transparent: "transparent",
            current: "currentColor",
            black: " colors.black",
            white: colors.white,
            utama: colorPrimary[500],
        },
        extend: {
            colors: {
                primary: colorPrimary,
                success: colors.green,
                warning: colors.yellow,
                danger: colors.rose,
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("flowbite/plugin"),
    ],
};
