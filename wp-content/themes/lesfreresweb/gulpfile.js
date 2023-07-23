const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');

function compileSass() {
  return gulp.src('css/src/main.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS())
    .pipe(rename({ suffix: ".min" }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('css/dest/'));
}

function watchSass() {
  gulp.watch('css/src/main.scss', compileSass);
}

exports.css = gulp.series(compileSass);

exports.watchSass = watchSass;