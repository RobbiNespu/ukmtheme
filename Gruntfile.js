'use strict'
module.exports = function(grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    // uglify
    uglify: {
      options: {
        banner: '/*! UKMTheme 6.6 by Jamaludin Rajalu <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        src: [
        'js/_UKMTheme.js'
      ],
        dest: 'js/script.min.js'
      }
    },
    // compass
    compass: {
      dist: { 
        options: { 
          sassDir: 'scss',
          cssDir: '.',
          environment: 'production',
          outputStyle: 'compressed'
        }
      }
    },
    // watch
    watch: {
      configFiles: {
        files: ['Gruntfile.js','version.json']
      },
      css: {
        files: [
          'scss/style.scss',
          'scss/*.scss'
        ],
        tasks: ['compass'],
          options: {
            livereload: true
          }
      },
      js: {
        files: ['js/_UKMTheme.js'],
        tasks: ['uglify'],
          options: {
            spawn: false
          }
      }
    } 

  }); // closingTask

  // load grunt task

  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['uglify', 'compass', 'watch']);

};