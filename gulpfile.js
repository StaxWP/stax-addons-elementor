var path = require('path'),
    gulp = require('gulp'),
    sass = require('gulp-sass'),
    rename = require('gulp-rename'),
    csso = require('gulp-csso');

gulp.task('styles', function () {
    gulp.src('./widgets/**/*.scss')
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

gulp.task('watch', function () {
    gulp.watch('./widgets/**/*.scss', gulp.series(['styles']));
});
