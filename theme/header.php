<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @since The Box 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">	

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
	
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/fonts/gillsans.css" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="overlay">
<div id="page">

	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header clearfix" role="banner">
		<div class="site-brand clearfix">
		
			<div class="logo">
				<a href="<?php echo get_bloginfo('url'); ?>" class="t"></a>
				<a href="<?php echo get_bloginfo('url'); ?>" class="title">THALIA</a>
				<a href="<?php echo get_bloginfo('url'); ?>" class="subtitle"><?php echo get_theme_mod( 'title_textbox', 'MINISITE' ); ?></a>
			</div>
			
			<?php $options = get_option( 'thebox_theme_options' ); ?>
			
			<div class="social-links">
			
				<?php if ( $options['facebookurl'] != '' ) : ?>
					<a href="<?php echo $options['facebookurl']; ?>" class="facebook" alt="facebook"><span class="icon-facebook"></span></a>
				<?php endif; ?>
				
				<?php if ( $options['twitterurl'] != '' ) : ?>
					<a href="<?php echo $options['twitterurl']; ?>" class="twitter" alt="twitter"><span class="icon-twitter"></span></a>
				<?php endif; ?>
				
			</div><!-- .social-links-->
			
		</div>	
		
		<?php if(has_nav_menu('primary')) : ?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><span class="icon-font icon-menu"></span></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
		<?php endif; ?>
		
	</header><!-- #masthead .site-header -->

	<div id="main" class="site-main clearfix">
		