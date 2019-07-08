const mix = require('laravel-mix');



mix.styles([
    'resources/css/bootstrap.min.css',
    'resources/css/animate.css',
    'resources/css/font.css',
    'resources/css/li-scroller.css',
    'resources/css/slick.css',
    'resources/css/jquery-fancybox.css',
    'resources/css/theme.css',
    'resources/css/style.css',
    'resources/css/prism.css',
], 'public/css/all.css')

    .scripts([
        'resources/js/jquery.min.js',
        'resources/js/wow.min.js',
        'resources/js/bootstrap.min.js',
        'resources/js/slick.min.js',
        'resources/js/jquery.li-scroller.1.0.js',
        'resources/js/jquery.newsTicker.min.js',
        'resources/js/jquery.fancybox.pack.js',
        'resources/js/custom.js',
        'resources/js/prism.js',
], 'public/js/all.js')


    .sass('resources/sass/app.scss', 'public/css/app.css')
    .version();
