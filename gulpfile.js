const { src, dest, watch, series, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('autoprefixer');
const postcss = require('gulp-postcss');
const sourcemaps = require('gulp-sourcemaps');
const cssnano = require('cssnano');
const concat = require('gulp-concat');
// TIP: gulp-terser-js está deprecado; si puedes, usa "gulp-terser".
// const terser = require('gulp-terser-js');
const terser = require('gulp-terser');  // <— cambia también en package.json
const rename = require('gulp-rename');
const imagemin = require('gulp-imagemin');
const notify = require('gulp-notify');
const cache = require('gulp-cache');
const clean = require('gulp-clean');
const webp = require('gulp-webp');

const paths = {
  scss: 'src/scss/**/*.scss',
  js: 'src/js/**/*.js',
  imagenes: 'src/img/**/*'
};

// Limpieza de carpeta build (útil para CI)
function limpiar() {
  return src('build', { read: false, allowEmpty: true })
    .pipe(clean());
}

function css() {
  return src(paths.scss)
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(sourcemaps.write('.'))
    .pipe(dest('build/css'));
}

function javascript() {
  return src(paths.js, { allowEmpty: true })
    .pipe(sourcemaps.init())
    .pipe(concat('bundle.js'))
    .pipe(terser())
    .pipe(sourcemaps.write('.'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(dest('build/js'));
}

function imagenesTask() {
  return src(paths.imagenes, { allowEmpty: true })
    .pipe(cache(imagemin({ optimizationLevel: 3 })))
    .pipe(dest('build/img'))
    // En CI a veces notify da problemas de permisos; si te falla, comenta la línea siguiente
    .pipe(notify('Imagen Completada'));
}

function versionWebp() {
  return src(paths.imagenes, { allowEmpty: true })
    .pipe(webp())
    .pipe(dest('build/img'))
    // Si notify molesta en CI, comenta la línea siguiente
    .pipe(notify({ message: 'Imagen Completada' }));
}

function watchArchivos() {
  watch(paths.scss, css);
  watch(paths.js, javascript);
  watch(paths.imagenes, imagenesTask);
  watch(paths.imagenes, versionWebp);
}

// === Exports ===
exports.css = css;
exports.watchArchivos = watchArchivos;

// Tarea SOLO para desarrollo local: incluye watcher
exports.default = parallel(css, javascript, imagenesTask, versionWebp, watchArchivos);

// Tarea de build para CI (Netlify): sin watcher
const build = series(
  limpiar,
  parallel(css, javascript, imagenesTask, versionWebp)
);
exports.build = build;
