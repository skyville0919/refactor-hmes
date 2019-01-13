var gulp = require('gulp');
var php = require('gulp-connect-php');
var browserSync = require('browser-sync');
var relaod = browserSync.reload;

// gulp.task('php', function() {
//     php.server({},function() {
//         browserSync({
//             proxy:'localhost:8000'
//         })
//     });
// });

// gulp.task('browserSync', ['php'], function() {
//     browserSync.init({
//         proxy:"localhost:8000",
//         baseDir: "./",
//         open:true,
//         notify:false

//     });
// });

// // gulp.task('serve', ['php'], function() {
// //     gulp.watch("*.php").on('change', reload);
// // });

// gulp.task('dev', ['browserSync'], function(){
//     gulp.watch('./*php', browserSync.reload);
// });

// gulp.task('browserSync', function() {
//     browserSync.init({
//         proxy:"localhost:8000"
//     });
// });

gulp.task('php', function() {
    php.server({}, function() {
        browserSync({
            proxy: 'localhost:8000'
        });
    });

    gulp.watch('**/*.php').on('change', function() {
        browserSync.reload();
    })
});

gulp.task('default', ['php']);