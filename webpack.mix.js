// Grabs the package.json file to use our site’s environment/values
var pkg = require("./package.json");

const mix = require("laravel-mix");

// Laravel Mix plugins for additional capabilities
require("laravel-mix-purgecss");
require("laravel-mix-criticalcss");
require("laravel-mix-banner");

// CSS Plugins
const tailwindcss = require("tailwindcss");
const autoprefixer = require("autoprefixer");
const presetenv = require("postcss-preset-env");
const hexrgba = require('postcss-hexrgba');

// Image plugins for compression from src folder
const ImageminPlugin = require("imagemin-webpack-plugin").default;
const CopyWebpackPlugin = require("copy-webpack-plugin");
const imageminMozjpeg = require("imagemin-mozjpeg");

mix.setPublicPath('./web/assets/')
  .postCss(pkg.paths.src.css + "app.css", "css")
  .styles(pkg.paths.src.css + "lightgallery/" + "*.css", pkg.paths.dist.css + "lightgallery.css")
  .options({
    postCss: [
      tailwindcss(),
      autoprefixer({
        cascade: false
      }),
      presetenv({
        stage: 0
      }),
      hexrgba
    ],
    processCssUrls: false,
    hmrOptions: {
      host: 'oakland.test',
      port: 8080
    }
  })
  .js(pkg.paths.src.js + "app.js", "js")
  .js(pkg.paths.src.js + "algoliafilter.js", "js")
  .js(pkg.paths.src.js + "search.js", "js")
  .js(pkg.paths.src.js + "lightgallery.js", "js")
  .extract(['vue', 'algoliasearch'])
  .sourceMaps()
  .browserSync({
    proxy: "https://oakland.test",
    notify: {
      styles: {
        top: 'auto',
        bottom: '1rem'
      }
    },
    files: ["src/css/*.css", "templates/*.twig", "templates/**/*.twig", "templates/*.js", "templates/**/*.js"]
  });

mix.disableSuccessNotifications();

if (mix.inProduction()) {
  mix.webpackConfig({
      plugins: [
        //Compress images
        new CopyWebpackPlugin([{
          from: "./src/img",
          to: "./img",
        }]),
        new ImageminPlugin({
          test: /\.(jpe?g|png|gif|svg)$/i,
          pngquant: {
            quality: "65-80"
          },
          plugins: [
            imageminMozjpeg({
              quality: 65,
              //Set the maximum memory to use in kbytes
              maxMemory: 1000 * 2048
            })
          ]
        })
      ],
    })
    .copyDirectory(pkg.paths.src.fonts, pkg.paths.dist.fonts)
    .purgeCss({
      enabled: true,
      globs: [
        path.join(__dirname, "templates/*.twig"),
        path.join(__dirname, "templates/**/*.twig"),
        path.join(__dirname, "templates/**/**/*.twig"),
        path.join(__dirname, "src/js/*.js"),
      ],
      extensions: ["html", "js", "twig", "vue"],
      whitelist: [
        "bg-yellow-600",
        "bg-red-500",
        "bg-green-300",
        "hover:bg-yellow-600",
        "hover:bg-red-500",
        "hover:bg-green-300",
        "border-yellow-600",
        "border-red-500",
        "border-green-300",
        "md:bg-transparent",
        "bg-alert-red",
        "bg-warning-yellow",
        "image-blur-none",
        "image-blur-base",
        "image-blur-small",
        "image-blur-large",
        "image-blur-xlarge",
        "home"
      ],
      folders: ["src", "templates"],
    }).version();
}