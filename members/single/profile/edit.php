	 <?php global $userdata, $bp, $wp; ?>
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
                          <form class="form-horizontal" data-validate="parsley">
                            <section class="panel panel-default">
                              <div class="panel-body">
                               <div class="form-group">
                                  <label class="col-sm-3 control-label">Username</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" name="edit-username" data-required="true" placeholder="<?php echo $userdata->user_login;?>" value="<?php echo $userdata->user_login;?>" disabled>
                                    <span class="help-block m-b-none">Username can not be changed</span>    
                                  </div>
                                </div>
                                <div class="line line-dashed line-lg pull-in"></div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Nickname</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="edit-nickname" class="form-control" data-required="true" placeholder="<?php echo $userdata->nickname;?>" value="<?php echo $userdata->nickname;?>">
                                  </div>
                                </div>
                                <div class="line line-dashed line-lg pull-in"></div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Email</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="edit-email" class="form-control" data-type="email" data-required="true" placeholder="<?php echo $userdata->user_email;?>" value="<?php echo $userdata->user_email;?>">    
                                  </div>
                                </div>
                                <div class="line line-dashed line-lg pull-in"></div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Info</label>
                                  <div class="col-sm-9">
                                    <div id="editor" class="form-control project-editor info-profile" style="overflow:scroll;height:150px;max-height:150px">
                                       <?php 
                                        $str = preg_replace( '/\s+/', ' ', $userdata->description );;
                                        echo $str;?>
                                    </div>
                                    <span class="help-block m-b-none char-wrapper"><span id="char-count">200</span> Characters remaning <span><i class="fa fa-warning more-char"/></i></span>
                                    <textarea id="project-content" name="edit-info"></textarea>
                                  </div>
                                </div>
                                <div class="line line-dashed line-lg pull-in"></div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Country</label>
                                  <div class="col-sm-9">
                                    <select id="edit-country" name="edit-country">
                                        <?php
                                        //adding <option>countries 
                                         include 'countries.php' ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">City</label>
                                  <div class="col-sm-9">
                                    <input type="text" class="form-control" name="edit-city" data-required="true" placeholder="Enter your city" value="<?php echo get_user_meta($userdata->ID, 'user_city', true ); ?>">  
                                  </div>
                                </div>
                                <div class="line line-dashed line-lg pull-in"></div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Password</label>
                                  <div class="col-sm-9">
                                    <input type="password" name="edit-pass1" class="form-control" >
                                    <span class="help-block m-b-none password-warning"><span>Password requires a minimal of 6 characters <span><i class="fa fa-warning "/></i></span>
                                  </div>
                                </div>
                                <div class="line line-dashed line-lg pull-in"></div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Repeat Password</label>
                                  <div class="col-sm-9">
                                    <input type="password" name="edit-pass2" class="form-control" >
                                    <span class="help-block m-b-none equal-warning"><span>Passwords do not match! <span><i class="fa fa-warning "/></i></span>
                                  </div>
                                </div>
                              </div>
                              <footer class="panel-footer text-right bg-light lter">
                                <button id="save-profile-changes" type="submit" class="btn btn-success btn-s-xs">Save change to profile</button>
                              </footer>
                            </section>
                          </form>
                        </div>
                        <div class="tab-pane" id="social">
                          <ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border">
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
<!-- fuelux -->
<script src="<?php echo get_template_directory_uri();?>/js/fuelux/fuelux.js" cache="false"></script>
<!-- datepicker -->
<script src="<?php echo get_template_directory_uri();?>/js/datepicker/bootstrap-datepicker.js" cache="false"></script>
<!-- slider -->
<script src="<?php echo get_template_directory_uri();?>/js/slider/bootstrap-slider.js" cache="false"></script>
<!-- file input -->  
<script src="<?php echo get_template_directory_uri();?>/js/file-input/bootstrap-filestyle.min.js" cache="false"></script>
<!-- combodate -->
<script src="<?php echo get_template_directory_uri();?>/js/libs/moment.min.js" cache="false"></script>
<script src="<?php echo get_template_directory_uri();?>/js/combodate/combodate.js" cache="false"></script>
<!-- select2 -->
<script src="<?php echo get_template_directory_uri();?>/js/select2/select2.min.js" cache="false"></script>
<!-- wysiwyg -->
<script src="<?php echo get_template_directory_uri();?>/js/wysiwyg/jquery.hotkeys.js" cache="false"></script>
<script src="<?php echo get_template_directory_uri();?>/js/wysiwyg/bootstrap-wysiwyg.js" cache="false"></script>
<script src="<?php echo get_template_directory_uri();?>/js/wysiwyg/demo.js" cache="false"></script>
<!-- markdown -->
<script src="<?php echo get_template_directory_uri();?>/js/markdown/epiceditor.min.js" cache="false"></script>
<script src="<?php echo get_template_directory_uri();?>/js/markdown/demo.js" cache="false"></script>
<?php wp_footer();?>
</body>
</html>