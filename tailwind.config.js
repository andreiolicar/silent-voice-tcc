import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

export default {
    content: ['./resources/views/**/*.blade.php'],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Plus Jakarta Sans', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                ink: '#201738',
                muted: '#5d5770',
                line: '#e9e4f1',
                canvas: '#f8f6fc',
                plum: '#5b35b4',
            },
        },
    },
    plugins: [forms],
};
