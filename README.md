# A Badass Wordpress Theme (for developers) - Guide

Welcome to a starter theme called `A Badass Wordpress Theme (for developers)`, AKA `The Moment`. `The Moment` is a theme meant for developers who want to start developing a new Wordpress website quickly and efficiently. `The Moment` is intended to be used over and over again, and most importantly intended to be the last theme you'll ever need for the rest of your career, ever, until you die. `The Moment` doesn't have (m)any bells or whistles, but it comes equipt with everything you'll need to get your `Wordpress` website build up and running. `The Moment` can be used as a Parent theme or Child theme, just as long as it's used for every website you ever build ever forever. That's what `The Moment` is here for. Let's go!

Some things that make `The Moment` special:

- `The Moment` isn't quite bare bones, as it has a little bit of meat and a fair amount of muscle that comes as part of the package. It's a Wordpress starter theme based off of the world renowned `_s` AKA [underscores.me](https://underscores.me/).
- `The Moment` is intended to be used by Wordpress Developers who value organization, flexibility, extendability, and who loath code bloat. It's for Developers who are comfortable working within the theme files and understand the value of a logical and efficient configuration.
- `The Moment` comes with [Tailwindcss](https://tailwindcss.com/) utility-first framework packaged and pre-configured so you can jump right in using the Tailwind classes and features.
- `The Moment` ships with [Carbon Fields](https://carbonfields.net/) and equipped with a basic Options page, a "common codes" library, as well as a handful of prebuilt templates and template parts.
- `The Moment` comes packed full of tools to improve efficiency during development. You'll have access to [NPM](https://www.npmjs.com/), [PostCSS](https://postcss.org/), [ESLint](https://eslint.org/), [StyleLint](https://stylelint.io/) (configured for Tailwind), [Autoprefixer](https://www.npmjs.com/package/autoprefixer), [Browser-Sync](https://browsersync.io/), [Concurrent commands](https://www.npmjs.com/package/concurrently), CSS/JS build and minify tools, and workspace settings for VS Code.
- `The Moment` takes a component based approach to organization. All files are organized logically and only contain the necessary code and features to make using this theme an enjoyable and streamlined experience.
- `The Moment` is 99% jQuery free. jQuery is dequeued from the front-end, and is only used throughout the wp-admin pages. All included features are written purely with vanilla js and are loaded only as needed. 
- `The Moment` is designed for speed and optimization. As long as you keep your code lean and mean you can easily achieve PSI scores of 90+ on mobile and desktop. You're SEOs are going to love you.

## Demo Site
[The Moment Demo Site](https://theme.themoment.dev/)

## Site Performance

- [Google PSI](https://pagespeed.web.dev/analysis/https-theme-themoment-dev/7m13kn5yib?form_factor=mobile)
- [GT Metrix](https://gtmetrix.com/reports/theme.themoment.dev/C2mdAqO7/)

## Installation

### Requirements

`The Moment` requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)
- [Tailwind Intellisense](https://marketplace.visualstudio.com/items?itemName=bradlc.vscode-tailwindcss)
- [Plugins/Database](https://themoment.dev/tm-updraft-files/updraft-restore.zip) (not required but helpful)

### Quick Start

Clone or download this repository, change its name to something else (i.e. `bag-of-snakes`), and then you'll need to do a two-step find and replace on the name in all the templates.

1. Search for `theme-name` to capture the text domain and replace with: `bag-of-snakes`.
2. Search for `theme_name` to capture all the functions names and replace with: `bag_of_snakes`.

```sh 
$ // Find/Replace text in all files
$ find ./ -name \*.php -exec sed -i "s/theme-name/new-theme-name/g" {} \;
$ find ./ -name \*.php -exec sed -i "s/theme_name/new_theme_name/g" {} \;
$ find ./ -name \*.css -exec sed -i "s/theme-name/new-theme-name/g" {} \;
$ find ./ -name \*.css -exec sed -i "s/ Theme Name/ New Theme Name/g" {} \;
```

### Setup

To start using all the tools that come with `The Moment` you need to install Node.js dependencies, Tailwindcss, and Carbon Fields.

```sh
$ npm install
$ composer require htmlburger/carbon-fields
```

If you use VS code, copy/paste the below settings into your Workspace Settings (JSON) file. command + shift + p / Preferences: Workspace Settings (JSON) and replace all settings.

```sh
{
    "workbench.editor.untitled.hint": "hidden",
    "css.validate": false,
    "less.validate": false,
    "scss.validate": false,
    "eslint.validate": [
        "javascript"
    ],
    "eslint.codeActionsOnSave.mode": "all",
    "eslint.format.enable": true,
    "eslint.codeActionsOnSave.rules": null,
    "stylelint.snippet": [
        "css",
        "less",
        "postcss",
        "scss"
    ],
    "stylelint.validate": [
        "css",
        "less",
        "postcss",
        "scss"
    ],
    "editor.codeActionsOnSave": {
        "source.fixAll.eslint": true,
        "source.fixAll.stylelint": true
    },
    "editor.formatOnSave": true,
    "editor.fontLigatures": false,
    "editor.wordWrap": "off",
    "editor.formatOnPaste": true,
    "editor.quickSuggestions": {
        "strings": true
    }
}
```

### Available CLI commands

`The Moment` comes with CLI commands tailored for WordPress theme development:

- `build:css` : Build and Minifies all `CSS` files for production. 
- `build:js` : Build and Minifies all `JS` files for production.
- `build` : Run both `build:css` and `build:js` concurrently to ready all files for production
- `watch:css` : Start the npm watch engine to monitor all `CSS` changes during development.
- `watch:js` : Start the npm watch engine to monitor all `JS` changes and compile during development.
- `watch` : Run both `watch:css` and `watch:js` monitor all `CSS` and `JS` chqnges during development.
- `browser-sync` : Starts the `browser-sync` engine and generates a localhost url to use in multiple browsers.
- `watch-sync` : Runs both `browser-sync` and `watch` concurrently to remove the need to refresh your browser on CSS updates.

Alright, are you ready? Get going and build the next best Wordpress website!

The Moment Dev