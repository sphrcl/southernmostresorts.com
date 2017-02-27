/**
 * Load CSS asynchronicly
 *
 * @link https://developers.google.com/speed/docs/insights/OptimizeCSSDelivery
 *
 * @package    abovethefold
 * @subpackage abovethefold/public
 * @author     PageSpeed.pro <info@pagespeed.pro>
 */

(function(window, Abtf) {

    // Wait for Critical CSS <style>
    var retrycount = 0;
    var retrydelay = 1;

    var timeset = false;

    window['Abtf'].css = function() {

        var m;
        var files = this.cnf.css;

        if (files === 'ABTF_CRITICALCSS') {
            if (ABTFDEBUG) {
                console.error('Abtf.css()','output buffer failed to apply CSS optimization');
            }
            return;
        }

        if (ABTFDEBUG) {
            if (!files) {
                return;
            } else {
                console.log('Abtf.css()', files);
            }
        }
        if (!files) {
            return;
        }

        // target for inserting CSS
        var target = (document.getElementById('AbtfCSS')) ? document.getElementById('AbtfCSS').nextSibling : false;

        for (i in files) {
            if (typeof files[i] !== 'object') {
                if (ABTFDEBUG) {
                    console.error('Abtf.css()','Invalid CSS file configuration',i,files);
                }
                continue;
            }
            m = files[i][0].join(',');
            this.loadCSS(files[i][1],target,m);
        }
    };

})(window, window['Abtf']);