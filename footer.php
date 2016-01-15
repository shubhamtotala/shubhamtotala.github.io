<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package SKT Spiritedlite
 */
?>
<div id="footer-wrapper">
    	<div class="container">
             <div class="cols-4 widget-column-1">   
             <?php if ( '' !== get_theme_mod( 'about_title' ) ){  ?>
             <h5><?php echo esc_attr_e( get_theme_mod( 'about_title', __('About Spirited','spirited-lite'))); ?></h5>
             <?php } ?>
             
             <?php if ( '' !== get_theme_mod( 'about_description' ) ){  ?>
             <div class="footerdesc">
			 <?php echo esc_attr_e( get_theme_mod( 'about_description', __('Sed suscipit mauris nec mauris vulputate, a posuere libero congue. Nam laoreet elit eu erat pulvinar, et efficitur nibh euismod.Nam metus lorem, hendrerit quis ante eget, lobortis elementum neque. Aliquam in ullamcorper quam. Integer euismod ligula in mauris vehic.','spirited-lite')));
			  ?>
              </div>
              <?php } ?>
              
                <div class="clear"></div>
                <?php if( '' !== get_theme_mod('contact_add')){?>
                <div class="footeradrs"><i class="fa fa-map-marker fa-2x"></i><span><?php echo esc_attr( get_theme_mod('contact_add', 'Spirited 532, Premium Plaza, New York, NY 1203', 'spirited-lite' )); ?></span></div>
                <?php } ?>
                <?php if( '' !== get_theme_mod('contact_no')){ ?>
               <div class="footeradrs"><i class="fa fa-phone fa-2x"></i><span><?php echo esc_attr( get_theme_mod('contact_no', '+1 800 234 568', 'spirited-lite' )); ?></span></div>
                <?php } ?>              

              </div>                  
               <div class="cols-4 widget-column-2">
                 <?php if ( '' !== get_theme_mod( 'recent_title' ) ){  ?>
             		<h5><?php echo esc_attr_e( get_theme_mod( 'recent_title', __('Recent Posts','spirited-lite'))); ?></h5>
            	 <?php } ?>
                              	
					<?php $args = array( 'posts_per_page' => 2, 'post__not_in' => get_option('sticky_posts'), 'orderby' => 'date', 'order' => 'desc' );
					$the_query = new WP_Query( $args );
					?>
                    <?php while ( $the_query->have_posts() ) :  $the_query->the_post(); ?>
                        <div class="recent-post">
                         <a href="<?php the_permalink(); ?>"><h6><?php the_title(); ?></h6></a>  
                        </div>
                    <?php endwhile; ?>
                </div>
                
                <div class="cols-4 widget-column-3">                   
                   <?php if ( '' !== get_theme_mod( 'social_title' ) ){  ?>
             		<h5><?php echo esc_attr_e( get_theme_mod( 'social_title', __('Get Some Social','spirited-lite'))); ?></h5>
            	 <?php } ?>
                   
                <div class="somesocial">
					<?php if ( '' !== get_theme_mod( 'fb_link' ) ) { ?>
                    <a title="facebook" class="fa fa-facebook fa-2x" target="_blank" href="<?php echo esc_url(get_theme_mod('fb_link','#facebook')); ?>"></a> 
                    <?php } ?>
                    
                    <?php if ( '' !== get_theme_mod( 'twitt_link' ) ) { ?>
                    <a title="twitter" class="fa fa-twitter fa-2x" target="_blank" href="<?php echo esc_url(get_theme_mod('twitt_link','#twitter')); ?>"></a>
                    <?php } ?> 
                    
                    <?php if ( '' !== get_theme_mod('gplus_link') ) { ?>
                    <a title="google-plus" class="fa fa-google-plus fa-2x" target="_blank" href="<?php echo esc_url(get_theme_mod('gplus_link','#gplus')); ?>"></a>
                    <?php }?>
                    
                    <?php if ( '' !== get_theme_mod('linked_link') ) { ?> 
                    <a title="linkedin" class="fa fa-linkedin fa-2x" target="_blank" href="<?php echo esc_url(get_theme_mod('linked_link','#linkedin')); ?>"></a>
                    <?php } ?>
                </div>     
                </div><!--end .widget-column-4-->
            <div class="clear"></div>
        </div><!--end .container-->
        
        <div class="copyright-wrapper">
        	<div class="container">
                <div class="design-by"><?php printf( esc_html__( 'Theme %1$s %2$s', 'spirited-lite' ), 'By : ', '<a href="'.esc_url(SKT_URL).'">SKT Themes</a>' ); ?></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php wp_footer(); ?>
</body>
</html>