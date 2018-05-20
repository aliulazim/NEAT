<?php
get_header();
/*
Template Name: Contact
*/
?>



<div class="container-wrap">
		<aside id="fh5co-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<?php
					if(has_post_thumbnail()) while ( have_posts() ) : the_post();
						$image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
					echo '<li style="background-image: url('.$image.');">';
				?>
			   	
			   		<div class="overlay-gradient"></div>
			   		<div class="container-fluids">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 slider-text slider-text-bg">
				   				<div class="slider-text-inner text-center">
				   					<h1><?php the_title();?></h1>
										<h2><?php the_content();?></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   		<?php
			   			echo '</li>';
			   			endwhile;
			   		?>		   			   	
			  	</ul>
		  	</div>
		</aside>		
		<div id="fh5co-contact">
			<div class="row animate-box">
				<?php dynamic_sidebar('contact');?>
				<div class="col-md-7 col-md-push-1 animate-box">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Email">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<textarea name="" class="form-control" id="" cols="30" rows="7" placeholder="Message"></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="submit" value="Send Message" class="btn btn-primary btn-modify">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- END container-wrap -->




















<?php
get_footer();

?>