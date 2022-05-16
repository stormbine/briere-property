            <?php 
            if(!is_page_template('contact-page.php')) { ?>
            <section id="foot1" class="testimonial-section hide-start">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2>What Our Customers are Saying</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <?php
                            $reviews_args = array(
                                'post_type' => 'reviews',
                                'posts_per_page' => -1,
                            );
                            $all_reviews = get_posts($reviews_args);
                            $total_reviews = count($all_reviews);
                            ?>
                            <div id="testContainer" class="testimonial-container" data-total-reviews="<?php echo $total_reviews; ?>">
                                <div class="arrow prev" @click="switchTestimonial('prev')"></div>
                                <div class="arrow next" @click="switchTestimonial('next')"></div>
                                <div class="test-wrap">
                                <?php
                                $review_counter = 0;
                                
                                foreach ($all_reviews as $review) 
                                {  
                                ?>
                                    <div id="rev-<?php echo $review_counter; ?>" class="testimonial" v-bind:class="[ currentReview === <?php echo $review_counter; ?> ? 'active' : '' ]">
                                        <?php echo $review->post_content; ?>
                                        <div class="test-author">- <?php echo $review->post_title; ?></div>
                                    </div>
                                <?php
                                    $review_counter++;
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 test-logos">
                            <a href="https://www.thebestcalgary.com/best-property-management-calgary/#4_Briere_Property_Management" target="_blank"><img src="<?php print IMAGES; ?>/best-in-calgary.jpg" class="img-fluid" /></a>
                            <a href="https://www.google.com/search?aqs=chrome.1.0i355i512j46i175i199i512j69i57j69i61j69i60j69i65.4035j0j7&gs_ssp=eJwFwUEOQDAQAMC4SnzAycXZNna75Ql-0bIaEjSrB7zeTFl1sTNm_XrMvN9QjC081LNhoEEcsV-IRngszhgYbTBOkHid6qCbqDRJrySa3-bwp49yyJl_rrsY_g&ie=UTF-8&oq=Briere%20Property&q=briere%20property%20management&sourceid=chrome#lrd=0x53717059e857ad55:0x64c4b746b18e457f,1,,," target="_blank"><img src="<?php print IMAGES; ?>/google-reviews.jpg" class="img-fluid" /></a>
                        </div>
                    </div>
                </div>
            </section>
            <?php } ?>
            
            <?php 
            $quoteInfo = get_field('quote_section', 8); 
            if($quoteInfo)
            {
                ?>
            <section id="foot2" class="quote-cta hide-start">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8 offset-lg-2 text-center">
                            <h2><?php echo $quoteInfo['title']; ?></h2>
                        </div>
                    </div>
                    <div class="row quote-cols">
                    <?php 
                    if($quoteInfo['columns']) 
                    {
                        foreach($quoteInfo['columns'] as $col)
                        {
                            ?>
                        <div class="col-12 col-md-4">
                            <div class="quote-col">
                                <div class="icon"><img src="<?php echo $col['icon']; ?>" class="img-fluid" /></div>
                                <?php echo $col['content']; ?>
                                <div class="btn-area">
                                    <a <?php if($col['is_lightbox']) { ?>href="#" v-on:click.prevent="showSiteModal('<?php echo $col['button_link']; ?>');" <?php } else { ?>href="<?php echo $col['button_link']; ?>"<?php } ?>  class="btn"><?php echo $col['button_text']; ?></a>
                                </div>
                            </div>
                        </div>
                            <?php
                        }
                    }
                    ?>
                    </div>
                </div>
            </section>
                <?php
            }
            ?>

            <section id="foot3" class="instagram-section hide-start">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 text-center">
                            <h2>Follow Us <img src="<?php print IMAGES; ?>/instagram-icon.png" /></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <img src="<?php print IMAGES; ?>/insta-placeholder.jpg" style="width: 100%;" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 text-center">
                            <a href="https://www.instagram.com/brierepm/" class="btn" target="_blank">Follow Us</a>
                        </div>
                    </div>
            </section>
            
            <div class="site-modals" v-bind:class="[ siteModalOpen === 1 || modalOpen === 1  ? 'active' : '' ]">
                <div class="overlay" v-bind:class="[ siteModalOpen === 1 || modalOpen === 1 ? 'active' : '' ]"></div>
                <div class="site-m" v-bind:class="[ siteModalType === 'maintenance' ? 'active' : '' ]">
                    <div class="close" @click="closeSiteModal()"><img src="<?php print IMAGES; ?>/close-btn.png" class="img-fluid" /></div>
                    <div class="site-m-content">
                        <h3><img src="<?php print IMAGES; ?>/main-icon.png" class="img-fluid" /> Maintenance Request</h3>
                        <p>*For maintenance emergencies please call your assigned property manager</p>

                        <div class="site-m-form">
                            <?php echo do_shortcode('[contact-form-7 id="128"]'); ?>
                        </div>
                    </div>
                </div>
                <div class="site-m" v-bind:class="[ siteModalType === 'download' ? 'active' : '' ]">
                    <div class="close" @click="closeSiteModal()"><img src="<?php print IMAGES; ?>/close-btn.png" class="img-fluid" /></div>
                    <div class="site-m-content">
                        <h3>Sign up and download our Information Package to learn more about our rates</h3>

                        <div class="site-m-form">
                            <?php echo do_shortcode('[contact-form-7 id="129"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-3">
                            <a href="<?php echo site_url(); ?>" class="main-logo"><img src="<?php print IMAGES; ?>/briere-logo.png" class="img-fluid" /></a>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4">
                            <h4>CONTACT INFORMATION</h4>
                            <p>
                                Briere Property Management<br />
                                Direct: <a href="tel:4034650404">403-465-0404</a><br />
                                Email: <a href="mailto:david@brierepm.com">david@brierepm.com</a>
                            </p>
                        </div>
                        <div class="col-12 col-md-4 col-lg-3">
                            <h4>ADDRESS</h4>
                            <p>
                                #250 - 30 Springborough Blvd SW<br />
                                Calgary, AB, <br />
                                T3H 0N9
                            </p>
                        </div>
                        <div class="col-12 col-lg-2">
                            <div class="social-icons">
                                <a href="https://www.facebook.com/propertymanagerDB/" target="_blank" class="facebook">Facebook</a>
                                <a href="https://www.houzz.com/professionals/real-estate-agents/briere-property-management-by-unison-realty-group-pfvwus-pf~1705225733?" target="_blank" class="houzz">Houzz</a>
                                <a href="https://www.linkedin.com/company/briere-property-management/about/" target="_blank" class="linkedin">Linkedin</a>
                                <a href="https://www.instagram.com/brierepm/" target="_blank" class="instagram">Instagram</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-9 offset-lg-3">
                            <p class="copy-message">
                                Briere Property Management Inc. is a subsidiary of the Century 21 Elevate Real Estate Brokerage.
                            </p>
                        </div>
                    </div>
                </div>
            </footer> 
        
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

        <script src="<?php print JSCRIPTS; ?>/bootstrap.bundle.min.js"></script>
        <script src="<?php print JSCRIPTS; ?>/jquery.waypoints.min.js"></script>
        
        <script src="<?php print JSCRIPTS; ?>/vue.js"></script>
        <script src="<?php print JSCRIPTS; ?>/vue-scrollto.js"></script>

        <script src="<?php print JSCRIPTS; ?>/main.js"></script>
        <script src="<?php print JSCRIPTS; ?>/main-vue.js"></script>

        <?php wp_footer(); ?>
    </body>
</html>