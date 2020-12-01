<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package s_bootstrap
 */

?>

</div><!-- .container -->

	<footer id="colophon" class="site-footer blog-footer">
		<div class="container">
			<div class="row">
				
				<div class="site-info col-md-8">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 's_bootstrap' ) ); ?>">
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 's_bootstrap' ), 'WordPress' );
						?>
					</a>
					<span class="sep"> | </span>
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 's_bootstrap' ), 's_bootstrap', '<a href="http://thiweb.fr">bibibricodeur@gmail.com</a>' );
						?>
				</div><!-- .site-info .col-md-8 -->

				<div class="col-md-4">
                    <?php if ( ! is_active_sidebar( 'sidebar-2' ) ) {
                            return;
                        }
                        dynamic_sidebar( 'sidebar-2' );
                    ?>
				</div><!-- .col-md-4 -->

			</div><!-- .row -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<a href="#hautPage" class="btn btn-secondary" id="boutonRemonter" title="Clic pour remonter en haut de cette satanée page">Remonter</a>

<script>hljs.initHighlightingOnLoad();</script>
<script>      
	window.onscroll = function () {
	afficherBouton()
	};

	function afficherBouton() {
		
		var elem = document.getElementById('boutonRemonter');
		var nombrePixels = window.pageYOffset | document.body.scrollTop;
		
		if (nombrePixels > 360) {
			elem.style.display = 'block';
		} else if (nombrePixels <= 360) {
			elem.style.display = 'none';
		}
	}
</script>

</body>
</html>
