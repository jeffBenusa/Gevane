var gulp = require('gulp');
var autoprefixer = require('gulp-autoprefixer');
var babel = require('gulp-babel');
var concat = require('gulp-concat');
var cssmin = require('gulp-cssmin');
var del = require('del');
var jshint = require('gulp-jshint');
var jshintStylish = require('jshint-stylish');
var sass = require('gulp-sass');

var browserSync = require('browser-sync');


//Paths
var path = '../genave/assets/';
var src = path + 'src/';
var dist = path + 'dist/';
var vendor = path + 'vendor/';

gulp.task('delete:dist', function(callback)
{
  del([dist], callback);
});

gulp.task('sass', function () {

  gulp.src(src + 'styles/style.scss')

    .pipe(sass())

    .pipe(gulp.dest(dist + 'style/'));

});

gulp.task('scripts', function()
{

  gulp.src(src + 'scripts/**/*.js')
    .pipe(jshint())
    .pipe(jshint.reporter(jshintStylish))
    .pipe(gulp.dest(dist + 'scripts'));
});

gulp.task('img', function() {

  gulp.src(src + 'images/**/*.{png,jpg,gif}')
    .pipe(gulp.dest(dist + 'images'))
});

gulp.task('default', ['sass', 'scripts', 'img'], function()
{
  browserSync({
    notify: false
  });

  gulp.watch(src + 'styles/**/*.scss', ['sass']);
  gulp.watch(src + 'scripts/**/*.js', ['scripts']);
});
