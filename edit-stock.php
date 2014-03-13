	<?php
	$error = false;
	if(isset($_POST['submitted']) && isset($_POST['post_nonce_field']) && wp_verify_nonce($_POST['post_nonce_field'], 'post_nonce')){
		// Use ID for update post
		$current_id =  $_GET['id'];
		
		if(empty($_POST['project_title']) && empty($_POST['project_description']) && empty($_POST['project_cat'])){
			$error = true;
		}
			$categories = $_POST['project_cat'];
			
			$post_information = array(
					'ID' => $current_id,
					'post_title' 	=> $_POST['project_title'],
					'post_content' 	=> $_POST['project_description']
				);
			
				$post_id = wp_update_post($post_information);
				wp_set_post_categories( $post_id, $categories );
				update_post_meta($current_id, 'synch_videolink', $_POST['project_preview'] );
	}
	
	?>

	<?php include('header.php');?>
        <!-- .aside -->
        <?php include('navigation.php');?>
        <!-- /.aside -->	
        <?php
        	$arg = array(
        		'p='.$_GET['id'],
        		'post_type' => 'product'
        	);
	        query_posts($arg);
			while (have_posts()) : the_post(); 
			$status = get_post_status();
		?>
        <section id="content">
          <section class="vbox">
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="?page=projects" class="fa fa-list-ul"> Edit Overiew</a></li>
                <li class="active"><?php the_title();?></li>
              </ul>
              <div class="m-b-md">
                <h3 class="m-b-none" style="display:inline;margin-right:20px;">Project - <?php the_title();?></h3><span class="label bg-primary"><?php echo $status;?></span>
              </div>
              <section class="panel panel-default" style="position:relative">
                <header class="panel-heading font-bold" >
  					Edit the project
                </header>
                <div class="panel-body">
                  <form class="form-horizontal" method="post" name="edit_project" enctype="multipart/form-data" data-validate="parsley">
                  	<input type="submit" class="btn btn-primary btn-update" name="project_update" value="Update Stock">
					
					<?php if($error){?>
                  	<div class="alert alert-danger">
                    	<button type="button" class="close" data-dismiss="alert">×</button>
                    	<i class="fa fa-ban-circle"></i><strong>Oh snap!</strong> Change a few things up and try submitting again.
                  	</div>
                  	<?php } ?>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Project name</label>
                      <div class="col-sm-10">
                        <input type="text"  class="form-control" name="project_title" value="<?php the_title();?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Project URL</label>
                      <div class="col-lg-10">
                        <p class="form-control-static"><?php the_permalink();?></p>
                      </div>
                    </div>                    
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Project Description</label>
                      <div class="col-sm-10">
                        <div class="btn-toolbar m-b-sm btn-editor" data-role="editor-toolbar" data-target="#editor">
                          <div class="btn-group">
                              <ul class="dropdown-menu">
                              </ul>
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                              <ul class="dropdown-menu">
                              <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                              <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                              <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                              </ul>
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                          </div>
                          <div class="btn-group">
                          <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                            <div class="dropdown-menu">
                              <div class="input-group m-l-xs m-r-xs">
                                <input class="form-control input-sm" placeholder="URL" type="text" data-edit="createLink"/>
                                <div class="input-group-btn">
                                  <button class="btn btn-default btn-sm" type="button">Add</button>
                                </div>
                              </div>
                            </div>
                            <a class="btn btn-default btn-sm" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                          </div>
                          
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                          </div>
                          <input type="text" class="form-control-trans pull-left" data-edit="inserttext" id="voiceBtn" x-webkit-speech="" style="width:25px;height:28px;">
                        </div>
                        <div id="editor" contenteditable="true" class="form-control" style="overflow:scroll;height:150px;max-height:150px">
                          <?php the_content();?>
                        </div>
                        <textarea name="project_description" id="project_editor"><?php the_content();?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Preview</label>
                      <div class="col-sm-10">
                      	<div id="videoPreview" class="input-group" style="display:none">
                      		<iframe id="preview_player" src="" width="600" height="340" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                      	</div>
                      	<div class="alert alert-info" id="no-preview" style="display:none">
		                    <i class="fa fa-info-sign"></i><strong>Heads up!</strong> The most important bit is not set, a Youtube or Vimeo url to the video.
		                  </div>
                      </div>
                    </div>                   	
                    <div class="form-group" id="video_resize_bench">
                      <label class="col-sm-2 control-label">Project Video</label>
                      <div class="col-sm-10">
                        <div id="myCombobox" class="input-group dropdown combobox">
                          <div class="input-group-btn">
                          	<button type="button" class="btn btn-default" tabindex="-1" id="preview_action">Preview</button>
                          </div>
                          <?php $videourl = get_post_meta($_GET['id'], 'synch_videolink', true);?>
                          
                          <input class="form-control" name="project_preview" value="<?php echo $videourl;?>" id="product_preview" type="text" placeholder="Enter the video URL">
                        </div>
                      </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Project Category</label>
                      <div class="col-sm-10">
                        <div class="row">
                          <div class="col-sm-6">
                            <!-- checkbox -->
                            <?php
                            $categories = get_the_category();
                            foreach($categories as $cat){
                            	$cat_array[] = $cat->term_id;
                            }
                            
							$category_ids = get_all_category_ids();
							foreach($category_ids as $cat_id) {
								if($cat_id != 1){
							 ?>
								<div class="checkbox">
                              		<label class="checkbox-custom">
									<?php 
										$cat_name = get_cat_name($cat_id);
										if(in_array($cat_id, $cat_array)){
											$checked = 'checked';
										} else{
											$checked = false;
										}
									 
									?>
									<input type="checkbox" name="project_cat[]" value="<?php echo $cat_id;?>" <?php echo $checked;?>>
								    <i class="fa fa-fw fa-square-o"></i>
                                	<?php echo $cat_name;?>
                              		</label>
                              	 </div>
							<?php
								}
							 } 
							 ?>
                           </div>
                        </div>
                      </div>
                    </div>
                    <?php if(is_super_admin()){?>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Featured on MGC</label>
                      <div class="col-sm-10">
                        <label class="switch">
                          <input type="checkbox">
                          <span></span>
                        </label>
                      </div>
                    </div>
					<?php } ?>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Featured Image</label>
                      <div class="col-sm-10">
                        <div class="dropfile_featured visible-lg max-img featured">
                        	<?php the_post_thumbnail('full');?>
                        </div>
                      </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">File input</label>
                      <div class="col-sm-10">
                        <input type="file" class="filestyle" name="project_featured" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline input-s">
                      </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                     	 <?php wp_nonce_field('post_nonce', 'post_nonce_field'); ?>	
                     	<input type="hidden" name="submitted" value="1">
                        <button class="btn btn-default">Cancel</button>
                        <input type="submit" class="btn btn-primary" name="project_update" value="Update Stock">
                      </div>
                    </div>
                  </form>
                </div>
              </section>
            </section>
          </section>
          <?php endwhile; ?>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
        <aside class="bg-light lter b-l aside-md hide" id="notes">
          <div class="wrapper">Notification</div>
        </aside>
      </section>
    </section>
  </section>
  <script src="<?php echo get_template_directory_uri(); ?>/backboard/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo get_template_directory_uri(); ?>/backboard/js/bootstrap.js"></script>
  <!-- App -->
  <script src="<?php echo get_template_directory_uri(); ?>/backboard/js/app.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/backboard/js/app.plugin.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/backboard/js/slimscroll/jquery.slimscroll.min.js"></script>
    <div class="modal fade" id="modal-form">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-6 b-r">
              <h3 class="m-t-none m-b">Sign in</h3>
              <p>Sign in to meet your friends.</p>
              <form role="form">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Password">
                </div>
                <div class="checkbox m-t-lg">
                  <button type="submit" class="btn btn-sm btn-success pull-right text-uc m-t-n-xs"><strong>Log in</strong></button>
                  <label>
                    <input type="checkbox"> Remember me
                  </label>
                </div>                
              </form>
            </div>
            <div class="col-sm-6">
              <h4>Not a member?</h4>
              <p>You can create an account <a href="#" class="text-info">here</a></p>
              <p>OR</p>
              <a href="#" class="btn btn-facebook btn-block m-b-sm"><i class="fa fa-facebook pull-left"></i>Sign in with Facebook</a>
              <a href="#" class="btn btn-twitter btn-block m-b-sm"><i class="fa fa-twitter pull-left"></i>Sign in with Twitter</a>
              <a href="#" class="btn btn-gplus btn-block"><i class="fa fa-google-plus pull-left"></i>Sign in with Google+</a>
            </div>
          </div>          
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
<!-- Preview -->
<script src="<?php echo get_template_directory_uri(); ?>/backboard/js/project/project.js" cache="false"></script>
<!-- fuelux -->
<script src="<?php echo get_template_directory_uri(); ?>/backboard/js/fuelux/fuelux.js" cache="false"></script>
<!-- datepicker -->
<script src="<?php echo get_template_directory_uri(); ?>/backboard/js/datepicker/bootstrap-datepicker.js" cache="false"></script>
<!-- file input -->  
<script src="<?php echo get_template_directory_uri(); ?>/backboard/js/file-input/bootstrap-filestyle.min.js" cache="false"></script>

<!-- wysiwyg -->
<script src="<?php echo get_template_directory_uri(); ?>/backboard/js/wysiwyg/jquery.hotkeys.js" cache="false"></script>
<script src="<?php echo get_template_directory_uri(); ?>/backboard/js/wysiwyg/bootstrap-wysiwyg.js" cache="false"></script>
<script src="<?php echo get_template_directory_uri(); ?>/backboard/js/wysiwyg/demo.js" cache="false"></script>

</body>
</html>