<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">

		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">

				<div class="page-content">

					<header class="page-header">
						<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'storefront' ); ?></h1>
					</header><!-- .page-header -->

					<p><?php _e( 'Nothing was found at this location. Try searching, or check out the links below.', 'storefront' ); ?></p>

					<?php
					if ( is_woocommerce_activated() ) {
						the_widget( 'WC_Widget_Product_Search' );
					} else {
						get_search_form();
					}
					?>

					<?php
					if ( is_woocommerce_activated() ) {

						echo '<div class="fourohfour-columns-2">';
							echo '<div class="col-1">';

								echo '<h2>' . esc_attr( __( 'Featured Products', 'storefront' ) ) . '</h2>';

								echo storefront_do_shortcode( 'featured_products',
									array(
										'per_page' 	=> intval( '2' ),
										'columns'	=> intval( '2' ),
										) );

							echo '</div>';

							echo '<div class="col-2">';

								echo '<h2>' . __( 'Product Categories', 'storefront' ) . '</h2>';

								the_widget( 'WC_Widget_Product_Categories', array(
															'count'		=> 1,
														) );
							echo '</div>';

						echo '</div>';

						echo '<h2>' . __( 'Popular Products', 'storefront' ) . '</h2>';

						echo storefront_do_shortcode( 'best_selling_products',
								array(
									'per_page' 	=> intval( '4' ),
									'columns'	=> intval( '4' ),
									) );
					}
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
