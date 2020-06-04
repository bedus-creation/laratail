const mix = require('laravel-mix');


mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
            'vue$': 'vue/dist/vue.esm.js',
            '@': __dirname + '/resources/js'
        },
    },
    output: {
        chunkFilename: 'dist/js/chunks/[name].js?id=[chunkhash]',
    }
});

mix.js('resources/js/app.js', 'public/dist/js')
    .styles(['resources/sass/app.css'], 'public/dist/css/app.css')
    .version();
