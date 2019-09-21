const { src, dest, parallel } = require('gulp');
const sass = require('gulp-sass');
const minifyCSS = require('gulp-csso');
// const concat = require('gulp-concat');

function css() {
  return src('resources/sass/*.scss')
    .pipe(sass())
    .pipe(minifyCSS())
    .pipe(dest('public/css'))
}


exports.css = css;
exports.default = parallel(css);