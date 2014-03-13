<?php
  /* Template name: New Post */

  global $editor, $post;
  var_dump($post);
?>
<?php get_header('hbox');?>
        <section id="content">
          <section class="vbox new-project">
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="<?php echo bloginfo('url');?>"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="<?php echo bloginfo('url');?>">Overview</a></li>
                <li class="active">Projects</li>
              </ul>
              <div class="m-b-md">
                <h3 class="m-b-none project-title">New Project</h3>
              </div>
              <section class="panel panel-default">
                <header class="panel-heading font-bold autosavenotice">
                  Submit a new Project
                  <span style="opacity:0">Auto save</span>
                </header>
                <div class="panel-body">
                  <form id="formpost-project" class="form-horizontal" method="post" enctype="multipart/form-data"> 
                    <div class="form-group">
                      <div class="col-lg-10">
                        <div class="col-sm-6">
                          <span id="post-status" class="label bg-warning">draft</span> on <strong id="post_date"></strong><strong id="post_time"></strong>
                        </div>
                      </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Project title</label>
                      <div class="col-sm-10">
                        <input type="text" id="project-title" name="project-title" class="form-control" placeholder="<?php echo get_the_title($post_id);?>">
                        <span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                      </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-lg-2 control-label">Direct link</label>
                      <div class="col-lg-10">
                        <p id="project-permalink" class="form-control-static">email@example.com</p>
                      </div>
                    </div>                          
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Categories</label>
                      <div class="col-sm-10">
                        <div class="row">
                          <div class="col-md-4 categories-project">
                            <div>
                              <input type="hidden" name="project-categories" id="select2-categories" style="width:260px" value=""/>
                            </div>
                          </div>
                          <div class="col-md-6 tags-project">
                            <label class="col-sm-2 control-label">Tags</label>  
                            <div>
                              <input type="hidden" name="project-tags" id="select2-tags" style="width:260px" value=""/>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Project video link</label>
                      <div class="col-sm-10">
                        <div class="input-group m-b">
                          <div class="input-group-btn">
                            <button type="button" class="btn btn-default dropdown-toggle input-video" data-toggle="dropdown">Video <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                              <li><a class="video_source" data-source="vimeo" href="#">Vimeo</a></li>
                              <li class="divider"></li>
                              <li><a class="video_source" data-source="youtube" href="#">Youtube</a></li>
                            </ul>
                          </div><!-- /btn-group -->
                          <input type="text" name="project-video" class="form-control video-input">
                        </div>
                      </div>
                    </div>   
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Project description</label>
                      <div class="col-sm-10">
                        <div class="btn-toolbar m-b-sm btn-editor" data-role="editor-toolbar" data-target="#editor">
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
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
                          
                          <!-- <div class="btn-group">
                            <a class="btn btn-default btn-sm" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                          </div>
                        -->
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                          </div>
                        </div>
                        <div id="editor" class="form-control project-editor" style="overflow:scroll;height:150px;max-height:150px">
                          Go ahead&hellip;
                        </div>
                        <textarea id="project-content" name="project-content"></textarea>
                      </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div id="plupload-upload-ui" class="form-group hide-if-no-js">
                      <label class="col-sm-2 control-label">Drag and Drop</label>
                      <div id="drag-drop-area">
                        <div class="drag-drop-inside col-sm-10">
                          <div id="drop-area" class="dropfile visible-lg">
                            <small class="drag-drop-buttons">Drag and Drop file here - or <p class="drag-drop-buttons"><input id="plupload-browse-button" type="button" value="<?php esc_attr_e('Select Files'); ?>" class="btn btn-default btn-sm" /></p></small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="line line-dashed line-lg pull-in"></div>
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        <button type="submit" class="btn btn-default">Cancel</button>
                        <button id="publish_project" type="submit" class="btn btn-primary">Publish</button>
                        <button id="draft_project" type="submit" class="btn btn-primary">Save Draft</button>
                        <span class="autosavenotify" style="opacity:0"></span>
                      </div>
                    </div>
                    <?php wp_nonce_field('add_transfer','mgc_2014'); ?>
                  </form>
                </div>
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

  <?php wp_footer();?>

<script src="<?php echo get_template_directory_uri();?>/js/fuelux/fuelux.js" cache="false"></script>

<!-- select2 -->
<script src="<?php echo get_template_directory_uri();?>/js/select2/select2.min.js" cache="false"></script>
<!-- wysiwyg -->
<script src="<?php echo get_template_directory_uri();?>/js/wysiwyg/jquery.hotkeys.js" cache="false"></script>
<script src="<?php echo get_template_directory_uri();?>/js/wysiwyg/bootstrap-wysiwyg.js" cache="false"></script>
<script src="<?php echo get_template_directory_uri();?>/js/wysiwyg/demo.js" cache="false"></script>


</body>
</html>