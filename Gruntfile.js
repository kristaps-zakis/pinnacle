module.exports = function(grunt) {
  //  require('jit-grunt')(grunt);

    grunt.initConfig({
        less: {
            development: {
                options: {
                    compress: false,
                    yuicompress: false,
                    optimization: 2
                },
                files: {
                    "public/assets/css/style.css": "public/assets/less/style.less",
                    "public/assets/css/result.css": "public/assets/less/result.less"
                }
            }
        },
        watch: {
            styles: {
                files: ['assets/less/**/*.less'],
                tasks: ['less'],
                options: {
                    livereload: true,
                    spawn: false,
                    event: ['added','deleted','changed']
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['less', 'watch']);
};