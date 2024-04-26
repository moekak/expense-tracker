const mix = require('laravel-mix');

mix.js('resources/js/addTransaction.js', 'public/js/addTransaction.js')
   .copy('node_modules/jquery/dist/jquery.min.js', 'public/js/jquery.min.js')
   .js('resources/js/dashboard.js', 'public/js/dashboard.js')

   