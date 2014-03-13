<?php 

global $userdata, $bp, $wp; 

include( TEMPLATEPATH . '/bp/bp-functions.php' );

/**
 * Setup theme options.
 *
 */
require_once( BP_PLUGIN_DIR . '/bp-themes/bp-default/_inc/ajax.php' );
wp_enqueue_script( 
    'bp-js', BP_PLUGIN_URL . '/bp-themes/bp-default/_inc/global.js',
    array( 'jquery' ) 
);
function mgc_setup() {
	
	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'twentyfourteen-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'twentyfourteen' ),
		'secondary' => __( 'Secondary menu in left sidebar', 'twentyfourteen' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list',
	) );
}
add_action( 'after_setup_theme', 'mgc_setup' );

/**
 * Remove admin bar
 *
 */
add_filter( 'show_admin_bar', '__return_false' );

/**
 * Enqueue scripts and styles for the front end.
 *
 */
function mgc_styles() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style( 'fonts', get_template_directory_uri() . '/css/font.css');
	wp_enqueue_style( 'app', get_template_directory_uri() . '/css/app.css');
	wp_enqueue_style( 'modal', get_template_directory_uri() . '/css/modal.css');
}
add_action( 'init', 'mgc_styles' );


	function mgc_home_styles() {
		wp_enqueue_style( 'select-css', get_template_directory_uri() . '/js/select2/select2.css');
		wp_enqueue_style( 'select-theme', get_template_directory_uri() . '/js/select2/theme.css');
		wp_enqueue_style( 'filterslider', get_template_directory_uri() . '/js/slider/slider.css');
		wp_enqueue_script( 'slider', get_template_directory_uri() . '/js/slider/bootstrap-slider.js', array( 'jquery' ), NULL, true );
	}
	add_action( 'init', 'mgc_home_styles' );


/**
 * Enqueue scripts and styles for the front end.
 *
 */
function mgc_standard_scripts() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', false, '1.11.0');
    wp_enqueue_script('jquery');

    // Essensials
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery' ), NULL, true );
    wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), NULL, true );
    wp_enqueue_script( 'appplugin', get_template_directory_uri() . '/js/app.plugin.js', array( 'jquery' ), NULL, true );
    wp_enqueue_script( 'slimscroll', get_template_directory_uri() . '/js/slimscroll/jquery.slimscroll.min.js', array( 'jquery' ), NULL, true );

    // Add-on 
    wp_enqueue_script( 'classie', get_template_directory_uri() . '/js/classie.js', array( 'jquery' ), NULL, true );
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array( 'jquery' ), NULL, true );
    wp_enqueue_script( 'touch', get_template_directory_uri() . '/js/toucheffects.js', array( 'jquery' ), NULL, true );
    wp_enqueue_script( 'tweenmax', 'http://cdnjs.cloudflare.com/ajax/libs/gsap/1.11.3/TweenMax.min.js', false, NULL, true );	
    wp_enqueue_script( 'svg-animations', get_template_directory_uri() . '/js/svganimations.js', array( 'jquery' ), NULL, true );
    wp_enqueue_script( 'modal', get_template_directory_uri() . '/js/modalEffects.js', array( 'jquery' ), NULL, true );
}
add_action( 'wp_enqueue_scripts', 'mgc_standard_scripts' );

function mgc_custom_scripts() {
	wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/js/theme.js', array( 'jquery' ), NULL, false );
	wp_enqueue_script( 'profile', get_template_directory_uri() . '/js/profile.js', array( 'jquery' ), NULL, false );

}
add_action( 'init', 'mgc_custom_scripts' );
/**
 * Enqueue scripts and styles for the front end.
 *
 */
