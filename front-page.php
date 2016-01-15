<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT Spiritedlite
 */

get_header(); 
?>
<?php if ( is_front_page() && ! is_home() ) { ?>  

<section id="wrapone">
  <div class="container">
    <div class="services-wrap">
      <?php
        /* Home Four Boxes */
        for($bx=1; $bx<4; $bx++) { ?>
      <?php if( get_theme_mod('page-setting'.$bx)) { ?>
      <?php $bxquery = new WP_query('page_id='.get_theme_mod('page-setting'.$bx,true)); ?>
      <?php while( $bxquery->have_posts() ) : $bxquery->the_post(); ?>
      <div class="bx-about-box boxcolor<?php echo esc_attr($bx);?>">
        <div class="box-icon">
          <?php the_post_thumbnail(); ?>
        </div>
        <div class="boxheading">
          <?php the_title(); ?>
        </div>
        <p><span class="botborder"></span></p>
        <div class="box-content">
          <p><?php echo wp_kses_post(spiritedlite_content(35)); ?></p>
          <div class="clear"></div>
          <p><a href="<?php the_permalink(); ?>" class="simple-btn-small" style="color:#fff">
            <?php esc_attr_e('Read More', 'spirited-lite');?>
            </a> </p>
          <div class="clear"></div>
        </div>
      </div>
      
      <!-- feature-box -->
      <?php if($bx%3==0) { ?>
      <div class="clear"></div>
      <?php } ?>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      <?php } else { ?>
      <div class="bx-about-box boxcolor<?php echo esc_attr($bx);?>">
        <div class="box-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/icon<?php echo esc_attr($bx); ?>.png"></div>
        <div class="boxheading">
          <?php esc_attr_e('Page Title ','spirited-lite'); echo esc_attr($bx); ?>
        </div>
        <p><span class="botborder"></span> </p>
        <div class="box-content">
          <p>
            <?php esc_attr_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pulvinar sed leo ac imperdiet. Duis id puat, accumsan leo eu, tempus felis. Morbi orci libero, eletum aliquam suscipit id, ultricies nec nunc. Aenean finib pllenque ante, in rutrum massa pulvinar et. Quisque porta placerat dui nec auctor','spirited-lite');?>
          </p>
          <div class="clear"></div>
          <p><a href="<?php echo esc_url('#');?>" class="simple-btn-small" style="color:#fff">
            <?php esc_attr_e('Read More', 'spirited-lite');?>
            </a> </p>
          <div class="clear"></div>
        </div>
      </div>
      <!-- feature-box -->
      <?php if($bx%3==0) { ?>
      <div class="clear"></div>
      <?php
            }  
            } 
            }
        /* Home Four Boxes */	
        ?>
    </div>
    <!-- services-wrap-->
    <div class="clear"></div>
  </div>  <!-- container --> 
</section>


<div class="container">
  <section id="wrapsecond">
    <?php 
if( get_theme_mod('wedopage-setting')) { 
$queryvarwedo = new WP_query('page_id='.get_theme_mod('wedopage-setting' ,true)); 
while( $queryvarwedo->have_posts() ) : $queryvarwedo->the_post();
?>
    <h2 class="section_title">
      <?php the_title(); ?>
    </h2>
    <div class="sectiondesc">
      <?php the_content(); ?>
    </div>
    <?php endwhile; } else { ?>
    <h2 class="section_title"><?php esc_attr_e('What We Do', 'spirited-lite');?></h2>
    <div class="sectiondesc"><?php esc_attr_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in fermentum justo. Nullam dui ipsum, consequat a ligula eget, consequat faucibus nunc. Phasellus quis mattis ante. Maecenas vel quam commodo eros feugiat gravida. Fusce id nulla malesuada, luctus nulla non, mollis quam. Integer ornare ultrices condimentum. Aenean laoreet faucibus varius. Etiam blandit ultricies vestibulum.', 'spirited-lite');?></div>
    <?php
  }
?>
  </section>
  <div class="clear"></div>
<section id="whatwedo">  
<?php
for($tbx=1; $tbx<4; $tbx++) { ?>
<?php if( get_theme_mod('box-setting'.$tbx)) { ?>
<?php $threeboxquery = new WP_query('page_id='.get_theme_mod('box-setting'.$tbx,true)); ?>
<?php while( $threeboxquery->have_posts() ) : $threeboxquery->the_post(); ?>
<div class="wedobox <?php if($tbx%3==0){ ?>lastbox<?php } ?>">
  <div class="boxicon">
    <?php the_post_thumbnail(); ?>
  </div>
  <div class="boxtitle">
    <?php the_title(); ?>
  </div>
  <div class="boxdescription"><?php echo wp_kses_post(spiritedlite_content(35)); ?></div>
  <p><a class="btn-small" href="<?php the_permalink(); ?>">
    <?php esc_attr_e('Read More', 'spirited-lite');?>
    </a></p>
</div>

<!-- feature-box -->
<?php if($tbx%3==0) { ?>
<div class="clear"></div>
<?php } ?>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php } else { ?>
<div class="wedobox <?php if($tbx%3==0){ ?>lastbox<?php } ?>">
  <div class="boxicon"><img src="<?php echo get_template_directory_uri(); ?>/images/wedo<?php echo esc_attr($tbx); ?>.png" /></div>
  <div class="boxtitle">
    <?php esc_attr_e('Web Box','spirited-lite'); ?>
  </div>
  <div class="boxdescription">
    <?php esc_attr_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur porta, dui a fermentum commodo, felis magna scelerisque urna, nec luctus dolor ipsum sit amet neque. Duis ut sem volutpat, finibus odio euismod, facilisis odio.','spirited-lite');?>
  </div>
  <p><a class="btn-small" href="<?php echo esc_url('#');?>">
    <?php esc_attr_e('Read More', 'spirited-lite');?>
    </a></p>
</div>
<!-- feature-box -->
<?php if($tbx%3==0) { ?>
<div class="clear"></div>
<?php 
}  
} 
}

?>
</section>
</div>

<?php } ?>

<div class="container">
     <div class="page_content">
        <section class="site-main">
        	 <div class="blog-post">
					<?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                    
                        endwhile;
                        // Previous/next post navigation.
                        spiritedlite_pagination();
                    
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    
                    endif;
                    ?>
                    </div><!-- blog-post -->
             </section>
      
        <?php get_sidebar();?>     
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- content -->
<?php get_footer(); ?>