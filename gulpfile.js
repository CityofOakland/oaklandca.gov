/* eslint no-empty: ["error", { "allowEmptyCatch": true }] */
// jshint esversion: 6
// jshint node: true
"use strict";

// package vars
const pkg = require("./package.json");

// gulp
const gulp = require("gulp");

// load all plugins in "devDependencies" into the variable $
const $ = require("gulp-load-plugins")({
  pattern: ["*"],
  scope: ["devDependencies"]
});

// error logging
const onError = (err) => {
  // eslint-disable-next-line no-console
  console.log(err);
};

// Our banner
const banner = (function () {
  let result = "";
  try {
    result = [
      "/**",
      " * @project        <%= pkg.name %>",
      " * @author         <%= pkg.author %>",
      " * @build          " + $.moment().format("llll") + " ET",
      " * @release        " + $.gitRevSync.long() + " [" + $.gitRevSync.branch() + "]",
      " * @copyright      Copyright (c) " + $.moment().format("YYYY") + ", <%= pkg.copyright %>",
      " *",
      " */",
      ""
    ].join("\n");
  } catch (err) {}
  return result;
})();

// tailwind task - build the Tailwind CSS
gulp.task("tailwind", () => {
  $.fancyLog("-> Compiling tailwind css");
  return gulp.src(pkg.paths.tailwindcss.src)
    .pipe($.postcss([
      $.tailwindcss(pkg.paths.tailwindcss.conf),
      $.autoprefixer
    ]))
    .pipe(gulp.dest(pkg.paths.tailwindcss.build));
});

gulp.task("images", () => {
  $.fancyLog("-> Compiling tailwind css");
  return gulp.src(pkg.paths.src.img + "**/*")
    .pipe($.imagemin({
      verbose: true
    }))
    .pipe(gulp.dest(pkg.paths.dist.img));
});

gulp.task("css", ["tailwind"], () => {
  $.fancyLog("-> Building css");
  var plugins = [
    $.postcssPresetEnv({
      stage: 0
    }),
    $.postcssEasyImport({
      prefix: "_"
    }),
    $.autoprefixer({
      browsers: ["last 1 version"]
    })
  ];
  return gulp.src(pkg.globs.distCss)
    .pipe($.plumber({
      errorHandler: onError
    }))
    .pipe($.newer({
      dest: pkg.paths.dist.css + pkg.vars.siteCssName
    }))
    .pipe($.print())
    .pipe($.sourcemaps.init({
      loadMaps: true
    }))
    .pipe($.concat(pkg.vars.siteCssName))
    .pipe($.postcss(plugins))
    .pipe($.header(banner, {
      pkg: pkg
    }))
    .pipe($.sourcemaps.write("./"))
    .pipe($.size({
      gzip: true,
      showFiles: true
    }))
    .pipe(gulp.dest(pkg.paths.dist.css))
    .pipe($.filter("**/*.css"))
    .pipe($.livereload());
});

// Process the downloads one at a time
function processDownload(element, i, callback) {
  const downloadSrc = element.url;
  const downloadDest = element.dest;

  $.fancyLog("-> Downloading URL: " + $.chalk.cyan(downloadSrc) + " -> " + $.chalk.magenta(downloadDest));
  $.download(downloadSrc)
    .pipe(gulp.dest(downloadDest));
  callback();
}

// Process data in an array synchronously, moving onto the n+1 item only after the nth item callback
function doSynchronousLoop(data, processData, done) {
  if (data.length > 0) {
    const loop = (data, i, processData, done) => {
      processData(data[i], i, () => {
        if (++i < data.length) {
          loop(data, i, processData, done);
        } else {
          done();
        }
      });
    };
    loop(data, 0, processData, done);
  } else {
    done();
  }
}

// download task
gulp.task("download", (callback) => {
  doSynchronousLoop(pkg.globs.download, processDownload, () => {
    // all done
    callback();
  });
});

// copy fonts task
gulp.task("fonts", () => {
  return gulp.src(pkg.globs.fonts)
    .pipe(gulp.dest(pkg.paths.dist.fonts));
});

gulp.task("default", function () {
  $.fancyLog("-> Livereload listening for changes");
  $.livereload.listen();
  gulp.watch(pkg.paths.src.css + "*.css", ["css", "tailwind"]);
  gulp.watch([pkg.paths.templates + "**/*.{html,htm,twig}"], () => {
    gulp.src(pkg.paths.templates)
      .pipe($.plumber({
        errorHandler: onError
      }))
      .pipe($.livereload());
  });
});