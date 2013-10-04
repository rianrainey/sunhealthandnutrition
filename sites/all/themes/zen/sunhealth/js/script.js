/* This project has 2 versions of jQuery running. 
 * v1.2.6 ships with Drupal 6 and I need v1.4.3 to run jQuery UI elements
 */

var jQuery14 = jQuery; // copies current definition of jQuery to a non-conflicting name.
jQuery.noConflict(true); // tells jQuery to restore the global definitions of jQuery() and $() to whatever they were before jQuery 1.4 loaded.

jQuery14(document).ready(function() {
	jQuery14("#featured .region .block:nth-child(2)").addClass("second-block");
	
	// Create tabs for product page
	jQuery14("#product-info.row").tabs();

	// Rewrite 'Quantity:' to 'Qty' only on pages where there is the 'add to cart' form
	if ( jQuery14(".add-to-cart").length > 0 ) {
		jQuery14(".add-to-cart").each(function() { jQuery14(this).html(jQuery14(this).html().replace(/Quantity:/g, "Qty")); });
	}
	
	// Remove bottom border of last side nav block
	jQuery14("#sidebar-first .sidebar-block:last").css("border-bottom", "0px");
	 
	// Slide Newsletter Sign Up down/up on click
	jQuery14("#newsletter-btn").click(toggleNewsletterSignUp);
	jQuery14("#newsletter .close").click(toggleNewsletterSignUp);
	
	/* Add jquery corner to these elements */
	/*jQuery14("#newsletter").corner();*/
	jQuery14("#product-image").corner();
	jQuery14("#hero").corner();
	/*jQuery14("#featured .featured").corner();*/
	/*jQuery14("#new_products").corner();*/
	/*jQuery14("#new_products .views-row").corner();*/
	
	/* Remove margin-right from far-most right featured block */
	jQuery14("#featured .featured:last").css('margin-right', '0');
	jQuery14("#new_products .view-content .views-row:last").css('margin-right', '0');
	
	/* Add colorbox effect to all images */
	jQuery14("a[href*='.jpg'], a[href*='.jpeg'], a[href*='.png'], a[href*='.gif']").click(function(){
		jQuery14(this).colorbox();
	});
	
	/* Add class to featured read more links */
	jQuery14("#featured .featured span.field-content a").addClass("more-link");
	
	// Open all external links in new window
  jQuery14('a').each(function() { 
  	var re = new RegExp(document.domain); 
  	//console.log(document.domain);
  	var href = jQuery14(this).attr('href'); 
  	if (/^http/.test(href) && !re.test(href)) {
  		jQuery14(this).attr('target','_blank');
  	}
  });
});

function toggleNewsletterSignUp() {
	// Show Newsletter Sign Up
	jQuery14("#newsletter").toggleClass("open", 1000);
}
