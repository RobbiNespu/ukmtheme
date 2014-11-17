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
      configFiles: {
        files: ['Gruntfile.js','version.json']
      },
      css: {
        files: [
          'assets/less/style.less',
          'assets/less/version.less',
          'assets/less/partials/*.less'
        ],
        tasks: ['less'],
          options: {
            livereload: true
          }
      },
      js: {
        files: ['assets/js/partials/*.js'],
        tasks: ['uglify'],
          options: {
            spawn: false
          }
      }
    }

  }); // closingTask

  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['uglify', 'less', 'watch']);

};