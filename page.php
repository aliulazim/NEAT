<?php
get_header();
/*
Template Name: Work
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
		<div id="fh5co-work">
			<div class="row">
			<?php 
					$args = array('post_type' => 'neatwork','posts_per_page' => -1);

					$query = new WP_Query($args);	
					while($query->have_posts()) : $query->the_post() ;	
					
					$link = get_post_permalink($post->ID);
					$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					echo '<div class="col-md-4 text-center animate-box">';
					echo '<a href="'.$link.'" class="work"  style="background-image: url('.$url.');">';
					?>
				
						<div class="desc">
							<h3><?php the_title();?></h3>
							<span><?php read_more(10);?></span>
						</div>
					</a>
				</div>
			<?php endwhile;?>
				
			</div>
		</div>
	</div><!-- END container-wrap -->




















<?php
get_footer();

?>