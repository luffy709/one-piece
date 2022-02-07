const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.browserSync({
    proxy: '127.0.0.1:8000'
});

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.sass', 'public/css')
    .sass('resources/sass/components/components.sass', 'public/css')
    .sass('resources/sass/pages/dashboard.sass', 'public/css')
    .sass('resources/sass/pages/forum.sass', 'public/css')
    .sass('resources/sass/pages/auth.sass', 'public/css')
    .sass('resources/sass/pages/room.sass', 'public/css')
    .sass('resources/sass/pages/topic.sass', 'public/css')
    .sass('resources/sass/pages/home.sass', 'public/css')
    .sass('resources/sass/pages/contact.sass', 'public/css')
    .sourceMaps();
