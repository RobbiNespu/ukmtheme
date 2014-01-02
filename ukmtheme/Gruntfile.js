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
        'plugins/caroufredsel/jquery.carouFredSel-6.2.1.js',
        'plugins/nivo-slider/jquery.nivo.slider.js',
        'plugins/nivo-lightbox/nivo-lightbox.js',
        'plugins/bxslider/jquery.bxslider.js',
        'plugins/responsive-slides/responsiveslides.js'
      ],
        dest: 'assets/js/20140101-script.min.js'
      }
    },

    less: {
      development: {
        options: {
          paths: ['assets/css']
        },
        files: {
          'assets/css/built/built_20140101.css': ['assets/less/partials/*.less', 'assets/less/*.less']
        }
      },
      production: {
        options: {
          paths: ['assets/css'],
          compress: true,
          cleancss: true
        },
        files: {
          'assets/css/20140101-stylesheet.min.css': [
            'plugins/bxslider/jquery.bxslider.less',
            'plugins/nivo-slider/nivo-slider.less',
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