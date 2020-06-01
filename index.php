<?php
/**
 * The main template file.
 *
 * 
 */
?>


<?php get_header();?>


<div class="container">      
    
    
    <div class="hot_block03 after">
        <h2 class="title-h2">Hot Blog</h2>
        <div class="wrap after">
           


            <?php
     $wp_query=new wp_query(array(
     'post_type'      => 'post',
     'category_name'  =>    'hot-blog',
     'orderby'        => 'ID',
     'order'        => 'DESC',
     'posts_per_page' => 4
     
     ));
   ?>
   
   <?php while($wp_query->have_posts()):$wp_query->the_post();?>
        
<div class="box height" style="height: 568.688px;">
    <?php the_post_thumbnail('post-thumbnails',array('class'=>'image_block_right', 'width'>'283' ));?>
            <a href="<?php the_permalink(); ?>"> 
                <p class="title"><?php the_title();?></p>
            </a>
               
                <?php the_excerpt();?>
            </div>
    


   <?php endwhile ?>    

            
        </div>
        
    </div>
    
    
    <div class="recru_block03 after">
       
        <div class="wrap after">
            <?php 
        $query = new WP_Query( 'pagename=contact' );
            

            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    
    ?>  

     <div class="wrap-contact">
            <h2 class="title-h2"><?php the_title(); ?></h2>
                
                <?php the_content();?>
     </div>
    <?php
            }
        }
        
        /* Restore original Post Data */
        wp_reset_postdata();
    ?>
        </div>
        
    </div>


</div>



<?php get_footer();?>
