	 <?php global $userdata, $bp, $wp; ?>
  <?php get_header();?>
        <!-- .aside -->
        <?php include('navigation.php');?>
        <!-- /.aside -->
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
                        <li class="active"><a href="#account" data-toggle="tab">Account</a></li>
                        <li class=""><a href="#social" data-toggle="tab">Social</a></li>
                        <li class=""><a href="#interaction" data-toggle="tab">Interaction</a></li>
                      </ul>
                    </header>
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="account">
                          <h4><?php _e( 'Change Avatar', 'buddypress' ) ?></h4>

							<?php do_action( 'bp_before_profile_avatar_upload_content' ) ?>

							<?php if ( !(int)bp_get_option( 'bp-disable-avatar-uploads' ) ) : ?>

								<p><?php _e( 'Your avatar will be used on your profile and throughout the site. If there is a <a href="http://gravatar.com">Gravatar</a> associated with your account email we will use that, or you can upload an image from your computer.', 'buddypress') ?></p>

								<form action="" method="post" id="avatar-upload-form" enctype="multipart/form-data">

									<?php if ( 'upload-image' == bp_get_avatar_admin_step() ) : ?>

										<p><?php _e( 'Click below to select a JPG, GIF or PNG format photo from your computer and then click \'Upload Image\' to proceed.', 'buddypress' ) ?></p>

										<p id="avatar-upload">
											<input type="file" name="file" id="file" />
											<input type="submit" name="upload" id="upload" value="<?php _e( 'Upload Image', 'buddypress' ) ?>" />
											<input type="hidden" name="action" id="action" value="bp_avatar_upload" />
										</p>

										<?php if ( bp_get_user_has_avatar() ) : ?>
											<p><?php _e( "If you'd like to delete your current avatar but not upload a new one, please use the delete avatar button.", 'buddypress' ) ?></p>
											<p><a class="button edit" href="<?php bp_avatar_delete_link() ?>" title="<?php _e( 'Delete Avatar', 'buddypress' ) ?>"><?php _e( 'Delete My Avatar', 'buddypress' ) ?></a></p>
										<?php endif; ?>

										<?php wp_nonce_field( 'bp_avatar_upload' ) ?>

									<?php endif; ?>

									<?php if ( 'crop-image' == bp_get_avatar_admin_step() ) : ?>

										<h5><?php _e( 'Crop Your New Avatar', 'buddypress' ) ?></h5>

										<img src="<?php bp_avatar_to_crop() ?>" id="avatar-to-crop" class="avatar" alt="<?php _e( 'Avatar to crop', 'buddypress' ) ?>" />

										<div id="avatar-crop-pane">
											<img src="<?php bp_avatar_to_crop() ?>" id="avatar-crop-preview" class="avatar" alt="<?php _e( 'Avatar preview', 'buddypress' ) ?>" />
										</div>

										<input type="submit" name="avatar-crop-submit" id="avatar-crop-submit" value="<?php _e( 'Crop Image', 'buddypress' ) ?>" />

										<input type="hidden" name="image_src" id="image_src" value="<?php bp_avatar_to_crop_src() ?>" />
										<input type="hidden" id="x" name="x" />
										<input type="hidden" id="y" name="y" />
										<input type="hidden" id="w" name="w" />
										<input type="hidden" id="h" name="h" />

										<?php wp_nonce_field( 'bp_avatar_cropstore' ) ?>

									<?php endif; ?>

								</form>

							<?php else : ?>

								<p><?php _e( 'Your avatar will be used on your profile and throughout the site. To change your avatar, please create an account with <a href="http://gravatar.com">Gravatar</a> using the same email address as you used to register with this site.', 'buddypress' ) ?></p>

							<?php endif; ?>

							<?php do_action( 'bp_after_profile_avatar_upload_content' ) ?>
                        </div>
                        <div class="tab-pane" id="social">
                          <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
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
                          <ul>
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
<?php wp_footer()
