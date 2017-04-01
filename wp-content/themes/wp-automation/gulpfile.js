var gulp = require('gulp');
var sass = require('gulp-sass');
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');


var path = '../genave-timber/assets/';

var src = path + 'src/';
var dist = path + 'dist/';
var vendor = path + 'vendor/';

gulp.task('sass', function () {

  gulp.src(src + 'styles/style.scss')

    .pipe(sass())

    .pipe(gulp.dest(dist + 'style/'));

});

gulp.task('js', function () {

  gulp.src(src + 'scripts/*.js')

    .pipe(jshint())

    .pipe(jshint.reporter('fail'))

    .pipe(concat('theme.js'))

    .pipe(gulp.dest(dist + 'js'));

});

gulp.task('img', function() {

  gulp.src('img/src/*.{png,jpg,gif}')

    .pipe(imagemin({

      optimizationLevel: 7,

      progressive: true

    }))

    .pipe(gulp.dest('img'))

});



gulp.task('default', ['sass', 'js']);
