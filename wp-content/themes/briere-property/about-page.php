<?php 
    /**
    * Template Name: About Page
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
    
    <section class="content-section">
        <div class="container">
            <div class="row">
                <div id="cs-1" class="col-12 hide-start">
                    <h2><?php echo get_field('intro_title'); ?></h2>
                </div>
            </div>
        </div>

        <div class="content-rows">
            <div class="csr">
                <div class="container">
                    <div id="csr-1" class="row hide-start">
                        <div class="col-12 col-md-6 csri">
                            <img src="<?php echo get_field('intro_image'); ?>" class="img-fluid" />
                        </div>
                        <div class="col-12 col-md-6 csrc">
                            <div class="inner">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    
    <section class="team-members">
        <div class="container">
            <div class="row">
            <?php if(have_rows('team_members')) 
            { 
                $teamcount = 1;
                while (have_rows('team_members')) 
                { 
                    the_row(); 
                    ?>
                <div class="col-12 col-md-6">
                    <div class="team-member">
                        <div class="image"><img src="<?php echo get_sub_field('image'); ?>" class="img-fluid" /></div>
                        <div class="member-details">
                            <div class="inner">
                                <h3><?php echo get_sub_field('name'); ?></h3>
                                <h4><?php echo get_sub_field('title'); ?></h4>
                                <a href="mailto:<?php echo get_sub_field('email'); ?>"><?php echo get_sub_field('email'); ?></a><br />
                                <div class="team-btn" @click="showTeamMember(<?php echo $teamcount; ?>)">Read Full Bio</div>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php
                    $teamcount++;
                }
            }
            ?>
            </div>
        </div>

        <div class="team-modal" v-bind:class="[ modalOpen === 1 ? 'active' : '' ]">
            <div class="site-m">
                <div class="close" @click="closeModal()"><img src="<?php print IMAGES; ?>/close-btn.png" class="img-fluid" /></div>
                <div class="site-m-content">
                <?php if(have_rows('team_members')) 
                { 
                    $teamcount = 1;
                    while (have_rows('team_members')) 
                    { 
                        the_row(); 
                        ?>
                    <div class="site-m-member" v-bind:class="[ activeTeamMember === <?php echo $teamcount; ?> ? 'active' : '' ]">
                        <h3><?php echo get_sub_field('name'); ?></h3>
                        <h4><?php echo get_sub_field('title'); ?></h4>
                        <a href="mailto:<?php echo get_sub_field('email'); ?>"><?php echo get_sub_field('email'); ?></a>

                        <div class="photo-facts">
                            <div class="image"><img src="<?php echo get_sub_field('image'); ?>" class="img-fluid" /></div>
                            <div class="facts">
                                <h4 class="sub-title">Interesting Facts</h4>
                                <?php echo get_sub_field('interesting_facts'); ?>
                            </div>
                        </div>

                        <div class="bio">
                            <h4 class="sub-title">Bio</h4>
                            <?php echo get_sub_field('bio'); ?>
                        </div>
                    </div>
                        <?php
                        $teamcount++;
                    }
                }
                ?>
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