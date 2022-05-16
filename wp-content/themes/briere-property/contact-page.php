<?php 
    /**
    * Template Name: Contact Page
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
    
    <div class="page-content contact-intro">            
        <div id="pc1" class="hide-start">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <section class="contact-maintenance">
        <div id="pc2" class="hide-start">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="icon-text">
                            <div class="icon"><img src="<?php print IMAGES; ?>/main-icon.png" class="img-fluid" /></div>
                            <div class="content">
                                <h3>Maintenance Request</h3>
                                <a href="#" v-on:click.prevent="showSiteModal('maintenance');">Submit a maintenance Request</a>
                            </div>
                        </div>
                        <p>*For maintenance emergencies please call your assigned property manager</p>
                    </div>
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