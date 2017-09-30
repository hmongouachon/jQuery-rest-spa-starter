module.exports = function(grunt) {
    //grunt wrapper function 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        //grunt task configuration will go here  
        ngAnnotate: {
            options: {
                // singleQuotes: true
            },
            app: {
                files: {

        	      
        	       // './dist/min-safe/directives.js': ['./application/directives.js'],
 
                    './dist/min-safe/app.js': ['./js/main.js']
                }
            }
        },
        concat: {
            js: { //target
                src: ['./dist/min-safe/app.js', './dist/min-safe/*.js'],
                dest: './dist/min/app.js'
            }
        },
        uglify: {
            js: { //target
                src: ['./dist/min/app.js'],
                dest: './dist/min/app.js'
            },
            options: {
                mangle: false,
            },
            
        }
    });

    //load grunt tasks
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-ng-annotate'); 

    //register grunt default task
    grunt.registerTask('default', ['ngAnnotate', 'concat', 'uglify']);

}