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
                'assets/js/style-switcher.js',
                'assets/js/uikit.js',
                'plugins/caroufredsel/jquery.carouFredSel-6.2.1.js',
                'plugins/nivo-slider/jquery.nivo.slider.js',
                'plugins/jquery.bxslider/jquery.bxslider.js'
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
          "assets/css/built/caroufredsel.css": "assets/less/src/caroufredsel.less",
          "assets/css/built/grid-column.css": "assets/less/src/grid-column.less",
          "assets/css/built/menu-mobile.css": "assets/less/src/menu-mobile.less",
          "assets/css/built/menu-secondary.css": "assets/less/src/menu-secondary.less",
          "assets/css/built/uikit-almost-flat.css": "assets/less/src/uikit-almost-flat.less"
        }
      },
      production: {
        options: {
          paths: ["assets/css"],
          cleancss: true
        },
        files: {
          "assets/css/default.min.css": "assets/less/default.less",
          "assets/fonts/museo_slab/museo_slab.min.css": "assets/fonts/museo_slab/museo_slab.less"
        }
      }
    },
      
    watch: {
      less: {
        files: [
          'assets/less/*.less'
        ],
        tasks: ['less']
      },
      js: {
        files: [
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'uglify']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: false
        },
        files: [
          'assets/css/default.min.css',
          'assets/js/scripts.min.js'
        ]
      }
    }
      
  });

// Load tasks
grunt.loadNpmTasks('grunt-contrib-jshint');
grunt.loadNpmTasks('grunt-contrib-less');
grunt.loadNpmTasks('grunt-contrib-uglify');
grunt.loadNpmTasks('grunt-contrib-watch');

// Register tasks
grunt.registerTask('default', [
    'less',
    'uglify'   
]);
grunt.registerTask('dev', [
    'watch'
]);
};