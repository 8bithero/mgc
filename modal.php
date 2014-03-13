
		<div class="md-modal md-effect-1" id="modal-1">
			<div class="md-content sign-wrapper">
				<div id="sign-inner">
					<div class="container modal-signin">
				      <section class="panel panel-default bg-white m-t-lg">
				        <header class="panel-heading text-center">
				          <strong>Sign in</strong><br/>
				           <?php echo $message ;?>
				        </header>
				        <form name="loginform" id="loginform" action="<?php echo wp_login_url(home_url());?>" method="post" class="panel-body wrapper-lg">
				          <div class="form-group">
				            <label class="control-label">Username</label>
				            <input type="text" name="log" placeholder="test@example.com" class="form-control input-lg">
				          </div>
				          <div class="form-group">
				            <label class="control-label">Password</label>
				            <input type="password" name="pwd" id="inputPassword" placeholder="Password" class="form-control input-lg">
				          </div>
				          <div class="checkbox">
				            <label>
				              <input type="checkbox" name="rememberme"> Keep me logged in
				            </label>
				          </div>
				          <a href="#" class="pull-right m-t-xs"><small>Forgot password?</small></a>
				          <input type="hidden" value="<?php echo esc_attr( $redirect_to ); ?>" name="redirect_to">
						  <input type="hidden" value="1" name="testcookie">
				          <button type="submit" name="wp-submit" class="btn btn-primary">Sign in</button>
				          <!--<div class="line line-dashed"></div>
				         <a href="#" class="btn btn-facebook btn-block m-b-sm"><i class="fa fa-facebook pull-left"></i>Sign in with Facebook</a>
				          <a href="#" class="btn btn-twitter btn-block"><i class="fa fa-twitter pull-left"></i>Sign in with Twitter</a>-->
				          <div class="line line-dashed"></div>
				          <a class="btn btn-facebook btn-block m-b-sm" href="http://localhost:8888/mgc/wp-login.php?loginFacebook=1&redirect=http://localhost:8888/mgc" onclick="window.location = 'http://localhost:8888/mgc/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;"> 
				            <i class="fa fa-facebook pull-left"></i>Sign in with Facebook
				          </a>
				          <div class="line line-dashed"></div>
				          <p class="text-muted text-center"><small>Not yet an account?</small></p>
				          <a href="#" id="sign-up-btn" class="btn btn-default btn-block">Sign up</a>
				        </form>
				      </section>
				    </div>
				    <div class="container modal-signup">
				      <section class="panel panel-default m-t-lg bg-white">
				        <header class="panel-heading text-center">
				          <strong>Sign up</strong>
				        </header>
				        <a id="cta_fb_signup" href="http://localhost:8888/mgc/wp-login.php?loginFacebook=1&redirect=http://localhost:8888/mgc" onclick="window.location = 'http://localhost:8888/mgc/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;"> 
				          <img src="<?php echo get_bloginfo('template_url');?>/images/btn_facebook.png" alt="Connect with Facebook" />
				        </a>
				        <form class="panel-body wrapper-lg">
				          <div class="form-group">
				            <label class="control-label">Name</label>
				            <input type="text" placeholder="eg. Your name or company" class="form-control input-lg">
				          </div>
				          <div class="form-group">
				            <label class="control-label">Email</label>
				            <input type="email" placeholder="test@example.com" class="form-control input-lg">
				          </div>
				          <div class="form-group">
				            <label class="control-label">Password</label>
				            <input type="password" id="inputPassword" placeholder="Type a password" class="form-control input-lg">
				          </div>
				          <div class="checkbox">
				            <label>
				              <input type="checkbox"> Agree the <a href="#">terms and policy</a>
				            </label>
				          </div>
				          <button type="submit" class="btn btn-primary">Sign up</button>
				          <a href="<?php bloginfo('url');?>" class="btn btn-default pull-right">Cancel</a>
				          <div class="line line-dashed"></div>
				          <p class="text-muted text-center"><small>Already have an account?</small></p>
				          <a href="" id="sign-in-btn" class="btn btn-default btn-block">Sign in</a>
				        </form>
				      </section>
				    </div>
				</div>
			</div>
		</div>
		<div class="md-modal md-effect-2" id="modal-2">
			<div class="md-content">
				<div>
					<section class="panel panel-default">
						<div class="row">
							<div class="col-sm-12">
								<div class="col-sm-2">
									<div class="panel-body">
										<div class="thumb m-r">
											<img src="<?php echo bp_get_loggedin_user_avatar('type=full&html=false') ?>" alt="John said" class="img-circle">
										</div>
									</div>
								</div>
								<div class="col-sm-10">
									<div class="panel-body">
										<input type="text" id="begin-project-title" name="project-title" class="form-control" autocomplete="off" placeholder="Enter project name...">
									</div>
								</div>
							</div>
						</div>
                      	<footer class="panel-footer bg-light lter">
                        	<button class="btn btn-info pull-right make-project">Begin project <i class="fa fa-rocket"></i></button>
                        	<ul class="nav nav-pills nav-sm">
                        	<li><strong>You</strong> have has <strong><?php echo count_user_posts( $user_id ); ?></strong> projects.</li>
                        	</ul>
                      	</footer>
                    </section>
				</div>
			</div>
		</div>
		<div class="md-modal md-effect-3 ajax-modal" id="modal-3">
			<div class="md-content">
				<div>
					<div class="ajax-spinner">
					  <div class="ajax-bar"></div>
					  <div class="ajax-bar"></div>
					  <div class="ajax-bar"></div>
					  <div class="ajax-bar"></div>
					  <div class="ajax-bar"></div>
					  <div class="ajax-bar"></div>
					  <div class="ajax-bar"></div>
					  <div class="ajax-bar"></div>
					  <div class="ajax-bar"></div>
					  <div class="ajax-bar"></div>
					  <div class="ajax-bar"></div>
					  <div class="ajax-bar"></div>
					  <div class="ajax-bar"></div>
					  <div class="ajax-bar"></div>
					  <div class="ajax-bar"></div>
					  <div class="ajax-bar"></div>
					</div>
				</div>
			</div>
		</div>
		<div id="ajax-modal" class="md-trigger" data-modal="modal-3"></div>

