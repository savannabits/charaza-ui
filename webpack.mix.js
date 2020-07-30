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
mix.setResourceRoot(`${process.env.MIX_APP_URI || ''}`);
mix.webpackConfig({
    output: {
        chunkFilename: `[name].js`,
        filename: "[name].js",
        publicPath: `${process.env.MIX_APP_URI || '/'}`
    }
});
mix.autoload({
    'vue': ['Vue','window.Vue'],
    'moment': ['moment','window.moment'],
})
mix
    .extract([
        // 'bootstrap',
        'bootstrap-vue',
        'axios',
        // 'lodash',
        'jquery',
        'popper.js',
        // 'vuejs-noty'
    ])
    .js('resources/js/app.js', 'public/js')
    .mergeManifest()
;
