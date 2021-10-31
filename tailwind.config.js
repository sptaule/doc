const colors = require('tailwindcss/colors')

module.exports = {
    // mode: 'jit',
    darkMode: false,
    theme: {
        extend: {
            colors: {
                scuba: {
                    light: '#55DDFF',
                    dark: '#003380',
                    green: '#2CA089',
                },
                'blue-gray': colors.blueGray,
                'cool-gray': colors.coolGray,
                'true-gray': colors.trueGray,
                'warm-gray': colors.warmGray,
                'orange': colors.orange,
                'amber': colors.amber,
                'lime': colors.lime,
                'emerald': colors.emerald,
                'teal': colors.teal,
                'cyan': colors.cyan,
                'sky': colors.sky,
                'violet': colors.violet,
                'purple': colors.purple,
                'fuchsia': colors.fuchsia,
                'rose': colors.rose
            },
            textShadow: {
                'white': '0 0 10px #FFFFFF',
                'dark': '0 0 10px #411B00',
            },
            fontFamily: {
                classic: ['Montserrat'],
                opensans: ['Open Sans'],
                arima: ['Arima Madurai'],
            },
            backgroundImage: theme => ({
                'blue-sky': "url('../../images/body-bg.jpg')",
                'conic': 'conic-gradient(var(--tw-gradient-stops))',
                'conic-to-t': 'conic-gradient(at top, var(--tw-gradient-stops))',
                'conic-to-b': 'conic-gradient(at bottom, var(--tw-gradient-stops))',
                'conic-to-l': 'conic-gradient(at left, var(--tw-gradient-stops))',
                'conic-to-r': 'conic-gradient(at right, var(--tw-gradient-stops))',
                'conic-to-tl': 'conic-gradient(at top left, var(--tw-gradient-stops))',
                'conic-to-tr': 'conic-gradient(at top right, var(--tw-gradient-stops))',
                'conic-to-bl': 'conic-gradient(at bottom left, var(--tw-gradient-stops))',
                'conic-to-br': 'conic-gradient(at bottom right, var(--tw-gradient-stops))',
                'radial': 'radial-gradient(ellipse at center, var(--tw-gradient-stops))',
                'radial-at-t': 'radial-gradient(ellipse at top, var(--tw-gradient-stops))',
                'radial-at-b': 'radial-gradient(ellipse at bottom, var(--tw-gradient-stops))',
                'radial-at-l': 'radial-gradient(ellipse at left, var(--tw-gradient-stops))',
                'radial-at-r': 'radial-gradient(ellipse at right, var(--tw-gradient-stops))',
                'radial-at-tl': 'radial-gradient(ellipse at top left, var(--tw-gradient-stops))',
                'radial-at-tr': 'radial-gradient(ellipse at top right, var(--tw-gradient-stops))',
                'radial-at-bl': 'radial-gradient(ellipse at bottom left, var(--tw-gradient-stops))',
                'radial-at-br': 'radial-gradient(ellipse at bottom right, var(--tw-gradient-stops))',
            }),
            rotate: {
                '135': '135deg',
                '-135': '-135deg'
            },
            animation: {
                'bounce-slow': 'bounce 1.5s linear infinite',
            },
            ripple: theme => ({
                colors: theme('colors'),
                modifierTransition: 'background 0.2s',
                activeTransition: 'background 0.1s'
            }),
        },
    },
    variants: {
        gradientColorStops: [],
        backgroundImage: [],
        translate: ({after}) => after(['group-hover']),
        extend: {
            display: ['responsive', 'group-hover', 'group-focus'],
            scale: ['active', 'group-hover'],
            overflow: ['hover', 'focus'],
            opacity: ['disabled'],
            cursor: ['hover', 'disabled'],
            backgroundColor: ['odd', 'even'],
            borderStyle: ['odd', 'even'],
            borderColor: ['odd', 'even'],
            borderRadius: ['first', 'last'],
            transitionProperty: ['responsive', 'motion-safe', 'motion-reduce'],
            brightness: ['hover', 'focus'],
        },
    },
    plugins: [
        require('tailwindcss-textshadow'),
        require('@tailwindcss/forms'),
        require('tailwindcss-ripple')(),
        require('tailwindcss-animatecss')({
            classes: ['animate__animated', 'animate__fadeIn', 'animate__bounceIn', 'animate__lightSpeedOut'],
            settings: {
                animatedSpeed: 1000,
                heartBeatSpeed: 1000,
                hingeSpeed: 2000,
                bounceInSpeed: 750,
                bounceOutSpeed: 750,
                animationDelaySpeed: 1000
            },
            variants: ['responsive', 'hover', 'reduced-motion'],
        }),
    ],
}
