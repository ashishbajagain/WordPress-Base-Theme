// Get plugins
var gulp = require('gulp');
concat = require('gulp-concat');
sass = require('gulp-ruby-sass');
autoprefixer = require('gulp-autoprefixer');
rename = require('gulp-rename');
size = require('gulp-size');
browserSync = require('browser-sync');
reload = browserSync.reload;
sourcemaps = require('gulp-sourcemaps');

// set absolute path to assets folder
var themePath = 'wp-content/themes/test';

// browser-sync task for starting the server.
gulp.task('browser-sync', function () {
  browserSync.init({
    proxy: 'http://localhost/test',
    notify: false,
    https: false,
  });
});

//===============================================================
// DEVELOPMENT - Compile all scss files and output css with sourcemap
gulp.task('styles', function () {
  return sass(themePath + '/assets/styles/main.scss', {
      style: 'expanded',
      precision: 10,
      sourcemap: true
    })
    .pipe(autoprefixer('last 2 versions'))
    .pipe(rename('style.css'))
    .pipe(size())
    .pipe(sourcemaps.write())
    .pipe(gulp.dest(themePath))
    .pipe(reload({
      stream: true
    }));
});

// DEVELOPMENT - Compile javascript
gulp.task('javascript', function () {
  gulp.src([
      themePath + '/assets/javascript/vendors/*.js',
      themePath + '/components/**/*.js',
      themePath + '/lib/plugins/**/*.js',
      themePath + '/assets/javascript/custom/**/*.js',
    ])
    .pipe(concat('compiled-scripts.js'))
    .pipe(gulp.dest(themePath))
    .pipe(reload({
      stream: true
    }));
});


// DEVELOPMENT -  Run browsersync and watch files for updates with command "gulp"
gulp.task('default', ['styles', 'browser-sync', 'javascript'], function () {
  gulp.watch(themePath + '/assets/**/*.scss', ['styles']);
  gulp.watch(themePath + '/components/**/*.scss', ['styles']);
  gulp.watch(themePath + '/components/**/*.js', ['javascript']);
  gulp.watch(themePath + '/assets/javascript/**/*.js', ['javascript']);
  gulp.watch(themePath + '/lib/plugins/**/*.js', ['javascript']);
  gulp.watch("*.php").on('change', browserSync.reload);
  gulp.watch("**/*.php").on('change', browserSync.reload);
});
