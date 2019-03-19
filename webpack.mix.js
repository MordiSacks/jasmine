const mix = require('laravel-mix');

if (!mix.inProduction()) {
    mix.sourceMaps();
    mix.webpackConfig({devtool: 'inline-source-map'});
} else {
    mix.version();
}

if (process.env.section) {
    require(`${__dirname}/inc/resources/mixes/${process.env.section}/webpack.mix.js`);

    //mix.copyDirectory(`${__dirname}/inc/public`, `${__dirname}/../laravel-for-ta/public/jasmine`);
} else {
    console.error('No section set, use "process.env.section={section}"')
}