<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Add a custom tab to single product pages
add_filter( 'woocommerce_product_tabs', 'nutrition_content_tab' );

function nutrition_content_tab( $tabs ) {
  if (get_post_meta(get_the_ID(), '_wc_nutrition_display', true) == True) {
	  $tabs['nutrition'] = array(
	  	'title' 	=> 'N&auml;hrwerte',
		  'priority' 	=> 95,
		  'callback' 	=> 'nutrition_content_tab_display'
  	);
	}
return $tabs;
}

function nutrition_content_tab_display() {
	echo '<h2>' . 'N&auml;hrwerte' . '</h2>';
  ?>
  <table>
    <thead>
      <tr>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Brennwert/Energiegehalt</td>
        <td><?php echo get_post_meta(get_the_ID(), '_wc_nutrition_brennwert', true); ?></td>
      </tr>
      <tr>
        <td>Fett</td>
        <td><?php echo get_post_meta(get_the_ID(), '_wc_nutrition_fett', true); ?></td>
      </tr>
      <tr>
        <td>davon ges&auml;ttigte Fetts&auml;uren</td>
        <td><?php echo get_post_meta(get_the_ID(), '_wc_nutrition_ges_fett', true); ?></td>
      </tr>
      <tr>
        <td>Kohlenhydrate</td>
        <td><?php echo get_post_meta(get_the_ID(), '_wc_nutrition_kohlenhydrate', true); ?></td>
      </tr>
      <tr>
        <td>Zucker</td>
        <td><?php echo get_post_meta(get_the_ID(), '_wc_nutrition_zucker', true); ?></td>
      </tr>
      <tr>
        <td>Eiwei&szlig;</td>
        <td><?php echo get_post_meta(get_the_ID(), '_wc_nutrition_eiweiss', true); ?></td>
      </tr>
      <tr>
        <td>Salz</td>
        <td><?php echo get_post_meta(get_the_ID(), '_wc_nutrition_salz', true); ?></td>
      </tr>
      <?php if (get_post_meta(get_the_ID(), '_wc_nutrition_ballaststoffe', true)) { ?>
      <tr>
        <td>Ballaststoffe</td>
        <td><?php echo get_post_meta(get_the_ID(), '_wc_nutrition_ballaststoffe', true); ?></td>
      </tr>
      <?php }; ?>
    </tbody>
  </table>
  <?php
}

?>