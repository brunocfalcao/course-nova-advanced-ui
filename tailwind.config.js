/** @type {import('tailwindcss').Config} */

const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./src/**/*.{vue,js,ts,jsx,tsx}",
        "../eduka-ui/resources/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
        "../eduka-ui/resources/**/*.js",
        "../eduka-ui/resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
        ],
    theme: {
        extend: {
            zIndex: {
                1: '1'
            },
            fontFamily: {
                'sans': ['"Titillium Web"', 'sans-serif', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Gray based color.
                'gray-dark-900': '#1C242E',

                'bombay': {
                    DEFAULT: '#B3B6BB',
                    50: '#FFFFFF',
                    100: '#FFFFFF',
                    200: '#F4F4F5',
                    300: '#DEDFE2',
                    400: '#C9CBCE',
                    500: '#B3B6BB',
                    600: '#959AA1',
                    700: '#787D86',
                    800: '#5D6168',
                    900: '#43464B'
                },
                // Green based color.
                'aquacyan': {
                    DEFAULT: '#02FFE2',
                    50: '#BAFFF7',
                    100: '#A5FFF5',
                    200: '#7CFFF0',
                    300: '#54FFEB',
                    400: '#2BFFE7',
                    500: '#02FFE2',
                    600: '#00C9B2',
                    700: '#009180',
                    800: '#00594F',
                    900: '#00211D'
                },
                // Orange (green-complement) based color.
                'vermilion': {
                    DEFAULT: '#FF3A01',
                    50: '#FFC8B9',
                    100: '#FFB9A4',
                    200: '#FF997B',
                    300: '#FF7953',
                    400: '#FF5A2A',
                    500: '#FF3A01',
                    600: '#C82D00',
                    700: '#902000',
                    800: '#581400',
                    900: '#200700'
                },
            },
        },
    },
    plugins: [
        require('flowbite/plugin'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
    ]
};
