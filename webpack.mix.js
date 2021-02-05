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
  .combine([pkg.paths.src.css + 'lightgallery/lightgallery.css', pkg.paths.src.css + 'lightgallery/lg-fb-comment-box.css', pkg.paths.src.css + 'lightgallery/lg-transitions.css'], "./web/assets/css/lightgallery.css")
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
  })
  .js(pkg.paths.src.js + "app.js", "js")
  .js(pkg.paths.src.js + "algoliafilter.js", "js")
  .js(pkg.paths.src.js + "search.js", "js")
  .js(pkg.paths.src.js + "lightgallery.js", "js")
  .extract(["alpinejs", "picturefill"])
  .sourceMaps()
  .browserSync({
    proxy: process.env.MIX_LOCAL_SITE_URL,
    notify: {
      styles: {
        top: 'auto',
        bottom: '1rem'
      }
    },
  });

mix.disableSuccessNotifications();

if (mix.inProduction()) {
  mix
    .webpackConfig({
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
        "bg-red-500",
        "bg-yellow-600",
        "bg-green-300",
        "hover:bg-red-500",
        "hover:bg-yellow-600",
        "hover:bg-green-300",
        "home",
        "goog-te-gadget-simple",
        "[x-cloak]"
      ],
      folders: ["src", "templates"],
    })
    .version();
}
