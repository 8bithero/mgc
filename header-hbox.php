<?php global $userdata, $bp, $wp; 
  //User meta
  $user_id = $userdata->ID;
  $profession = get_user_meta($userdata->ID,'user_profession', true);
  $city = get_user_meta($userdata->ID, 'user_city', true);
  $country = get_user_meta($userdata->ID, 'user_country', true);
?>
<script type="text/javascript">
var template_url = "<?php bloginfo('template_url'); ?>";
var blog_url = "<?php bloginfo('url'); ?>";
localStorage.setItem("template-url", template_url );
localStorage.setItem("blog-url", blog_url );

</script>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>Motion Graphics Collective</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js" cache="false"></script>
    <script src="js/ie/respond.min.js" cache="false"></script>
    <script src="js/ie/excanvas.js" cache="false"></script>
  <![endif]-->
  <?php wp_head();?>
</head>
<body <?php body_class();?>>
  <?php include 'modal.php';?>
  <section>
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
      <div class="navbar-header">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
          <i class="fa fa-bars"></i>
        </a>
        <a href="<?php echo get_bloginfo('url');?>" class="navbar-brand header-logo">
          <img src="<?php echo get_template_directory_uri();?>/images/logo.png" class="m-r-sm">
        </a>
         <a href="<?php echo get_bloginfo('url');?>" class="navbar-brand header-payoff hidden-xs pull-left">
          <img src="<?php echo get_template_directory_uri();?>/images/payoff.png" class="m-r-sm">
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      <?php if(is_user_logged_in()){?>
      <ul class="nav navbar-nav navbar-right nav-user col-xs-2 no-padding pull-right">
        <div class="clearfix wrapper bg-primary hidden-xs">
          <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-left m-r-sm">
                <img src="<?php echo bp_get_loggedin_user_avatar('type=full&html=false') ?>">
              </span>
              <span class="hidden-nav-xs clear">
                <strong><?php echo $userdata->nickname;?></strong> <b class="caret caret-white"></b>
                <span class="text-muted text-xs block">Art Director</span>
              </a>
            </a>
            <?php  $notifications = bp_core_get_notifications_for_user( bp_loggedin_user_id());
              if($notifications){
                $badge = count($notifications);
              }else{
                $badge = false;
              }
            ?>
            <ul class="dropdown-menu user-dropdown animated fadeInRight m-t-xs">
              <span class="arrow top hidden-nav-xs"></span>
              <li>
                <a href="<?php echo get_bloginfo('url') . '/members/' . $userdata->user_login; ?>/profile/edit">Settings</a>
              </li>
              <li>
                <a href="<?php echo get_bloginfo('url') . '/members/' . $userdata->user_login; ?>">Profile</a>
              </li>
              <li>
                <a href="#">
                  <span class="badge bg-danger pull-right"><?php echo $badge;?></span>
                  Notifications
                </a>
              </li>
              <li>
                <a href="docs.html">Help</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="<?php echo wp_logout_url(home_url());?>" >Logout</a>
              </li>
            </ul>
          </div>
        </div>  
      </ul>
      <ul class="nav pull-right header-notifications">
        <div class="clearfix wrapper bg-darker hidden-xs">
          <li class="hidden-xs">
          <a href="#" class="dropdown-toggle dk" data-toggle="dropdown">
            <i class="fa fa-bell"></i>
            <span class="notification-badge badge badge-sm up bg-danger m-l-n-sm"><?php echo $badge;?></span>
          </a>
          <section class="dropdown-menu pull-right aside-xl">
            <section class="panel bg-white">
              <header class="panel-heading b-light bg-light">
                <strong>You have <span><?php if($badge){ echo $badge;}else{echo '0';}?></span> new notifications</strong>
              </header>
              <div class="list-group list-group-alt animated fadeInRight">
                <?php if ( bp_has_notifications('per_page=3') ) : ?>
                <?php while ( bp_the_notifications() ) : bp_the_notification(); ?>

                <?php
                  $raw = bp_get_the_notification_description();
                  $result = preg_replace('/<a href=\"(.*?)\">(.*?)<\/a>/', "\\2", $raw);
                  preg_match('/^<a.*?href=(["\'])(.*?)\1.*$/', $raw, $link);
                ?>
                <a href="<?php echo $link[2];?>" class="media list-group-item">
                  <span class="pull-left thumb-sm">
                    <img src="<?php echo bp_get_loggedin_user_avatar('type=full&html=false') ?>" alt="John said" class="img-circle">
                  </span>
                  <span class="media-body block m-b-none">
                    <?php echo $result; ?>
                    <br>
                    <small class="text-muted"><?php bp_the_notification_time_since();?></small>
                  </span>
                </a>
                <?php endwhile; ?>
                <?php else : ?>

                  <?php bp_get_template_part( 'members/single/notifications/feedback-no-notifications' ); ?>

                <?php endif; ?>
              </div>
              <footer class="panel-footer text-sm">
                <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
              </footer>
            </section>
          </section>
        </li>
        </div>  
      </ul> 
      <?php } else { ?>
      <div class="login-btns">
        <ul class="nav navbar-nav navbar-right nav-user col-xs-1 no-padding pull-right">
          <div class="clearfix wrapper bg-darker hidden-xs sign-in-email">
            <div class="dropdown">
              <div class="btn btn-primary md-trigger" data-modal="modal-1">or email</div>
          </div>  
        </ul>
        <ul class="nav navbar-nav navbar-right nav-user col-xs-2 no-padding pull-right">
          <div class="clearfix wrapper bg-darker hidden-xs sign-in-facebook">
            <div class="dropdown">
              <a class="btn btn-facebook pull-right" href="http://michielbruggenwirth.nl/acceptance/mgc/wp-login.php?loginFacebook=1&redirect=http://michielbruggenwirth.nl/acceptance/mgc" onclick="window.location = 'http://michielbruggenwirth.nl/acceptance/mgc/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;">  <i class="fa fa-facebook pull-left"></i>Sign in with Facebook</a>
          </div>  
        </ul>
      </div>
      <?php } ?>
    </header>
    <?php if(is_home()){ ?>
    <section class="tbox hidden-xs">
      <!-- <div id="screen_nr"></div> -->
      <div class="video_wrapper">
         <div class="screen post-first" id="screen-0" style="background-image: url(<?php echo get_bloginfo('template_url');?>/images/slide_1.jpg)">
            <div class="slider_inner">
              <div class="publisch_platform">
                <svg version="1.1" id="snap-logo" height="50%" viewBox="0 0 900 200">
                  <line id="A1" class="mgc_svg" x1="75.547" y1="87" x2="75.547" y2="113.016"/>
                  <line id="A2" class="mgc_svg" x1="75.953" y1="88.031" x2="98.815" y2="111.934"/>
                  <line id="A3" class="mgc_svg" x1="99.25" y1="113.021" x2="99.25" y2="87.016"/>
                  <line id="A4" class="mgc_svg" x1="98.859" y1="88.047" x2="75.981" y2="111.972"/>
                  <line id="A5" class="mgc_svg" x1="141" y1="88.5" x2="165.375" y2="88.5"/>
                  <line id="A6" class="mgc_svg" x1="153.125" y1="88.5" x2="153.125" y2="113"/>
                  <line id="A7" class="mgc_svg" x1="174.75" y1="87" x2="174.75" y2="113.021"/>
                  <line id="A8" class="mgc_svg" x1="218.141" y1="88.453" x2="240.266" y2="111.547"/>
                  <line id="A9" class="mgc_svg" x1="240.667" y1="112.594" x2="240.667" y2="87.5"/>
                  <line id="A10" class="mgc_svg" x1="217.75" y1="112.511" x2="217.75" y2="87.417"/>
                  <line id="A11" class="mgc_svg" x1="299.238" y1="99.906" x2="285.969" y2="99.906"/>
                  <path id="A12" class="mgc_svg" d="M307,105.455h16.047l-0.338,0.004
                      c4.468,0,8.044-4.129,8.044-8.458l-0.003,0c0-4.468-3.503-8.417-7.833-8.417l0.13-0.003H307"/>
                  <line id="A13" class="mgc_svg" x1="307.5" y1="114.084" x2="307.5" y2="88.167"/>
                  <line id="A14" class="mgc_svg" x1="308.167" y1="88.375" x2="331.812" y2="112.021"/>
                  <ellipse id="A15" class="mgc_svg" cx="120.229" cy="100.033" rx="11.729" ry="11.528"/>
                  <ellipse id="A16" class="mgc_svg" cx="196.396" cy="100.033" rx="11.729" ry="11.528"/>
                  <path id="A17" class="mgc_svg" d="M287.958,88.562h-0.75h0.151
                      c-6.16,0-11.526,5.113-11.526,11.201v-0.156c0,6.088,4.984,11.014,11.145,11.014l-0.036,0.004c6.16,0,11.266-3.666,10.995-10.5"/>
                  <polyline id="A18" class="mgc_svg" points="364.161,112.217 352.515,88.5 
                      352.188,88.5 340.585,112.359 "/>
                  <line id="A19" class="mgc_svg" x1="344.667" y1="105.334" x2="360.167" y2="105.334"/>
                  <path id="A20" class="mgc_svg" d="M373.042,105.392h16.047l-0.338,0.003
                      c4.467,0,8.044-4.127,8.044-8.458l-0.003,0c0-4.468-3.504-8.417-7.834-8.417l0.131-0.003h-16.047"/>
                  <line id="A21" class="mgc_svg" x1="373.525" y1="88.417" x2="373.525" y2="113.031"/>
                  <line id="A22" class="mgc_svg" x1="406.5" y1="87" x2="406.5" y2="113.062"/>
                  <line id="A23" class="mgc_svg" x1="429.375" y1="87.062" x2="429.375" y2="113"/>
                  <line id="A24" class="mgc_svg" x1="406.922" y1="96.469" x2="428.984" y2="96.469"/>
                  <line id="A25" class="mgc_svg" x1="407.25" y1="103.5" x2="428.875" y2="103.5"/>
                  <line id="A26" class="mgc_svg" x1="439.531" y1="87" x2="439.531" y2="113.031"/>
                  <path id="A27" class="mgc_svg" d="M472.313,99.12v1.333v-0.078
                      c0,6.541-4.55,11.043-11.019,11.043h0.073c-6.469,0-11.373-5.293-11.373-11.834L450,99.667c0-6.541,5.234-11.5,11.703-11.5"/>
                  <path id="A28" class="mgc_svg" d="M487.719,88.469c-2.672,0-4.587,1.987-4.587,4.566
                      l-0.012-0.222V95v-0.037c0,2.672,2.118,4.615,4.697,4.615"/>
                  <line id="A29" class="mgc_svg" x1="487.388" y1="88.469" x2="507" y2="88.469"/>
                 <line id="A30" class="mgc_svg" x1="487.412" y1="99.562" x2="500.981" y2="99.562" />
                  <path id="A31" class="mgc_svg" d="M500.75,111.5c2.672,0,4.587-2.135,4.587-4.906
                      l0.012,0.239v-2.351v0.04c0-2.872-2.118-4.96-4.697-4.96"/>
                  <line id="A32" class="mgc_svg" x1="501.125" y1="111.5" x2="481" y2="111.5"/>
                  <path id="A33" class="mgc_svg" d="M562.98,99.347v1.321v-0.078
                      c0,6.478-4.55,10.937-11.019,10.937l0.073-0.001c-6.469,0-11.373-5.242-11.373-11.72l0.005,0.082
                      c0-6.478,5.234-11.389,11.703-11.389"/>
                  <ellipse id="A34" class="mgc_svg" cx="585.147" cy="100.033" rx="11.729" ry="11.528"/>
                  <line id="A35" class="mgc_svg" x1="604.98" y1="112.5" x2="624.896" y2="112.5"/>
                  <line id="A36" class="mgc_svg" x1="605.469" y1="112.984" x2="605.469" y2="87.016"/>
                  <line id="A37" class="mgc_svg" x1="632.063" y1="112.5" x2="651.979" y2="112.5"/>
                  <line id="A38" class="mgc_svg" x1="632.552" y1="112.984" x2="632.552" y2="87.016"/>
                  <line id="A39" class="mgc_svg" x1="658.896" y1="112.5" x2="684.083" y2="112.5"/>
                  <line id="A40" class="mgc_svg" x1="659.385" y1="112.984" x2="659.385" y2="87.016"/>
                  <line id="A41" class="mgc_svg" x1="658.896" y1="87.5" x2="684.083" y2="87.5"/>
                  <line id="A42" class="mgc_svg" x1="660.49" y1="99.843" x2="681" y2="99.844"/>
                  <line id="A43" class="mgc_svg" x1="800.896" y1="112.5" x2="826.083" y2="112.5"/>
                  <line id="A44" class="mgc_svg" x1="801.385" y1="112.984" x2="801.385" y2="87.016"/>
                  <line id="A45" class="mgc_svg" x1="800.896" y1="87.5" x2="826.083" y2="87.5"/>
                  <line id="A46" class="mgc_svg" x1="802.49" y1="99.843" x2="823" y2="99.844"/>
                  <path id="A47" class="mgc_svg" d="M715.512,99.293v1.319v-0.077
                      c0,6.47-4.55,10.924-11.019,10.924l0.073-0.001c-6.469,0-11.373-5.236-11.373-11.707l0.005,0.083
                      c0-6.471,5.234-11.376,11.703-11.376"/>
                  <line id="A48" class="mgc_svg" x1="725.5" y1="88.542" x2="749.875" y2="88.542"/>
                  <line id="A49" class="mgc_svg" x1="737.625" y1="88.542" x2="737.625" y2="112.959"/>
                  <polyline id="A50" class="mgc_svg" points="769.086,87.809 780.731,111.525 
                      781.059,111.525 792.66,87.667 "/>
                  <line id="A51" class="mgc_svg" x1="759.376" y1="87.041" x2="759.376" y2="113.041"/>
                </svg>
                <div id="textFadeIn">
                  <div id="slider_text">
                    publishing platform for motion designers
                  </div>
                  <?php if(is_user_logged_in()){ ?>
                  <a href="<?php echo get_permalink(107);?>" class="new-project slide_cta white md-trigger" data-modal="modal-2">Submit your project</a>
                  <?php } else { ?>
                  <a href="<?php echo get_permalink(107);?>" class="new-project slide_cta white md-trigger" data-modal="modal-1">Sign in to submit a project</a>
                  <?php  } ?>
                </div>
              </div>
            </div>
          </div>
      </div>
      <!--
      <nav id="prev-btn">
        <a href="#" class="prev-icon"></a>
      </nav>
      <nav id="next-btn">
        <a href="#" class="next-icon"></a>
      </nav>
    -->
    </section>
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
      <div class="navbar-header aside-sm">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
          <i class="fa fa-bars"></i>
        </a>
        <a href="<?php bloginfo('url');?>" class="navbar-brand">
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      <ul class="nav navbar-nav navbar-right hidden-xs nav-user pull-left aside-md">
        <li class="dropdown hidden-xs"> 
          <div class="dropdown-toggle dker menu-header-small" data-toggle="dropdown"></div> 
        </li>
        <li class="dropdown hidden-xs"> 
          <div class="dropdown-toggle dker menu-header" data-toggle="dropdown">Menu</div> 
        </li>  
      </ul>
      <form id="filter-projects">
        <ul class="nav navbar-nav navbar-right nav-user pull-left hidden-xs">
          <li class="dropdown"> 
            <a href="#" class="dropdown-toggle filter-trigger dker" data-toggle="dropdown">Most Recent <i class="fa fa-fw fa-filter pull-right"></i></a> 
            <section class="dropdown-menu filter-dropdown aside-xs animated fadeInDown"> 
              <section class="panel bg-white filter-list"> 
                <div class="panel-body active">
                   <a href="#" data-filter="recent" /> Most Recent </a>
                </div>
                <div class="panel-body">
                  <a href="#" data-filter="featured_post" /> Featured </a>
                </div>
                <div class="panel-body">
                  <a href="#" data-filter="thumbs_up" /> Most Thumbs up </a>
                </div>
                <div class="panel-body">
                   <a href="#" data-filter="post_views_count" /> Most Viewed </a> 
                </div>
                <div class="line line-dashed line-lg"></div>
                <div class="panel-body filter-slider">
                  <span id="current-filter-time">All time</span>
                  <input class="slider slider-horizontal form-control" type="text" name="filter-time" value="" data-slider-min="1" data-slider-max="4" data-slider-step="1" data-slider-value="10" data-slider-orientation="horizontal" >
                </div>
                <input type="hidden" id="filter-time" name="filter-time" value="">
                <input type="hidden" id="filter-type" name="filter-type" value="">
              </section> 
            </section> 
          </li>  
        </ul>
      </form>
      <ul class="nav navbar-nav navbar-right hidden-xs nav-user">
      <li class="dropdown hidden-xs"> <a href="#" class="dropdown-toggle dker" data-toggle="dropdown"><i class="fa fa-fw fa-search"></i></a> <section class="dropdown-menu aside-xl animated fadeInUp"> <section class="panel bg-white"> <form role="search"> <div class="form-group wrapper m-b-none"> <div class="input-group"> <input type="text" class="form-control" placeholder="Search"> <span class="input-group-btn"> <button type="submit" class="btn btn-info btn-icon"><i class="fa fa-search"></i></button> </span> </div> </div> </form> </section> </section> </li>  
      </ul> 
    </header>
     <?php } ?>
  </section>
  <section class="hbox stretch">
    <!-- .aside -->
    <aside class="bg-dark aside-md" id="nav">        
      <section class="vbox">
        <section class="w-f scrollable">
          <!-- nav -->
          <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="7px" data-railOpacity="0.2">
            <!-- nav -->
            <nav class="nav-primary hidden-xs">
              <ul class="nav">
                <li >
                  <a href="index.html"  >
                    <i class="fa fa-dashboard icon">
                      <b class="bg-danger"></b>
                    </i>
                    <span>Workset</span>
                  </a>
                </li>
                <li >
                  <a href="#pages"  >
                    <i class="fa fa-file-text icon">
                      <b class="bg-primary"></b>
                    </i>
                    <span class="pull-right">
                      <i class="fa fa-angle-down text"></i>
                      <i class="fa fa-angle-up text-active"></i>
                    </span>
                    <span>Pages</span>
                  </a>
                  <ul class="nav lt">
                    <li >
                      <a href="gallery.html" >                                                        
                        <i class="fa fa-angle-right"></i>
                        <span>Gallery</span>
                      </a>
                    </li>
                    <li >
                      <a href="<?php echo get_bloginfo('url') . '/members/' . $userdata->user_login; ?>">                                               
                        <i class="fa fa-angle-right"></i>
                        <span>Profile</span>
                      </a>
                    </li>
                    <li >
                      <a href="invoice.html" >                                                        
                        <i class="fa fa-angle-right"></i>
                        <span>Invoice</span>
                      </a>
                    </li>
                    <li >
                      <a href="intro.html" >                                                        
                        <i class="fa fa-angle-right"></i>
                        <span>Intro</span>
                      </a>
                    </li>
                    <li >
                      <a href="master.html" >                                                        
                        <i class="fa fa-angle-right"></i>
                        <span>Master</span>
                      </a>
                    </li>
                    <li >
                      <a href="gmap.html" >                                                        
                        <i class="fa fa-angle-right"></i>
                        <span>Google Map</span>
                      </a>
                    </li>
                    <li >
                      <a href="signin.html" >                                                        
                        <i class="fa fa-angle-right"></i>
                        <span>Signin</span>
                      </a>
                    </li>
                    <li >
                      <a href="signup.html" >                                                        
                        <i class="fa fa-angle-right"></i>
                        <span>Signup</span>
                      </a>
                    </li>
                    <li >
                      <a href="404.html" >                                                        
                        <i class="fa fa-angle-right"></i>
                        <span>404</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li >
                  <a href="mail.html"  >
                    <b class="badge bg-danger pull-right">3</b>
                    <i class="fa fa-envelope-o icon">
                      <b class="bg-primary dker"></b>
                    </i>
                    <span>Message</span>
                  </a>
                </li>
                <li >
                  <a href="notebook.html"  >
                    <i class="fa fa-pencil icon">
                      <b class="bg-info"></b>
                    </i>
                    <span>Notes</span>
                  </a>
                </li>
              </ul>
            </nav>
            <!-- / nav -->
          </div>
          <!-- / nav -->
        </section>
        
        <footer class="footer lt hidden-xs b-t b-dark">
          <div id="chat" class="dropup">
            <section class="dropdown-menu on aside-md m-l-n">
              <section class="panel bg-white">
                <header class="panel-heading b-b b-light">Active chats</header>
                <div class="panel-body animated fadeInRight">
                  <p class="text-sm">No active chats.</p>
                  <p><a href="#" class="btn btn-sm btn-default">Start a chat</a></p>
                </div>
              </section>
            </section>
          </div>
          <div id="invite" class="dropup">                
            <section class="dropdown-menu on aside-md m-l-n">
              <section class="panel bg-white">
                <header class="panel-heading b-b b-light">
                  John <i class="fa fa-circle text-success"></i>
                </header>
                <div class="panel-body animated fadeInRight">
                  <p class="text-sm">No contacts in your lists.</p>
                  <p><a href="#" class="btn btn-sm btn-facebook"><i class="fa fa-fw fa-facebook"></i> Invite from Facebook</a></p>
                </div>
              </section>
            </section>
          </div>
          <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
            <i class="fa fa-angle-left text"></i>
            <i class="fa fa-angle-right text-active"></i>
          </a>
          <div class="btn-group hidden-nav-xs">
            <button type="button" title="Chats" class="btn btn-icon btn-sm btn-dark" data-toggle="dropdown" data-target="#chat"><i class="fa fa-comment-o"></i></button>
            <button type="button" title="Contacts" class="btn btn-icon btn-sm btn-dark" data-toggle="dropdown" data-target="#invite"><i class="fa fa-facebook"></i></button>
          </div>
        </footer>
      </section>
    </aside>
    <!-- /.aside -->