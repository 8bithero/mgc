<?php 
/* Template name: Sign-in */
?>
<!DOCTYPE html>
<?php
if($_GET['login'] == 'failed'){
	$message = 'Your credentials are incorrect';
}
?>

<html lang="en" class="bg-dark">
<head>
  <meta charset="utf-8" />
  <title>Signin | Web Application</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font.css" type="text/css" cache="false" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/app.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js" cache="false"></script>
    <script src="js/ie/respond.min.js" cache="false"></script>
    <script src="js/ie/excanvas.js" cache="false"></script>
  <![endif]-->
</head>
<body>
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xxl">
      <a class="navbar-brand block" href="index.html">Notebook</a>
      <section class="panel panel-default bg-white m-t-lg">
        <header class="panel-heading text-center">
          <strong>Sign in</strong><br/><br/>
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
          <a href="<?php echo get_permalink(103);?>" class="btn btn-default btn-block">Sign up</a>
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>Motion Graphics Collective Network<br>&copy; 2013</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.js"></script>
  <!-- App -->
  <script src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/app.plugin.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/slimscroll/jquery.slimscroll.min.js"></script>
  
</body>
</html>