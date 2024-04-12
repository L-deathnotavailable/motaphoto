<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

<footer id="colophon" class="site-footer">

	<?php if ( has_nav_menu( 'footer' ) ) : ?>
		<nav aria-label="<?php esc_attr_e( 'Secondary menu', 'twentytwentyone' ); ?>" class="footer-navigation">
			<ul class="footer-navigation-wrapper">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'items_wrap'     => '%3$s',
						'container'      => false,
						'depth'          => 1,
						'link_before'    => '<span>',
						'link_after'     => '</span>',
						'fallback_cb'    => false,
					)
				);
				?>
			</ul><!-- .footer-navigation-wrapper -->
		</nav><!-- .footer-navigation -->
	<?php endif; ?>
	
	<!-- Display footer menu -->
	<div>
		<?php
			wp_nav_menu(array(
				'theme_location' => 'menu_secondaire',
				'container' => false,
				'menu_class' => 'menu',
			));
		?>
	</div>
	<!-- Lightbox -->
	<div class="lightbox">
		<div class="lightbox-fermeture">
			<i class="fa-solid fa-xmark" style="color: #ffffff;"></i>
		</div>
		<div class="lightbox-affichage">
			<img src="">
		</div>
		<div class="lightbox-fleches">
			<div class="precedente">
				<i class="fa-solid fa-arrow-left-long" style="color: #ffffff;"></i>
				<div class="lightbox-precedente">Précédente</div>
			</div>
			<div class="suivante">
				<div class="lightbox-suivante">Suivante</div>
				<i class="fa-solid fa-arrow-right-long" style="color: #ffffff;"></i>
			</div>
		</div>
		<div class="informations-photo">
			<div class="reference-photo"></div>
			<div class="categorie-photo"></div>
		</div>
	</div>

</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
