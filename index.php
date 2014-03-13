<?php get_header('hbox');?>
    <section id="content" class="home-projects">
      <section class="vbox">
            <section>
              <section class="hbox stretch">
                <section>
                  <section class="vbox">
                    <section class="scrollable wrapper no-padding">
                      <div id="packery" class="gallery packery js-packery project-items">
                          <?php 
                            // The Query
                              $friends = bp_get_friend_ids();
                              $args= array(
                                  'posts_per_page' => -1,
                                  'post_status' => 'any',
                                  'author' => $friends
                                );

                              $the_query = new WP_Query($args);

                              // The Loop
                                while ( $the_query->have_posts() ) {
                                  $the_query->the_post();
                                  $size = get_post_meta(get_the_ID(), 'item_size', true);
                                  $views = getPostViews(get_the_ID());
                                    $classes = array(
                                      'project_item',
                                      $size,
                                      'views-'. $views
                                    );
                                  ?>

                                  <div id="post-<?php the_ID();?>" <?php post_class( $classes);?> data-size="<?php echo getPostViews(get_the_ID()); ?>">
                                    </a>
                                    <figure class="caption">
                                      <?php the_post_thumbnail('full');?>
                                      <a href="<?php the_permalink();?>">
                                      <figcaption>
                                          <h3><?php the_title();?></h3>
                                          <span>By <?php the_author();?></span>
                                          <div id="project-icons">
                                            <i class="fa fa-eye views-project"> <?php echo $views ;?></i>
                                            <i class="fa fa-sun-o thumbs-up"> 12</i>
                                          </div>
                                      </figcaption>
                                      </a>
                                  </figure>             
                                  </div>

                                  <?php
                                }
                          ?>
                        </div>
                    </section>                    
                    <footer class="footer bg-white b-t b-light">
                      <p>This is a footer</p>
                    </footer>
                  </section>
                </section>
                <aside class="bg-light lter b-l aside-md ads">
                  <div class="wrapper">
                    <img src="http://placehold.it/300x225"/>
                    <img src="http://placehold.it/300x225"/>
                  </div>
                </aside>
              </section>              
            </section>
          </section>
      <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
    </section>
  </section>
<?php get_footer('hbox');?>