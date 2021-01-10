const path = require('path');

module.exports = {
    lintOnSave: true,
    configureWebpack: {
        devtool: 'source-map',
        entry: [
            './src/sass/styles.sass',
            './src/main.js'
        ],
    },
    css: {
        sourceMap: process.env.NODE_ENV !== 'production',
        loaderOptions: {
            sass: {
                sourceMap: process.env.NODE_ENV !== 'production',
                prependData: '@import src/sass/variables'
            }
        }
    },
};
