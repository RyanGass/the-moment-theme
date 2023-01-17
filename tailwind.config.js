// Use colors from theme.json to create TW classes
const fs = require( 'fs' );

const themeJson = fs.readFileSync( './theme.json' );
const theme = JSON.parse( themeJson );

const colors = theme.settings.color.palette.reduce( ( acc, item ) => {
	const [ color, number ] = item.slug.split( '-' );

	// If there is a number identifier, make this an object
	if ( undefined !== number ) {
		if ( ! acc[ color ] ) {
			acc[ color ] = {};
		}
		acc[ color ][ number ] = item.color;
	} else {
		acc[ color ] = item.color;
	}

	return acc;
}, {} );

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
		extend: {
			colors,
		},
	},
	plugins: [ require( 'tailwindcss-debug-screens' ) ],
};

