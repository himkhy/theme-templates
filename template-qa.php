<?php
/**
 * Template Name: qa Page
 *
 *
 */
?>
<?php get_header();?>
<div class="container">      
    
	
	<div class="block03">
	    <div class="qa">
	        <h2 class="title-h2">Q &amp; A</h2>
	       

            <?php
     $wp_query=new wp_query(array(
     'post_type'      => 'post',
     'category_name' => 'qa',
     'orderby'        => 'ID',
     'order'        => 'DESC'
     
     ));
   ?>
   
   <?php while($wp_query->have_posts()):$wp_query->the_post();?>


 <dl class="after">
	          <dt>Q</dt>
	            <dd>
	           <?php the_title();?>
	            </dd>
	        </dl>


	        <dl class="after">
	          <dt>A</dt>
	            <dd>
	          <div class="para"><?php the_content();?>
	            </dd>
	        </dl>
	       



   <?php endwhile ?>



	       

	    </div>
	</div>

</div>

<?php get_footer();?>