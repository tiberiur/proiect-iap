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
                <a class="header-logo" href="/"><img src="<?= get_template_directory_uri()?>/images/logo.png" /></a>
                <ul class="header-menu">
                    <li class="is-active"><a href="#">Home</a></li>
                    <li><a href="#">What we do?</a></li>
                    <li><a href="#">Prevention</a></li>
                    <li><a href="#">Symptoms</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul>
            </div>
        </div>
    </div>