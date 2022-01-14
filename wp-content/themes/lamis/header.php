<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lamis</title>

    <?php wp_head(); ?>

</head>

<body>
	<header>
		<div class="rs-17">
			<div class="rs-menu-form">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-12 col-sm-10">
							<div class="rs-menu-form__container">
                                <?php
                                    if ( function_exists( 'the_custom_logo' ) ) {
                                        the_custom_logo();
                                    }
                                ?>
                                <?php
                                    wp_nav_menu([
	                                    'theme_location'  => 'menu_header',
	                                    'container'       => false,
	                                    'menu_class'      => 'rs-menu-form__menu rs-menu-form__menu-desktop',
                                    ]);
                                ?>
								<div class="rs-menu-form__burger">
									<span></span>
									<span></span>
									<span></span>
								</div>
								<a href="#" class="rs-menu-form__icon rs-menu-form__icon-like"
									style="-webkit-mask-image: url(<?php bloginfo('template_url'); ?>/assets/img/heart.svg);"></a>
								<a href="#" class="rs-menu-form__icon rs-menu-form__icon-basket"
									style="-webkit-mask-image: url(<?php bloginfo('template_url'); ?>/assets/img/shopping-cart.svg);"></a>
								<div class="rs-menu-form__icon rs-menu-form__icon-search"
									style="-webkit-mask-image: url(<?php bloginfo('template_url'); ?>/assets/img/search.svg);"></div>
								<div class="rs-menu-form__search">
									<form method="post" action="#">
										<input type="text">
										<button><span></span></button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="rs-menu-form__menu rs-menu-form__menu-mobile">
					<div class="row">
						<div class="col-xs-12 col-sm-10">
							<form class="rs-menu-form__mobile-search">
								<input type="text">
								<button><span></span></button>
							</form>
                            <?php
                                wp_nav_menu([
	                                'theme_location'  => 'menu_header',
	                                'container'       => false,
                                ]);
                            ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>