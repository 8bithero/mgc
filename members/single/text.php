<section id="content">
          <section class="vbox">
            <header class="header bg-white b-b b-light">
              <p><?php echo $userdata->first_name;?>'s profile</p>
            </header>
            <section class="scrollable">
              <section class="hbox stretch">
                <aside class="aside-lg bg-light lter b-r">
                  <section class="vbox">
                    <section class="scrollable">
                      <div class="wrapper">
                        <div class="clearfix m-b">
                          <a href="#" class="pull-left thumb m-r">
                            <div class="img-circle">
                            	<img src="<?php bp_loggedin_user_avatar( 'html=false&type=full' );?>" class="img-circle">
                           </div>
                          </a>
                          <div class="clear">
                            <div class="h3 m-t-xs m-b-xs"><?php echo $userdata->first_name;?>.<?php echo $userdata->last_name;?></div>
                            <small class="text-muted"><i class="fa fa-map-marker"></i> <?php echo $city;?>, <?php echo $country; ?></small>
                          </div>                
                        </div>
                        <div class="panel wrapper panel-success">
                          <div class="row">
                            <div class="col-xs-4">
                              <a href="#">
                                <span class="m-b-xs h4 block">245</span>
                                <small class="text-muted">Followers</small>
                              </a>
                            </div>
                            <div class="col-xs-4">
                              <a href="#">
                                <span class="m-b-xs h4 block">55</span>
                                <small class="text-muted">Following</small>
                              </a>
                            </div>
                            <div class="col-xs-4">
                              <a href="#">
                                <span class="m-b-xs h4 block"><?php echo $count_posts->publish;?></span>
                                <small class="text-muted">projects</small>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div>
                          <small class="text-uc text-xs text-muted">about me</small>
                          <p>Artist</p>
                          <small class="text-uc text-xs text-muted">info</small>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat.</p>
                          <div class="line"></div>
                          <small class="text-uc text-xs text-muted">connection</small>
                          <p class="m-t-sm">
                            <a href="#" class="btn btn-rounded btn-twitter btn-icon"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="btn btn-rounded btn-facebook btn-icon"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="btn btn-rounded btn-gplus btn-icon"><i class="fa fa-google-plus"></i></a>
                          </p>
                        </div>
                      </div>
                    </section>
                  </section>
                </aside>
                <aside class="bg-white">
                  <section class="vbox">
                    <header class="header bg-light bg-gradient">
                      <ul class="nav nav-tabs nav-white">
                        <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                        <li class=""><a href="#events" data-toggle="tab">Events</a></li>
                        <li class=""><a href="#interaction" data-toggle="tab">Interaction</a></li>
                      </ul>
                    </header>
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="activity">
                          <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
                           <?php if ( bp_has_activities( bp_ajax_querystring( 'activity' ).'&object=groups,profile,status,blogs' ) ) : ?>
								<?php while ( bp_activities() ) : bp_the_activity(); ?>
							<li class="list-group-item" id="activity-<?php bp_activity_id() ?>">
                              <a href="<?php bp_activity_user_link() ?>" class="thumb-sm pull-left m-r-sm">
                               <?php bp_activity_avatar( 'type=thumb&width='.AVATAR_SIZE.'&height='.AVATAR_SIZE ); ?>
                              </a>
                              <div class="clear">
                                <small class="pull-right"><?php echo bp_core_time_since( bp_get_activity_date_recorded() ); ?></small>
                                <?php
                                	$user_nicename = bp_core_get_user_displayname( $GLOBALS['activities_template']->activity->user_id ); // $user_nicename = $GLOBALS['activities_template']->activity->user_nicename;
                                 ?>
                                <strong class="block"><?php echo $user_nicename; ?></strong>
                                <small class="profile_activity_body"><?php $content = bp_get_activity_content(); echo $content;?></small>
                              </a>
                            </li>
							<?php do_action( 'bp_after_activity_entry' ) ?>
							<?php endwhile; ?>
						<?php endif; ?>
                          </ul>
                        </div>
                        <div class="tab-pane" id="events">
                          <div class="text-center wrapper">
                            <i class="fa fa-spinner fa fa-spin fa fa-large"></i>
                          </div>
                        </div>
                        <div class="tab-pane" id="interaction">
                          <div class="text-center wrapper">
                            <i class="fa fa-spinner fa fa-spin fa fa-large"></i>
                          </div>
                        </div>
                      </div>
                    </section>
                  </section>
                </aside>
                <aside class="col-lg-4 b-l">
                  <section class="vbox">
                    <section class="scrollable">
                      <div class="wrapper">
                        <section class="panel panel-default">
                          <form action="<?php bp_activity_post_form_action(); ?>" method="post" id="whats-new-form" name="whats-new-form" role="complementary">
                          	<?php do_action( 'bp_before_activity_post_form' ); ?>
                            <textarea style="resize:vertical" class="form-control no-border" rows="3" name="whats-new" placeholder="What are you doing..."></textarea>
                            <?php do_action( 'bp_activity_post_form_options' ); ?>
                            <?php wp_nonce_field( 'post_update', '_wpnonce_post_update' ); ?>
                            <?php do_action( 'bp_after_activity_post_form' ); ?>
                          <footer class="panel-footer bg-light lter">
                            <input type="submit" name="aw-whats-new-submit" value="POST" class="btn btn-info pull-right btn-sm">
                            <ul class="nav nav-pills nav-sm">
                              <li><a href="#"><i class="fa fa-camera text-muted"></i></a></li>
                              <li><a href="#"><i class="fa fa-video-camera text-muted"></i></a></li>
                            </ul>
                          </footer>
                          </form>
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
                              <img src="<?php bp_loggedin_user_avatar( 'html=false&type=full' );?>" class="img-circle">
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
    </section>
  </section>
<?php get_footer();?>