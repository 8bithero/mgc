	<?php include('header.php');?>
        <!-- .aside -->
        <?php include('navigation.php');?>
        <!-- /.aside -->
        <section id="content">
          <section class="vbox bg-white">
            <header class="header b-b b-light">
              <p>Projects - <?php echo $userdata->first_name;?> <?php echo $userdata->last_name;?></p>
            </header>
            <section class="scrollable">
              <div id="gallery" class="gallery hide">
              	<?php
              	$the_query = new WP_Query(array( 'posts_per_page' => -1, 'post_status' => 'any'));	
              	 if ( $the_query->have_posts() ) :
              	 
              	 	while ($the_query->have_posts() ) : $the_query->the_post();
              		$caption = get_the_content();
              		$caption = shorten_string($caption, 5);
              	 ?>

                <div class="item">
                  <?php the_post_thumbnail('full');?>
                  <a href="<?php bloginfo('url')?>/backboard/?page=edit&id=<?php the_ID();?>"></a>                  
                  <div class="desc">
                      <h4><?php the_title();?></h4>
                      <p><?php echo $caption;?></p>
                      <?php
                      	$status = get_post_status();
                       if($status == 'draft'){
	                      echo '<div class="overview_status label bg-warning">Draft</div>';
                       } else if($status == 'trash'){
                       	echo '<div class="overview_status label bg-danger">trash</div>';
                       } ?>
                      <span> <?php the_time( get_option( 'date_format' ) ); ?></span>
                  </div>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php else:  ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
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
  <script src="<?php echo get_template_directory_uri(); ?>/backboard/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo get_template_directory_uri(); ?>/backboard/js/bootstrap.js"></script>
  <!-- App -->
  <script src="<?php echo get_template_directory_uri(); ?>/backboard/js/app.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/backboard/js/app.plugin.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/backboard/js/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/backboard/js/libs/underscore-min.js" cache="false"></script>
<script src="<?php echo get_template_directory_uri(); ?>/backboard/js/prettyphoto/jquery.prettyPhoto.js" cache="false"></script>  
<script src="<?php echo get_template_directory_uri(); ?>/backboard/js/grid/jquery.grid-a-licious.min.js" cache="false"></script>
<script src="<?php echo get_template_directory_uri(); ?>/backboard/js/grid/gallery.js" cache="false"></script>

</body>
</html>