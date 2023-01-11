const theme = require( './theme.json' );

module.exports = {
	content: [
		'./*.php',
		'./**/*.php',
		'./**/**/*.php',
		'./**/**/**/*.php',
		'./styles_scripts/src/css/*.css',
		'./styles_scripts/src/css/**/*.css',
		'./styles_scripts/src/js/*.js' ],
	theme: {
		extend: {},
	},
	plugins: [ require( 'tailwindcss-debug-screens' ) ],
};

