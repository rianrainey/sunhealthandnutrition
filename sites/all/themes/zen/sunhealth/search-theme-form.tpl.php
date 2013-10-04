<?php

/**
 * @file search-block-form.tpl.php
 * Default theme implementation for displaying a search form within a block region.
 *
 * Available variables:
 * - $search_form: The complete search form ready for print.
 * - $search: Array of keyed search elements. Can be used to print each form
 *   element separately.
 *
 * Default keys within $search:
 * - $search['search_block_form']: Text input area wrapped in a div.
 * - $search['submit']: Form submit button.
 * - $search['hidden']: Hidden form elements. Used to validate forms when submitted.
 *
 * Since $search is keyed, a direct print of the form element is possible.
 * Modules can add to the search form so it is recommended to check for their
 * existance before printing. The default keys will always exist.
 *
 *   <?php if (isset($search['extra_field'])): ?>
 *     <div class="extra-field">
 *       <?php print $search['extra_field']; ?>
 *     </div>
 *   <?php endif; ?>
 *
 * To check for all available data within $search, use the code below.
 *
 *   <?php print '<pre>'. check_plain(print_r($search, 1)) .'</pre>'; ?>
 *
 * @see template_preprocess_search_block_form()
 */
?>
<!--/there can't be a space between the input field and the button or IE adds unwanted margins -->
<div class="container-inline">
<input type="text" maxlength="128" name="search_theme_form" id="edit-search-theme-form-1" size="25" value="" placeholder="Search" title="Enter the terms you wish to search for." class="form-text" /><input type="image" src="<?php print base_path() . path_to_theme() ?>/css/images/blank-search.png" name="op" id="edit-submit-button" value="Search" title="Search" class="form-submit" />
   <input type="hidden" name="form_build_id" id="<?php print drupal_get_token('form_build_id'); ?>" value="<?php print drupal_get_token('form_build_id'); ?>"  />
<input type="hidden" name="form_token" id="edit-search-theme-form-form-token" value="<?php print drupal_get_token('search_theme_form'); ?>"  />
<input type="hidden" name="form_id" id="edit-search-theme-form" value="search_theme_form"  />
</div>