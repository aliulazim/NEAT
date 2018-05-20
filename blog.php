<?php
get_header();
/*
Template Name: Stock
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
		<div id="fh5co-blog">
			<div class="row">
				
				<?php 
				$args = array('post_type' => 'post','posts_per_page' => -1);

					$query = new WP_Query($args);
				if( $query->have_posts()):
      			while ( $query->have_posts()) : $query->the_post(); 
      			$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
      			echo '<div class="col-md-4">';
      			echo '<div class="fh5co-blog animate-box">';
      			echo '<a href="#" class="blog-bg" style="background-image: url('.$url.');"></a>';
      		
      	?>
      	<div class="blog-text">
							<span class="posted_on"><?php the_time('l ; F j, Y, g:i a');?></span>
							<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
							<p><?php read_more(20);?></p>
							<ul class="stuff">
								<li><i class="icon-heart3"></i>249</li>
								<li><i class="icon-eye2"></i><?php echo getPostViews(get_the_ID()); ?></li>
								<li><a href="<?php the_permalink();?>">Read More<i class="icon-arrow-right22"></i></a></li>
							</ul>
						</div>
						<?php
							echo '</div>';
							echo '</div>';
							endwhile;
							endif;
						?> 
					
			</div>
		</div>
	</div><!-- END container-wrap -->


















<?php
get_footer();

?>