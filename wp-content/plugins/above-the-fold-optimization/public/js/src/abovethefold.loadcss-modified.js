/**
 * loadCSS (v1.2.0) improved with requestAnimationFrame following Google guidelines.
 *
 * @link https://github.com/filamentgroup/loadCSS/
 * @link https://developers.google.com/speed/docs/insights/OptimizeCSSDelivery
 *
 * @package    abovethefold
 * @subpackage abovethefold/public
 * @author     PageSpeed.pro <info@pagespeed.pro>
 */

(function(window, Abtf) {

    window['Abtf'].loadCSS = function( href, before, media, callback ) {

        if (ABTFDEBUG) {
            console.info('Abtf.css() ➤ loadCSS()[RAF] async download start', Abtf.localUrl(href));
        }

        // Arguments explained:
        // `href` [REQUIRED] is the URL for your CSS file.
        // `before` [OPTIONAL] is the element the script should use as a reference for injecting our stylesheet <link> before
            // By default, loadCSS attempts to inject the link after the last stylesheet or script in the DOM. However, you might desire a more specific location in your document.
        // `media` [OPTIONAL] is the media type or query of the stylesheet. By default it will be 'all'
        var doc = window.document;
        var ss = doc.createElement( "link" );
        var ref;
        if( before ){
            ref = before;
        }
        else {
            var refs = ( doc.body || doc.getElementsByTagName( "head" )[ 0 ] ).childNodes;
            ref = refs[ refs.length - 1];
        }

        var sheets = doc.styleSheets;
        ss.rel = "stylesheet";
        ss.href = href;
        // temporarily set media to something inapplicable to ensure it'll fetch without blocking render
        ss.media = "only x";

        // wait until body is defined before injecting link. This ensures a non-blocking load in IE11.
        function ready( cb ){
            if( doc.body ){
                return cb();
            }
            setTimeout(function(){
                ready( cb );
            });
        }
        // Inject link
        // Note: the ternary preserves the existing behavior of "before" argument, but we could choose to change the argument to "after" in a later release and standardize on ref.nextSibling for all refs
        // Note: `insertBefore` is used instead of `appendChild`, for safety re: http://www.paulirish.com/2011/surefire-dom-element-insertion/
        ready( function(){
            ref.parentNode.insertBefore( ss, ( before ? ref : ref.nextSibling ) );
        });

        /**
         * CSS rendered flag
         */
        var CSSrendered = false;

        // A method (exposed on return object for external use) that mimics onload by polling until document.styleSheets until it includes the new sheet.
        var onloadcssdefined = function( cb ){

            if (CSSrendered) {
                return;
            }

            var resolvedHref = ss.href;
            var i = sheets.length;
            while( i-- ){
                if (CSSrendered) {
                    break;
                }
                if( sheets[ i ].href === resolvedHref ){
                    return cb();
                }
            }
            setTimeout(function() {
                onloadcssdefined( cb );
            });
        };

        /**
         * Render CSS when file is loaded
         */
        function renderCSS(){

            // already rendered?
            if (CSSrendered) {
                return;
            }
            CSSrendered = true;

            if( ss.addEventListener ){
                ss.removeEventListener( "load", renderCSS );
            }

            function render() {

                /**
                 * Use animation frame to paint CSS
                 *
                 * @link https://developers.google.com/speed/docs/insights/OptimizeCSSDelivery
                 */
                Abtf.raf(function() {
                    ss.media = media || "all";
                    if (ABTFDEBUG) {
                        console.info('Abtf.css() ➤ loadCSS()[RAF] render', Abtf.localUrl(href));
                    }

                    /**
                     * Callback on completion
                     */
                    if (callback) {
                        callback();
                    }
                });
            }

            if (typeof Abtf.cnf.delay !== 'undefined' && parseInt(Abtf.cnf.delay) > 0) {

                if (ABTFDEBUG) {
                    console.info('Abtf.css() ➤ loadCSS()[RAF] render delay', Abtf.cnf.delay, Abtf.localUrl(href));
                }

                /**
                 * Delayed rendering
                 */
                setTimeout(render,Abtf.cnf.delay);
            } else {
                render();
            }
        }

        // once loaded, set link's media back to `all` so that the stylesheet applies once it loads
        if( ss.addEventListener ){
            ss.addEventListener( "load", renderCSS);
        } else {
            ss.onload = renderCSS;
        }

        onloadcssdefined( renderCSS );
        return ss;

    };

    window['Abtf'].raf = function(callback) {
        if (typeof requestAnimationFrame === 'function') {
            requestAnimationFrame(callback);
        } else if (typeof mozRequestAnimationFrame === 'function') {
            mozRequestAnimationFrame(callback);
        } else if (typeof webkitRequestAnimationFrame === 'function') {
            webkitRequestAnimationFrame(callback);
        } else if (typeof msRequestAnimationFrame === 'function') {
            msRequestAnimationFrame(callback);
        } else {
            Abtf.ready(callback);
        }
    };

})(window, window['Abtf']);