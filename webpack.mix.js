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
const mqpacker = require("css-mqpacker");

// Image plugins for compression from src folder
const ImageminPlugin = require("imagemin-webpack-plugin").default;
const CopyWebpackPlugin = require("copy-webpack-plugin");
const imageminMozjpeg = require("imagemin-mozjpeg");

mix
  .postCss("./src/css/app.css", "css/app.css")
  .copyDirectory(pkg.paths.src.fonts, pkg.paths.dist.fonts)
  .options({
    postCss: [
      tailwindcss("tailwind.js"),
      autoprefixer({
        browsers: ["> .5% or last 2 versions"],
        cascade: false
      }),
      presetenv({
        stage: 0
      }),
      mqpacker()
    ],
    processCssUrls: false,
  })
  .js("./src/js/app.js", "js/app.js")
  .js("./src/js/search.js", "js/search.js")
  .banner({
    banner: (function () {
      const moment = require("moment");
      const gitRevSync = require("git-rev-sync");

      return [
        "/*!",
        " * @project        " + pkg.name,
        " * @author         " + pkg.author,
        " * @build          " + moment().format("llll") + " GMT+1",
        " * @release        " + gitRevSync.long() + " [" + gitRevSync.branch() + "]",
        " * @copyright      Copyright (c) " + moment().format("YYYY") + "," + pkg.author,
        " *",
        " !*/",
        "",
      ].join("\n");
    })(),
    raw: true,
    entryOnly: true,
  })
  .extract()
  .setPublicPath("./web/assets/")
  .browserSync({
    proxy: "http://oakland.test",
    files: ["templates/*.twig", "templates/**/*.twig", "web/assets/css/*.css", "web/assets/js/*.js"]
  });

mix.disableSuccessNotifications();

if (mix.inProduction()) {
  mix.webpackConfig({
    plugins: [
      //Compress images
      new CopyWebpackPlugin([{
        from: "src/img", // FROM
        to: "img/", // TO
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
  }).criticalCss({
    enabled: mix.inProduction(),
    paths: {
      base: "http://oakland.test/",
      templates: "./templates/"
    },
    urls: [
      {
        url: "/",
        template: "index"
      }
    ],
    options: {
      minify: true,
    },
  }).purgeCss({
    enabled: true,
    globs: [
      path.join(__dirname, "templates/*.twig"),
      path.join(__dirname, "templates/**/*.twig"),
      path.join(__dirname, "templates/**/**/*.twig"),
      path.join(__dirname, "src/js/*.js"),
    ],
    extensions: ["html", "js", "twig", "vue"],
    whitelist: [
      "border-white",
      "border-shark",
      "text-cararra",
      "text-astronaut",
      "hover:text-cararra",
      "hover:text-astronaut",
      "md:bg-shark",
      "md:bg-transparent",
      "bg-alert-red",
      "bg-warning-yellow",
      "bg-apple",
      "image-blur-none",
      "image-blur-base",
      "image-blur-small",
      "image-blur-large",
      "image-blur-xlarge",
      "bg-white",
      "bg-shark",
      "text-shark",
      "text-white",
      "bg-cararra",
      "home"
    ],
    folders: ["src", "templates"],
  }).version();
}