const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      typography: ({ theme }) => ({
        custom: {
          css: {
            // Overall text color
            color: theme('colors.slate.800'),
            // Headings
            h1: {
              fontSize: theme('fontSize.4xl')[0],
              fontWeight: theme('fontWeight.bold'),
              color: theme('colors.blue.900'),
              marginTop: theme('spacing.8'),
              marginBottom: theme('spacing.4'),
            },
            h2: {
              fontSize: theme('fontSize.3xl')[0],
              fontWeight: theme('fontWeight.semibold'),
              color: theme('colors.blue.800'),
              marginTop: theme('spacing.6'),
              marginBottom: theme('spacing.3'),
            },
            h3: {
              fontSize: theme('fontSize.2xl')[0],
              fontWeight: theme('fontWeight.semibold'),
              color: theme('colors.blue.700'),
              marginTop: theme('spacing.4'),
              marginBottom: theme('spacing.2'),
            },
            p: {
              marginBottom: theme('spacing.4'),
              lineHeight: theme('lineHeight.relaxed'),
            },
            a: {
              color: theme('colors.red.600'),
              textDecoration: 'underline',
              '&:hover': {
                color: theme('colors.red.800'),
              },
            },
            strong: {
              fontWeight: theme('fontWeight.bold'),
              color: theme('colors.slate.900'),
            },
            blockquote: {
              fontStyle: 'italic',
              borderLeft: `4px solid ${theme('colors.blue.500')}`,
              paddingLeft: theme('spacing.4'),
              color: theme('colors.slate.600'),
            },
            code: {
              color: theme('colors.pink.600'),
              backgroundColor: theme('colors.pink.50'),
              padding: '0.2em 0.4em',
              borderRadius: theme('borderRadius.md'),
              fontSize: theme('fontSize.sm')[0],
            },
            pre: {
              backgroundColor: theme('colors.slate.900'),
              color: theme('colors.slate.200'),
              padding: theme('spacing.4'),
              borderRadius: theme('borderRadius.lg'),
              overflowX: 'auto',
            },
            ul: {
              paddingLeft: theme('spacing.6'),
              listStyleType: 'disc',
            },
            ol: {
              paddingLeft: theme('spacing.6'),
              listStyleType: 'decimal',
            },
            img: {
              borderRadius: theme('borderRadius.lg'),
              marginBottom: theme('spacing.6'),
              boxShadow: theme('boxShadow.md'),
            },
            hr: {
              margin: `${theme('spacing.8')} 0`,
              borderColor: theme('colors.slate.300'),
            },
          },
        },
      }),
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
};
