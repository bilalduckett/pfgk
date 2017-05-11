"use strict";

// Build & Serve
let gulp        = require('gulp'),
		browserSync = require('browser-sync').create(),
		replace     = require('gulp-replace'),
		sourcemaps  = require('gulp-sourcemaps');

// JS
const babel  = require('gulp-babel'),
		concat = require('gulp-concat'),
		uglify = require('gulp-uglify');

// CSS & Images
let imagemin     = require('gulp-imagemin'),
		sass         = require('gulp-sass'),
		minifyCss    = require('gulp-minify-css'),
		autoprefixer = require('gulp-autoprefixer');
//var realFavicon = require('gulp-real-favicon');

// Environment
let env = 'dev';

/**
 * Gulp tasks
 */
gulp.task('watch', function () {
	gulp.run('browser-sync');

	gulp.watch(["sass/**/*.scss"], function () {
		gulp.run('styles')
	});

	gulp.watch(["js/source/**/*.js"], function () {
		gulp.run('js')
	});

	gulp.watch(["js/app.min.js", "../**/*.php", "templates/**/*.twig"], function () {
		browserSync.reload();
	});
});

/**
 * Setup server and watcher
 */
gulp.task('browser-sync', function () {
	return browserSync.init({
		proxy    : 'loc.primefocusgoalkeeping.com',
		ghostMode: false,
		open     : false,
		notify   : false
	});
});

/**
 * Compile ES2015 to JS ES5
 */
gulp.task('js', function () {
	let js = gulp.src([
		// 'js/source/Carousel.js',
		'js/source/Nav.js',
	])
			.pipe(sourcemaps.init())
			.pipe(babel({
				presets: 'es2015'
			}))
			.on('error', function (e) {
				console.log('>>> ERROR', e);
				this.emit('end');
			})
			.pipe(concat('app.min.js'));

	if (env !== 'production') {
		js.pipe(sourcemaps.write())
	}

	// Minify js
	if (env === 'production') {
		js.pipe(uglify());
	}

	js.pipe(gulp.dest('js/'));

	return js;
});


/**
 * Compile SCSS to CSS
 */
gulp.task('styles', function () {
	let styles = gulp.src([
		'sass/**/*.scss'
	])
			.pipe(sourcemaps.init())
			.pipe(sass({
				// includePaths: ['styles', 'node_modules/bootstrap-sass/assets/stylesheets/'].concat(bourbon.includePaths)
			}))
			.on('error', function (e) {
				console.log(e);
			})
			.pipe(autoprefixer({
				browsers: ['last 3 versions']
			}));

	if (env === 'production') {
		styles.pipe(minifyCss());
	}
	else {
		styles.pipe(sourcemaps.write());
	}

	styles.pipe(gulp.dest('css/')).pipe(browserSync.reload({ stream: true }));

	return styles;
});

/**
 * Build for production
 */
gulp.task('build for production', function () {
	env = 'production';

	gulp.run('styles');
	gulp.run('js');
});
