'use strict'
module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      options: {
        banner: '/*! UKMTheme 6 <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        src: [
        'assets/js/source/*.js',
        'lib/flexslider/jquery.flexslider.js'
      ],
        dest: 'assets/js/script.min.js'
      }
    },

    less: {
      development: {
        options: {
          paths: ['assets/css']
        },
        files: {
          'assets/css/uncompress/style-uncompress.css': ['assets/less/partials/*.less', 'assets/less/*.less']
        }
      },
      production: {
        options: {
          paths: ['assets/css'],
          compress: true,
          cleancss: true
        },
        files: {
          'assets/css/style.min.css': [
            'lib/flexslider/flexslider.less',
            'assets/less/partials/*.less',
            'assets/less/*.less'
          ]
        }
      }
    },

    watch: {
      css: {
        files: ['assets/less/*.less', 'assets/less/partials/*.less'],
        tasks: ['less'],
          options: {
            livereload: false
          }
      },
      js: {
        files: ['assets/js/source/*.js'],
        tasks: ['uglify'],
          options: {
            spawn: false
          }
      }
    },

    compress: {
      js: {
        options: {
          mode: 'gzip'
        },
        files: [ { expand: true, src: ['assets/js/*.js'], dest: '', ext: '.gz.js' } ]
      },
      
      css: {
        options: {
          mode: 'gzip'
        },
        files: [ { expand: true, src: ['assets/css/*.css'], dest: '', ext: '.gz.css' } ]
      }
    }

  }); // closingTask

  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-compress');

  grunt.registerTask('default', ['uglify', 'less']);

};