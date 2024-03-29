	<?php include('header.php');?>
        <!-- .aside -->
         <?php include('navigation.php');?>
        <!-- /.aside -->
        <section id="content">
          <section class="vbox">
            <header class="header bg-light bg-gradient b-b">
              <p>List groups</p>
            </header>
            <section class="scrollable wrapper">
              <div class="">
                <h4 class="m-t-none">Sortable list <small>(drag to sort)</small></h4>
                <ul class="list-group gutter list-group-lg list-group-sp sortable">
                  <li class="list-group-item">
                    <span class="pull-right" >
                      <a href="#"><i class="fa fa-pencil icon-muted fa-fw m-r-xs"></i></a>
                      <a href="#"><i class="fa fa-plus icon-muted fa-fw m-r-xs"></i></a>
                      <a href="#"><i class="fa fa-times icon-muted fa-fw"></i></a>                  
                    </span>
                    <span class="pull-left media-xs"><i class="fa fa-sort text-muted fa m-r-sm"></i> 01</span>
                    <div class="clear">
                      Browser compatibility
                    </div>
                  </li>
                  <li class="list-group-item">
                    <span class="pull-right" >
                      <a href="#"><i class="fa fa-pencil icon-muted fa-fw m-r-xs"></i></a>
                      <a href="#"><i class="fa fa-plus icon-muted fa-fw m-r-xs"></i></a>
                      <a href="#"><i class="fa fa-times icon-muted fa-fw"></i></a>                  
                    </span>
                    <span class="pull-left media-xs"><i class="fa fa-sort text-muted fa m-r-sm"></i> 02</span>
                    <div class="clear">
                      Looking for more example templates
                    </div>
                  </li>
                  <li class="list-group-item">
                   <span class="pull-right" >
                      <a href="#"><i class="fa fa-pencil icon-muted fa-fw m-r-xs"></i></a>
                      <a href="#"><i class="fa fa-plus icon-muted fa-fw m-r-xs"></i></a>
                      <a href="#"><i class="fa fa-times icon-muted fa-fw"></i></a>                  
                    </span>
                    <span class="pull-left media-xs"><i class="fa fa-sort text-muted fa m-r-sm"></i> 03</span>
                    <div class="clear">
                      Customizing components
                    </div>
                  </li>
                  <li class="list-group-item">
                    <span class="pull-right" >
                      <a href="#"><i class="fa fa-pencil icon-muted fa-fw m-r-xs"></i></a>
                      <a href="#"><i class="fa fa-plus icon-muted fa-fw m-r-xs"></i></a>
                      <a href="#"><i class="fa fa-times icon-muted fa-fw"></i></a>                  
                    </span>
                    <span class="pull-left media-xs"><i class="fa fa-sort text-muted fa m-r-sm"></i> 04</span>
                    <div class="clear">
                      The fastest way to get started
                    </div>
                  </li>
                  <li class="list-group-item">
                    <span class="pull-right" >
                      <a href="#"><i class="fa fa-pencil icon-muted fa-fw m-r-xs"></i></a>
                      <a href="#"><i class="fa fa-plus icon-muted fa-fw m-r-xs"></i></a>
                      <a href="#"><i class="fa fa-times icon-muted fa-fw"></i></a>                  
                    </span>
                    <span class="pull-left media-xs"><i class="fa fa-sort text-muted fa m-r-sm"></i> 05</span>
                    <div class="clear">
                      HTML5 doctype required
                    </div>
                  </li>
                </ul>
              </div>
              <h4 class="m-t-none">Nestable list 
                <button id="nestable-menu" class="btn btn-xs btn-default active" data-toggle="class:show">
                  <i class="fa fa-plus text"></i>
                  <span class="text">Expand All</span>
                  <i class="fa fa-minus text-active"></i>
                  <span class="text-active">Collapse All</span>
                </button>
              </h4>
              <div class="row m-b">
                <div class="col-sm-4">              
                  <div class="dd" id="nestable1">
                    <ol class="dd-list">
                      <li class="dd-item" data-id="1">
                          <div class="dd-handle">Item 1</div>
                      </li>
                      <li class="dd-item" data-id="2">
                          <div class="dd-handle">Item 2</div>
                          <ol class="dd-list">
                              <li class="dd-item" data-id="3"><div class="dd-handle">Item 3</div></li>
                              <li class="dd-item" data-id="4"><div class="dd-handle">Item 4</div></li>
                              <li class="dd-item" data-id="5">
                                  <div class="dd-handle">Item 5</div>
                                  <ol class="dd-list">
                                      <li class="dd-item" data-id="6"><div class="dd-handle">Item 6</div></li>
                                      <li class="dd-item" data-id="7"><div class="dd-handle">Item 7</div></li>
                                      <li class="dd-item" data-id="8"><div class="dd-handle">Item 8</div></li>
                                  </ol>
                              </li>
                              <li class="dd-item" data-id="9"><div class="dd-handle">Item 9</div></li>
                          </ol>
                      </li>
                  </ol>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="dd" id="nestable2">
                    <ol class="dd-list">
                      <li class="dd-item" data-id="10">                    
                        <div class="dd-handle">Item 10</div>
                        <ol class="dd-list">
                          <li class="dd-item" data-id="11">
                            <div class="dd-handle">Item 11</div>
                          </li>
                        </ol>
                      </li>                  
                      <li class="dd-item" data-id="12">
                          <div class="dd-handle">Item 12</div>
                      </li>
                      <li class="dd-item" data-id="13">
                          <div class="dd-handle">Item 13</div>
                      </li>
                      <li class="dd-item" data-id="14">
                          <div class="dd-handle">Item 14</div>
                      </li>
                      <li class="dd-item" data-id="15">
                          <div class="dd-handle">Item 15</div>
                          <ol class="dd-list">
                              <li class="dd-item" data-id="16"><div class="dd-handle">Item 16</div></li>
                              <li class="dd-item" data-id="17"><div class="dd-handle">Item 17</div></li>
                              <li class="dd-item" data-id="18"><div class="dd-handle">Item 18</div></li>
                          </ol>
                      </li>
                    </ol>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="dd" id="nestable3">
                    <ol class="dd-list">
                      <li class="dd-item dd3-item" data-id="13">
                          <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 13</div>
                      </li>
                      <li class="dd-item dd3-item" data-id="14">
                          <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 14</div>
                      </li>
                      <li class="dd-item dd3-item" data-id="15">
                          <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 15</div>
                          <ol class="dd-list">
                              <li class="dd-item dd3-item" data-id="16">
                                  <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 16</div>
                              </li>
                              <li class="dd-item dd3-item" data-id="17">
                                  <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 17</div>
                              </li>
                              <li class="dd-item dd3-item" data-id="18">
                                  <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 18</div>
                              </li>
                          </ol>
                      </li>
                    </ol>
                  </div>
                </div>
              </div>
              <div class="row">            
                <div class="col-sm-6">
                  <div class="list-group bg-white">
                    <a href="#" class="list-group-item">
                      <i class="fa fa-chevron-right icon-muted"></i>
                      <span class="badge">201</span>
                      <i class="fa fa-envelope icon-muted fa-fw"></i> Inbox
                    </a>
                    <a href="#" class="list-group-item">
                      <i class="fa fa-chevron-right icon-muted"></i>
                      <span class="badge bg-info">5021</span>
                      <i class="fa fa-eye icon-muted fa-fw"></i> Profile visits
                    </a>
                    <a href="#" class="list-group-item">
                      <i class="fa fa-chevron-right icon-muted"></i>
                      <span class="badge bg-success">14</span>
                      <i class="fa fa-phone icon-muted fa-fw"></i> Call
                    </a>
                    <a href="#" class="list-group-item">
                      <i class="fa fa-chevron-right icon-muted"></i>
                      <span class="badge bg-dark">20</span>
                      <i class="fa fa-comments-o icon-muted fa-fw"></i> Messages
                    </a>
                    <a href="#" class="list-group-item">
                      <i class="fa fa-chevron-right icon-muted"></i>
                      <span class="badge">14</span>
                      <i class="fa fa-bookmark icon-muted fa-fw"></i> Bookmarks
                    </a>
                    <a href="#" class="list-group-item">
                      <i class="fa fa-chevron-right icon-muted"></i>
                      <span class="badge bg-info">30</span>
                      <i class="fa fa-bell icon-muted fa-fw"></i> Notifications
                    </a>
                    <a href="#" class="list-group-item">
                      <i class="fa fa-chevron-right icon-muted"></i>
                      <span class="badge bg-danger">10</span>
                      <i class="fa fa-clock-o icon-muted fa-fw"></i> Watch
                    </a>
                  </div>
                </div>
                <div class="col-sm-6">
                  <section class="panel panel-default">
                    <header class="panel-heading">
                      <div class="input-group text-sm">
                        <input type="text" class="input-sm form-control" placeholder="Search">
                        <div class="input-group-btn">
                          <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                          <ul class="dropdown-menu pull-right">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                          </ul>
                        </div>
                      </div>
                    </header>
                    <ul class="list-group alt">
                      <li class="list-group-item">
                        <div class="media">
                          <span class="pull-left thumb-sm"><img src="images/avatar.jpg" alt="John said" class="img-circle"></span>
                          <div class="pull-right text-success m-t-sm">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div class="media-body">
                            <div><a href="#">Chris Fox</a></div>
                            <small class="text-muted">about 2 minutes ago</small>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="media">
                          <span class="pull-left thumb-sm"><img src="images/avatar.jpg" alt="John said" class="img-circle"></span>
                          <div class="pull-right text-muted m-t-sm">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div class="media-body">
                            <div><a href="#">Amanda Conlan</a></div>
                            <small class="text-muted">about 2 hours ago</small>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="media">
                          <span class="pull-left thumb-sm"><img src="images/avatar.jpg" alt="John said" class="img-circle"></span>
                          <div class="pull-right text-warning m-t-sm">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div class="media-body">
                            <div><a href="#">Dan Doorack</a></div>
                            <small class="text-muted">3 days ago</small>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item">
                        <div class="media">
                          <span class="pull-left thumb-sm"><img src="images/avatar.jpg" alt="John said" class="img-circle"></span>
                          <div class="pull-right text-danger m-t-sm">
                            <i class="fa fa-circle"></i>
                          </div>
                          <div class="media-body">
                            <div><a href="#">Lauren Taylor</a></div>
                            <small class="text-muted">about 2 minutes ago</small>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </section>          
                </div>
              </div>
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
  <script src="<?php echo get_template_directory_uri(); ?>/backboard/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo get_template_directory_uri(); ?>/backboard/js/bootstrap.js"></script>
  <!-- App -->
  <script src="<?php echo get_template_directory_uri(); ?>/backboard/js/app.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/backboard/js/app.plugin.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/backboard/js/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/backboard/js/sortable/jquery.sortable.js" cache="false"></script>
<script src="<?php echo get_template_directory_uri(); ?>/backboard/js/nestable/jquery.nestable.js" cache="false"></script>
<script src="<?php echo get_template_directory_uri(); ?>/backboard/js/nestable/demo.js" cache="false"></script>

</body>
</html>