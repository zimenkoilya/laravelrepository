const { EnvironmentPlugin } = require('webpack')
const path = require('path')
const fs = require('fs-extra')
const glob = require('glob')
const mix = require('laravel-mix')
require('laravel-mix-versionhash')
// const { BundleAnalyzerPlugin } = require('webpack-bundle-analyzer')

/*
 |--------------------------------------------------------------------------
 | Mix config
 |--------------------------------------------------------------------------
 */

mix.options({
  postCss: [require('autoprefixer')]
});

/*
 |--------------------------------------------------------------------------
 | Vendor assets
 |--------------------------------------------------------------------------
 */

function mixAssetsDir(query, cb) {
  (glob.sync('resources/' + query) || []).forEach(f => {
      f = f.replace(/[\\\/]+/g, '/');
      cb(f, f.replace('resources/', 'public/'));
  });
}

// Core javascripts
mixAssetsDir('vendor/js/**/*.js', (src, dest) => mix.scripts(src, dest));

// Fonts
mixAssetsDir('vendor/fonts/*.css', (src, dest) => mix.copy(src, dest));
mixAssetsDir('vendor/fonts/*/*', (src, dest) => mix.copy(src, dest));

mix
  .js('resources/js/app.js', 'public/dist/js')
  .sass('resources/sass/app.scss', 'public/dist/css')

  // .disableNotifications()

if (mix.inProduction()) {
  mix
    // .extract() // Disabled until resolved: https://github.com/JeffreyWay/laravel-mix/issues/1889
    // .version() // Use `laravel-mix-versionhash` for the generating correct Laravel Mix manifest file.
    .versionHash()
} else {
  mix.sourceMaps()
}

mix.webpackConfig({
  plugins: [
    new EnvironmentPlugin({
        // Application's public url
        BASE_URL: '/'
    })
  ],
  module: {
    rules: [{
      test: /node_modules(?:\/|\\).+\.m?js$/,
      loader: 'babel-loader',
      include: [
        path.join(__dirname, 'node_modules/bootstrap-vue'),
      ],
      options: Object.assign({}, require('./package.json').babel, {
        babelrc: false
      })
    }]
  },
  resolve: {
    extensions: ['.js', '.json', '.vue', '.scss'],
    alias: {
      '~': path.join(__dirname, './resources/js'),
      '@': path.join(__dirname, './resources/sass'),
      'node_modules': path.join(__dirname, 'node_modules')
    }
  },
  output: {
    chunkFilename: 'dist/js/[chunkhash].js',
    path: mix.config.hmr
      ? '/'
      : path.resolve(__dirname, mix.inProduction() ? './public/build' : './public')
  }
})

mix.then(() => {
  if (mix.inProduction()) {
    process.nextTick(() => publishAseets())
  }
})

function publishAseets () {
  const publicDir = path.resolve(__dirname, './public')

  fs.removeSync(path.join(publicDir, 'dist'))
  fs.copySync(path.join(publicDir, 'build', 'dist'), path.join(publicDir, 'dist'))
  fs.removeSync(path.join(publicDir, 'build'))
}
