const mix = require('laravel-mix');

mix.setPublicPath('public')
  .setResourceRoot('../')
  .js('resources/js/index.js', 'js')
  .sass('resources/sass/index.scss', 'css')
  .copy('resources/img/*.png', 'public/img')
  .version('img');

