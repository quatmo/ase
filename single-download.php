<?php get_header();

if(have_posts()) : while(have_posts()) : the_post(); ?>
	<div class="ase-content clearfix">

		<div class="col-md-9 ase-library-main">
			<?php the_title('<h2>', '</h2>' );?>
			<?php echo the_content(); ?>
		</div>

		<?php get_template_part('partials/product-sb');?>

	</div>
<?php endwhile;endif;

get_footer();