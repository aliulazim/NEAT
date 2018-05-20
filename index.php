<?php
get_header();

?>

	<div class="container-wrap">
		<aside id="fh5co-hero">
			<div class="flexslider">
				<ul class="slides">
				<?php 
					$args = array('post_type' => 'neatslider','posts_per_page' => -1);

					$query = new WP_Query($args);	
					while($query->have_posts()) : $query->the_post() ;	
					$id = get_the_ID();
					if(($id % 2) == 0){
					
					$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			   	echo '<li style="background-image: url('.$url.')">';
			   	?>
			   		<div class="overlay-gradient"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 slider-text">
				   				<div class="slider-text-inner">
				   					<h1><?php the_title();?> </h1>
										<h2><?php read_more(20);?></h2>
										<p><a class="btn btn-primary btn-demo" href="<?php the_permalink();?>"></i> Read More</a>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   		<?php
			   	echo '</li>';
			   }
			   else {
			   	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
			   	echo '<li style="background-image: url('.$url.')">';
			   	?>
			   		<div class="overlay-gradient"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-push-3 slider-text">
				   				<div class="slider-text-inner">
				   					<h1><?php the_title();?></h1>
										<h2><?php read_more(20);?></h2>
										<p><a class="btn btn-primary btn-demo" href="<?php the_permalink();?>"></i> Read More</a>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   		<?php
			   	echo '</li>';
			   	
			   }
			   	 endwhile; ?>
			  	</ul>
		  	</div>
		</aside>
		<div id="fh5co-services">
			<div class="row">
			<?php 
					$args = array('post_type' => 'neatfeature','posts_per_page' => -1);

					$query = new WP_Query($args);	
					while($query->have_posts()) : $query->the_post() ;	
					?>
				<div class="col-md-4 text-center animate-box">
					<div class="services">
						<span class="icon">
							<?php the_post_thumbnail();?>
						</span>
						<div class="desc">
							<h3><a href="#"><?php the_title();?></a></h3>
							<p><?php the_content();?></p>
						</div>
					</div>
				</div>
			<?php endwhile;?>
			</div>
		</div>

		<div id="fh5co-work" class="fh5co-light-grey">
		
			<div class="row animate-box">
				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
					<h2>Work</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
			<?php 
					$args = array('post_type' => 'neatwork','posts_per_page' => 3);

					$query = new WP_Query($args);	
					while($query->have_posts()) : $query->the_post() ;	
					$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					$link = get_post_permalink($post->ID);
					echo '<div class="col-md-4 text-center animate-box">';
					echo '<a href="'.$link.'" class="work"  style="background-image: url('.$url.');">';
					?>
				
					
						<div class="desc">
							<h3><?php the_title();?></h3>
							<span><?php read_more(10);?></span>
						</div>
					
						<?php
						echo '</a>';
						echo '</div>';
						endwhile;
						?>
				
			</div>
		</div>

		<?php dynamic_sidebar('numbers');?>

		<div id="fh5co-blog" class="blog-flex">
		<?php
            	 $first_query = new WP_Query('posts_per_page=1&cat=5'); 
            	if ( $first_query->have_posts() ) while ( $first_query->have_posts() ) : $first_query->the_post();
            	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
            	echo '<div class="featured-blog" style="background-image: url('.$url.');">';
            ?>
			
				<div class="desc-t">
					<div class="desc-tc">
						<span class="featured-head">Featured Posts</span>
						<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
						<span><a href="<?php the_permalink();?>" class="read-button">Show More</a></span>
					</div>
				</div>
				<?php
					echo '</div>';
					endwhile;
				?>
			
			<div class="blog-entry fh5co-light-grey">
				<div class="row animate-box">
					<div class="col-md-12">
						<h2>Latest Posts</h2>
					</div>
				</div>
				<div class="row">
				<?php
               $args = array('category__not_in' => array(5),'posts_per_page' => 3);
               $feature = new WP_Query( $args );
              if ( $feature->have_posts() ) while ( $feature->have_posts() ) : $feature->the_post();
              $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
              $link = get_post_permalink($post->ID);
              echo '<div class="col-md-12 animate-box">';
              echo '<a href="'.$link.'" class="blog-post">';
              echo '<span class="img" style="background-image: url('.$url.');"></span>';
            ?>
					
						
							
							<div class="desc">
								<h3><?php the_title();?></h3>
								<span class="cat"><?php the_time('l ; F j, Y, g:i a');?></span>
							</div>
							<?php
								echo '</a>';
								echo '</div>';
								endwhile;
							?>
						
				</div>
			</div>
		</div>
	</div><!-- END container-wrap -->

<?php
get_footer();

?>