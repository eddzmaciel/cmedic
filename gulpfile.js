// var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

// elixir(function(mix) {
//     mix.less('app.less');
// });

var gulp = require('gulp'),
  concat = require('gulp-concat'),
  uglify = require('gulp-uglify');

gulp.task('app', function () {
  gulp.src('resources/assets/js/ArchivoXML/*.js')
  .pipe(concat('xml.min.js'))
  .pipe(uglify())
  .pipe(gulp.dest('public/app-js/'))
  gulp.src(['resources/assets/js/ArchivoXML/dao.js','resources/assets/js/Parametrizacion/init.js','resources/assets/js/ArchivoXML/accounting.js','resources/assets/js/ArchivoXML/jquery.number.js'])
  .pipe(concat('xml_parametrizacion.min.js'))
  .pipe(uglify())
  .pipe(gulp.dest('public/app-js/'))
  gulp.src(['resources/assets/js/PolizasManuales/create.js'])
  .pipe(concat('polizas_manuales.min.js'))
  .pipe(uglify())
  .pipe(gulp.dest('public/app-js/'))
  gulp.src(['resources/assets/js/PolizasManuales/init.js'])
  .pipe(concat('polizas_manuales_init.min.js'))
  .pipe(uglify())
  .pipe(gulp.dest('public/app-js/'))
});