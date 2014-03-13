                <?php global $bp, $wp;
                $userdata = get_userdata($bp->displayed_user->id);
                 ?>
                <aside class="aside-lg bg-light lter b-r">
                  <section class="vbox">
                    <section class="scrollable">
                      <div class="wrapper user-profile">
                        <div class="clearfix m-b">
                          <div class="pull-left thumb m-r">
                            <img src="<?php bp_displayed_user_avatar( 'html=false&type=full' );?>" class="img-circle">
                            <?php  if($bp->displayed_user->id === $bp->loggedin_user->id){ ?>
                             	<a class="pull-right" href="<?php echo get_bloginfo('url') . '/members/' .bp_get_displayed_user_username(); ?>/profile/edit" title="edit profile"><span class="badge badge-md up bg-danger m-l-n-sm"><i class="fa fa-pencil"></i></span></a>
                            <?php } ?>
                          </div>
                          <div class="clear">
                            <div class="h5 m-t-xs m-b-xs user-nickname"><?php echo $userdata->nickname;?></div>
                            <?php $city = get_user_meta($userdata->ID, 'user_city', true);
                                  $country = get_user_meta($userdata->ID, 'user_country', true);
                            ?>
                            <small class="text-muted"><i class="fa fa-map-marker"></i> <span class="user-city"><?php echo $city;?></span>, <span class="user-country"><?php echo $country; ?></span></small>
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
                                <span class="m-b-xs h4 block"><?php echo count_user_posts( $userdata->ID ); ?></span>
                                <small class="text-muted">Projects</small>
                              </a>
                            </div>
                          </div>
                        </div>
                        <?php  if($bp->displayed_user->id !== $bp->loggedin_user->id){ ?>
                        <?php bp_member_add_friend_button() ?>
                        <div class="btn-group btn-group-justified m-b">
                          <a class="btn btn-primary btn-rounded follow-wrapper" data-toggle="button">
                            <span class="text follow_button">
                              <i class="fa fa-eye"></i> Follow
                            </span>
                            <span class="text-active">
                              <i class="fa fa-eye-slash"></i> Following
                            </span>
                          </a>
                          <a class="btn btn-dark btn-rounded" data-loading-text="Connecting">
                            <i class="fa fa-comment-o"></i> Chat
                          </a>
                        </div>
                        <div>
                          <?php } ?>
                          <small class="text-uc text-xs text-muted">about me</small>
                          <p>Artist</p>
                          <small class="text-uc text-xs text-muted">info</small>
                          <p class="user-description"> <?php echo $userdata->description;?></p>
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