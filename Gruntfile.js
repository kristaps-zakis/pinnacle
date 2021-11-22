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
                    "assets/css/style.css": "assets/less/style.less"
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