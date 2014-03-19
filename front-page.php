<?php 

/*
* Template Name: Front Page
*/

get_header();

 ?>

<main id="main-content" class="main-content">

	<div class="aesop-entry-content ase-front-page">

		<div class="ase-section ase-features">
			<div class="ase-content clearfix">
				<?php echo do_shortcode('[aesop_timeline_stop num="Features"]');?>
				<p>Choose from twelve unique story components, then arrange them in any order and customize them to weave your narrative--right in the WordPress post or page editor. Need big, eye-catching images? Handled. How about a few columns of content with images and captions? An image gallery? How about an audio podcast? They're all no problem. Full-width videos? Piece of cacke. Even timelines and story collections are built in.</p>
				<img src="http://placehold.it/1200x850">
			</div>
		</div>

		<div class="ase-section ase-components">
			<div class="ase-content clearfix">

				<?php echo do_shortcode('[aesop_timeline_stop num="Components"]');?>

				GRID COMPONENT THINGEE HERE
			</div>
		</div>

		<div class="ase-section ase-reviews">
			<div class="ase-content">
				<?php echo do_shortcode('[aesop_timeline_stop num="Reviews"]');?>
				REVIEWS HERE
			</div>
		</div>

		<div class="ase-section ase-resources">
			<div class="ase-content">
				<?php echo do_shortcode('[aesop_timeline_stop num="Resources"]');?>
				<div class="row">
					<div class="col-md-4">
						<img src="http://placehold.it/300/224">
						<h3>Quick Start Guide</h3>
						<p>Get Aesop Story Engine up and running in any theme with these quick video tutorials.</p>
					</div>
					<div class="col-md-4">
						<img src="http://placehold.it/300/224">
						<h3>Quick Start Guide</h3>
						<p>Get Aesop Story Engine up and running in any theme with these quick video tutorials.</p>
					</div>
					<div class="col-md-4">
						<img src="http://placehold.it/300/224">
						<h3>Quick Start Guide</h3>
						<p>Get Aesop Story Engine up and running in any theme with these quick video tutorials.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<img src="http://placehold.it/300/224">
						<h3>Quick Start Guide</h3>
						<p>Get Aesop Story Engine up and running in any theme with these quick video tutorials.</p>
					</div>
					<div class="col-md-4">
						<img src="http://placehold.it/300/224">
						<h3>Quick Start Guide</h3>
						<p>Get Aesop Story Engine up and running in any theme with these quick video tutorials.</p>
					</div>
					<div class="col-md-4">
						<img src="http://placehold.it/300/224">
						<h3>Quick Start Guide</h3>
						<p>Get Aesop Story Engine up and running in any theme with these quick video tutorials.</p>
					</div>
				</div>
			</div>
		</div>

		<div class="ase-section ase-newsletter">
			<div class="ase-content">
				<h2>Sign up for our newsletter</h2>
				<p>Get notified of new stuff and important news</p>
				<?php get_template_part('partials/newsform');?>
			</div>
		</div>

	</div>


</main>

<?php get_footer();
