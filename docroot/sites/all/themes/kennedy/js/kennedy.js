/**
 * @file
 * Placeholder file for custom sub-theme behaviors.
 *
 */
(function ($, Drupal) {

  /**
   * Use this behavior as a template for custom Javascript.
   */
  Drupal.behaviors.loadFoundation = {
    attach: function (context, settings) {
      $(document).ready(function () {
        $(document).foundation();
      });
    }
  };

})(jQuery, Drupal);
