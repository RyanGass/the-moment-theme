/** @type {import('tailwindcss').Config} */

module.exports = {
	content: [
		'./*.php',
		'./**/*.php',
		'./**/**/*.php',
		'./**/**/**/*.php',
		'./styles_scripts/src/css/*.css',
		'./styles_scripts/src/css/**/*.css',
		'./styles_scripts/src/js/*.js' ],
	safelist: [
		'bg-[#960F0F]',
		'bg-[#818285]',
		'bg-[#EEEEEE]',
		'bg-[#333333]',
		'bg-[#101010]',
	],
	theme: {
		extend: {
			colors: {
				primary: '#960F0F',
				secondary: '#818285',
				lightgrey: '#EEEEEE',
				darkgrey: '#333333',
				black: '#101010',
			},
			screens: {
				'2xl': '1400px',
			},
		},
	},
	plugins: [ require( 'tailwindcss-debug-screens' ) ],
};

