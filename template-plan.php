<?php
/**
 * Template Name: plan page
 * Description: A Page Template that display plan items.
 *
 * 
 */
?>
<?php get_header();?>
<div class="container">      
    
	


<h2 class="title-h2">Plan</h2>

	

            <?php
     $wp_query=new wp_query(array(
     'post_type'      => 'post',
     'category_name' => 'plan',
     'orderby'        => 'ID',
     'order'        => 'DESC'
     
     ));
   ?>
   
   <?php while($wp_query->have_posts()):$wp_query->the_post();?>

    
<div class="cp_block03">
		
		<div class="wrap after">
			<div class="image">
				<?php the_post_thumbnail('post-thumbnails',array('class'=>'image_block_right', 'width'>'283' ));?>
				<p> <span><?php the_title();?></span></p>
			</div>			
			<div class="para"><?php the_content();?>
			</div>
		</div>
		
		
	</div>



   <?php endwhile ?>    



</div>

<?php get_footer();?>