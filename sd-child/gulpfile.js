// Put local URL here
var cur_proj_url = 'test.local';

var gulp = require("gulp"),
	//sass = require('sass'),
	//sass = require('gulp-sass'),
	sass = require('gulp-sass')(require('sass'));
	postcss = require("gulp-postcss"),
	autoprefixer = require("autoprefixer"),
	cssnano = require("cssnano"),
	sourcemaps = require("gulp-sourcemaps"),
	//browserSync = require("browser-sync").create(),
	minify = require("gulp-minify"),
	//criticalCss = require("gulp-penthouse"),
	//fs = require('fs'),
	//webp = require('gulp-webp'),
	//imagemin = require('gulp-imagemin'), //causes issues
	beep = require('beepbeep');

var urlList = require('./criticalcss-pagelist.json');

// Put local SRC & DESTs
var paths = {

	basedir: "./",

	styles: {
		// By using styles/**/*.sass we're telling gulp to check all folders for any sass file
		src: "css/scss/**/*.scss",
		// Compiled files will end up in whichever folder it's found in (partials are not compiled)
		dest: "css",
	},

	javascripts: {
		// By using styles/**/*.sass we're telling gulp to check all folders for any sass file
		src: "js/src/**/*.js",
		// Compiled files will end up in whichever folder it's found in (partials are not compiled)
		dest: "js"
	},

	img: {
		src: "images/*.*",
		dest: "images/webp"
	}


	// Easily add additional paths
	// ,html: {
	//  src: '...',
	//  dest: '...'
	// }
};



//default configuration for penthouse
var penthouse_config = {
  //css: path.resolve(__baseDir, 'css/build/app.css'),
	strict: false,
	timeout: 90000,
	pageLoadSkipTimeout: 20000,
	renderWaitTime: 200,
	blockJSRequests: true,
	out: paths.basedir + 'critical-home.css', // output file name
	url: 'http://' + cur_proj_url, // url from where we want penthouse to extract critical styles
	width: 1980, // max window width for critical media queries
	height: 1200, // max window height for critical media queries
	userAgent: 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)' // pretend to be googlebot when grabbing critical page styles.
};

/*
 * Minifying CSS files
 */
function style() {
	return gulp
		.src(paths.styles.src)
		// Initialize sourcemaps before compilation starts
		.pipe(sourcemaps.init())
		.pipe(sass())
		//.pipe(sass.compile(paths.styles.dest))
		.on("error", sass.logError)
		// Use postcss with autoprefixer and compress the compiled file using cssnano
		.pipe(postcss([autoprefixer(), cssnano()]))
		// Now add/write the sourcemaps
		.pipe(sourcemaps.write('maps/.'))
		.pipe(gulp.dest(paths.styles.dest))
		// Add browsersync stream pipe after compilation
		//.pipe(browserSync.stream())
		.on('end', function () {
			beep();
		});
}

/*
 * Creating Critical CSS file
 https://bensinger.me/automating-critical-css-with-gulp-js-and-wordpress/
 */

// Critical for homepage only

function critical_css_desktop () {
	return gulp.src(paths.styles.dest + '/theme-frontpage.css')
		.pipe(criticalCss({
			out: 'critical-dsktop.css', // output file name
			url: 'http://' + cur_proj_url, // url from where we want penthouse to extract critical styles
			width: 1980, // max window width for critical media queries
			height: 1200, // max window height for critical media queries
			userAgent: 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)' // pretend to be googlebot when grabbing critical page styles.
		}))
		.pipe(postcss([autoprefixer(), cssnano()]))
		.pipe(gulp.dest(paths.styles.dest + '/*')); // destination folder for the output file
}

function critical_css_mobile () {
	return gulp.src(paths.styles.dest + '/theme-frontpage.css')
		.pipe(criticalCss({
			out: 'critical-mobile.css', // output file name
			url: 'http://' + cur_proj_url, // url from where we want penthouse to extract critical styles
			width: 425, // max window width for critical media queries
			height: 600, // max window height for critical media queries
			userAgent: 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)' // pretend to be googlebot when grabbing critical page styles.
		}))
		.pipe(postcss([autoprefixer(), cssnano()]))
		.pipe(gulp.dest(paths.styles.dest + '/*')); // destination folder for the output file
}

/*
process.setMaxListeners(0);

function critical_css () {
	
	urlList.urls.forEach(function(item,i){
		return gulp.src(paths.styles.dest + '/theme-frontpage.css')
		.pipe(criticalCss({
				url: item.link,  // can also use file:/// protocol for local files
				css: paths.styles.dest + '/theme-frontpage.css',  // path to original css file on disk
				width: 1300,  // viewport width
				height: 900,  // viewport height
				keepLargerMediaQueries: false,  // when true, will not filter out larger media queries
				forceInclude: [ // selectors to keep, useful for above-the-fold styles added by js scripts
				'.keepMeEvenIfNotSeenInDom',
				/^\.regexWorksToo/
			],
			propertiesToRemove: [
				'(.*)transition(.*)',
				'cursor',
				'pointer-events',
				'(-webkit-)?tap-highlight-color',
				'(.*)user-select'
			],
			//userAgent: 'Penthouse Critical Path CSS Generator', // specify which user agent string when loading the page
			})
		)
		.pipe(postcss([autoprefixer(), cssnano()]))
		.pipe(gulp.dest(paths.styles.dest + '/*')); // destination folder for the output file
	})
}
*/



/*
 * Minifying JS files
 */
function minifyjs() {
	return gulp
		.src(paths.javascripts.src, { allowEmpty: true }) 
		.pipe(minify({noSource: true}))
		.pipe(gulp.dest(paths.javascripts.dest))
 //       .pipe(browserSync.stream())
		.on('end', function () {
			beep();
		});
}

function imgtowebp() {
	return gulp
		.src(paths.img.src)
		//.pipe(plumber())
		//.pipe(imagemin({ optimizationLevel: 3, progressive: true })) //image optimization
		.pipe(webp())
		.pipe(gulp.dest(paths.img.dest));
		//.pipe(browserSync.stream());
}

/*
 * A simple task to reload the page
 */
function reload() {
	//browserSync.reload();
}

/*
 * Add browsersync initialization at the start of the watch task
 */
function watch() {


	gulp.watch(paths.styles.src, { interval: 750 }, style);
	//gulp.watch(paths.styles.src, { interval: 650 }, critical_css_desktop);
	//gulp.watch(paths.styles.src, { interval: 650 }, critical_css_mobile);
	gulp.watch(paths.javascripts.src, { interval: 750 }, minifyjs);
	//gulp.watch(paths.img.src, { interval: 750 }, imgtowebp);
	
	// We should tell gulp which files to watch to trigger the reload
	// This can be html or whatever you're using to develop your website
	// Note -- you can obviously add the path to the Paths object
	//gulp.watch("css/*.css", reload);
	//gulp.watch("*.php", reload);
	//gulp.watch( "js/*.js", reload );
}



// Don't forget to expose the task!
exports.watch = watch

// Expose the task by exporting it
// This allows you to run it from the commandline using
// $ gulp style
exports.style = style;

/*
 * Specify if tasks run in series or parallel using `gulp.series` and `gulp.parallel`
 */
var build = gulp.parallel(style, watch);
 
/*
 * You can still use `gulp.task` to expose tasks
 */
gulp.task('build', build);
 
/*
 * Define default task that can be called by just running `gulp` from cli
 */
gulp.task('default', build);
