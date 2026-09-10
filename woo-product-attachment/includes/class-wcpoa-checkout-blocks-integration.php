<?php
/**
 * WooCommerce Checkout Block integration for checkout attachments.
 *
 * @package Woocommerce_Product_Attachment
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Automattic\WooCommerce\Blocks\Integrations\IntegrationInterface;

/**
 * Registers frontend scripts/data for the Checkout Block.
 */
class WCPOA_Checkout_Blocks_Integration implements IntegrationInterface {

	/**
	 * Integration name / Store API namespace.
	 *
	 * @var string
	 */
	const INTEGRATION_NAME = 'woocommerce-product-attachment';

	/**
	 * Shared public script handle.
	 *
	 * @var string
	 */
	private $public_script_handle;

	/**
	 * Checkout-block-specific script handle.
	 *
	 * @var string
	 */
	private $block_script_handle = 'woocommerce-product-attachment-checkout-block';

	/**
	 * Constructor.
	 *
	 * @param string $public_script_handle Registered public script handle.
	 */
	public function __construct( $public_script_handle = 'woocommerce-product-attachment-public' ) {
		$this->public_script_handle = $public_script_handle;
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_name() {
		return self::INTEGRATION_NAME;
	}

	/**
	 * {@inheritdoc}
	 */
	public function initialize() {
		$script_path = plugin_dir_url( dirname( __FILE__ ) ) . 'public/js/woocommerce-checkout-block-attachment__premium_only.js';
		$version     = defined( 'WCPOA_PLUGIN_VERSION' ) ? WCPOA_PLUGIN_VERSION : '1.0.0';

		wp_register_script(
			$this->block_script_handle,
			$script_path,
			array(
				$this->public_script_handle,
				'wp-plugins',
				'wp-element',
				'wp-data',
				'wc-blocks-checkout',
			),
			$version,
			true
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_script_handles() {
		return array( $this->block_script_handle );
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_editor_script_handles() {
		return array();
	}

	/**
	 * {@inheritdoc}
	 */
	public function get_script_data() {
		$max_upload_size = wp_max_upload_size();
		$button_label    = apply_filters( 'wcpoa_checkout_attachment_button', __( 'Add Attachment', 'woocommerce-product-attachment' ) );

		return array(
			'isEnabled'            => true,
			'buttonLabel'          => $button_label,
			'clearLabel'           => __( 'Clear', 'woocommerce-product-attachment' ),
			'supportedFormatsText' => __( 'Supported formats:', 'woocommerce-product-attachment' ),
			'supportedFormats'     => __( 'PDF, DOC, DOCX, JPG, JPEG, PNG, GIF, ZIP, TXT, XLS, XLSX, PPT, MOV', 'woocommerce-product-attachment' ),
			'maxFileSizeText'      => sprintf(
				/* translators: %s: maximum upload file size */
				__( 'Maximum file size: %s', 'woocommerce-product-attachment' ),
				size_format( $max_upload_size )
			),
			'invalidFileText'      => __( 'Invalid Import File.', 'woocommerce-product-attachment' ),
			'loadingText'          => __( 'Loading...', 'woocommerce-product-attachment' ),
		);
	}
}
