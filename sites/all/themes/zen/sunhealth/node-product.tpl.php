<?php

/**
 * @file node.tpl.php
 *
 * Theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: Node body or teaser depending on $teaser flag.
 * - $picture: The authors picture of the node output from
 *   theme_user_picture().
 * - $date: Formatted creation date (use $created to reformat with
 *   format_date()).
 * - $links: Themed links like "Read more", "Add new comment", etc. output
 *   from theme_links().
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $submitted: themed submission information output from
 *   theme_node_submitted().
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $teaser: Flag for the teaser state.
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
*
* Ubercart
 * - $list_price: 
 * - $sell_price:
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 */
?>
<div id="node--<?php print $node->nid; ?>" class="product-page node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> clear-block">
<?php
//dsm($node);
?>

  <div class="content">
	<?php if ($content): ?>
		<div id="product-image" class="left">
		  <?php if($node->content['image']['#value']): ?>
  			<?php print $node->content['image']['#value']; ?>
		  <?php else: ?>
		  	<div class="product-image">
		  	  <div class="main-product-image">
		  	    <a href="/sites/default/files/imagefield_default_images/<?php print $node->field_image_cache[0]['filename']; ?>" title="Product Image Unavailable">
		  	    	<img src="/<?php print $node->field_image_cache[0]['filepath']; ?>" />	
				<?php //print theme('imagecache', 'product_lightbox', $node->field_image_cache[0]['filepath']); ?>
		  	    </a>
		  	  </div>
		  	<div class="more-product-images"></div></div>
		  	
		  	
		  <?php endif; ?>
		</div><!--product-image-->
		<div id="product-info-wrapper" class="right">
			<?php if ($title): ?>
				<h1 class="divide"><?php print $title ?></h1>
		    <?php endif; ?>
			<div id="price-form-wrapper" class="row divide">
				<div id="product-price"><?php print $node->content['sell_price']['#value']; ?></div>
				<?php print $node->content['add_to_cart']['#value']; ?>
			</div>
			<div id="product-info" class="row">
				<ul id="product-nav">
					<li><a href="#tab1">Product Details</a></li>
					<li><a href="#tab2">Supplement Facts</a></li>
				</ul>
				<div id="tab1"><?php print decode_entities($node->content['body']['#value']); ?></div>
				<div id="tab2"><?php supplemental_facts($node->model); ?></div>
			</div>
			<div id="product-social" class="row">
			  <?php //dsm($_SERVER); ?>
				<div id="fb">
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=110552475703971";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
          <div class="fb-like" data-href="http://<?php print $_SERVER['SERVER_NAME']; ?><?php print $node_url; ?>" data-send="true" data-width="210" data-show-faces="false"></div>
				</div>

				<!-- AddThis Button BEGIN -->
				<div id="share" class="addthis_toolbox addthis_default_style ">
					<a href="http://www.addthis.com/bookmark.php?v=250&amp;pubid=xa-4e0b971c299e248a" class="addthis_button_compact">Share</a>
				</div>
				<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4e0b971c299e248a"> 															
				</script>
				<!-- AddThis Button END -->

			</div><!--/#product-social-->
			
			
		</div><!--product-info-wrapper-->
				
    <?php endif; ?>
  </div>

  <?php print $links; ?>
<pre>
<?php //print_r($node); ?>
</pre>
</div>
