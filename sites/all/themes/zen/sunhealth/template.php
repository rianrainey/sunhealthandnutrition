<?php
/**
 * @file
 * Contains theme override functions and preprocess functions for the theme.
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. You can add new regions for block content, modify
 *   or override Drupal's theme functions, intercept or make additional
 *   variables available to your theme, and create custom PHP logic. For more
 *   information, please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/theme-guide
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   The Drupal theme system uses special theme functions to generate HTML
 *   output automatically. Often we wish to customize this HTML output. To do
 *   this, we have to override the theme function. You have to first find the
 *   theme function that generates the output, and then "catch" it and modify it
 *   here. The easiest way to do it is to copy the original function in its
 *   entirety and paste it here, changing the prefix from theme_ to STARTERKIT_.
 *   For example:
 *
 *     original: theme_breadcrumb()
 *     theme override: STARTERKIT_breadcrumb()
 *
 *   where STARTERKIT is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_breadcrumb() function.
 *
 *   If you would like to override any of the theme functions used in Zen core,
 *   you should first look at how Zen core implements those functions:
 *     theme_breadcrumbs()      in zen/template.php
 *     theme_menu_item_link()   in zen/template.php
 *     theme_menu_local_tasks() in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called template suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node-forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and template suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440
 *   and http://drupal.org/node/190815#template-suggestions
 */


/**
 * Implementation of HOOK_theme().
 */
 /*
function sunhealth_theme(&$existing, $type, $theme, $path) {
  $hooks = zen_theme($existing, $type, $theme, $path);
  // Add your theme hooks like this:
  /*
  $hooks['hook_name_here'] = array( // Details go here );
  */
  // @TODO: Needs detailed comments. Patches welcome!
  //return $hooks;
//}
//*/

/**
 * Override or insert variables into all templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered (name of the .tpl.php file.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_page(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');

  // To remove a class from $classes_array, use array_diff().
  //$vars['classes_array'] = array_diff($vars['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_node(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // STARTERKIT_preprocess_node_page() or STARTERKIT_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $vars['node']->type;
  if (function_exists($function)) {
    $function($vars, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_comment(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_block(&$vars, $hook) {
  $vars['sample_variable'] = t('Lorem ipsum.');
}
// */
/*function sunhealth_uc_product_body($body, $teaser = 0, $page = 0) {
  $output = '<div class="field product-body">';
	$label = '<div class="field-label">Product Details:</div>';
	$output .= $label;
  $output .= $body;
  $output .='</div>';
  return $output;
}*/

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return
 *   A string containing the breadcrumb output.
 */
function sunhealth_breadcrumb($breadcrumb) {
  // Determine if we are to display the breadcrumb.
  $show_breadcrumb = theme_get_setting('zen_breadcrumb');
  if ($show_breadcrumb == 'yes' || $show_breadcrumb == 'admin' && arg(0) == 'admin') {

    // Optionally get rid of the homepage link.
    $show_breadcrumb_home = theme_get_setting('zen_breadcrumb_home');
    if (!$show_breadcrumb_home) {
      array_shift($breadcrumb);
    }

    // Return the breadcrumb with separators.
    if (!empty($breadcrumb)) {
      $breadcrumb_separator = " / ";
      $trailing_separator = $title = '';
      if (theme_get_setting('zen_breadcrumb_title')) {
        if ($title = drupal_get_title()) {
          $trailing_separator = $breadcrumb_separator;
        }
      }
      elseif (theme_get_setting('zen_breadcrumb_trailing')) {
        $trailing_separator = ""; // remove final breadcrumb
      }
      return '<div class="breadcrumb">' . implode($breadcrumb_separator, $breadcrumb) . "$trailing_separator$title</div>";
    }
  }
  // Otherwise, return an empty string.
  return '';
}

// Customize price display
function sunhealth_uc_product_price($price, $context, $option = array() ) {
  return '$' . number_format($price, 2) . ' <span class="unit-size">per bottle</span>';

}

// Remove Ubercart link in footer
function sunhealth_uc_store_footer($message) {
  return '';
}

/* Output the shopping cart tab logic in the primary navigation */
function sunhealth_uc_cart_block_content() {

  $output .= '<div id="block-cart-contents">';

  $items = uc_cart_get_contents();

  $item_count = 0;
  if (!empty($items)) {
    foreach ($items as $item) {
      $item_count += $item->qty; // sum cart quantity
    }
  }

  $output .= '<span id="cart-title">'. l(t('Shopping Cart '), 'cart', array('rel' => 'nofollow')) . '</span>';
  $item_text = '( ' . $item_count . ' )';
  $output .= $item_text;
  $output .= '</div>';

  return $output;
}

function sunhealth_node_submitted($node) {
  return t('Posted on @datetime', 
    array(
    '@datetime' => format_date($node->created, 'custom', 'F j, Y'),
  ));
}

/**
 * Print Supplemental Facts table that would appear on Nutritional Label
 */
function supplemental_facts($nid) {
  $model = sprintf('%04d', $nid); // extend SKU # to 4 digits to correspond with nutritional label
  //dsm($model);
  
  $viewName = 'nutritional_labels';
  $display_id = 'default';
  $product_nid = $model;
  $view = views_get_view($viewName);
  $view->set_display($display_id);
  $view->args = array($product_nid);
  
  //dsm($view);
  
  $output = $view->preview();
  if($view->result){ // Check if there are supplemental facts available in the db
    print $output;
  }
  else {
    print "Supplemental Facts for this product are unavailable.";
  }
  //print views_embed_view($viewName, $display_id, $product_nid);

}

/** DEPRECATED. USING VIEWS INSTEAD
 * Query db and get all Supplemental Facts for a node
 */
function getSupplementalFacts($nid) {
  $type = 'nutritional_label';
  
  // Taken from Views generated query
  $q = 
    "SELECT 
    node.nid AS nid, 
    node.title AS node_title, 
    node.type AS node_type, 
    node.vid AS node_vid
    FROM node node  
    LEFT JOIN content_type_nutritional_label node_data_field_nutritional_label_product ON node.vid = node_data_field_nutritional_label_product.vid 
    LEFT JOIN node node_node_data_field_nutritional_label_product ON node_data_field_nutritional_label_product.field_nutritional_label_product_nid = node_node_data_field_nutritional_label_product.nid 
    WHERE node.type in ('nutritional_label') ORDER BY node_title ASC";
  $args = array($type);
  $results = db_query($q, $args);
  
  if (db_affected_rows($results) > 0) { // make sure there are products in the db
    while ($row = db_fetch_array($results) ) { 
      //dsm($row);
    
    }
  }
}

