let mix = require('laravel-mix');

// Hot reloading URL
let localProxy = '{{name}}.test';

mix
    // Combines and transpiles JavaScript
    .babel(['app/javascript/src/app.js'], 'app/javascript/dist/app.js')

    // Transpiles SCSS
    .sass('app/css/src/app.scss', 'app/css/dist/')
    .sass('app/css/src/editor.scss', 'app/css/dist/')

    // Set WebPack options
    .options({
        postCss: [
            require('css-mqpacker')({ sort: true }),    // Combines MediaQueries
            require('postcss-flexbugs-fixes')           // Fixes FlexBox issues
        ],
        processCssUrls: false
    })

    // Enable hot reloading
    .browserSync({
        proxy: localProxy,
        injectChanges: true,
        files: ['app/css/dist/app.css'],
        notify: false
    });

/*
    Full Laravel Mix API:

    mix.js(src, output);
    mix.react(src, output);                 <-- Identical to mix.js(), but registers React Babel compilation.
    mix.extract(vendorLibs);
    mix.sass(src, output);
    mix.standaloneSass('src', output);      <-- Faster, but isolated from Webpack.
    mix.fastSass('src', output);            <-- Alias for mix.standaloneSass().
    mix.less(src, output);
    mix.stylus(src, output);
    mix.postCss(src, output, [require('postcss-some-plugin')()]);
    mix.browserSync('my-site.dev');
    mix.combine(files, destination);
    mix.babel(files, destination);          <-- Identical to mix.combine(), but also includes Babel compilation.
    mix.copy(from, to);
    mix.copyDirectory(fromDir, toDir);
    mix.minify(file);
    mix.sourceMaps(); // Enable sourcemaps
    mix.version(); // Enable versioning.
    mix.disableNotifications();
    mix.setPublicPath('path/to/public');
    mix.setResourceRoot('prefix/for/resource/locators');
    mix.autoload({});                       <-- Will be passed to Webpack's ProvidePlugin.
    mix.webpackConfig({});                  <-- Override webpack.config.js, without editing the file directly.
    mix.then(function () {})                <-- Will be triggered each time Webpack finishes building.
    mix.options({
        extractVueStyles: false,            // Extract .vue component styling to file, rather than inline.
        processCssUrls: true,               // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
        purifyCss: false,                   // Remove unused CSS selectors.
        uglify: {},                         // Uglify-specific options. https://webpack.github.io/docs/list-of-plugins.html#uglifyjsplugin
        postCss: []                         // Post-CSS options: https://github.com/postcss/postcss/blob/master/docs/plugins.md
    });
*/