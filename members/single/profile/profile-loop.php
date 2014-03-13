<?php global $wp, $bp ;?>
<section id="content">
  <section class="vbox">
    <header class="header bg-white b-b b-light">
      <p></p>
    </header>
    <section class="scrollable">
      <section class="hbox stretch">
        <?php locate_template( array( 'members/single/member-header.php' ), true ); ?>
          <aside class="bg-white">
            <section class="vbox">
              <header class="header bg-light bg-gradient">
                <ul class="nav nav-tabs nav-white">
                  <li class="active"><a href="#published" data-toggle="tab">Published</a></li>
                  <li class=""><a href="#drafts" data-toggle="tab">Drafts</a></li>
                  <li class=""><a href="#laboratory" data-toggle="tab">Laboratory</a></li>
                </ul>
              </header>
              <section class="scrollable">
                <div class="tab-content">
                  <div class="tab-pane active" id="published">
                    <section class="scrollable wrapper no-padding">
                    <div id="packery" class="gallery packery">
                      <?php

                      $args = array(
                      'post_type' => 'post',
                      'post_status' => 'publish',
                      'author' => $bp->displayed_user->id,
                      );

                      // The Query
                      $the_query = new WP_Query( $args );

                      // The Loop
                      if ( $the_query->have_posts() ) {
                      while ( $the_query->have_posts() ) { 
                      $the_query->the_post();
                        $classes = array(
                            'project_item',
                            'own_projects'
                        );
                       ?>

                      <div id="post-<?php the_ID();?>" <?php post_class( $classes);?> data-size="<?php echo getPostViews(get_the_ID()); ?>">
                        </a>
                        <figure class="caption">
                          <?php the_post_thumbnail('thumb');?>
                          <?php $link =  get_bloginfo('url') . '/editor/?project=' . get_the_id(); ?>
                          <a href="<?php echo $link; ?>">
                            <figcaption>
                              <h3><?php the_title();?></h3>
                            </figcaption>
                          </a>
                      </figure>             
                      </div>
                      <?php }
                      } else { ?>
                      <li class="list-group-item">
                       <a class="slide_cta white new-project" href="<?php echo get_permalink(107);?>" title="Submit a project">Submit a project</a>
                      </li>
                      <?php }
                      /* Restore original Post Data */
                      wp_reset_postdata();
                      ?>
                    </div>
                  </div>
                  <div class="tab-pane" id="drafts">
                    <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                      <?php

                      $args = array(
                      'post_type' => 'post',
                      'post_status' => 'draft',
                      'author' => $bp->displayed_user->id,
                      );
                      // The Query
                      $the_query = new WP_Query( $args );

                      // The Loop
                      if ( $the_query->have_posts() ) {
                      while ( $the_query->have_posts() ) { 
                      $the_query->the_post(); ?>

                      <li class="list-group-item">
                        <a href="#" class="thumb-sm pull-left m-r-sm">
                          <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_id()) );?>" class="img-circle">
                        </a>
                        <a href="#" class="clear">
                          <small class="pull-right"><?php echo get_post_status();?></small>
                          <strong class="block"><?php the_title();?></strong>
                          <small><?php echo get_post_meta(get_the_ID(), 'synch_videolink', true); ?></small>
                        </a>
                      </li>
                      <?php }
                      } else {
                      // no posts found
                      }
                      /* Restore original Post Data */
                      wp_reset_postdata();
                      ?>
                    <ul>
                  </div>
                  <div class="tab-pane" id="laboratory">
                    <div class="text-center wrapper">
                      Comming soon!<br/>
                      <i class="fa fa-spinner fa fa-spin fa fa-large"></i>
                    </div>
                  </div>
                </div>
              </section>
            </section>
          </aside>
          <aside class="col-lg-3 b-l ads">
            <section class="vbox">
              <section class="scrollable">
                <div class="wrapper">
                  <section class="panel panel-default">
                    <form>
                      <textarea class="form-control no-border" rows="3" placeholder="What are you doing..."></textarea>
                    </form>
                    <footer class="panel-footer bg-light lter">
                      <button class="btn btn-info pull-right btn-sm">POST</button>
                       <ul class="nav nav-pills nav-sm">
                         <li><a href="#"><i class="fa fa-camera text-muted"></i></a></li>
                         <li><a href="#"><i class="fa fa-video-camera text-muted"></i></a></li>
                       </ul>
                    </footer>
                  </section>
                  <section class="panel panel-default">
                    <h4 class="font-thin padder">Latest Tweets</h4>
                    <ul class="list-group">
                      <li class="list-group-item">
                        <p>Wellcome <a href="#" class="text-info">@Drew Wllon</a> and play this web application template, have fun1 </p>
                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 minuts ago</small>
                      </li>
                      <li class="list-group-item">
                        <p>Morbi nec <a href="#" class="text-info">@Jonathan George</a> nunc condimentum ipsum dolor sit amet, consectetur</p>
                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 1 hour ago</small>
                      </li>
                      <li class="list-group-item">                     
                        <p><a href="#" class="text-info">@Josh Long</a> Vestibulum ullamcorper sodales nisi nec adipiscing elit. </p>
                        <small class="block text-muted"><i class="fa fa-clock-o"></i> 2 hours ago</small>
                      </li>
                    </ul>
                  </section>
                  <section class="panel clearfix bg-info lter">
                    <div class="panel-body">
                      <a href="#" class="thumb pull-left m-r">
                        <img src="<?php bp_displayed_user_avatar( 'html=false&type=full' );?>" class="img-circle">
                      </a>
                      <div class="clear">
                        <a href="#" class="text-info">@Mike Mcalidek <i class="fa fa-twitter"></i></a>
                        <small class="block text-muted">2,415 followers / 225 tweets</small>
                        <a href="#" class="btn btn-xs btn-success m-t-xs">Follow</a>
                      </div>
                    </div>
                  </section>
                </div>
              </section>
            </section>              
          </aside>
        </section>
      </section>
    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
  </section>
  <aside class="bg-light lter b-l aside-md hide" id="notes">
  <div class="wrapper">Notification</div>
  </aside>
</section>