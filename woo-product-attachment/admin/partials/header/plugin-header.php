<?php

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$plugin_url = WCPOA_PLUGIN_URL;
$plugin_name = WCPOA_PLUGIN_NAME;
$plugin_slug = '';
global $wpap_fs;
$version_label = 'Free';
$is_pro_plugin = 'free_plugin';
$plugin_slug = 'basic_product_attachment';
$about_plugin_setting_menu_enable = '';
$about_plugin_get_started = '';
$about_plugin_quick_info = '';
$dotstore_setting_menu_enable = '';
$wcpoa_plugin_setting_page = '';
$woocommerce_product_bulk_attachment = '';
$tab_menu = filter_input( INPUT_GET, 'tab', FILTER_SANITIZE_SPECIAL_CHARS );
$page_menu = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS );
if ( isset( $tab_menu ) && $tab_menu === 'wcpoa_plugin_setting_page' ) {
    $wcpoa_plugin_setting_page = "active";
}
if ( empty( $tab_menu ) && $page_menu === 'woocommerce_product_attachment' ) {
    $wcpoa_plugin_setting_page = "active";
}
if ( !empty( $tab_menu ) && $tab_menu === 'wcpoa-plugin-getting-started' ) {
    $about_plugin_setting_menu_enable = "active";
    $about_plugin_get_started = "active";
}
if ( !empty( $page_menu ) && $page_menu === 'wcpoa_bulk_attachment' ) {
    $woocommerce_product_bulk_attachment = "active";
}
$wpap_free_dashboard = ( isset( $tab_menu ) && 'wcpoa-upgrade-dashboard' === $tab_menu ? 'active' : '' );
$wpap_account_page = ( isset( $page_menu ) && 'woocommerce_product_attachment-account' === $page_menu ? 'active' : '' );
$wpap_settings_menu = ( (isset( $tab_menu ) || isset( $page_menu )) && ('wcpoa-plugin-getting-started' === $tab_menu || !(wpap_fs()->is__premium_only() && wpap_fs()->can_use_premium_code()) && 'woocommerce_product_attachment-account' === $page_menu) ? 'active' : '' );
$scfw_display_submenu = ( !empty( $wpap_settings_menu ) && 'active' === $wpap_settings_menu ? 'display:inline-block' : 'display:none' );
$admin_object = new Woocommerce_Product_Attachment_Admin('', '');
?>
<div id="dotsstoremain">
    <div class="all-pad">
        <?php 
$admin_object->wcpoa_get_promotional_bar( $plugin_slug );
?>
        <header class="dots-header">
            <div class="dots-plugin-details">
                <div class="dots-header-left">
                    <div class="dots-logo-main">
                        <img src="<?php 
echo esc_url( $plugin_url ) . 'admin/images/woo-product-attachment.png';
?>" alt="<?php 
esc_attr_e( $plugin_name, 'woocommerce-product-attachment' );
?>">
                    </div>
                    <div class="plugin-name">
                        <div class="title"><?php 
esc_html_e( 'Product Attachment', 'woocommerce-product-attachment' );
?></div>
                    </div>
                    <span class="version-label <?php 
echo esc_attr( $is_pro_plugin );
?>"><?php 
esc_html_e( $version_label, 'woocommerce-product-attachment' );
?></span>
                    <span class="version-number"><?php 
esc_html_e( 'v' . WCPOA_PLUGIN_VERSION, 'woocommerce-product-attachment' );
?></span>
                </div>
                <div class="dots-header-right">
                    <div class="button-dots">
                        <a target="_blank" href="<?php 
echo esc_url( 'http://www.thedotstore.com/support/?utm_source=plugin_header_menu_link&utm_medium=header_menu&utm_campaign=plugin&utm_id=menu_link_product_attachment' );
?>"><?php 
esc_html_e( 'Support', 'woocommerce-product-attachment' );
?></a>
                    </div>
                    <div class="button-dots">
                        <a target="_blank" href="<?php 
echo esc_url( 'https://www.thedotstore.com/feature-requests/?utm_source=plugin_header_menu_link&utm_medium=header_menu&utm_campaign=plugin&utm_id=menu_link_product_attachment' );
?>"><?php 
esc_html_e( 'Suggest', 'woocommerce-product-attachment' );
?></a>
                    </div>
                    <div class="button-dots <?php 
