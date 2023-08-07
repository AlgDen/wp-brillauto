const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');
const autoprefixer = require('gulp-autoprefixer');
const minify = require('gulp-minify');
var concat = require('gulp-concat');


function compileJS() {
  return gulp.src([
    'js/src/*.js',
    // '../../plugins/lfw-ajax-load-more-posts/js/*.js'
  ])
    .pipe(minify({ noSource: true }))
    .pipe(concat('script.js'))
    .pipe(rename({ suffix: ".min" }))
    .pipe(gulp.dest('js/dest/'))
}

function compileSass() {
  return gulp.src('css/src/main.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS())
    .pipe(autoprefixer({
      cascade: false
    }))
    .pipe(rename({ suffix: ".min" }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('css/dest/'))
}

function watchSass() {
  gulp.watch('css/src/main.scss', compileSass);
}

exports.css = gulp.series(compileSass);
exports.js = gulp.series(compileJS);

exports.watchSass = watchSass;