function mgc_scripts() {
	// Scripts
		//Reset jqueryuery

        wp_enqueue_script('plupload-all');
       
       	wp_enqueue_script( 'parsley-min', get_template_directory_uri() . '/js/parsley/parsley.min.js', array( 'jquery'), '1.1.16', true);
		wp_enqueue_script( 'parsley-ext', get_template_directory_uri() . '/js/parsley/parsley.extend.js', array( 'jquery'), true);
      	wp_enqueue_script( 'svg', get_template_directory_uri() . '/js/snap.svg-min.js', '0.2.0', true );
		wp_enqueue_script( 'packery', get_template_directory_uri() . '/js/packery.pkgd.min.js');
		wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js');

}
add_action( 'wp_enqueue_scripts', 'mgc_scripts' );

function admin_default_page() {
	if(!current_user_can('manage_options')){
  		return home_url();
  	}
}

add_filter('login_redirect', 'admin_default_page');
function videoBox()
{
	$videourl = get_post_meta(get_the_ID(), 'synch_videolink', true);
	if ($videourl)
	{
		if (strpos($videourl,'vimeo') !== false) {
			$vimeo_strip = parse_url($videourl, PHP_URL_PATH);
			$videolink_v= substr($vimeo_strip, 1);
			echo '<iframe src="http://player.vimeo.com/video/'.$videolink_v.'" width="960" height="550" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
		} elseif(strpos($videourl,'youtube') !== false){
			$youtube_strip = parse_url($videourl, PHP_URL_QUERY);
			$videolink_y = substr($youtube_strip, 2);	
			echo '<iframe width="960" height="550" src="http://www.youtube.com/embed/'.$videolink_y.'" frameborder="0" allowfullscreen></iframe>';
		}
	}

	return false;
}
function videoLink(){
	$videourl = get_post_meta(get_the_ID(), 'synch_videolink', true);
	return $videourl;
}

