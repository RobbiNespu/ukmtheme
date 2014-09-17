'use strict'
module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      options: {
        banner: '/*! UKMTheme 6.3 by Jamaludin Rajalu <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        src: [
        'assets/js/partials/*.js',
        'lib/flexslider/jquery.flexslider.js'
      ],
        dest: 'assets/js/script.min.js'
      }
    },

    less: {
      production: {
        options: {
          paths: ['assets/css'],
          compress: true,
          cleancss: true
        },
        files: {
          'style.css': [
            'assets/less/version.less',
            'assets/fonts/webfont.less',
            'lib/flexslider/flexslider.less',
            'assets/less/partials/*.less',
            'assets/less/style.less'
          ]
        }
      }
    },

    watch: {
      css: {
        files: [
          'assets/less/style.less',
          'assets/less/version.less',
          'assets/less/partials/*.less'
        ],
        tasks: ['less'],
          options: {
            livereload: false
          }
      },
      js: {
        files: ['assets/js/partials/*.js'],
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