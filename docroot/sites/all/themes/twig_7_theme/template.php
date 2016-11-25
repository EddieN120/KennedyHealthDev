<?php
/**
 * Implements theme_process_page
 * Add menu variables if required
 */
function twig_7_theme_process_page(&$vars) {
  if ($vars['main_menu']) {
    $vars['main_menu'] = theme('links__system_main_menu', array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'id' => 'main-menu-links',
        'class' => array('links', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      ),
    ));
  }
  if ($vars['secondary_menu']) {
    $vars['secondary_menu'] = theme('links__system_secondary_menu', array(
      'links' => $vars['secondary_menu'],
      'attributes' => array(
        'id' => 'secondary-menu-links',
        'class' => array('links', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      ),
    ));
  }
}

/**
 * Implements theme_field
 * A very 'clean' field theme, stolen from display suite theme_ds_field_reset
 */
function twig_7_theme_field($variables) {
  $output = '';

  // Render the label.
  if (!$variables['label_hidden']) {
    $output .= '<div class="label-' . $variables['element']['#label_display'] . '">' . $variables['label'].'</div>';
  }

  // Render the items.
  foreach ($variables['items'] as $delta => $item) {
    $output .= drupal_render($item);
  }

  return $output;
}
