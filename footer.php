<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @since The Box 1.0
 */
?>
		
	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer clearfix" role="contentinfo">

		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
			<div id="tertiary" class="clearfix">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
		<?php endif; // end footer widget area ?>
		
		<p class="credits">
			<?php credits(); ?>
		</p>
		
		<?php
			if(get_theme_mod( 'party_checkbox', false )) :
		?>
		<p class="credits right">
			↑ ↑ ↓ ↓ ← → ← → B A
		</p>
		<?php	
			endif;
		?>

	</footer><!-- #colophon .site-footer -->
</div><!-- #page -->
</div><!-- #overlay -->


<?php
	if(get_theme_mod( 'party_checkbox', false )) :
?>
<script type="text/javascript">
	var themeUrl = "<?php bloginfo( 'template_url' ); ?>";
</script>
<script src="<?php bloginfo( 'template_url' ); ?>/party/script.js" type="text/javascript"></script>
<?php	
	endif; 
	wp_footer();
?>

</body>
</html>