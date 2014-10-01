
module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    liquid: {
	    options: {
	      includes: 'src/includes',
	    },
	    pages: {
	      files: [
	        { expand: true, flatten: true, src: 'src/*.liquid', dest: 'dest/', ext: '.html' }
	      ]
	    }
	  },

    sass: {
       dist: {                           
        options: {                   
          style: 'expand'
        },

        files: [{
            expand: true,
            cwd: 'bower_components/foundation/scss',
            src: ['app.scss'],
            dest: 'dest/css',
            ext: '.css'
        }]      
      }
    },
	
	// coffee: {
	//   compile:{
 //  		files: {
 //  		   "bower_components/foundation/js/app.js" : "bower_components/foundation/js/app.coffee"
 //  		}
	//   }
	// },

  copy: {
      main: {
        files:
          [
            {expand: true, cwd: 'src/fonts/', src: ['**'], dest: 'dest/fonts'},
            {expand: true, cwd: 'src/images/', src: ['**'], dest: 'dest/images'}
          ]
        }
  },
  uglify: {
    options: {
      report: 'min'
    },
    dist: {
      files: {
        'dest/js/scripts/foundation.min.js': [
          'bower_components/foundation/js/foundation/foundation.js',
          //'bower_components/foundation/js/foundation/foundation.offcanvas.js',
          //'bower_components/foundation/js/foundation/foundation.clearing.js',
          //'bower_components/foundation/js/foundation/foundation.dropdown.js',
          //'bower_components/foundation/js/foundation/foundation.reveal.js',
          //'bower_components/foundation/js/foundation/foundation.orbit.js',
          'bower_components/imagesloaded.js',
          'bower_components/waypoints.min.js',
          'bower_components/skrollr/skrollr.js.0.6.17',
        ],
        'dest/js/main.min.js': ['bower_components/main.js'],
        'dest/js/modernizr.min.js': ['bower_components/modernizr/modernizr.js'],
        //'dest/js/scripts/jquery.min.js': ['bower_components/jquery/dist/jquery.js']
      }
    }
  },
  autoprefixer: {
    options: {
      browsers: ['last 5 versions','android 2.3','ie 8','> 1%']
    },
    overwrite: {
      src: 'dest/css/app.css'
    }
  },
  cssmin: {
    minify: {
      expand: true,
      cwd: 'dest/css/',
      src: ['*.css', '!*.min.css'],
      dest: 'dest/css/',
      ext: '.min.css'
    }
  },
  concat: {
    options: {
      separator: ';',
    },
    dist: {
      src: [
        //'dest/js/scripts/jquery.min.js',
        'dest/js/scripts/foundation.min.js'
      ],
      dest: 'dest/js/app.min.js'
    },
  },

  watch: {
    grunt: { 
      files: ['Gruntfile.js', ]
    },

    liquid : {
    	files : 'src/**/*.liquid',
    	tasks: 'liquid',
    	options : {
    		livereload: true
    	}
    },

    // coffee: {
    //   files: [
    //     "bower_components/foundation/js/app.coffee"
    //   ],
    //   tasks: 'coffee',
    //   options: {
    //      livereload: true
    //   }
    // },

    sass: {
      files: 'bower_components/foundation/scss/**/*.scss',
      tasks: ['sass','autoprefixer','cssmin'],
      options: {
         livereload: true
      }
    },

    scripts: {
      files: ['bower_components/foundation/js/**/*.js','bower_components/main.js'],
      tasks: ['uglify', 'concat'],
      options: {
         livereload: true
      }
    },

    images: {
      files: ['src/*.*', 'src/**/*.*'],
      tasks: 'copy',
      options: {
        livereload: true
      }
    },

    markup: {
      files: ['dest/*.html', 'dest/**/*.html'],
      tasks: 'copy',
      options: {
        livereload: true
      }
    }
      
    }
  });
  
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-liquid');
  grunt.loadNpmTasks('grunt-contrib-coffee');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.registerTask('default', ['copy', 'uglify', 'autoprefixer', 'cssmin', 'concat', 'liquid', 'watch']);

}