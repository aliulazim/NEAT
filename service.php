<?php
get_header();
/*
Template Name: Service
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
		<div id="fh5co-work">
		<?php 
						
					while(have_posts()) : the_post() ;	
					/*if ( get_post_gallery() ) :
                $gallery = get_post_gallery( get_the_ID(), false );
            	foreach( $gallery['src'] AS $src )
                {*/
					?>
			<div class="row">
				
				<div class="col-md-12 fh5co-project-detail">
					<p><?php the_content();?></p>

				</div>
				
				<!-- <div class="col-md-4 text-center animate-box">
					<a href="#" class="work" style="background-image: url(images/portfolio-1.jpg);">
						<div class="desc">
							<h3>Project Name</h3>
							<span>Illustration</span>
						</div>
					</a>
				</div>
				<div class="col-md-4 text-center animate-box">
					<a href="#" class="work" style="background-image: url(images/portfolio-2.jpg);">
						<div class="desc">
							<h3>Project Name</h3>
							<span>Brading</span>
						</div>
					</a>
				</div>
				<div class="col-md-4 text-center animate-box">
					<a href="#" class="work" style="background-image: url(images/portfolio-3.jpg);">
						<div class="desc">
							<h3>Project Name</h3>
							<span>Illustration</span>
						</div>
					</a>
				</div>
				<div class="col-md-4 text-center animate-box">
					<a href="#" class="work" style="background-image: url(images/portfolio-4.jpg);">
						<div class="desc">
							<h3>Project Name</h3>
							<span>Illustration</span>
						</div>
					</a>
				</div>
				<div class="col-md-4 text-center animate-box">
					<a href="#" class="work image-popup" style="background-image: url(images/portfolio-5.jpg);">
						<div class="desc">
							<h3>Project Name</h3>
							<span>Brading</span>
						</div>
					</a>
				</div>
				<div class="col-md-4 text-center animate-box">
					<a href="#" class="work image-popup" style="background-image: url(images/portfolio-6.jpg);">
						<div class="desc">
							<h3>Project Name</h3>
							<span>Illustration</span>
						</div>
					</a>
				</div> -->
			</div>
		<?php endwhile;?>
		</div>
	</div><!-- END container-wrap -->




<?php
get_footer();

?>