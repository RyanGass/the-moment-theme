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
	safelist: [
		'bg-[#960F0F]',
		'bg-[#818285]',
		'bg-[#EEEEEE]',
		'bg-[#333333]',
		'bg-[#101010]',
	],
	theme: {
		extend: {
			colors,
			screens: {
				'2xl': '1400px',
			},
		},
	},
	plugins: [ require( 'tailwindcss-debug-screens' ) ],
};

