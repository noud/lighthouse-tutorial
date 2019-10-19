// let mix = require('laravel-mix');

// /*
//  |--------------------------------------------------------------------------
//  | Mix Asset Management
//  |--------------------------------------------------------------------------
//  |
//  | Mix provides a clean, fluent API for defining some Webpack build steps
//  | for your Laravel application. By default, we are compiling the Sass
//  | file for the application as well as bundling up all the JS files.
//  |
//  */

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

const cssImport = require('postcss-import');
const cssNesting = require('postcss-nesting');
const mix = require('laravel-mix');
const path = require('path');
const tailwindcss = require('tailwindcss');

mix
  .js('resources/vue/js/app.js', 'public/vue/js')
  .postCss('resources/vue/css/app.css', 'public/vue/css', [cssImport(), cssNesting(), tailwindcss()])
  .webpackConfig({
    output: { chunkFilename: 'vue/js/[name].js?id=[chunkhash]' },
    resolve: {
      alias: {
        vue$: 'vue/dist/vue.runtime.esm.js',
        '@': path.resolve('resources/vue/js'),
      },
    },
  })
  .version()
  .sourceMaps();
