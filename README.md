[![Build Status](https://travis-ci.org/Automattic/_s.svg?branch=master)](https://travis-ci.org/Automattic/_s)

# A Badass Wordpress Theme (for developers) - Guide

Welcome to a starter theme called `A Badass Wordpress Theme (for developers)`, AKA `The Moment`. `The Moment` is a theme meant for developers who want to start developing a new Wordpress website quickly and efficiently. `The Moment` is intended to be used over and over again, and most importantly intended to be the last theme you'll ever need for the rest of your career, ever, until you die. `The Moment` doesn't have (m)any bells or whistles, but it comes equipt with everything you'll need to get your `Wordpress` website build up and running. `The Moment` can be used as a Parent theme or Child theme, just as long as it's used for every website you ever build ever forever. That's what `The Moment` is here for. Let's go!

Some things that make `The Moment` special:

- `The Moment` isn't quite bare bones, as it has a little bit of meat and a fair amount of muscle that comes as part of the package. It's a Wordpress starter theme based off of the world renowned `_s` AKA `underscores.me`.
- `The Moment` is intended to be used by Wordpress Developers who value organization, flexibility, extendability, and who loath code bloat. It's for Developers who are comfortable working within the theme files and understand the value of a logical and efficient configuration.
- `The Moment` comes with [Tailwindcss](https://tailwindcss.com/) utility-first framework packaged and pre-configured so you can jump right in using the Tailwind classes and features.
- `The Moment` ships with [Carbon Fields](https://carbonfields.net/) and equipped with a basic Options page, a "common codes" library, as well as a handful of prebuilt templates and template parts.
- `The Moment` comes packed full of tools to improve efficiency during development. You'll have access to [NPM](https://www.npmjs.com/), [PostCSS](https://postcss.org/), [ESLint](https://eslint.org/), [StyleLint](https://stylelint.io/) (configured for Tailwind), [Autoprefixer](https://www.npmjs.com/package/autoprefixer), [Browser-Sync](https://browsersync.io/), [Concurrent commands](https://www.npmjs.com/package/concurrently), CSS/JS build and minify tools, and workspace settings for VS Code.
- `The Moment` takes a component based approach to organization. All files are organized logically and only contain the necessary code and features to make using this theme an enjoyable and streamlined experience.
- `The Moment` is 99% jQuery free. jQuery is dequeued from the front-end, and is only used throughout the wp-admin pages. All included features are written purely with vanilla js and are loaded only as needed. 
- `The Moment` is designed for speed and optimization. As long as you keep your code lean and mean you can easily achieve PSI scores of 90+ on mobile and desktop. You're SEOs are going to love you.

## Installation

### Requirements

`The Moment` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)

### Quick Start

Clone or download this repository, change its name to something else (i.e. `bag-of-snakes`), and then you'll need to do a two-step find and replace on the name in all the templates.

1. Search for `theme-name` to capture the text domain and replace with: `bag-of-snakes`.
2. Search for `theme_name` to capture all the functions names and replace with: `bag_of_snakes`.

### Setup

To start using all the tools that come with `The Moment` you need to install Node.js dependencies, Tailwindcss, and Carbon Fields.

```sh
$ npm install
$ composer require htmlburger/carbon-fields
```

### Available CLI commands

`_s` comes packed with CLI commands tailored for WordPress theme development :

- `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `composer lint:php` : checks all PHP files for syntax errors.
- `composer make-pot` : generates a .pot file in the `languages/` directory.
- `npm run compile:css` : compiles SASS files to css.
- `npm run compile:rtl` : generates an RTL stylesheet.
- `npm run watch` : watches all SASS files and recompiles them to css when they change.
- `npm run lint:scss` : checks all SASS files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
- `npm run lint:js` : checks all JavaScript files against [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
