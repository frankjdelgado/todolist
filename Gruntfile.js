//Gruntfile
module.exports = function(grunt) {

//Initializing the configuration object
  grunt.initConfig({

    // Task configuration
    watch: {
		sass: {
			files: ['public/scss/*.scss'],
			tasks: ['sass','cssmin'],
			options: {
				livereload: true,
			},
		},
		js: {
			files: ['public/scripts/*.js'],
			options: {
				livereload: true,
			},
		},
		templates: {
			files: ['app/views/**/*.php'],
			options: {
				livereload: true,
			},
		},
    },
    sass: {
		dist: {
			files: [{
				expand: true,
				cwd: 'public/scss',
				src: ['*.scss'],
				dest: 'public/scss/compiled',
				ext: '.css'
			}],
			noCache: true,
			style: 'compressed'
		}
	},
	concat: {
		dist: {
			src: ['public/scss/compiled/*.css'],
			dest: 'public/scss/compiled/build.css',
		}
	},
	cssmin: {
		combine: {
			files: [{
				expand: true,
				cwd: 'public/scss/compiled/',
				src: ['*.css'],
				dest: 'public/css/',
				ext: '.min.css'
			}]
		}
	}
  });

// Plugin loading
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
// Task definition
	grunt.registerTask('default', ['watch']);
	
};