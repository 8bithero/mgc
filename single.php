<?php get_header();?>
        <section id="content">
          <section class="vbox bg-white">
            <section class="scrollable">
              <div id="gallery" class="gallery">
                  <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <div id="vimeo_wrapper">
                      <?php echo vimeo(); ?>
                    </div>
                      <div class="col-lg-12">
                        <h1><?php the_title();?></h1>
                        <span>Views <?php echo getPostViews(get_the_ID()); ?></span>

                        <div class="col-lg-8">
                          <?php 
                            if ( comments_open() || get_comments_number() ) {
                            comments_template();
                            }
                          ?>
                        </div>
                      </div>
                      <?php setPostViews(get_the_ID()); ?>
                    <?php endwhile; ?>
                  <?php endif; ?>
              </div>
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
        <aside class="bg-light lter b-l aside-md hide" id="notes">
          <div class="wrapper">Notification</div>
        </aside>
      </section>
    </section>
  </section>
  <?php wp_footer();?>

</body>
</html>