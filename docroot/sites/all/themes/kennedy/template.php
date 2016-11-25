<?php 

function kennedy_menu_tree__main_menu($variables){
    global $cur_level_main_menu;
    global $menu_view_class;

      $class = ($cur_level_main_menu == 1) ? 'menu dropdown ' . $menu_view_class : 'menu--submenu';
      $dropdownJS = ($cur_level_main_menu == 2) ? ' data-equalizer': '';
      $output = '<ul class="' . $class . ' ' . '-menu--' . $cur_level_main_menu . '"' . $dropdownJS . '>' . $variables['tree'] . '</ul>';
      $cur_level_main_menu--;

      return $output;
}

function kennedy_menu_link__main_menu(array $variables) {
    global $menu_view_class;
    global $cur_level_main_menu;
    
    $element = $variables['element'];
    $cur_level_main_menu = $element['#original_link']['depth'];
    $equalize = ($cur_level_main_menu == 2) ? ' data-equalizer-watch' : '';
    $view = _menu_views_replace_menu_item($variables['element']);

    if ($view !== FALSE) {
        if (!empty($view)) {
            $menu_view_class = "has-menu-view";
            $sub_menu = '';
            $classes = isset($variables['element']['#attributes']['class']) ? $variables['element']['#attributes']['class'] : array();
            $item = _menu_views_get_item($variables['element']);
            foreach (explode(' ', $item['view']['settings']['wrapper_classes']) as $class) {
                if (!in_array($class, $classes)) {
                $classes[] = $class;
                }
            }
            $variables['element']['#attributes']['class'] = $classes;
            if ($variables['element']['#below']) {
                $sub_menu = drupal_render($variables['element']['#below']);
            }
            return '<li' . drupal_attributes($variables['element']['#attributes']) . '>' . $view . $sub_menu . "</li>\n";
        }
        return '';
    }
    

    $sub_menu = $element['#below'] ? drupal_render($element['#below']) : '';
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    $element['#attributes']['class'][] = preg_replace("/[^[:alnum:]]/u", '-', strtolower($element['#title']));
    
    return '<li' . drupal_attributes($element['#attributes']) . '' . $equalize . '>' . $output . $sub_menu . '</li>';
}

function kennedy_menu_tree__menu_bariatric_menu($variables){
    global $cur_level_menu_bariatric_menu;
    global $bariatric_menu_class;
    

    if ($cur_level_menu_bariatric_menu == 1) {
        $bariatric_menu_class = ' class="vertical medium-horizontal menu" data-responsive-menu="drilldown medium-dropdown"';
    } else {
        $bariatric_menu_class = ' class="menu"';
    }
    
    $cur_level_menu_bariatric_menu--;
    return '<ul' . $bariatric_menu_class . '>' . $variables['tree'] . '</ul>';
}

function kennedy_menu_link__menu_bariatric_menu($variables){
    global $cur_level_menu_bariatric_menu;
    global $bariatric_menu_class;

    $element = $variables['element'];
    $cur_level_menu_bariatric_menu = $element['#original_link']['depth'];
    $sub_menu = '';
    
    

    if ($element['#below']) {
        $sub_menu = drupal_render($element['#below']);
    }
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    return '<li>' . $output . $sub_menu . "</li>\n";
}