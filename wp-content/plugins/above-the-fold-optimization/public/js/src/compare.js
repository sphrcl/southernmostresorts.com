/**
 * Above the fold Compare Critical CSS Page Controller
 *
 * @package    abovethefold
 * @subpackage abovethefold/public
 * @author     PageSpeed.pro <info@pagespeed.pro>
 */
var COMPARE = (function(window,document) {

    // Date.now polyfill
    if (!Date.now) {
        Date.now = function() { return new Date().getTime(); }
    }

    // addEventListener?
    var eventListener = (typeof document.addEventListener !== 'undefined') ? true : false;

    /**
     * Reload Critical CSS frame
     */
    var reloadCritical = function(a) {
        a.href = a.href.replace(/abtft=([0-9]+)\&/,'abtft='+Math.floor(Date.now() / 1000)+'&');
    }

    var reloadLink = document.getElementById('reloadcritical');
    if (reloadLink) {
        if (eventListener) {
            reloadLink.addEventListener('click',function() {
                reloadCritical(this);
            });
        } else {
            reloadLink.onclick = function() {
                reloadCritical(this);
            };
        }
    }

    // return public controller
    return { };

})(window,document);