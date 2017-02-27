/**
 * loadCSS (installed from bower module)
 *
 * @link https://github.com/filamentgroup/loadCSS/
 *
 * @package    abovethefold
 * @subpackage abovethefold/public
 * @author     PageSpeed.pro <info@pagespeed.pro>
 */

(function(window, Abtf) {
    
    window['Abtf'].loadCSS = (typeof loadCSS !== 'undefined') ? function( href, before, media, callback ) {

        if (ABTFDEBUG) {
            console.info('Abtf.css() ➤ loadCSS() async download start', Abtf.localUrl(href));
        }
        loadCSS( href, before, media, function() {
            if (ABTFDEBUG) {
                console.info('Abtf.css() ➤ loadCSS() render', Abtf.localUrl(href));
            }
            if (callback) {
                callback();
            }
        } );

    } : function() {};

})(window, window['Abtf']);