const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');

// Compila e minifica default.scss -> styles/minified/default.min.css
function compileDefault() {
  return gulp.src('./styles/default.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS({ level: 2 }))
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('./styles/minified'));
}

// Compila e minifica style.scss -> styles/minified/style.min.css
function compileStyle() {
  return gulp.src('./styles/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS({ level: 2 }))
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('./styles/minified'));
}

// Compila ambos os arquivos
const build = gulp.parallel(compileDefault, compileStyle);

// Monitora alterações em tempo real (Watch)
function watchFiles() {
  gulp.watch('./styles/default.scss', compileDefault);
  gulp.watch('./styles/style.scss', compileStyle);
}

exports.default = build;
exports.watch = gulp.series(build, watchFiles);