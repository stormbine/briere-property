<?php    
	get_header();
?>
	
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
        if(has_post_thumbnail()) { 
            $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
        }
    ?>	

    <div id="homeHero" class="page-hero home-hero" style="background-image: url(<?php echo $url; ?>);">
    <?php 
    $heroInfo = get_field('hero_section'); 
    if($heroInfo)
    {
        ?>
        <div class="hero-content">
            <div class="container">
                <div class="row">
                    <div id="heroContent" class="col-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3 hide-start">
                        <h1><?php echo $heroInfo['main_title']; ?></h1>
                        <h2><?php echo $heroInfo['sub_title']; ?></h2>
                        <?php 
                        if(count($heroInfo['buttons']) > 0) 
                        { 
                            ?>
                        <div class="btn-area">
                            <?php
                            foreach($heroInfo['buttons'] as $heroBtn) 
                            {
                            ?>
                        
                            <a href="<?php echo $heroBtn['link']; ?>" class="btn icon-btn">
                                <img src="<?php echo $heroBtn['icon']; ?>" class="img-fluid" /> <?php echo $heroBtn['text']; ?>
                            </a>
                        
                            <?php
                            } 
                            ?>
                        </div>
                            <?php
                        } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    </div>

    <section class="content-section">
        <div class="container">
            <div class="row">
                <div id="cs-1" class="col-12 hide-start">
                    <h2><?php echo get_field('content_sections_title'); ?></h2>
                </div>
            </div>
        </div>

        <div class="content-rows">
        <?php if(have_rows('content_sections')) 
        { 
            $seccount = 0;
            while (have_rows('content_sections')) 
            { 
                the_row(); 
                ?>
            <div class="csr <?php if(get_sub_field('style') == 'grey') { echo "grey"; } ?>">
                <div class="container">
                    <div id="csr-<?php echo $seccount; ?>" class="row hide-start">
                        <div class="col-12 col-md-6 csri <?php if(get_sub_field('style') == 'imgr' || get_sub_field('style') == 'grey') { echo "order-md-2"; } ?>">
                            <img src="<?php echo get_sub_field('image'); ?>" class="img-fluid" />
                        </div>
                        <div class="col-12 col-md-6 csrc <?php if(get_sub_field('style') == 'imgr' || get_sub_field('style') == 'grey') { echo "order-md-1"; } ?>">
                            <div class="inner">
                                <?php echo get_sub_field('content'); ?>
                                <div class="btn-area">
                                    <a href="<?php echo get_sub_field('link_url'); ?>" class="csr-btn"><?php echo get_sub_field('link_text'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <?php
                    $seccount++;
                }
            }
            ?>
        </div>
    </section>


    <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
<?php 
    get_footer(); 
?>