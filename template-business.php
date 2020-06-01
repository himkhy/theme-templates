<?php
/**
 * Template Name: business page
 * Description: A Page Template that display business items.
 *
 * 
 */
?>
<?php get_header();?>
<div class="container">      
    



<div class="ownership">
		<h2 class="title-h2">Ownership</h2>
		<div class="wrap after">
			<div class="box">
				
				<?php 
 //Display Widgets
 dynamic_sidebar( 'custom-header-widget' );
?>
		



<?php 
//Display Metabox
$wp_all_query = new WP_Query(array(
	'post_type'=>'post', 
	'post_status'=>'publish',
	'category_name'=>'business',
	'order'=>'ASC'));
 ?>
 
<?php if($wp_all_query->have_posts()):?>                
<?php while($wp_all_query->have_posts()):$wp_all_query->the_post()?>
<?php
   $wp_stored_meta = get_post_meta( $post->ID );
   $position=$wp_stored_meta['position'][0];
?>
<?php    if($position==1 || $position==""){ ?>

  


				<div class="box_inn after">
					<div class="right">
						<?php the_post_thumbnail('thum-bread', array('class' => 'img-responsive')); ?>
						<p class="title">
							<?php the_title();?>
						</p>
						<p><?php the_content();?>
						</p>
					</div>
				</div>



<?php
}else{
?>


			<div class="box_inn after">
					<div class="left">
						<?php the_post_thumbnail('thum-bread', 
   								array('class' => 'img-responsive')); ?>
						<p class="title">
							<?php the_title();?>
						</p>
						<p>
							<?php the_content();?>  
						</p>
					</div>
				</div>


<?php
}
?>                    
<?php endwhile?>
<?php endif;?>










			</div>

			
		</div>
	</div>
</div>
<?php get_footer();?>