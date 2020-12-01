<?php
/**
 * Template for displaying search forms in theme
 *
 * @package WordPress
 * @subpackage 
 * @since 
 * @version 0.0.1
 */

?>

<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<div class="form-group">
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 's_bootstrap' ); ?></span>
	</label>
    <input type="search" id="<?php echo $unique_id; ?>" class="form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 's_bootstrap' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
</div><!-- .form-group -->
</form>
