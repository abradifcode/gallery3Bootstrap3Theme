module.exports = function (grunt) {
    "use strict";

    var Gallery3Bootstrap3Theme,
        projectRoot = '../',
        resourcesPath = './';

    Gallery3Bootstrap3Theme = {
        'destination': projectRoot,
        'js': [resourcesPath + 'js/*.js', 'Gruntfile.js'],
        'img': [resourcesPath + 'img/**/*.{png,jpg,jpeg,gif,webp}'],
        'svg': [resourcesPath + 'img/**/*.svg'],
        'views': [projectRoot + 'views/**/*.html.php'],
        'all_scss': [resourcesPath + 'scss/**/*.scss'],
        'scss': [resourcesPath + 'scss/gallery3-bootstrap3-theme.scss']
    };

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        watch: {
            // Frontend
            Gallery3Bootstrap3ThemeScss: {
                files: Gallery3Bootstrap3Theme.all_scss,
                tasks: ['sass', 'cmq', 'cssmin']
            },
            Gallery3Bootstrap3ThemeJs: {
                files: Gallery3Bootstrap3Theme.js,
                tasks: ['uglify', 'concat']
            },
            Gallery3Bootstrap3ThemeImages: {
                files: Gallery3Bootstrap3Theme.img,
                tasks: ['imagemin'],
                options: {
                    event: ['added', 'changed']
                }
            },
            Gallery3Bootstrap3ThemeSvg: {
                files: Gallery3Bootstrap3Theme.svg,
                tasks: ['svg2png', 'svgmin'],
                options: {
                    event: ['added', 'changed']
                }
            },

            livereload: {
                files: [
                    projectRoot + 'css/style.min.css',
                    projectRoot + 'js/footer.min.js'
                ],
                options: {
                    livereload: true
                }
            }
        },

        sass: {
            Gallery3Bootstrap3Theme: {
                options: {
                    style: 'compressed'
                },
                files: {
                    './.temp/css/style.css': resourcesPath + 'scss/gallery3-bootstrap3-theme.scss'
                }
            }
        },

        cmq: {
            Gallery3Bootstrap3Theme: {
                files: {
                    './.temp/css/': [
                        './.temp/css/style.css']

                }
            }
        },

        cssmin: {
            Gallery3Bootstrap3Theme: {
                // Used to rewrite URLs in (particular) fancybox
                options: {
                    root: '../'
                },
                files: {
                    '../css/style.min.css': [
                        './.temp/css/style.css'
                    ]
                }
            }
        },

        jshint: {
            options: {
                camelcase: true,
                curly: true,
                eqeqeq: true,
                eqnull: true,
                forin: true,
                indent: 4,
                trailing: true,
                undef: true,
                browser: true,
                devel: true,
                node: true,
                globals: {
                    jQuery: true,
                    $: true
                }
            },
            Gallery3Bootstrap3Theme: {
                files: {
                    src: Gallery3Bootstrap3Theme.js
                }
            }
        },

        uglify: {
            vendors: {
                options: {
                    mangle: {
                        except: ['jQuery']
                    }
                },

                files: {
                    // vendors
                    './.temp/js/vendors.min.js': [
                        projectRoot + 'vendor/jquery/jquery.js',
                        projectRoot + 'vendor/jquery-ui/ui/jquery-ui.js',
                        //projectRoot+'vendor/jquery-infiinte-scroll/jquery.infinitescroll.js',
                        projectRoot + 'vendor/holderjs/holder.js',
                        projectRoot + 'vendor/bootstrap-sass-official/assets/javascripts/bootstrap/transition.js',
                        projectRoot + 'vendor/bootstrap-sass-official/assets/javascripts/bootstrap/dropdown.js',
                        projectRoot + 'vendor/bootstrap-sass-official/assets/javascripts/bootstrap/collapse.js',
                        projectRoot + 'vendor/bootstrap-sass-official/assets/javascripts/bootstrap/tooltip.js',
                        projectRoot + 'vendor/bootstrap-sass-official/assets/javascripts/bootstrap/popover.js'

                    ]
                }
            },

            Gallery3Bootstrap3Theme: {
                files: {
                    './.temp/js/gallery3bootstrap3theme.min.js': [resourcesPath + 'js/*.js']
                }
            }
        },


        concat: {
            js: {
                src: [
                    './.temp/js/modernizr-custom.js',
                    './.temp/js/vendors.min.js',
                    './.temp/js/gallery3bootstrap3theme.min.js'
                ],
                dest: Gallery3Bootstrap3Theme.destination + 'js/footer.min.js'
            }
        },

        imagemin: {
            Gallery3Bootstrap3Theme: {
                options: {
                    optimizationLevel: 3,
                    progressive: true
                },
                files: [
                    {
                        expand: true,
                        cwd: resourcesPath + 'images',
                        src: '**/*.{png,jpg,jpeg,gif,webp}',
                        dest: projectRoot + 'images'
                    }
                ]
            }
        },

        svg2png: {
            Gallery3Bootstrap3Theme: {
                files: [
                    {
                        src: Gallery3Bootstrap3Theme.svg
                    }
                ]
            }
        },

        svgmin: {
            Gallery3Bootstrap3Theme: {
                options: {
                    plugins: [
                        {
                            removeViewBox: false
                        }
                    ]
                },
                files: [
                    {
                        expand: true,
                        cwd: resourcesPath + 'img',
                        src: '**/*.svg',
                        dest: projectRoot + 'images'
                    }
                ]
            }
        },

        modernizr: {
            Gallery3Bootstrap3Theme: {
                devFile: 'remote',
                parseFiles: true,
                files: {
                    src: [
                        Gallery3Bootstrap3Theme.js,
                        Gallery3Bootstrap3Theme.all_scss,
                        Gallery3Bootstrap3Theme.views
                    ]
                },
                outputFile: './.temp/js/modernizr-custom.js',

                extra: {
                    'shiv': false,
                    'printshiv': false,
                    'load': true,
                    'mq': false,
                    'cssclasses': true
                },
                extensibility: {
                    'addtest': false,
                    'prefixed': false,
                    'teststyles': false,
                    'testprops': false,
                    'testallprops': false,
                    'hasevents': false,
                    'prefixes': false,
                    'domprefixes': false
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-svg2png');
    grunt.loadNpmTasks('grunt-svgmin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks("grunt-modernizr");
    grunt.loadNpmTasks('grunt-notify');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-combine-media-queries');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build', ['sass', 'cmq', 'cssmin', 'modernizr', 'uglify', 'concat']);

};
