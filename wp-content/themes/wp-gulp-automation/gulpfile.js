var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('sass', function () {

  gulp.src('../genave-timber/assets/src/styles/style.scss')

    .pipe(sass())

    .pipe(gulp.dest('../genave-timber/assets/dist/style/'));

});

gulp.task('default', ['sass']);
