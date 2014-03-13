<?php 
/* Template name: Sign-up */
?>
<!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
  <meta charset="utf-8" />
  <title>Notebook | Web Application</title>
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
  <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
    <div class="container aside-xxl">
      <a class="navbar-brand block" href="index.html">Notebook</a>
      <section class="panel panel-default m-t-lg bg-white">
        <header class="panel-heading text-center">
          <strong>Sign up</strong>
        </header>
        <a id="cta_fb_signup" href="http://localhost:8888/mgc/wp-login.php?loginFacebook=1&redirect=http://localhost:8888/mgc" onclick="window.location = 'http://localhost:8888/mgc/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;"> 
          <img src="<?php echo get_bloginfo('template_url');?>/images/btn_facebook.png" alt="Connect with Facebook" />
        </a>
        <form action="index.html" class="panel-body wrapper-lg">
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
          <a href="<?php echo get_permalink(100);?>" class="btn btn-default btn-block">Sign in</a>
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder clearfix">
      <p>
        <small>Web app framework base on Bootstrap<br>&copy; 2013</small>
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