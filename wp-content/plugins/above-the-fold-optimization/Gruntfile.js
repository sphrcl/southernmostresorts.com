/* global module:false */
module.exports = function(grunt) {

	// Project configuration
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		meta: {
			banner: '/*! Above the fold Optimization v<%= pkg.version %> */'
		},

		uglify: {
			options: {
				banner: ''
			},

			build: {
				options: {
					compress: {
						global_defs: {
							"ABTFDEBUG": false
						}
					}
				},
				files: {

					// Above The Fold Javascript Controller
					'public/js/abovethefold.min.js' : [
						'public/js/src/abovethefold.js'
					],

					// Proxy
					'public/js/abovethefold-proxy.min.js' : [
						'public/js/src/abovethefold.proxy.js'
					],

					// jQuery Stub
					'public/js/abovethefold-jquery-stub.min.js' : [
						'public/js/src/abovethefold.jquery-stub.js'
					],

					// Javascript optimization
					'public/js/abovethefold-js.min.js' : [
						'public/js/src/abovethefold.js.js',
						'public/js/src/abovethefold.loadscript.js'
					],

					// Javascript localstorage script loader
					'public/js/abovethefold-js-localstorage.min.js' : [
						'public/js/src/abovethefold.loadscript-localstorage.js'
					],

					// Javascript cached script loader
					/*'public/js/abovethefold-js-cached.min.js' : [
						'public/js/src/abovethefold.loadscript-cached.js'
					],*/

					// CSS optimization
					'public/js/abovethefold-css.min.js' : [
						'public/js/src/abovethefold.css.js'
					],

					// Enhanced loadCSS
					'public/js/abovethefold-loadcss-enhanced.min.js' : [
						'public/js/src/abovethefold.loadcss-modified.js'
					],

					// Original loadCSS
					'public/js/abovethefold-loadcss.min.js' : [
						'bower_components/loadcss/src/loadCSS.js',
						'public/js/src/abovethefold.loadcss.js'
					],

					// Compare Critical CSS view
					'public/js/compare.min.js' : [
						'public/js/src/compare.js'
					],

					// Extract full CSS view
					'public/js/extractfull.min.js' : [
						'node_modules/jquery/dist/jquery.min.js',
						'public/js/src/extractfull.js'
					],

					// jQuery LazyLoad XT core
					'public/js/jquery.lazyloadxt.min.js' : [
						'node_modules/lazyloadxt/dist/jquery.lazyloadxt.min.js'
					],

					// jQuery LazyLoad XT widget module
					'public/js/jquery.lazyloadxt.widget.min.js' : [
						'node_modules/lazyloadxt/dist/jquery.lazyloadxt.widget.min.js'
					],

					// Original loadCSS
					'admin/js/admincp.min.js' : [
						'admin/js/jquery.debounce.js',
						'admin/js/admincp.js',
						'admin/js/admincp.build-tool.js',
						'admin/js/admincp.add-conditional.js',
						'admin/js/admincp.criticalcss-editor.js',
						'bower_components/selectize/dist/js/standalone/selectize.min.js'
					],

					// Codemirror
					'admin/js/codemirror.min.js' : [
						'bower_components/codemirror/lib/codemirror.js',
						'bower_components/codemirror/mode/css/css.js',
						'admin/js/csslint.js',
						'bower_components/codemirror/addon/lint/lint.js',
						'bower_components/codemirror/addon/lint/css-lint.js'
					],

					// Extract full CSS view
					'public/js/webfont.js' : [
						'node_modules/webfontloader/webfontloader.js',
					]
				}
			},

			// build debug client
			build_debug: {
				options: {
					compress: {
						global_defs: {
							"ABTFDEBUG": true
						}
					}
				},
				files: {

					// Above The Fold Javascript Controller
					'public/js/abovethefold.debug.min.js' : [
						'public/js/src/abovethefold.js'
					],

					// Proxy
					'public/js/abovethefold-proxy.debug.min.js' : [
						'public/js/src/abovethefold.proxy.js'
					],

					// Javascript optimization
					'public/js/abovethefold-js.debug.min.js' : [
						'public/js/src/abovethefold.js.js',
						'public/js/src/abovethefold.loadscript.js'
					],

					// Javascript localstorage script loader
					'public/js/abovethefold-js-localstorage.debug.min.js' : [
						'public/js/src/abovethefold.loadscript-localstorage.js'
					],

					// Javascript cached script loader
					/*'public/js/abovethefold-js-cached.debug.min.js' : [
						'public/js/src/promise-polyfill.js',
						'public/js/src/async-local-storage.js',
						'public/js/src/abovethefold.loadscript-cached.js'
					],*/
					
					// jQuery Stub
					'public/js/abovethefold-jquery-stub.debug.min.js' : [
						'public/js/src/abovethefold.jquery-stub.js'
					],

					// CSS optimization
					'public/js/abovethefold-css.debug.min.js' : [
						'public/js/src/abovethefold.css.js'
					],

					// Enhanced loadCSS
					'public/js/abovethefold-loadcss-enhanced.debug.min.js' : [
						'public/js/src/abovethefold.loadcss-modified.js'
					],

					// Original loadCSS
					'public/js/abovethefold-loadcss.debug.min.js' : [
						'bower_components/loadcss/src/loadCSS.js',
						'public/js/src/abovethefold.loadcss.js'
					]

				}
			}
		},

		cssmin: {

			admincp: {
				options: {
					banner: '',
					advanced: true,
					aggressiveMerging: true,
					processImport: true
				},
				files: {
					'admin/css/admincp.min.css': [
						'admin/css/admincp.css',
						'admin/css/admincp-criticalcss.css',
						'admin/css/admincp-mobile.css',
						'bower_components/selectize/dist/css/selectize.default.css'
					],
					'admin/css/codemirror.min.css': [
						'bower_components/codemirror/lib/codemirror.css',
						'bower_components/codemirror/addon/lint/lint.css'
					],
					'public/css/compare.min.css': [
						'public/css/src/compare.css'
					],
					'public/css/extractfull.min.css': [
						'public/css/src/extractfull.css'
					]
				}
			}
		},

		/**
		 * Copy files
		 */
		copy: {
		  webfont_package: {
	      	src: 'node_modules/webfontloader/package.json',
	      	dest: 'public/js/src/webfontjs_package.json'
		  },
		  jquery_lazyxt_package: {
	      	src: 'node_modules/lazyloadxt/package.json',
	      	dest: 'public/js/src/lazyloadxt_package.json'
		  },
		  loadcss_package: {
		  	src: 'bower_components/loadcss/package.json',
	      	dest: 'public/js/src/loadcss_package.json'
		  }
		}
	});

	// Load Dependencies
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	grunt.registerTask( 'build', [ 'uglify', 'cssmin', 'copy' ] );

	grunt.registerTask( 'default', [ 'uglify', 'cssmin' ] );
};
