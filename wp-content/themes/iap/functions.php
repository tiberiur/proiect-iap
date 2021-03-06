<?php


/**
 * Enqueue scripts and styles.
 */
function iap_scripts() {
    wp_enqueue_style( 'style-scss', untrailingslashit( get_template_directory_uri() ) . '/dist/css/style.css' );
    wp_enqueue_style( 'font-google', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap', false ); 

	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
}
add_action( 'wp_enqueue_scripts', 'iap_scripts' );


/**
 * Theme Setup
 */

if (!function_exists('iap_setup') ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function iap_setup() {
        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support( 'title-tag' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'width'       => 191,
				'height'      => 67,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

        // Menu locations
		register_nav_menus(
			array(
				'menu' => __( 'Header', 'iap' ),
                'new-position' => __( 'New position', 'iap' ),
			)
		);

        // Add support for featured image
        add_theme_support('post-thumbnails');

        // Set featured image size
        set_post_thumbnail_size(343, 235, true);
    }
endif;

add_action( 'after_setup_theme', 'iap_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function iap_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'iap' ),
			'id'            => 'sidebar',
			'description'   => __( 'Add widgets here to appear in your footer.', 'iap' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

    register_sidebar(
		array(
			'name'          => __( 'Footer', 'iap' ),
			'id'            => 'footer',
			'description'   => __( 'Add widgets here to appear in your footer.', 'iap' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'iap_widgets_init' );

/**
 * Filter the except length to 20 words.
 *
 * @link https://developer.wordpress.org/reference/functions/the_excerpt/
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */

function iap_excerpt_length( $length ) {
    return 14;
}

add_filter('excerpt_length', 'iap_excerpt_length', 999);


/**
 * Gutenberg Blocks
 */

use Carbon_Fields\Block;
use Carbon_Fields\Field;

function iap_attach_gutenberg_blocks() {
    Block::make('IAP Hero New')
        -> add_fields([
            Field::make('text', 'iap_hero_subtitle', __( 'Subtitle' )),
            Field::make('text', 'iap_hero_title', __( 'Title' )),
            Field::make('rich_text', 'iap_hero_text', __( 'Text' )),
            Field::make('text', 'iap_hero_button', __( 'Button text' )),
            Field::make('text', 'iap_hero_link', __( 'Button link' )),
            Field::make('image', 'iap_hero_image', __( 'Image' )),
            Field::make( 'checkbox', 'iap_hero_big', __( 'Big' ) ),
        ])
        -> set_render_callback( function( $fields, $attributes, $inner_blocks ) { ?>
            <div class="hero <?= $fields['iap_hero_big'] ? 'hero--big' : 'hero--about' ?>">
                <div class="container">
                    <div class="hero-inner">
                        <div class="hero-image">
                            <?= wp_get_attachment_image( $fields['iap_hero_image'], 'full' ); ?>
                        </div>
                        <div class="hero-content">
                            <?php if($fields['iap_hero_subtitle']): ?>
                            <p class="hero-sticker">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="#FF0000" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span><?= $fields['iap_hero_subtitle'] ?></span>
                            </p>
                            <?php endif ?>
                            <h2 class="hero-title"><?= $fields['iap_hero_title'] ?></h2>
                            <div class="hero-description"><?= $fields['iap_hero_text'] ?></div>
                            <a href="<?= $fields['iap_hero_link'] ?>" class="<?= $fields['iap_hero_big'] ? 'button' : 'button-secondary' ?>"><?= $fields['iap_hero_button'] ?></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    });

    Block::make('IAP Stats New')
        -> add_fields([
            Field::make( 'complex', 'iap_stats', __( 'Cards' ) )
                -> add_fields([
                    Field::make('text', 'iap_stats_title', __( 'Title' )),
                    Field::make('text', 'iap_stats_number', __( 'Number' )),
                    Field::make('text', 'iap_stats_subtitle', __( 'Subtitle' )),
                    Field::make('color', 'iap_stats_color', __( 'Color' ))
                ])
        ])
        -> set_render_callback( function( $fields, $attributes, $inner_blocks ) { ?>
            <div class="stats">
                <div class="container">
                    <ul class="stats-items">
                        <?php foreach($fields['iap_stats'] as $field): ?>
                            <li class="stats-item">
                                <p><?= $field['iap_stats_title'] ?></p>
                                <strong <?= $field['iap_stats_color'] ? 'style="color:'.$field['iap_stats_color'].'"' : '' ?>><?= $field['iap_stats_number'] ?></strong>
                                <span><?= $field['iap_stats_subtitle'] ?></span>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        <?php
    });

	Block::make('IAP Section')
        -> add_fields([
            Field::make( 'text', 'iap_section_title', __( 'Title' ) ),
            Field::make( 'text', 'iap_section_text', __( 'Text' ) ),
            Field::make( 'complex', 'iap_section_cards', __( 'Cards' ) )
                -> add_fields([
                    Field::make( 'image', 'iap_section_cards_image', __( 'Image' ) ),
                    Field::make( 'text', 'iap_section_cards_title', __( 'Title' ) ),
                    Field::make( 'text', 'iap_section_cards_text', __( 'Text' ) )
                ]),
            Field::make( 'image', 'iap_section_image', __( 'Image' ) )
        ])
		-> set_render_callback( function( $fields, $attributes, $inner_blocks ) { ?>
            <div class="section">
                <div class="container">
                    <div class="section-inner">
                        <h2 class="section-title"><?= $fields['iap_section_title'] ?></h2>
                        <p class="section-intro"><?= $fields['iap_section_text'] ?></p>

                        <?php if($fields['iap_section_cards']): ?>
                            <div class="cards">
                            <?php foreach($fields['iap_section_cards'] as $field): ?>
                                <div class="card">
                                    <div class="card-image"><?= wp_get_attachment_image( $field['iap_section_cards_image'], 'full' ); ?></div>
                                    <h3 class="card-title"><?= $field['iap_section_cards_title'] ?></h3>
                                    <p class="card-description"><?= $field['iap_section_cards_text'] ?></p>
                                </div>
                            <?php endforeach ?>
                            </div>
                        <?php endif ?>

                        <?php if ($fields['iap_section_image']): ?>
                            <?= wp_get_attachment_image( $fields['iap_section_image'], 'full' ); ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
		<?php
	});
}

add_action('carbon_fields_register_fields', 'iap_attach_gutenberg_blocks' );
