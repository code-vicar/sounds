module.exports = function(grunt) {
    grunt.initConfig({
        sass: {
            options: {
                sourceMap: true
            },
            dist: {
                files: {
                    'web/css/main.css': 'src/AppBundle/Resources/sass/main.scss'
                }
            }
        },
        copy: {
            js: {
                files: [
                    // includes files within path
                    {
                        expand: true,
                        src: ['**/*.js'],
                        cwd: 'src/AppBundle/Resources/views/',
                        dest: 'web/js'
                    }
                ]
            }
        }
    });

    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-copy');

    grunt.registerTask('default', ['sass:dist', 'copy:js']);
};
