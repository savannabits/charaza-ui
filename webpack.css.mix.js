const mix = require('laravel-mix');
require('laravel-mix-merge-manifest')
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
mix.setResourceRoot(`/${process.env.MIX_APP_URI ? process.env.MIX_APP_URI+'/' : ''}`);
mix.webpackConfig({
    output: {
        chunkFilename: `[name].js`,
        filename: "[name].js",
        publicPath: `/${process.env.MIX_APP_URI ? process.env.MIX_APP_URI+'/' : ''}`
    }
});
mix
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/backend.scss','public/css')
    .mergeManifest();
mix.copy('node_modules/@coreui/icons/fonts', 'public/fonts');
//icons
mix.copy('node_modules/@coreui/icons/css/free.min.css', 'public/css');
mix.copy('node_modules/@coreui/icons/css/brand.min.css', 'public/css');
mix.copy('node_modules/@coreui/icons/css/flag.min.css', 'public/css');
mix.copy('node_modules/@coreui/icons/svg/flag', 'public/svg/flag');

mix.copy('node_modules/@coreui/icons/sprites/', 'public/icons/sprites');

mix.copy('resources/assets', 'public/assets');
