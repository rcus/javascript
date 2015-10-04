/**
 * Helpers and tools to ease your JavaScript day.
 *
 * @author Marcus Törnroth (m@rcus.se)
 */
window.Rcus = (function(window, document, undefined ) {
  var Rcus = {};


  // Return a random value
  Rcus.random = function(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  };

  // Expose public methods
  return Rcus;
  
})(window, window.document);