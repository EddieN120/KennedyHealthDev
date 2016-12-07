<?php

/**
 * @file
 * Default theme implementation for displaying search results.
 *
 * This template collects each invocation of theme_search_result(). This and
 * the child template are dependent to one another sharing the markup for
 * definition lists.
 *
 * Note that modules may implement their own search type and theme function
 * completely bypassing this template.
 *
 * Available variables:
 * - $search_results: All results as it is rendered through
 *   search-result.tpl.php
 * - $module: The machine-readable name of the module (tab) being searched, such
 *   as "node" or "user".
 *
 *
 * @see template_preprocess_search_results()
 *
 * @ingroup themeable
 */
?>
{% if search_results %}
  <h2> {{ 'Search results'|t }} </h2>
  <ol class="search-results <?php print $module; ?>-results">
    {{ $search_results }} 
  </ol>
  {{ print $pager }} 
{% else %}
  <h2> {{ 'Your search yielded no results'|t }} </h2>
  <?php print search_help('search#noresults', drupal_help_arg()); ?>
{% endif %}
