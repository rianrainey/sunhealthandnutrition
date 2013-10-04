<?php
// $Id: views-view-table.tpl.php,v 1.8 2009/01/28 00:43:43 merlinofchaos Exp $
/**
 * @file views-view-table.tpl.php
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $class: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * @ingroup views_templates
 */
?>
<h2>Supplement Facts</h2>

<?php
  // Output Serving Size
  $ssize = "Serving Size:"; $scontainer = "Servings Per Container:";
  $ssize_label = $ssize_value = "";
  $scontainer_label = $scontainer_value = "";
  
?>
<?php $i = 0; ?>
<?php foreach ($rows as $count => $row): ?>
  <?php //dsm($row); ?>
  <?php $i++; ?>
    <?php 

      foreach ($row as $field => $content) {
        
        // Set the Serving labels and values
        if($field == "field_nutritional_table_item_value") {
          if($content == $ssize) {
            $ssize_label = $content;
          }
          elseif($content == $scontainer) {
            $scontainer_label = $content;
          }
        }
        elseif($field == "field_nut_lbl_amt_per_serving_value") {          
          if(!empty($ssize_label) && (empty($ssize_value)) ) {
            $ssize_value = $content;
          }
          elseif(!empty($scontainer_label) && (empty($scontainer_value)) ) {
            $scontainer_value = $content;
          }
        }
        
      } // endforeach
    ?>

<?php endforeach; ?>
<?php //dsm($i); ?>

<div id="supp_facts_top">
  <p>
    <span class="item"><?php print "{$ssize_label} {$ssize_value}"; ?><br></span>
    <span class="item"><?php print "{$scontainer_label} {$scontainer_value}";?></span>
  </p>
</div><!-- #supp_facts_top -->

<table class="<?php print $class; ?>">
  <?php if (!empty($title)) : ?>
    <caption><?php print $title; ?></caption>
  <?php endif; ?>
  <thead>
    <tr>
      <?php foreach ($header as $field => $label): ?>
        <th class="views-field views-field-<?php print $fields[$field]; ?>">
          <?php print $label; ?>
        </th>
      <?php endforeach; ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($rows as $count => $row): ?>
      <?php if(!( ($row['field_nutritional_table_item_value'] == $ssize) ||
                  ($row['field_nutritional_table_item_value'] == $scontainer) ) ): ?>
        <tr class="<?php print implode(' ', $row_classes[$count]); ?>">
          <?php foreach ($row as $field => $content): ?>
            <?php if( ($content != $ssize) || ($content != scontainer) ) : ?>
              <td class="views-field views-field-<?php print $fields[$field]; ?>">
                <?php print $content; ?>
              </td>
            <?php endif; ?>
          <?php endforeach; ?>
        </tr>
      <?php endif; ?>
    <?php endforeach; ?>
  </tbody>
</table>
<div id="legend">
    * Percent Daily Values are based on 2,000 calorie diet<br/>
    &#10013; Daily Value not established
</div><!-- #legend -->


<?php
