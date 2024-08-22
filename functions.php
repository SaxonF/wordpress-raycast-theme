<?php
/**
 * Twenty Twenty-Four functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twenty Twenty-Four
 * @since Twenty Twenty-Four 1.0
 */

/**
 * Register block styles.
 */

if ( ! function_exists( 'twentytwentyfour_block_styles' ) ) :
	/**
	 * Register custom block styles
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_styles() {

		register_block_style(
			'core/details',
			array(
				'name'         => 'arrow-icon-details',
				'label'        => __( 'Arrow icon', 'twentytwentyfour' ),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'         => 'pill',
				'label'        => __( 'Pill', 'twentytwentyfour' ),
				/*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
				'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
			)
		);
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfour' ),
				/*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
		register_block_style(
			'core/navigation-link',
			array(
				'name'         => 'arrow-link',
				'label'        => __( 'With arrow', 'twentytwentyfour' ),
				/*
				 * Styles for the custom arrow nav link block style
				 */
				'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'         => 'asterisk',
				'label'        => __( 'With asterisk', 'twentytwentyfour' ),
				'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_styles' );

/**
 * Enqueue block stylesheets.
 */

if ( ! function_exists( 'twentytwentyfour_block_stylesheets' ) ) :
	/**
	 * Enqueue custom block stylesheets
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_stylesheets() {
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
		 */
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'twentytwentyfour-button-style-outline',
				'src'    => get_parent_theme_file_uri( 'assets/css/button-outline.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/button-outline.css' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_stylesheets' );

/**
 * Register pattern categories.
 */

if ( ! function_exists( 'twentytwentyfour_pattern_categories' ) ) :
	/**
	 * Register pattern categories
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfour_page',
			array(
				'label'       => _x( 'Pages', 'Block pattern category', 'twentytwentyfour' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfour' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_pattern_categories' );

/**
 * Register custom post type: Links
 */

if ( ! function_exists( 'register_links_post_type' ) ) :
	/**
	 * Register custom post type: Links
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function register_links_post_type() {
		$labels = array(
			'name'                  => __( 'Links', 'twentytwentyfour' ),
			'singular_name'         => __( 'Link', 'twentytwentyfour' ),
			'menu_name'             => __( 'Links', 'twentytwentyfour' ),
			'add_new'               => __( 'Add New', 'twentytwentyfour' ),
			'add_new_item'          => __( 'Add New Link', 'twentytwentyfour' ),
			'edit_item'             => __( 'Edit Link', 'twentytwentyfour' ),
			'new_item'              => __( 'New Link', 'twentytwentyfour' ),
			'view_item'             => __( 'View Link', 'twentytwentyfour' ),
			'view_items'            => __( 'View Links', 'twentytwentyfour' ),
			'search_items'          => __( 'Search Links', 'twentytwentyfour' ),
			'not_found'             => __( 'No links found', 'twentytwentyfour' ),
			'not_found_in_trash'    => __( 'No links found in trash', 'twentytwentyfour' ),
			'parent_item_colon'     => __( 'Parent Link:', 'twentytwentyfour' ),
			'all_items'             => __( 'All Links', 'twentytwentyfour' ),
			'archives'              => __( 'Link Archives', 'twentytwentyfour' ),
			'attributes'            => __( 'Link Attributes', 'twentytwentyfour' ),
			'insert_into_item'      => __( 'Insert into link', 'twentytwentyfour' ),
			'uploaded_to_this_item' => __( 'Uploaded to this link', 'twentytwentyfour' ),
			'featured_image'        => __( 'Featured Image', 'twentytwentyfour' ),
			'set_featured_image'    => __( 'Set featured image', 'twentytwentyfour' ),
			'remove_featured_image' => __( 'Remove featured image', 'twentytwentyfour' ),
			'use_featured_image'    => __( 'Use as featured image', 'twentytwentyfour' ),
			'filter_items_list'     => __( 'Filter links list', 'twentytwentyfour' ),
			'items_list_navigation' => __( 'Links list navigation', 'twentytwentyfour' ),
			'items_list'            => __( 'Links list', 'twentytwentyfour' ),
			'item_published'        => __( 'Link published', 'twentytwentyfour' ),
			'item_published_privately' => __( 'Link published privately', 'twentytwentyfour' ),
			'item_reverted_to_draft' => __( 'Link reverted to draft', 'twentytwentyfour' ),
			'item_scheduled'        => __( 'Link scheduled', 'twentytwentyfour' ),
			'item_updated'          => __( 'Link updated', 'twentytwentyfour' ),
		);

		$args = array(
			'description'         => __( 'My favourite websites across the web', 'twentytwentyfour' ),
			'labels'              => $labels,
			'supports'            => array( 'custom-fields' ),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-admin-links',
			'rest_base'           => 'links',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'hierarchical'        => false,
			'exclude_from_search' => false,
			'show_in_rest'        => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'rewrite'             => array( 'slug' => 'links' ),
		);

		register_post_type( 'link', $args );
	}
endif;

add_action( 'init', 'register_links_post_type' );

if ( ! function_exists( 'register_links_custom_fields' ) ) :
	/**
	 * Register custom fields for post type: Links
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function register_links_custom_fields() {
		register_post_meta(
			'link',
			'url',
			array(
				'show_in_rest' => true,
				'single'       => true,
				'type'         => 'string',
			)
		);

		register_post_meta(
			'link',
			'description',
			array(
				'show_in_rest' => true,
				'single'       => true,
				'type'         => 'string',
			)
		);
	}
endif;

add_action( 'init', 'register_links_custom_fields' );

add_action('rest_api_init', 'register_custom_post_meta_endpoint');

function register_custom_post_meta_endpoint() {
    register_rest_route('custom/v1', '/post-meta/(?P<post_type>\w+)', array(
        'methods' => 'GET',
        'callback' => 'get_custom_post_meta_fields',
    ));
}

function get_custom_post_meta_fields($data) {
    $post_type = $data['post_type'];

    // Get registered meta keys for the specified post type
    $meta_keys = get_registered_meta_keys('post', $post_type);

	$supports = array(
        'title' => post_type_supports($post_type, 'title'),
        'editor' => post_type_supports($post_type, 'editor'),
        'thumbnail' => post_type_supports($post_type, 'thumbnail'),
        'excerpt' => post_type_supports($post_type, 'excerpt'),
    );

    // Add "supports_editor" information to the meta keys response
    $response = array(
        'fields' => $meta_keys,
        'supports' => $supports,
		'rest_base' => get_post_type_object($post_type)->rest_base,
    );

    // Return the response as JSON
    return rest_ensure_response($response);
}

function add_columns_to_links_post_type($columns) {
	$columns['url'] = __('URL', 'twentytwentyfour');
	$columns['description'] = __('Description', 'twentytwentyfour');
	return $columns;
}
add_filter('manage_links_posts_columns', 'add_columns_to_links_post_type');

function display_columns_content($column, $post_id) {
	if ($column === 'url') {
		$url = get_post_meta($post_id, 'url', true);
		echo esc_html($url);
	}
	if ($column === 'description') {
		$description = get_post_meta($post_id, 'description', true);
		echo esc_html($description);
	}
}
add_action('manage_links_posts_custom_column', 'display_columns_content', 10, 2);

if ( ! function_exists( 'register_book_post_type' ) ) :
	/**
	 * Register custom post type: Book
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function register_book_post_type() {
		$labels = array(
			'name'                  => __( 'Books', 'twentytwentyfour' ),
			'singular_name'         => __( 'Book', 'twentytwentyfour' ),
			'menu_name'             => __( 'Books', 'twentytwentyfour' ),
			'add_new'               => __( 'Add New', 'twentytwentyfour' ),
			'add_new_item'          => __( 'Add New Book', 'twentytwentyfour' ),
			'edit_item'             => __( 'Edit Book', 'twentytwentyfour' ),
			'new_item'              => __( 'New Book', 'twentytwentyfour' ),
			'view_item'             => __( 'View Book', 'twentytwentyfour' ),
			'view_items'            => __( 'View Books', 'twentytwentyfour' ),
			'search_items'          => __( 'Search Books', 'twentytwentyfour' ),
			'not_found'             => __( 'No books found', 'twentytwentyfour' ),
			'not_found_in_trash'    => __( 'No books found in trash', 'twentytwentyfour' ),
			'parent_item_colon'     => __( 'Parent Book:', 'twentytwentyfour' ),
			'all_items'             => __( 'All Books', 'twentytwentyfour' ),
			'archives'              => __( 'Book Archives', 'twentytwentyfour' ),
			'attributes'            => __( 'Book Attributes', 'twentytwentyfour' ),
			'insert_into_item'      => __( 'Insert into book', 'twentytwentyfour' ),
			'uploaded_to_this_item' => __( 'Uploaded to this book', 'twentytwentyfour' ),
			'featured_image'        => __( 'Featured Image', 'twentytwentyfour' ),
			'set_featured_image'    => __( 'Set featured image', 'twentytwentyfour' ),
			'remove_featured_image' => __( 'Remove featured image', 'twentytwentyfour' ),
			'use_featured_image'    => __( 'Use as featured image', 'twentytwentyfour' ),
			'filter_items_list'     => __( 'Filter books list', 'twentytwentyfour' ),
			'items_list_navigation' => __( 'Books list navigation', 'twentytwentyfour' ),
			'items_list'            => __( 'Books list', 'twentytwentyfour' ),
			'item_published'        => __( 'Book published', 'twentytwentyfour' ),
			'item_published_privately' => __( 'Book published privately', 'twentytwentyfour' ),
			'item_reverted_to_draft' => __( 'Book reverted to draft', 'twentytwentyfour' ),
			'item_scheduled'        => __( 'Book scheduled', 'twentytwentyfour' ),
			'item_updated'          => __( 'Book updated', 'twentytwentyfour' ),
		);
		$args = array(
			'description'         => __( 'Books I have enjoyed reading or want to read', 'twentytwentyfour' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'custom-fields' ),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 6,
			'menu_icon'           => 'dashicons-book',
			'rest_base'           => 'books',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'hierarchical'        => false,
			'exclude_from_search' => false,
			'show_in_rest'        => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'rewrite'             => array( 'slug' => 'books' ),
			'meta_box_cb'         => 'book_meta_box',
		);
		register_post_type( 'book', $args );
	}
endif;
add_action( 'init', 'register_book_post_type' );

if ( ! function_exists( 'register_book_custom_fields' ) ) :
	/**
	 * Register custom fields for post type: Links
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function register_book_custom_fields() {
		register_post_meta(
			'book',
			'author',
			array(
				'show_in_rest' => true,
				'single'       => true,
				'type'         => 'string',
			)
		);
		

		register_post_meta(
			'book',
			'genre',
			array(
				'show_in_rest' => true,
				'single'       => true,
				'type'         => 'string',
				'enum'         => array( 'Fiction', 'Non-Fiction', 'Sci-Fi', 'Mystery' ),
			)
		);

		register_post_meta(
			'book',
			'description',
			array(
				'show_in_rest' => true,
				'single'       => true,
				'type'         => 'string',
			)
		);
	}
endif;

add_action( 'init', 'register_book_custom_fields' );

if ( ! function_exists( 'register_product_post_type' ) ) :
    /**
     * Register custom post type: Product
     *
     * @since Twenty Twenty-Four 1.0
     * @return void
     */
    function register_product_post_type() {
        $labels = array(
            'name'                  => __( 'Products', 'twentytwentyfour' ),
            'singular_name'         => __( 'Product', 'twentytwentyfour' ),
            'menu_name'             => __( 'Products', 'twentytwentyfour' ),
            'add_new'               => __( 'Add New', 'twentytwentyfour' ),
            'add_new_item'          => __( 'Add New Product', 'twentytwentyfour' ),
            'edit_item'             => __( 'Edit Product', 'twentytwentyfour' ),
            'new_item'              => __( 'New Product', 'twentytwentyfour' ),
            'view_item'             => __( 'View Product', 'twentytwentyfour' ),
            'view_items'            => __( 'View Products', 'twentytwentyfour' ),
            'search_items'          => __( 'Search Products', 'twentytwentyfour' ),
            'not_found'             => __( 'No products found', 'twentytwentyfour' ),
            'not_found_in_trash'    => __( 'No products found in trash', 'twentytwentyfour' ),
            'parent_item_colon'     => __( 'Parent Product:', 'twentytwentyfour' ),
            'all_items'             => __( 'All Products', 'twentytwentyfour' ),
            'archives'              => __( 'Product Archives', 'twentytwentyfour' ),
            'attributes'            => __( 'Product Attributes', 'twentytwentyfour' ),
            'insert_into_item'      => __( 'Insert into product', 'twentytwentyfour' ),
            'uploaded_to_this_item' => __( 'Uploaded to this product', 'twentytwentyfour' ),
            'featured_image'        => __( 'Featured Image', 'twentytwentyfour' ),
            'set_featured_image'    => __( 'Set featured image', 'twentytwentyfour' ),
            'remove_featured_image' => __( 'Remove featured image', 'twentytwentyfour' ),
            'use_featured_image'    => __( 'Use as featured image', 'twentytwentyfour' ),
            'filter_items_list'     => __( 'Filter products list', 'twentytwentyfour' ),
            'items_list_navigation' => __( 'Products list navigation', 'twentytwentyfour' ),
            'items_list'            => __( 'Products list', 'twentytwentyfour' ),
            'item_published'        => __( 'Product published', 'twentytwentyfour' ),
            'item_published_privately' => __( 'Product published privately', 'twentytwentyfour' ),
            'item_reverted_to_draft' => __( 'Product reverted to draft', 'twentytwentyfour' ),
            'item_scheduled'        => __( 'Product scheduled', 'twentytwentyfour' ),
            'item_updated'          => __( 'Product updated', 'twentytwentyfour' ),
        );
        $args = array(
            'description'         => __( 'Product recommendations and wishlist', 'twentytwentyfour' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'thumbnail', 'custom-fields', 'comments' ),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 6,
            'menu_icon'           => 'dashicons-cart',
            'rest_base'           => 'products',
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => true,
            'hierarchical'        => false,
            'exclude_from_search' => false,
            'show_in_rest'        => true,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'rewrite'             => array( 'slug' => 'products' ),
            'meta_box_cb'         => 'product_meta_box',
        );
        register_post_type( 'product', $args );
    }
endif;
add_action( 'init', 'register_product_post_type' );

if ( ! function_exists( 'register_product_custom_fields' ) ) :
    /**
     * Register custom fields for post type: Product
     *
     * @since Twenty Twenty-Four 1.0
     * @return void
     */
    function register_product_custom_fields() {
        register_post_meta(
            'product',
            'price',
            array(
                'show_in_rest' => true,
                'single'       => true,
                'type'         => 'string',
            )
        );

        register_post_meta(
            'product',
            'description',
            array(
                'show_in_rest' => true,
                'single'       => true,
                'type'         => 'string',
            )
        );

		register_post_meta(
            'product',
            'url',
            array(
                'show_in_rest' => true,
                'single'       => true,
                'type'         => 'string',
            )
        );
    }
endif;
add_action( 'init', 'register_product_custom_fields' ); 

if ( ! function_exists( 'register_thought_post_type' ) ) :
	/**
	 * Register custom post type: Thought
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function register_thought_post_type() {
		$labels = array(
            'name'                  => __( 'Thoughts', 'twentytwentyfour' ),
            'singular_name'         => __( 'Thought', 'twentytwentyfour' ),
            'menu_name'             => __( 'Thoughts', 'twentytwentyfour' ),
            'add_new'               => __( 'Add New', 'twentytwentyfour' ),
            'add_new_item'          => __( 'Add New Thought', 'twentytwentyfour' ),
            'edit_item'             => __( 'Edit Thought', 'twentytwentyfour' ),
            'new_item'              => __( 'New Thought', 'twentytwentyfour' ),
            'view_item'             => __( 'View Thought', 'twentytwentyfour' ),
            'view_items'            => __( 'View Thoughts', 'twentytwentyfour' ),
            'search_items'          => __( 'Search Thoughts', 'twentytwentyfour' ),
            'not_found'             => __( 'No thoughts found', 'twentytwentyfour' ),
            'not_found_in_trash'    => __( 'No thoughts found in trash', 'twentytwentyfour' ),
            'parent_item_colon'     => __( 'Parent Thought:', 'twentytwentyfour' ),
            'all_items'             => __( 'All Thoughts', 'twentytwentyfour' ),
            'archives'              => __( 'Thought Archives', 'twentytwentyfour' ),
            'attributes'            => __( 'Thought Attributes', 'twentytwentyfour' ),
            'insert_into_item'      => __( 'Insert into thought', 'twentytwentyfour' ),
            'uploaded_to_this_item' => __( 'Uploaded to this thought', 'twentytwentyfour' ),
            'featured_image'        => __( 'Featured Image', 'twentytwentyfour' ),
            'set_featured_image'    => __( 'Set featured image', 'twentytwentyfour' ),
            'remove_featured_image' => __( 'Remove featured image', 'twentytwentyfour' ),
            'use_featured_image'    => __( 'Use as featured image', 'twentytwentyfour' ),
            'filter_items_list'     => __( 'Filter thoughts list', 'twentytwentyfour' ),
            'items_list_navigation' => __( 'Thoughts list navigation', 'twentytwentyfour' ),
            'items_list'            => __( 'Thoughts list', 'twentytwentyfour' ),
            'item_published'        => __( 'Thought published', 'twentytwentyfour' ),
            'item_published_privately' => __( 'Thought published privately', 'twentytwentyfour' ),
            'item_reverted_to_draft' => __( 'Thought reverted to draft', 'twentytwentyfour' ),
            'item_scheduled'        => __( 'Thought scheduled', 'twentytwentyfour' ),
            'item_updated'          => __( 'Thought updated', 'twentytwentyfour' ),
        );
		$args = array(
			'description'         => __( 'Opinions and random ideas', 'twentytwentyfour' ),
			'labels'              => $labels,
			'supports'            => array('custom-fields'),
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 7,
			'menu_icon'           => 'dashicons-welcome-write-blog',
			'rest_base'           => 'thoughts',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'hierarchical'        => false,
			'exclude_from_search' => false,
			'show_in_rest'        => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'rewrite'             => array( 'slug' => 'thoughts' ),
			'meta_box_cb'         => 'thought_meta_box',
		);
		register_post_type( 'thought', $args );
	}
endif;
add_action( 'init', 'register_thought_post_type' );

if ( ! function_exists( 'register_thought_custom_fields' ) ) :
	/**
	 * Register custom fields for post type: Thought
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function register_thought_custom_fields() {
		register_post_meta(
            'thought',
            'thought',
            array(
                'show_in_rest' => true,
                'single'       => true,
                'type'         => 'string',
            )
        );
	}
endif;
add_action( 'init', 'register_thought_custom_fields' );

add_action('init', 'thought_hide_title');
function thought_hide_title() {
     remove_post_type_support('thought', 'title');
}

?>