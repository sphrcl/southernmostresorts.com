/**
 * Above the fold optimization Javascript
 *
 * This javascript handles the CSS delivery optimization.
 *
 * @package    abovethefold
 * @subpackage abovethefold/public
 * @author     PageSpeed.pro <info@pagespeed.pro>
 */
window['Abtf'] = (function(window) {

    if (ABTFDEBUG) {
        console.warn('Abtf', 'debug notices visible to admin only');
    }
    
    var Abtf = {

        cnf: {},

        /**
         * Header init
         */
        h: function(cnf,css) {

            this.cnf = cnf;

            /*if (css) {
                this.css();
            }*/

            if (cnf.proxy) {
                window['Abtf'].proxy_setup(cnf.proxy);
            }

            // load scripts in header
            if (this.cnf.js && !this.cnf.js[1]) {
                this.js(this.cnf.js[0]);
            }

            /**
             * Print reference in console
             */
            var noref = (typeof this.cnf.noref !== 'undefined' && this.cnf.noref) ? true : false;
            if (!noref) {
                this.ref();
            }

            // Google Web Font Loader
            if (typeof cnf.gwf !== 'undefined') {
                if (cnf.gwf[0] && !cnf.gwf[1]) {

                    if (cnf.gwf[0] === 'a') {
                        this.async(cnf.gwf[2],'webfont');

                        if (ABTFDEBUG) {
                            console.log('Abtf.fonts()', 'async', WebFontConfig);
                        }
                        
                    } else if (typeof WebFont !== 'undefined') {

                        // Convert WebFontConfig object string
                        if (typeof cnf.gwf[0] === 'string') {
                            cnf.gwf[0] = eval('('+cnf.gwf[0]+')');
                        }

                        // load WebFontConfig
                        WebFont.load(cnf.gwf[0]);

                        if (ABTFDEBUG) {
                            console.log('Abtf.fonts()', cnf.gwf[0]);
                        }
                    }
                }
            }
        },

        /**
         * Footer init
         */
        f: function(css) {

            // Load CSS
            if (css && this.css) {

                if (ABTFDEBUG) {
                    console.log('Abtf.css()', 'footer start');
                }

                this.css();
            }

            // load scripts in footer
            if (this.cnf.js && this.cnf.js[1]) {

                if (ABTFDEBUG) {
                    console.log('Abtf.js()', 'footer start');
                }

                this.js(this.cnf.js[0]);
            }

            // Google Web Font Loader
            if (typeof this.cnf.gwf !== 'undefined') {
                if (this.cnf.gwf[0] && this.cnf.gwf[1]) {

                    /**
                     * Async
                     */
                    if (this.cnf.gwf[0] === 'a') {
                        this.async(this.cnf.gwf[2],'webfont');

                        if (ABTFDEBUG) {
                            console.log('Abtf.fonts() [footer]', 'async', WebFontConfig);
                        }

                    } else if (typeof WebFont !== 'undefined') {

                        // load WebFontConfig
                        WebFont.load(this.cnf.gwf[0]);

                        if (ABTFDEBUG) {
                            console.log('Abtf.fonts() [footer]', this.cnf.gwf[0]);
                        }
                    }
                }
            }
        },

        /**
         * DomReady
         */
        ready: function(a, b, c) {
            b = document;
            c = 'addEventListener';
            b[c] ? b[c]('DocumentContentLoaded', a) : window.attachEvent('onload', a);
        },

        /**
         * Print reference
         */
        ref: function() {
            if (ABTFDEBUG) {
                return;
            }
            if (typeof window.console !== 'undefined') {
                console.log(
                    "\n%c100", 
                    "font: 1em sans-serif; color: white; background-color: #079c2d;padding:2px;",
                    "Google PageSpeed Score optimized using https://goo.gl/C1gw96\n\nTest your website: https://pagespeed.pro/tests\n\n"
                );
            }
        },

        /**
         * Async load script 
         */
        async: function(scriptFile, id) {
            (function(d) {
                var wf = d.createElement('script');
                wf.src = scriptFile;
                if (id) {
                    wf.id = id;
                }
                wf.async = true;
                var s = d.getElementsByTagName('script')[0];
                if (s) {
                    s.parentNode.insertBefore(wf, s);
                } else {
                    var h = document.head || document.getElementsByTagName("head")[0];
                    h.appendChild(wf);
                }
            })(document);
        }
    };

    if (ABTFDEBUG) {

        var SITE_URL = document.createElement('a');
        SITE_URL.href = document.location.href;
        var BASE_URL_REGEX = new RegExp('^(https?:)?//' + SITE_URL.host.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&'),'i');
        
        /**
         * Return local url for debug notices
         */
        Abtf.localUrl = function(url) {
            return url.replace(BASE_URL_REGEX,'');
        }
    }

    return Abtf;

})(window);