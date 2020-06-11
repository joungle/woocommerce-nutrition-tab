<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// Add a custom tab to the products data metabox
add_filter( 'woocommerce_product_data_tabs', 'add_nutrition_custom_product_data_tab' , 99 , 1 );

function add_nutrition_custom_product_data_tab( $product_data_tabs ) {
  $product_data_tabs['nutrition-custom-tab'] = array(
    'label' => 'N&auml;hrwerte',
    'target' => 'nutrition_custom_product_data',
  );
  return $product_data_tabs;
}

// Add custom fields to the added custom tab under products data metabox
add_action( 'woocommerce_product_data_panels', 'add_nutrition_custom_product_data_fields' );

function add_nutrition_custom_product_data_fields() {
  global $woocommerce, $post;
  ?>
    <!-- id below must match target registered in above add_nutrition_custom_product_data_tab function -->
    <div id="nutrition_custom_product_data" class="panel woocommerce_options_panel">
      <?php
        woocommerce_wp_checkbox( array(
        	'id'          => '_wc_nutrition_display',
        	'label'       => 'Anzeigen',
        	'description' => 'In Produktdetails anzeigen?',
        	'desc_tip'    => true,
        ) );
        woocommerce_wp_text_input( array(
            'id'          => '_wc_nutrition_brennwert',
            'class'       => '',
            'label'       => 'Brennwert/Energiegehalt',
            'description' => '(KJ/kcal)',
            'desc_tip'    => false,
            'placeholder' => '',
        ) );
        woocommerce_wp_text_input( array(
            'id'          => '_wc_nutrition_fett',
            'class'       => '',
            'label'       => 'Fett',
            'description' => '(g)',
            'desc_tip'    => false,
            'placeholder' => '',
        ) );
        woocommerce_wp_text_input( array(
        	'id'          => '_wc_nutrition_ges_fett',
        	'class'       => '',
        	'label'       => 'ges&auml;ttigte Fetts&auml;uren',
        	'description' => '(g)',
        	'desc_tip'    => false,
        	'placeholder' => '',
        ) );
        woocommerce_wp_text_input( array(
        	'id'          => '_wc_nutrition_kohlenhydrate',
        	'class'       => '',
        	'label'       => 'Kohlenhydrate',
        	'description' => '(g)',
        	'desc_tip'    => false,
        	'placeholder' => '',
        ) );
        woocommerce_wp_text_input( array(
        	'id'          => '_wc_nutrition_zucker',
        	'class'       => '',
        	'label'       => 'Zucker',
        	'description' => '(g)',
        	'desc_tip'    => false,
        	'placeholder' => '',
        ) );
        woocommerce_wp_text_input( array(
        	'id'          => '_wc_nutrition_eiweiss',
        	'class'       => '',
        	'label'       => 'Eiwei&szlig;',
        	'description' => '(g)',
        	'desc_tip'    => false,
        	'placeholder' => '',
        ) );
        woocommerce_wp_text_input( array(
        	'id'          => '_wc_nutrition_salz',
        	'class'       => '',
        	'label'       => 'Salz',
        	'description' => '(g)',
        	'desc_tip'    => false,
        	'placeholder' => '',
        ) );
        woocommerce_wp_text_input( array(
        	'id'          => '_wc_nutrition_ballaststoffe',
        	'class'       => '',
        	'label'       => 'Ballaststoffe',
        	'description' => '(g)',
        	'desc_tip'    => false,
        	'placeholder' => '',
        ) );

      ?>
    </div>
  <?php
}

// Save custom fields data of products tab
add_action( 'woocommerce_process_product_meta', 'woocommerce_process_product_meta_fields_save_nutrition' );

function woocommerce_process_product_meta_fields_save_nutrition( $post_id ){
	update_post_meta( $post_id, '_wc_nutrition_display', stripslashes( $_POST['_wc_nutrition_display'] ) );
  update_post_meta( $post_id, '_wc_nutrition_brennwert', stripslashes( $_POST['_wc_nutrition_brennwert'] ) );
  update_post_meta( $post_id, '_wc_nutrition_fett', stripslashes( $_POST['_wc_nutrition_fett'] ) );
  update_post_meta( $post_id, '_wc_nutrition_ges_fett', stripslashes( $_POST['_wc_nutrition_ges_fett'] ) );
  update_post_meta( $post_id, '_wc_nutrition_kohlenhydrate', stripslashes( $_POST['_wc_nutrition_kohlenhydrate'] ) );
  update_post_meta( $post_id, '_wc_nutrition_zucker', stripslashes( $_POST['_wc_nutrition_zucker'] ) );
  update_post_meta( $post_id, '_wc_nutrition_eiweiss', stripslashes( $_POST['_wc_nutrition_eiweiss'] ) );
  update_post_meta( $post_id, '_wc_nutrition_salz', stripslashes( $_POST['_wc_nutrition_salz'] ) );
  update_post_meta( $post_id, '_wc_nutrition_ballaststoffe', stripslashes( $_POST['_wc_nutrition_ballaststoffe'] ) );
}

?>