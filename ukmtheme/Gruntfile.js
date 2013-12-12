'use strict';
module.exports = function(grunt) {

  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'assets/js/*.js',
        '!assets/js/scripts.min.js'
      ]
    },
      uglify: {
        options: {
          banner: '/*! <%= grunt.template.today("yyyy-mm-dd") %> */\n'
        },
        build: {
          src: ['assets/js/menu-mobile.js',
                'assets/js/uikit.js',
                'plugins/caroufredsel/jquery.carouFredSel-6.2.1.js',
                'plugins/nivo-slider/jquery.nivo.slider.js'
                ],
          dest: 'assets/js/script.min.js'
        }
      },
    less: {
      development: {
        options: {
          paths: ["assets/css"]
        },
        files: {
          "assets/css/built/caroufredsel.css": "assets/less/caroufredsel.less",
          "assets/css/built/grid-column.css": "assets/less/grid-column.less",
          "assets/css/built/menu-mobile.css": "assets/less/menu-mobile.less",
          "assets/css/built/menu-secondary.css": "assets/less/menu-secondary.less",
          "assets/css/built/uikit-almost-flat.css": "assets/less/uikit-almost-flat.less"
        }
      },
      production: {
        options: {
          paths: ["assets/css"],
          cleancss: true
        },
        files: {
          "assets/css/default.min.css": "assets/less/default.less",
          "assets/fonts/webfontkit-20131209-200231/webfontkit-20131209-200231.min.css": "assets/fonts/webfontkit-20131209-200231/webfontkit-20131209-200231.less"
        }
      }
    }
      
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  // Register tasks
  grunt.registerTask('default', [
    'less',
    'uglify'
  ]);
};