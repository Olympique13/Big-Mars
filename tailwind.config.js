/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  darkMode: 'class',
  theme: {
    extend: {
      boxShadow: {
        '2xl': '0 25px 50px -12px rgba(0, 0, 0, 0.08)',
      },
      colors: {
        gray: {
          50: '#FAFAFA',
          100: '#F4F4F5',
          200: '#E4E4E7',
          300: '#D4D4D8',
          400: '#A2A2A8',
          500: '#6E6E76',
          600: '#52525A',
          700: '#3F3F45',
          800: '#2E2E33',
          900: '#1D1D20',
        },
        teal: {
          50: '#F4FFFD',
          100: '#E6FFFA',
          200: '#B2F5EA',
          300: '#81E6D9',
          400: '#4FD1C5',
          500: '#3ABAB4',
          600: '#319795',
          700: '#2C7A7B',
          800: '#285E61',
          900: '#234E52',
        },
        blue: {
          50: '#7681b3',
          100: '#637df2',

        },
        purple: {
          50: '#665169',
          100: '#252233',
        },
        pink: {
          50: '#FFF5F7',
          100: '#FFEBEF',
          200: '#FED7E2',
          300: '#FBB6CE',
          400: '#F687B3',
          500: '#ED64A6',
          600: '#D53F8C',
          700: '#B83280',
          800: '#97266D',
          900: '#702459',
        },
        yellow : {
          50: '#edc140',
          100: '#e7be60',
          200: '#ffd045',
          300: '#caa537'
        }
      },
      outline: {
        blue: '2px solid rgba(0, 112, 244, 0.5)',
      },
      spacing: {
        128: '32rem',
        '9/16': '56.25%',
        '3/4': '75%',
        '1/1': '100%',
      },
      fontFamily: {
        'graphit': [ 'Graphit-Regular', 'sans-serif' ],
        'AtomicMarker': [ 'AtomicMarker', 'sans-serif' ],
      },
      fontSize: {
        xs: [ '0.75rem', { lineHeight: '1.5' } ],
        sm: [ '0.875rem', { lineHeight: '1.5' } ],
        base: [ '1rem', { lineHeight: '1.5' } ],
        lg: [ '1.125rem', { lineHeight: '1.5' } ],
        xl: [ '1.25rem', { lineHeight: '1.5' } ],
        '2xl': [ '1.63rem', { lineHeight: '1.35' } ],
        '3xl': [ '2.63rem', { lineHeight: '1.24' } ],
        '4xl': [ '3.5rem', { lineHeight: '1.18' } ],
        '5xl': [ '4rem', { lineHeight: '1.16' } ],
        '6xl': [ '5.5rem', { lineHeight: '1.11' } ],
      },
      inset: {
        '1/2': '50%',
        full: '100%',
      },
      letterSpacing: {
        tighter: '-0.02em',
        tight: '-0.01em',
        normal: '0',
        wide: '0.01em',
        wider: '0.02em',
        widest: '0.4em',
      },
      minWidth: {
        10: '2.5rem',
      },
      scale: {
        98: '.98',
      },
      animation: {
        float: 'float 5s ease-in-out infinite',
      },
      keyframes: {
        float: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-10%)' },
        },
      },
      zIndex: {
        '-1': '-1',
        '-10': '-10',
      },
    },
  },
  plugins: [
    // eslint-disable-next-line global-require
    require( '@tailwindcss/forms' ),
  ],
};


