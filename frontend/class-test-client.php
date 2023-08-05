<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('TestClient')) {
    class TestClient
    {


        public function __construct()
        {
            if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

                $custom_checkbox_value = get_option('test_p_checkbox');

                if($custom_checkbox_value == "yes"){
                    add_action( 'wp_enqueue_scripts', array( $this, 'test_client_enqueue' ) );
                    add_action( 'woocommerce_before_single_variation', array( $this, 'custom_variation_view' ) );
                }



            }


        }

        function test_client_enqueue()
        {
            if (is_product()) {
                wp_enqueue_style('test-client-main', TEST_CSS_DIR.'client_main.css', array(), TEST_VERSION);
                wp_enqueue_script( 'test-client-main', TEST_JS_DIR.'client_main.js', array('jquery'), TEST_VERSION );
                wp_localize_script( 'test-client-main', 'test_client_object', array(
                    'ajaxurl' => admin_url( 'admin-ajax.php' )
                ));
            }
        }
        function custom_variation_view()
        {
            global $product;

            if ($product && $product->is_type('variable')) {
                echo '<div class="custom-variation-select">';

                $color_variations = array();
                $size_variations = array();
                $variations = $product->get_available_variations();


                foreach ($variations as $variation) {
                    $attributes = $variation['attributes'];
                    if (isset($attributes['attribute_pa_color'])) {
                        $color_variations[] = $variation;
                    }
                    if (isset($attributes['attribute_pa_size'])) {
                        $size_variations[] = $variation;
                    }
                }

                $color_variations_filtered = array();
                if(sizeof($color_variations) > 0){
                    foreach ($color_variations as $variation) {
                        $slug = $variation['attributes']['attribute_pa_color'];
                        if (!in_array($slug, $color_variations_filtered)) {
                            $color_variations_filtered[] = $slug;
                        }
                    }
                    echo '<label>Color:</label>';
                    echo '<div class="test_color_variation">';
                    foreach ($color_variations_filtered as $variation) {
                         echo '<div style="background-color: '.esc_attr($variation).';" class="item" onclick="test_update_variation(this, `'.esc_attr($variation).'`, `color`)"></div>';
                    }
                    echo '</div>';
                }

                $size_variations_filtered = array();
                if(sizeof($size_variations) > 0){
                    foreach ($size_variations as $variation) {
                        $slug = $variation['attributes']['attribute_pa_size'];
                        if (!in_array($slug, $size_variations_filtered)) {
                            $size_variations_filtered[] = $slug;
                        }
                    }
                    echo '<label>Size:</label>';
                    echo '<div class="test_size_variation">';
                    foreach ($size_variations_filtered as $variation) {
                        echo '<div class="item" onclick="test_update_variation(this, `'.esc_attr($variation).'`, `size`)">'.esc_attr($variation).'</div>';
                    }
                    echo '</div>';
                }


                echo '</div>';
            }
        }


    }
}



new TestClient();