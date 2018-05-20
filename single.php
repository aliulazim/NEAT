<?php
get_header();

?>

<div class="container-wrap">
		<aside id="fh5co-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(<?php header_image(); ?>);">
			   		<div class="overlay-gradient"></div>
		   			<div class="row">
			   			<div class="col-md-6 col-md-offset-3 slider-text slider-text-bg">
			   				<div class="slider-text-inner text-center">
			   					<h1>Stock Products</h1>
									<h2>Free html5 templates Made by <a href="http://freehtml5.co/" target="_blank">freehtml5.co</a></h2>
			   				</div>
			   			</div>
			   		</div>
			   	</li>		   	
			  	</ul>
		  	</div>
		</aside>		
		<div id="fh5co-work">
		<?php 
						
					while(have_posts()) : the_post() ;	
					setPostViews(get_the_ID());
					/*if ( get_post_gallery() ) :
                $gallery = get_post_gallery( get_the_ID(), false );
            	foreach( $gallery['src'] AS $src )
                {*/
					?>
			<div class="row">
				<div class="col-md-8">
				<?php
$gallery = get_children( 'posts_per_page=-1&post_type=attachment&post_mime_type=image&post_parent=' . $post->ID );
$attr = array(
    'class' => "attachment-$size wp-post-image",
);
if($gallery){


foreach( $gallery as $image ) {
	echo '<a class ="image-popup img-portfolio-detail" href="' . wp_get_attachment_url($image->ID) . '" rel="gallery-' . get_the_ID() . '">';
     
     echo '<img src="'.wp_get_attachment_url($image->ID).'" alt="" class="img-responsive">';
     echo '</a>';
 }
}
else{
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	echo '<a class ="image-popup img-portfolio-detail" href="' . $url . '" rel="gallery-' . get_the_ID() . '">';
     
     echo '<img src="'.$url.'" alt="" class="img-responsive">';
     echo '</a>';
}
	?>
					
				</div>
				<?php/*
                }
            endif;*/
            ?>
				<div class="col-md-4 fh5co-project-detail">
					<h2 class="fh5co-project-title"><?php the_title();?></h2>
					<span class="fh5co-project-sub"><?php the_time('l ; F j, Y, g:i a');?></span>
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