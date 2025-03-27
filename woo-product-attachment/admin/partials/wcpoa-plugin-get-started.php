<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
?>
<div class="wcpoa-table-main res-cl wcpoa-details-table">
    <div class="dots-getting-started-main">
        <div class="getting-started-content">
            <span><?php esc_html_e( 'How to Get Started', 'woocommerce-product-attachment' ); ?></span>
            <h3><?php esc_html_e( 'Welcome to Product Attachment Plugin', 'woocommerce-product-attachment' ); ?></h3>
            <p><?php esc_html_e( 'Thank you for choosing our top-rated WooCommerce Product Attachment plugin. Our user-friendly interface makes it easy to create product Attachments.', 'woocommerce-product-attachment' ); ?></p>
            <p>
                <?php 
                echo sprintf(
                    esc_html__('To help you get started, watch the quick tour video on the right. For more help, explore our help documents or visit our %s for detailed video tutorials.', 'woocommerce-product-attachment'),
                    '<a href="' . esc_url('https://www.youtube.com/@DotStore16?sub_confirmation=1') . '" target="_blank">' . esc_html__('YouTube channel', 'woocommerce-product-attachment') . '</a>',
                );
                ?>
            </p>
            <div class="getting-started-actions">
                <a href="<?php echo esc_url(admin_url('admin.php?page=wcpoa_bulk_attachment')); ?>" class="quick-start"><?php esc_html_e( 'Manage Attachments', 'woocommerce-product-attachment' ); ?><span class="dashicons dashicons-arrow-right-alt"></span></a>
                <a href="https://docs.thedotstore.com/category/352-introduction-getting-started" target="_blank" class="setup-guide"><span class="dashicons dashicons-book-alt"></span><?php esc_html_e( 'Read the Setup Guide', 'woocommerce-product-attachment' ); ?></a>
            </div>
        </div>
        <div class="getting-started-video">
            <iframe width="960" height="600" src="<?php echo esc_url('https://www.youtube.com/embed/A8eGbS4PrPQ?rel=0'); ?>" title="<?php esc_attr_e( 'Plugin Tour', 'woocommerce-product-attachment' ); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>
</div>