echo ( wpap_fs()->is__premium_only() && wpap_fs()->can_use_premium_code() ? '' : 'last-link-button' );
?>">
                        <a target="_blank" href="<?php 
echo esc_url( 'https://docs.thedotstore.com/category/353-premium-plugin-settings' );
?>"><?php 
esc_html_e( 'Help', 'woocommerce-product-attachment' );
?></a>
                    </div>
                    <div class="button-dots">
                        <?php 
?>
                            <a class="dots-upgrade-btn" target="_blank" href="javascript:void(0);"><?php 
esc_html_e( 'Upgrade Now', 'woocommerce-product-attachment' );
?></a>
                            <?php 
?>
                    </div>
                </div>
            </div>
            <div class="dots-bottom-menu-main">
                <div class="dots-menu-main">
                    <nav>
                        <ul>
                            <li><a class="dotstore_plugin <?php 
echo esc_attr( $wcpoa_plugin_setting_page );
?>" href="<?php 
echo esc_url( site_url( 'wp-admin/admin.php?page=woocommerce_product_attachment&tab=wcpoa_plugin_setting_page' ) );
?>"><?php 
esc_html_e( 'Global Settings', 'woocommerce-product-attachment' );
?></a></li>
                            <li><a class="dotstore_plugin <?php 
echo esc_attr( $woocommerce_product_bulk_attachment );
?>" href="<?php 
echo esc_url( site_url( 'wp-admin/admin.php?page=wcpoa_bulk_attachment' ) );
?>"><?php 
esc_html_e( 'Bulk Attachment', 'woocommerce-product-attachment' );
?></a></li>
                            <?php 
if ( wpap_fs()->is__premium_only() && wpap_fs()->can_use_premium_code() ) {
    ?>
                                <li>
                                    <a class="dotstore_plugin <?php 
    echo esc_attr( $wpap_account_page );
    ?>" href="<?php 
    echo esc_url( $wpap_fs->get_account_url() );
    ?>"><?php 
    esc_html_e( 'License', 'woocommerce-product-attachment' );
    ?></a>
                                </li>
                                <?php 
}
?>
                            <?php 
if ( !(wpap_fs()->is__premium_only() && wpap_fs()->can_use_premium_code()) ) {
    ?>
                                <li>
                                    <a class="dotstore_plugin dots_get_premium <?php 
    echo esc_attr( $wpap_free_dashboard );
    ?>" href="<?php 
    echo esc_url( add_query_arg( array(
        'page' => 'woocommerce_product_attachment&tab=wcpoa-upgrade-dashboard',
    ), admin_url( 'admin.php' ) ) );
    ?>"><?php 
    esc_html_e( 'Get Premium', 'woocommerce-product-attachment' );
    ?></a>
                                </li>
                                <?php 
}
?>
                        </ul>
                    </nav>
                </div>
                <div class="dots-getting-started">
                    <a href="<?php 
echo esc_url( add_query_arg( array(
    'page' => 'woocommerce_product_attachment&tab=wcpoa-plugin-getting-started',
), admin_url( 'admin.php' ) ) );
?>" class="<?php 
echo esc_attr( $about_plugin_get_started );
?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true" focusable="false"><path d="M12 4.75a7.25 7.25 0 100 14.5 7.25 7.25 0 000-14.5zM3.25 12a8.75 8.75 0 1117.5 0 8.75 8.75 0 01-17.5 0zM12 8.75a1.5 1.5 0 01.167 2.99c-.465.052-.917.44-.917 1.01V14h1.5v-.845A3 3 0 109 10.25h1.5a1.5 1.5 0 011.5-1.5zM11.25 15v1.5h1.5V15h-1.5z" fill="#a0a0a0"></path></svg></a>
                </div>
            </div>
        </header>
        <!-- Upgrade to pro popup -->
        <?php 
if ( !(wpap_fs()->is__premium_only() && wpap_fs()->can_use_premium_code()) ) {
    require_once WCPOA_PLUGIN_PATH . 'admin/partials/dots-upgrade-popup.php';
}
?>
        <div class="dots-settings-inner-main">
            <div class="wcpoa-section-left">
                <hr class="wp-header-end" />