'use strict'
module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      options: {
        banner: '/*! <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        src: ['assets/js/src/*.js',
              'plugins/caroufredsel/jquery.carouFredSel-6.2.1.js',
              'plugins/nivo-slider/jquery.nivo.slider.js',
              'plugins/nivo-lightbox/nivo-lightbox.js',
              'plugins/bxslider/jquery.bxslider.js',
              'plugins/responsive-slides/responsiveslides.js'
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
          'assets/css/built/default.css': ['assets/less/src/*.less', 'assets/less/*.less']
        }
      },
      production: {
        options: {
          paths: ['assets/css'],
          cleancss: true
        },
        files: {
          'assets/css/default.min.css': ['assets/less/src/*.less', 'assets/less/*.less'],
          'assets/fonts/museo_slab/museo_slab.min.css': 'assets/fonts/museo_slab/museo_slab.less'
        }
      }
    },

    watch: {
      css: {
        files: ['assets/less/*.less', 'assets/less/src/*.less'],
        tasks: ['less'],
          options: {
            livereload: false
          }
      },
      js: {
        files: ['assets/js/src/*.js'],
        tasks: ['uglify'],
          options: {
            spawn: false
          }
      }
    }

  });

  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-watch');


  grunt.registerTask('default', ['uglify', 'less']);

};