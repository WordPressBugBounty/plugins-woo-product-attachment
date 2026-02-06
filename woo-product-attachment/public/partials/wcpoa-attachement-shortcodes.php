<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

add_shortcode('display_attachments', 'attachment_shortcode_calling_fun');
function attachment_shortcode_calling_fun($atts) {
    return wcpoa_product_attachment_content($atts);
}

/**
 * Get attachment content for shortcode
 *
 * @since 1.0.0
 * 
 * @param $atts
 */
function wcpoa_product_attachment_content( $atts ){
	//get attachments
    $public_plugin = new Woocommerce_Product_Attachment_Public('','');
	ob_start();
        /* bhavesh code */
        $parray = array();
        $wcpoa_youtube_default_showcase_flag = get_option('wcpoa_youtube_default_showcase_flag');
        if( isset( $atts ) && !empty( $atts ) ){
            $atts['youtube_video_only'] = 'no';
            $parray = $atts;
        }else{
            $parray['youtube_video_only'] = 'no';
        }

        if( isset( $atts['product_id'] ) && ! empty( $atts['product_id'] ) ){
            $product_id = intval( $atts['product_id'] );
        } else {
            $product_id = get_the_ID();
            // If get_the_ID() returns nothing, try to get from global $post
            if ( ! $product_id && isset( $GLOBALS['post'] ) && is_object( $GLOBALS['post'] ) ) {
                $product_id = $GLOBALS['post']->ID;
            }
        }
        
        /* bhavesh code */
        if( isset($product_id) && !empty($product_id) && $product_id > 0 ){
            // Check if product exists
            $product = wc_get_product( $product_id );
            if ( ! $product ) {
                echo '<p>' . esc_html__( 'Product not found.', 'woocommerce-product-attachment' ) . '</p>';
            } else {
                echo '<div class="custom_attachment_block wcpoa_cs_shortcode">';
                    if( 'no' === $parray['youtube_video_only'] ){
                        $wcpoa_product_attach = $public_plugin->wcpoa_product_tab_content($product_id, $parray);
                        if ( isset( $wcpoa_product_attach ) && !empty( $wcpoa_product_attach ) ) {
                            echo wp_kses( $wcpoa_product_attach, $public_plugin->allowed_html_tags() );
                            $parray['youtube_video_only'] = 'yes';
                        }
                    }
                    // Only show YouTube videos if premium feature is enabled
                    if( 'yes' === $parray['youtube_video_only'] && 'yes' === $wcpoa_youtube_default_showcase_flag ){
                        $wcpoa_product_attach = $public_plugin->wcpoa_product_tab_content($product_id, $parray);

                        if ( isset( $wcpoa_product_attach ) && !empty( $wcpoa_product_attach ) ) {
                            echo wp_kses( $wcpoa_product_attach, $public_plugin->allowed_html_tags() );
                        }
                    }
                echo '</div>';
            }
        } else {
            echo '<p>' . esc_html__( 'Invalid product ID.', 'woocommerce-product-attachment' ) . '</p>';
        }
	return ob_get_clean();
}