let gulp = require('gulp'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    cssnano = require('gulp-cssnano'),
    browserSync = require('browser-sync'),
    // imagemin = require('gulp-imagemin'),
    // cache = require('gulp-cache'),
    // pngquant = require('imagemin-pngquant'),
    del = require('del');

let reload = browserSync.reload;

let config = {
    'php': {
        'src': './*.php'
    },
    'sass': {
        'src': './sass/**/*.scss',
        'dest': './'
    },
    'js': {
        'src': [
            './node_modules/tether/dist/js/tether.min.js',
            './node_modules/bootstrap/dist/js/bootstrap.min.js',
            './node_modules/owl.carousel/dist/owl.carousel.min.js'
        ],
        'dest': './js'
    },
    'img': {
        'src': './images/',
        'dest': './images/optimised/'
    }
};

gulp.task('php', function () {
    return gulp.src(config.php.src)
        .pipe(reload({stream: true}));
});

gulp.task('sass', function () {
    gulp.src(config.sass.src)
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: '> 5%',
            cascade: true
        }))
        .pipe(cssnano())
        .pipe(gulp.dest(config.sass.dest))
        .pipe(reload({stream: true}));
});

gulp.task('js', function () {
    return gulp.src(config.js.src)
        .pipe(gulp.dest(config.js.dest))
        .pipe(reload({stream: true}));
});

gulp.task('browser-sync', function () {
    browserSync.init({
        notify: false,
        reloadDelay: 1500,
        proxy: "localhost/gh_exam/"
    });
});

gulp.task('watch', ['browser-sync', 'php', 'sass', 'js'], function () {
    gulp.watch(config.php.src, ['php']);
    gulp.watch(config.sass.src, ['sass']);
    gulp.watch(config.js.src, ['js']);
});

// gulp.task('img', function () {
//     return gulp.src(config.img.src)
//         .pipe(cache(imagemin({
//             interlaced: true,
//             progressive: true,
//             svgoPlugins: [{removeViewBox: false}],
//             use: [pngquant()]
//         })))
//         .pipe(gulp.dest(config.img.dest));
// });

gulp.task('clean', function () {
    return del.sync('dist');
});

// gulp.task('clear', ['img'], function () {
//     return cache.clearAll();
// });

gulp.task('build', ['php', 'sass', 'js'], function () {

});