function vimeo(){
	// Change this to your username to load in your clips
	$vimeo_user_name = ($_GET['user']) ? $_GET['user'] : 'brad';

	// Endpoints
	$api_endpoint = 'http://vimeo.com/api/v2/'.$vimeo_user_name;
	$oembed_endpoint = 'http://vimeo.com/api/oembed.xml';

	// Curl helper function
	function curl_get($url) {
	        $curl = curl_init($url);
	        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
	        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	        $return = curl_exec($curl);
	        curl_close($curl);
	        return $return;
	}

	// Get the url for the latest video
	$videos = simplexml_load_string(curl_get($api_endpoint . '/videos.xml'));
	$video_url = $videos->video[0]->url;

	$vimeo_url = videoLink();
	// Create the URL
	$oembed_url = $oembed_endpoint . '?url=' . rawurlencode($vimeo_url) . '&title=false&portrait=false&byline=false';

	// Load in the oEmbed XML
	$oembed = simplexml_load_string(curl_get($oembed_url));
	$embed_code = html_entity_decode($oembed->html);

	return $embed_code;
	}

	add_action( 'add_meta_boxes', 'item_size' );  
	function item_size() {  
	    add_meta_box( 'item-size-box-id', 'Set size of item', 'item_size_cb', 'post', 'normal', 'high' );  
	}  
	function item_size_cb() {
	    wp_nonce_field( basename( __FILE__ ), 'item_size_box_nonce' );
	    $value = get_post_meta(get_the_ID(), 'item_size', true);
	    $html = '<label>Size: </label><input type="text" name="item_size" value="'.$value.'"/>';
	    echo $html;
	}
	add_action( 'save_post', 'item_size_box_save' );  
	function item_size_box_save( $post_id ){   
	    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
	    if ( !isset( $_POST['item_size_box_nonce'] ) || !wp_verify_nonce( $_POST['item_size_box_nonce'], basename( __FILE__ ) ) ) return;
	    if( !current_user_can( 'edit_post' ) ) return;  
	    if( isset( $_POST['item_size'] ) )
	    	$video = $_POST['item_size'];
	        update_post_meta( $post_id, 'item_size', $video );
	}
	function the_slug() {
   	 	$slug = get_post($post->ID)->post_name;
    	return $slug; 
	}


    //Post views
    // function to display number of posts.
    function getPostViews($postID){
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
            return "0";
        }
        return $count;
    }

    // Edit post views in the post editor
    if(current_user_can('manage_options')){
		add_action( 'add_meta_boxes', 'post_views' );  
	}
	function post_views() {  
	    add_meta_box( 'post-views-box-id', 'Post views and Featured Box', 'post_views_cb', 'post', 'side', 'high' );  
	}  
	function post_views_cb() {
	    wp_nonce_field( basename( __FILE__ ), 'post_views_box_nonce' );
	    $views = get_post_meta(get_the_ID(), 'post_views_count', true);
	    $featured = get_post_meta(get_the_ID(), 'featured_post', true);

	   	if($featured){
	   		$checked = "checked";
	   	};
	    $html = '<label style="width:80px">Post Views: </label><input type="text" name="post_views" value="'.$views.'"/><br/><br/>';
	    $html .= '<label style="width:80px" >Featured: </label><input type="checkbox" name="featured" value="featured" '.$checked.'/>';
	    echo $html;
	}

	add_action( 'save_post', 'post_views_box_save' );  
	function post_views_box_save( $post_id ){   
	    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return; 
	    if ( !isset( $_POST['post_views_box_nonce'] ) || !wp_verify_nonce( $_POST['post_views_box_nonce'], basename( __FILE__ ) ) ) return;
	    if( !current_user_can( 'edit_post' ) ) return;  
	    if( isset( $_POST['post_views'] ) ){
	    	$video = $_POST['post_views'];
	        update_post_meta( $post_id, 'post_views_count', $video );
	    }
	    if( isset( $_POST['featured'] ) ){
	    	$featured = $_POST['featured'];
	        update_post_meta( $post_id, 'featured_post', $featured );
	    } else {
	    	delete_post_meta($post_id, 'featured_post');
	    }
	}

    // function to count views.
    function setPostViews($postID) {
        $count_key = 'post_views_count';
        $count = get_post_meta($postID, $count_key, true);
        if($count==''){
            $count = 0;
            delete_post_meta($postID, $count_key);
            add_post_meta($postID, $count_key, '0');
        }else{
            $count++;
            update_post_meta($postID, $count_key, $count);
        }
    }

    // Add it to a column in WP-Admin
    add_filter('manage_posts_columns', 'posts_column_views');
    add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
    function posts_column_views($defaults){
        $defaults['post_views'] = __('Views');
        return $defaults;
    }
    function posts_custom_column_views($column_name, $id){
        if($column_name === 'post_views'){
            echo getPostViews(get_the_ID());
        }
    }


    add_action( 'wp_ajax_nopriv_insert_project', 'insert_project' );
    add_action( 'wp_ajax_insert_project', 'insert_project' );

    function insert_project(){
    	global $current_user, $post;
    	$user_ID = get_current_user_id();
    	$user_info = get_userdata($user_ID);
    	$post = array(
    		'post_title' 	=> $_POST['title'], 
    		'post_author'   => $user_ID, 
    		'post_type' 	=> 'post',
    		'post_status'   => 'draft',
    		);
    	$post = wp_insert_post($post);

    	//get title
    	$title = get_the_title($post);
    	$slug = get_post($post->ID)->post_name;

		//get permalink 
		if($slug){
    		$permalink = get_bloginfo('url').'/'.$user_info->user_login.'/'.$slug;
    	} else {
    		$permalink = 'project is still a draft';
    	}

    	$data = array(
    		'post_status' => 'draft',
    		'post_id' => $post,
    		'post_title' => $title,
    		'post_permalink' => $permalink,
    		);
    	echo json_encode($data);
    	die();
    }



    add_action( 'wp_ajax_nopriv_project_submit', 'project_submit' );
	add_action( 'wp_ajax_project_submit', 'project_submit' );

	function project_submit(){

		$categories = (explode(",",$_POST['categories']));

		if($_POST['status'] === 'publish'){
			$status = 'publish';
		} else{
			$status = 'draft';
		}

		$cat = array();
		$cat_return = array();
		$i=0;
		foreach ($categories as $categorie) {
			$cat_return .= '{ id: "'.$i.'", text:"'.$categorie.'"},';
			$cat[] = get_cat_ID($categorie);
			$i++;
		}
		$categorie = implode(',',$cat);
		$user_ID = get_current_user_id();
		$insert_project= array(
			'ID'			=> $_POST['id'],
	  		'post_title'    => $_POST['title'],
			'post_content'  => $_POST['content'],
	 		'post_status'   => $status,
	  		'post_author'   => $user_ID,
	  		'post_type' 	=> 'post',
	 		'post_category' => array($categorie)  
		);

		// Insert the post into the database
		$post = wp_insert_post( $insert_project);
		update_post_meta($post, 'synch_videolink', $_POST['video']);

		$slug = get_post($post->ID)->post_name;

		//get permalink 
		if($slug){
    		$permalink = get_bloginfo('url').'/'.$user_info->user_login.'/'.$slug;
    	} else {
    		$permalink = 'project is still a draft';
    	}

		$data = array(
			'post_status' => $status,
			'post_id' => $post,
			'post_title' => $_POST['title'],
			'post_content' => $_POST['content'],
			'post_video' => $_POST['video'],
		);

		echo json_encode($data);
		die();
	}


	function plupload_wp_head() {  
	// place js config array for plupload
	    $plupload_init = array(
	    'runtimes'            => 'html5,silverlight,flash,html4',
	    'browse_button'       => 'plupload-browse-button',
	    'container'           => 'plupload-upload-ui',
	    'drop_element'        => 'drag-drop-area',
	    'file_data_name'      => 'async-upload',            
	    'multiple_queues'     => true,
	    'max_file_size'       => wp_max_upload_size().'b',
	    'url'                 => admin_url('admin-ajax.php'),
	    'flash_swf_url'       => includes_url('js/plupload/plupload.flash.swf'),
	    'silverlight_xap_url' => includes_url('js/plupload/plupload.silverlight.xap'),
	    'filters'             => array(array('title' => "Image files", 'extensions' => 'jpg,gif,png')),
	    'multipart'           => true,
	    'urlstream_upload'    => true,

	    // additional post data to send to our ajax hook
	    'multipart_params'    => array(
	      '_ajax_nonce' => wp_create_nonce('photo-upload'),
	      'action'      => 'photo_gallery_upload',            // the ajax action name
	      'id'			=> '180',
	    ),
	  );
	?>
	<script type="text/javascript">  
	    var base_plupload_config=<?php echo json_encode($plupload_init); ?>;
	</script>  
	<?php  
	}
	add_action("wp_head", "plupload_wp_head");


		// handle uploaded file here
		add_action('wp_ajax_photo_gallery_upload', function(){

		  check_ajax_referer('photo-upload');


		  // you can use WP's wp_handle_upload() function:
		  $file = $_FILES['async-upload'];
		  $additional = $_POST['id'];
		  $status = wp_handle_upload($file, array('test_form'=>true, 'action' => 'photo_gallery_upload'));


			  //Adds file as attachment to WordPress
			  $ID =  wp_insert_attachment( array(
			     'post_mime_type' => $status['type'],
			     'post_title' => preg_replace('/\.[^.]+$/', '', basename($file['name'])),
			     'post_content' => '',
			     'post_status' => 'inherit'
			  ), $status['file']);

			update_post_meta($additional, '_thumbnail_id', $ID);
			echo json_encode($ID);
		  exit;
		});           



	add_action( 'wp_ajax_nopriv_profile_save_changes', 'profile_save_changes' );
	add_action( 'wp_ajax_profile_save_changes', 'profile_save_changes' );

	function profile_save_changes(){
		global $userdata, $bp, $wp;

		$msg = '';

		$edit = get_user_by('login', $_POST['username'] );
		$len = strlen($_POST['pass2']);
		if($len >= 6){
			$pass1 = $_POST['pass1'];
			$pass2 = $_POST['pass2'];

			if($pass1 === $pass2){
				if(($edit->ID === $userdata->ID)){
					$msg = 'Changed';
					wp_update_user( array ( 'ID' => $userdata->ID, 'user_pass' => $pass2 ) ) ;
				} else {
					if($edit->ID !== $userdata->ID){
						$msg = 'Not your account';
					}
				};
			} else {
				$msg = 'Password is not equal';
			}
		}
		
		$args = array(
			'ID' => $userdata->ID, 
			'nickname'=> $_POST['nickname'],
			'user_email' => $_POST['email'],
			'description' => $_POST['info'],
			);

		wp_update_user( $args );


		update_user_meta($userdata->ID, 'user_country', $_POST['country'] );
		update_user_meta($userdata->ID, 'user_city', $_POST['city'] );
		$meta = array(
			'country' => $_POST['country'],
			'city' => $_POST['city'],
			'hash' => $hash,
			'edit' => $edit->ID,
			'msg' => $msg,
			);

		$response = array_merge($args, $meta);

		echo json_encode($response);
		die();
	}

	add_action( 'wp_ajax_nopriv_filter_projects', 'filter_projects' );
	add_action( 'wp_ajax_filter_projects', 'filter_projects' );

	function filter_projects(){

		//Global variable
		global $post;

		//Get the filter selectors
		$type = $_POST['type'];
		$time = $_POST['time'];

		// Filter on time
		switch ($time) {
			case 1:
				$year = date('Y');
				$month = null;
				$week = date('W');
				break;
			case 2:
				$year = date('Y');
				$month = date('n');
				$week = null;
				break;
			case 3:
				$year = date('Y');
				$month = null;
				$week = null;
				break;
			case 4:
				$year = null;
				$month = null;
				$week = null;
				break;
			
			default:
				# code...
				break;
		}

		// Set order on views and thumbs up
		if($type == 'post_views_count' || $type == 'thumbs_up'){
			$order = 'meta_value_num';
		} else {
			$order = 'date';
		};

		// If is recent set type off.
		if($type == 'recent'){
			$type = null;
		}


		//Make the loop
		$args = array(
				'post_per_page' => -1,
				'post_status' => 'publish',
				'meta_key' => $type,
				'date_query' => array(
						array(
							'year' => $year,
							'month' => $month,
							'week' => $week,
						),
					),
				'orderby' => $order
			);

		$the_query = new WP_Query($args);

		// The Loop
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
			  $the_query->the_post();
			  $size = get_post_meta(get_the_ID(), 'item_size', true);
			  $views = getPostViews(get_the_ID());
	            $classes = array(
	              'project_item',
	              $size,
	              'views-'. $views
	            );
			  ?>

			  <div id="post-<?php the_ID();?>" <?php post_class( $classes);?> data-size="<?php echo getPostViews(get_the_ID()); ?>">
			    </a>
			    <figure class="caption">
			      <?php the_post_thumbnail('full');?>
			      <a href="<?php the_permalink();?>">
			      <figcaption>
			          <h3><?php the_title();?></h3>
			          <span>By <?php the_author();?></span>
			          <div id="project-icons">
                        <i class="fa fa-eye views-project"> <?php echo $views ;?></i>
                        <i class="fa fa-sun-o thumbs-up"> 12</i>
                      </div>
			      </figcaption>
			      </a>
			  </figure>             
			  </div>

			  <?php
			}
		} else { ?>
			<div class="jumbotron col-sm-offset-2 no-posts">
			  <h1>Sorry, no projects</h1>
			  <p>The combination of filters resulted in bupkes!</p>
			  <p><a id="reset-filter" class="btn btn-primary btn-lg" role="button">Reset the filters</a></p>
			</div>
        <?php }
		die();
		return;
	};















?>