<!doctype html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="header">
        <div class="container">
            <div class="header-inner">
                <?php if ( has_custom_logo() ) : ?>
				    <div class="header-logo"><?php the_custom_logo(); ?></div>
			    <?php endif; ?>

                <?php if (has_nav_menu('menu')): ?>
                    <nav class="header-menu">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'menu',
                            'container'      => false
                        ]);
                        ?>
                    </nav>
                <?php endif ?>
            </div>
        </div>
    </div>