const path = require('path'),
    gulp = require('gulp'),
    sass = require('gulp-sass'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify'),
    csso = require('gulp-csso'),
    babel = require('gulp-babel');

gulp.task('build:styles', () => {
    return gulp.src('./widgets/**/*.scss')
        .pipe(sass())
        .pipe(gulp.dest(path.join(__dirname, 'widgets')))
        .pipe(csso())
        .pipe(
            rename({
                suffix: ".min"
            })
        )
        .pipe(gulp.dest(path.join(__dirname, 'widgets')));
});

gulp.task('build:scripts', () => {
    return gulp.src(['./widgets/**/*.js', '!./widgets/**/*.min.js'])
        .pipe(rename({suffix: '.min'}))
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(uglify())
        .pipe(gulp.dest(path.join(__dirname, 'widgets')));
});

gulp.task('watch:styles', () => {
    gulp.watch('./widgets/**/*.scss', gulp.series(['build:styles']));
});
