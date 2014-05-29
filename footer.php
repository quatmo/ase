

	</main>
	<?php if ( ! ('aesop_stories' == get_post_type() && is_single()) ): ?>

		<?php

		if (!is_page_template('template-library-card.php')) {

			get_template_part('partials/newslettersignup');
		}

		?>
		<footer id="colophon" class="ase-site-footer" role="contentinfo">

			<div class="ase-content">
				<p class="ase-copyright">&copy;2014 Aesopinteractive L.L.C.</p>
				<p class="ase-footer-cred">Proudly built with WordPress and the Aesop Story Engine</p>
				<ul class="ase-footer-links">
					<li><a href="/jobs">Jobs |</a></li>
					<li><a href="/contact">Contact |</a></li>
					<li><a href="/feedback">Feedback |</a></li>
					<li><a href="#top">Back to Top</a></li>
				</ul>
			</div>

		</footer>
	<?php endif; ?>

		<div><?php wp_footer(); ?></div>

		<!-- Google Analytics -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-38255798-11', 'aesopstoryengine.com');
		  ga('send', 'pageview');

		</script>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=492973480802758";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<?php do_action('aesop_inside_body_bottom');?>

	</body>

</html>