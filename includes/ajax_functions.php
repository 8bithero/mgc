<?php 

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

		//Make the loop
		$args = array(
				'post_per_page' => -1,
				'post_status' => 'publish'
			);

		$the_query = new WP_Query(array( 'posts_per_page' => -1, 'post_status' => 'any'));

		// The Loop
		while ( $the_query->have_posts() ) {
		  $the_query->the_post();
		  $size = get_post_meta(get_the_ID(), 'item_size', true);
		  $views = 'views-' . getPostViews(get_the_ID());
		    $classes = array(
		      'project_item',
		      $size,
		      $views
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
		      </figcaption>
		      </a>
		  </figure>             
		  </div>

		  <?php
		}
		return;
		die();
	};

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
	 		'post_status'   => 'draft',
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
	>