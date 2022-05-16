<?php 
    /**
    * Template Name: Services Page
    */ 
    get_header();
?>
	
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
        if(has_post_thumbnail()) { 
            $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
        }
    ?>	

    <div id="pageHero" class="page-hero" style="background-image: url(<?php echo $url; ?>);">
        <div class="hero-content">
            <div class="container">
                <div class="row">
                    <div id="heroContent" class="col-12 col-md-8 offset-md-2 hide-start">
                        <h1><?php echo get_field('hero_copy'); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="services-intro">
        <div class="container">
            <div class="row">
                <div id="servIntro" class="col-12 col-md-8 offset-md-2 hide-start">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="services-overview">
        <div class="container">
            <div class="row">
                <div id="servOverviewIntro" class="col-12 col-md-8 offset-md-2 hide-start">
                    <h2>Overview of Our Services</h2>
                </div>
            </div>
            <div class="row">
            <?php if(have_rows('services')) 
            { 
                $servcount = 0;
                while (have_rows('services')) 
                { 
                    the_row(); 
                    ?>
                <div id="serv-item-<?php echo $servcount; ?>" class="col-12 col-md-6 col-lg-3 hide-start">
                    <div class="serv-item">
                        <div class="icon"><img src="<?php echo get_sub_field('icon'); ?>" class="img-fluid" /></div>
                        <h3><?php echo get_sub_field('content'); ?></h3>
                    </div>
                </div>
                    <?php
                    $servcount++;
                }
            }
            ?>
            </div>
            <div class="row">
                <div id="servbtn" class="col-12 hide-start">
                    <div class="btn-area">
                        <a href="#" class="btn icon-btn"><img src="<?php echo site_url(); ?>/wp-content/uploads/2022/04/inquire-icon.png" class="img-fluid"> Inquire Now</a> 
                        <a href="#" class="btn icon-btn"><img src="<?php echo site_url(); ?>/wp-content/uploads/2022/04/call-icon.png" class="img-fluid"> Schedule a Call</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="services-pricing">
        <div class="container">
            <div class="row">
                <div id="servPrice" class="col-12 hide-start">
                    <?php echo get_field('pricing'); ?>
                </div>
            </div>
        </div>
    </section>
    
    
    <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
<?php 
    get_footer(); 
?>