<<<<<<< HEAD


    <head>
        <meta charset="utf-8" />
        <title>Metronic | Todo 2</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        
        
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="assets/apps/css/todo-2.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
        
         <?php
        require_once 'header.php';        
       ?>
        
        
       
             <?php
        require_once 'sidebar.php';        
       ?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    <div class="theme-panel">
                        <div class="toggler tooltips" data-container="body" data-placement="left" data-html="true" data-original-title="Click to open advance theme customizer panel">
                            <i class="icon-settings"></i>
                        </div>
                        <div class="toggler-close">
                            <i class="icon-close"></i>
                        </div>
                        <div class="theme-options">
                            <div class="theme-option theme-colors clearfix">
                                <span> THEME COLOR </span>
                                <ul>
                                    <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
                                    <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
                                    <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
                                    <li class="color-dark tooltips" data-style="dark" data-container="body" data-original-title="Dark"> </li>
                                    <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
                                </ul>
                            </div>
                            <div class="theme-option">
                                <span> Theme Style </span>
                                <select class="layout-style-option form-control input-small">
                                    <option value="square" selected="selected">Square corners</option>
                                    <option value="rounded">Rounded corners</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Layout </span>
                                <select class="layout-option form-control input-small">
                                    <option value="fluid" selected="selected">Fluid</option>
                                    <option value="boxed">Boxed</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Header </span>
                                <select class="page-header-option form-control input-small">
                                    <option value="fixed" selected="selected">Fixed</option>
                                    <option value="default">Default</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Top Dropdown</span>
                                <select class="page-header-top-dropdown-style-option form-control input-small">
                                    <option value="light" selected="selected">Light</option>
                                    <option value="dark">Dark</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Mode</span>
                                <select class="sidebar-option form-control input-small">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected="selected">Default</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Style</span>
                                <select class="sidebar-style-option form-control input-small">
                                    <option value="default" selected="selected">Default</option>
                                    <option value="compact">Compact</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Menu </span>
                                <select class="sidebar-menu-option form-control input-small">
                                    <option value="accordion" selected="selected">Accordion</option>
                                    <option value="hover">Hover</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Position </span>
                                <select class="sidebar-pos-option form-control input-small">
                                    <option value="left" selected="selected">Left</option>
                                    <option value="right">Right</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Footer </span>
                                <select class="page-footer-option form-control input-small">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected="selected">Default</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- END THEME PANEL -->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN TODO SIDEBAR -->
                            <div class="todo-ui">
                                <div class="todo-sidebar">
                                    <div class="portlet light ">
                                        <div class="portlet-title">
                                            <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content">
                                                <span class="caption-subject font-green-sharp bold uppercase">PROJECTS </span>
                                                <span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view project list</span>
                                            </div>
                                            <div class="actions">
                                                <div class="btn-group">
                                                    <a class="btn green btn-circle btn-outline btn-sm todo-projects-config" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                        <i class="icon-settings"></i> &nbsp;
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;"> New Project </a>
                                                        </li>
                                                        <li class="divider"> </li>
                                                        <li>
                                                            <a href="javascript:;"> Pending
                                                                <span class="badge badge-danger"> 4 </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"> Completed
                                                                <span class="badge badge-success"> 12 </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"> Overdue
                                                                <span class="badge badge-warning"> 9 </span>
                                                            </a>
                                                        </li>
                                                        <li class="divider"> </li>
                                                        <li>
                                                            <a href="javascript:;"> Archived Projects </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="portlet-body todo-project-list-content">
                                            <div class="todo-project-list">
                                                <ul class="nav nav-stacked">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-info"> 6 </span> AirAsia Ads </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-success"> 2 </span> HSBC Promo </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="javascript:;">
                                                            <span class="badge badge-success"> 3 </span> GlobalEx</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-default"> 14 </span> Empire City </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-info"> 6 </span> AirAsia Ads </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-danger"> 2 </span> Loop Inc Promo </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet light ">
                                        <div class="portlet-title">
                                            <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content-tags">
                                                <span class="caption-subject font-red bold uppercase">TAGS </span>
                                                <span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view</span>
                                            </div>
                                            <div class="actions">
                                                <div class="actions">
                                                    <a class="btn btn-circle grey-salsa btn-outline btn-sm" href="javascript:;">
                                                        <i class="fa fa-plus"></i> Add </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="portlet-body todo-project-list-content todo-project-list-content-tags">
                                            <div class="todo-project-list">
                                                <ul class="nav nav-pills nav-stacked">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-danger"> 6 </span> Pending </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-info"> 2 </span> Completed </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-success"> 14 </span> In Progress </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-warning"> 6 </span> Closed </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-info"> 2 </span> Delivered </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END TODO SIDEBAR -->
                                <!-- BEGIN TODO CONTENT -->
                                <div class="todo-content">
                                    <div class="portlet light ">
                                        <!-- PROJECT HEAD -->
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="icon-bar-chart font-green-sharp hide"></i>
                                                <span class="caption-helper">GlobalEx Tasks:</span> &nbsp;
                                                <span class="caption-subject font-green-sharp bold uppercase">Tune Website</span>
                                            </div>
                                            <div class="actions">
                                                <div class="btn-group">
                                                    <a class="btn green btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> MANAGE
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;"> New Task </a>
                                                        </li>
                                                        <li class="divider"> </li>
                                                        <li>
                                                            <a href="javascript:;"> Pending
                                                                <span class="badge badge-danger"> 4 </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"> Completed
                                                                <span class="badge badge-success"> 12 </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"> Overdue
                                                                <span class="badge badge-warning"> 9 </span>
                                                            </a>
                                                        </li>
                                                        <li class="divider"> </li>
                                                        <li>
                                                            <a href="javascript:;"> Delete Project </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end PROJECT HEAD -->
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-md-5 col-sm-4">
                                                    <div class="todo-tasklist">
                                                        <div class="todo-tasklist-item todo-tasklist-item-border-green">
                                                            <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar4.jpg" width="27px" height="27px">
                                                            <div class="todo-tasklist-item-title"> Slider Redesign </div>
                                                            <div class="todo-tasklist-item-text"> Lorem dolor sit amet ipsum dolor sit consectetuer dolore. </div>
                                                            <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> 21 Sep 2014 </span>
                                                                <span class="todo-tasklist-badge badge badge-roundless">Urgent</span>
                                                            </div>
                                                        </div>
                                                        <div class="todo-tasklist-item todo-tasklist-item-border-red">
                                                            <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar5.jpg" width="27px" height="27px">
                                                            <div class="todo-tasklist-item-title"> Homepage Alignments to adjust </div>
                                                            <div class="todo-tasklist-item-text"> Lorem ipsum dolor sit amet, consectetuer dolore dolor sit amet. </div>
                                                            <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> 14 Sep 2014 </span>
                                                                <span class="todo-tasklist-badge badge badge-roundless">Important</span>
                                                            </div>
                                                        </div>
                                                        <div class="todo-tasklist-item todo-tasklist-item-border-green">
                                                            <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar9.jpg" width="27px" height="27px">
                                                            <div class="todo-tasklist-item-title"> Slider Redesign </div>
                                                            <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> 10 Feb 2015 </span>
                                                                <span class="todo-tasklist-badge badge badge-roundless">Important</span>&nbsp; </div>
                                                        </div>
                                                        <div class="todo-tasklist-item todo-tasklist-item-border-blue">
                                                            <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar6.jpg" width="27px" height="27px">
                                                            <div class="todo-tasklist-item-title"> Contact Us Map Location changes </div>
                                                            <div class="todo-tasklist-item-text"> Lorem ipsum amet, consectetuer dolore dolor sit amet. </div>
                                                            <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> 04 Oct 2014 </span>
                                                                <span class="todo-tasklist-badge badge badge-roundless">Postponed</span>&nbsp;
                                                                <span class="todo-tasklist-badge badge badge-roundless">Test</span>
                                                            </div>
                                                        </div>
                                                        <div class="todo-tasklist-item todo-tasklist-item-border-purple">
                                                            <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar7.jpg" width="27px" height="27px">
                                                            <div class="todo-tasklist-item-title"> Projects list new Forms </div>
                                                            <div class="todo-tasklist-item-text"> Lorem ipsum dolor sit amet, consectetuer dolore psum dolor sit. </div>
                                                            <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> 19 Dec 2014 </span>
                                                            </div>
                                                        </div>
                                                        <div class="todo-tasklist-item todo-tasklist-item-border-yellow">
                                                            <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar8.jpg" width="27px" height="27px">
                                                            <div class="todo-tasklist-item-title"> New Search Keywords </div>
                                                            <div class="todo-tasklist-item-text"> Lorem ipsum dolor sit amet, consectetuer sit amet ipsum dolor, consectetuer ipsum consectetuer sit amet dolore. </div>
                                                            <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> 02 Feb 2015 </span>
                                                                <span class="todo-tasklist-badge badge badge-roundless">Postponed</span>&nbsp; </div>
                                                        </div>
                                                        <div class="todo-tasklist-item todo-tasklist-item-border-green">
                                                            <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar9.jpg" width="27px" height="27px">
                                                            <div class="todo-tasklist-item-title"> Slider Redesign </div>
                                                            <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> 10 Feb 2015 </span>
                                                                <span class="todo-tasklist-badge badge badge-roundless">Important</span>&nbsp; </div>
                                                        </div>
                                                        <div class="todo-tasklist-item todo-tasklist-item-border-red">
                                                            <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar5.jpg" width="27px" height="27px">
                                                            <div class="todo-tasklist-item-title"> Homepage Alignments to adjust </div>
                                                            <div class="todo-tasklist-item-text"> Lorem ipsum dolor sit amet, consectetuer dolore psum dolor sit. </div>
                                                            <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> 14 Sep 2014 </span>
                                                                <span class="todo-tasklist-badge badge badge-roundless">Important</span>
                                                            </div>
                                                        </div>
                                                        <div class="todo-tasklist-item todo-tasklist-item-border-blue">
                                                            <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar6.jpg" width="27px" height="27px">
                                                            <div class="todo-tasklist-item-title"> Contact Us Improvement </div>
                                                            <div class="todo-tasklist-item-text"> Lorem ipsum amet, psum dolor sit consectetuer dolore. </div>
                                                            <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> 21 Feb 2015 </span>
                                                                <span class="todo-tasklist-badge badge badge-roundless">Postponed</span>&nbsp;
                                                                <span class="todo-tasklist-badge badge badge-roundless">Primary</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="todo-tasklist-devider"> </div>
                                                <div class="col-md-7 col-sm-8">
                                                    <form action="#" class="form-horizontal">
                                                        <!-- TASK HEAD -->
                                                        <div class="form">
                                                            <div class="form-group">
                                                                <div class="col-md-8 col-sm-8">
                                                                    <div class="todo-taskbody-user">
                                                                        <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar6.jpg" width="50px" height="50px">
                                                                        <span class="todo-username pull-left">Vanessa Bond</span>
                                                                        <button type="button" class="todo-username-btn btn btn-circle btn-default btn-sm">&nbsp;edit&nbsp;</button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4">
                                                                    <div class="todo-taskbody-date pull-right">
                                                                        <button type="button" class="todo-username-btn btn btn-circle btn-default btn-sm">&nbsp; Complete &nbsp;</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- END TASK HEAD -->
                                                            <!-- TASK TITLE -->
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control todo-taskbody-tasktitle" placeholder="Task Title..."> </div>
                                                            </div>
                                                            <!-- TASK DESC -->
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <textarea class="form-control todo-taskbody-taskdesc" rows="8" placeholder="Task Description..."></textarea>
                                                                </div>
                                                            </div>
                                                            <!-- END TASK DESC -->
                                                            <!-- TASK DUE DATE -->
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <div class="input-icon">
                                                                        <i class="fa fa-calendar"></i>
                                                                        <input type="text" class="form-control todo-taskbody-due" placeholder="Due Date..."> </div>
                                                                </div>
                                                            </div>
                                                            <!-- TASK TAGS -->
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <select class="form-control todo-taskbody-tags">
                                                                        <option value="Pending">Pending</option>
                                                                        <option value="Completed">Completed</option>
                                                                        <option value="Testing">Testing</option>
                                                                        <option value="Approved">Approed</option>
                                                                        <option value="Rejected">Rejected</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!-- TASK TAGS -->
                                                            <div class="form-actions right todo-form-actions">
                                                                <button class="btn btn-circle btn-sm green">Save Changes</button>
                                                                <button class="btn btn-circle btn-sm btn-default">Cancel</button>
                                                            </div>
                                                        </div>
                                                        <div class="tabbable-line">
                                                            <ul class="nav nav-tabs ">
                                                                <li class="active">
                                                                    <a href="#tab_1" data-toggle="tab"> Comments </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#tab_2" data-toggle="tab"> History </a>
                                                                </li>
                                                            </ul>
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="tab_1">
                                                                    <!-- TASK COMMENTS -->
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <ul class="media-list">
                                                                                <li class="media">
                                                                                    <a class="pull-left" href="javascript:;">
                                                                                        <img class="todo-userpic" src="assets/pages/media/users/avatar8.jpg" width="27px" height="27px"> </a>
                                                                                    <div class="media-body todo-comment">
                                                                                        <button type="button" class="todo-comment-btn btn btn-circle btn-default btn-sm">&nbsp; Reply &nbsp;</button>
                                                                                        <p class="todo-comment-head">
                                                                                            <span class="todo-comment-username">Christina Aguilera</span> &nbsp;
                                                                                            <span class="todo-comment-date">17 Sep 2014 at 2:05pm</span>
                                                                                        </p>
                                                                                        <p class="todo-text-color"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                                                                            </p>
                                                                                        <!-- Nested media object -->
                                                                                        <div class="media">
                                                                                            <a class="pull-left" href="javascript:;">
                                                                                                <img class="todo-userpic" src="assets/pages/media/users/avatar4.jpg" width="27px" height="27px"> </a>
                                                                                            <div class="media-body">
                                                                                                <p class="todo-comment-head">
                                                                                                    <span class="todo-comment-username">Carles Puyol</span> &nbsp;
                                                                                                    <span class="todo-comment-date">17 Sep 2014 at 4:30pm</span>
                                                                                                </p>
                                                                                                <p class="todo-text-color"> Thanks so much my dear! </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li class="media">
                                                                                    <a class="pull-left" href="javascript:;">
                                                                                        <img class="todo-userpic" src="assets/pages/media/users/avatar5.jpg" width="27px" height="27px"> </a>
                                                                                    <div class="media-body todo-comment">
                                                                                        <button type="button" class="todo-comment-btn btn btn-circle btn-default btn-sm">&nbsp; Reply &nbsp;</button>
                                                                                        <p class="todo-comment-head">
                                                                                            <span class="todo-comment-username">Andres Iniesta</span> &nbsp;
                                                                                            <span class="todo-comment-date">18 Sep 2014 at 9:22am</span>
                                                                                        </p>
                                                                                        <p class="todo-text-color"> Cras sit amet nibh libero, in gravida nulla. Scelerisque ante sollicitudin commodo Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum
                                                                                            in vulputate at, tempus viverra turpis.
                                                                                            <br> </p>
                                                                                    </div>
                                                                                </li>
                                                                                <li class="media">
                                                                                    <a class="pull-left" href="javascript:;">
                                                                                        <img class="todo-userpic" src="assets/pages/media/users/avatar6.jpg" width="27px" height="27px"> </a>
                                                                                    <div class="media-body todo-comment">
                                                                                        <button type="button" class="todo-comment-btn btn btn-circle btn-default btn-sm">&nbsp; Reply &nbsp;</button>
                                                                                        <p class="todo-comment-head">
                                                                                            <span class="todo-comment-username">Olivia Wilde</span> &nbsp;
                                                                                            <span class="todo-comment-date">18 Sep 2014 at 11:50am</span>
                                                                                        </p>
                                                                                        <p class="todo-text-color"> Cras sit amet nibh libero, in gravida nulla. Scelerisque ante sollicitudin commodo Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum
                                                                                            in vulputate at, tempus viverra turpis.
                                                                                            <br> </p>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END TASK COMMENTS -->
                                                                    <!-- TASK COMMENT FORM -->
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <ul class="media-list">
                                                                                <li class="media">
                                                                                    <a class="pull-left" href="javascript:;">
                                                                                        <img class="todo-userpic" src="assets/pages/media/users/avatar4.jpg" width="27px" height="27px"> </a>
                                                                                    <div class="media-body">
                                                                                        <textarea class="form-control todo-taskbody-taskdesc" rows="4" placeholder="Type comment..."></textarea>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                            <button type="button" class="pull-right btn btn-sm btn-circle green"> &nbsp; Submit &nbsp; </button>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END TASK COMMENT FORM -->
                                                                </div>
                                                                <div class="tab-pane" id="tab_2">
                                                                    <ul class="todo-task-history">
                                                                        <li>
                                                                            <div class="todo-task-history-date"> 20 Jun, 2014 at 11:35am </div>
                                                                            <div class="todo-task-history-desc"> Task created </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="todo-task-history-date"> 21 Jun, 2014 at 10:35pm </div>
                                                                            <div class="todo-task-history-desc"> Task category status changed to "Top Priority" </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="todo-task-history-date"> 22 Jun, 2014 at 11:35am </div>
                                                                            <div class="todo-task-history-desc"> Task owner changed to "Nick Larson" </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="todo-task-history-date"> 30 Jun, 2014 at 8:09am </div>
                                                                            <div class="todo-task-history-desc"> Task completed by "Nick Larson" </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END TODO CONTENT -->
                            </div>
                        </div>
                        <!-- END PAGE CONTENT-->
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
            <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
                <div class="page-quick-sidebar">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                                <span class="badge badge-danger">2</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                                <span class="badge badge-success">7</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-bell"></i> Alerts </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-info"></i> Notifications </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-speech"></i> Activities </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-settings"></i> Settings </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                            <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                                <h3 class="list-heading">Staff</h3>
                                <ul class="media-list list-items">
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-success">8</span>
                                        </div>
                                        <img class="media-object" src="assets/layouts/layout/img/avatar3.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Bob Nilson</h4>
                                            <div class="media-heading-sub"> Project Manager </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="assets/layouts/layout/img/avatar1.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Nick Larson</h4>
                                            <div class="media-heading-sub"> Art Director </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">3</span>
                                        </div>
                                        <img class="media-object" src="assets/layouts/layout/img/avatar4.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Deon Hubert</h4>
                                            <div class="media-heading-sub"> CTO </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="assets/layouts/layout/img/avatar2.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Ella Wong</h4>
                                            <div class="media-heading-sub"> CEO </div>
                                        </div>
                                    </li>
                                </ul>
                                <h3 class="list-heading">Customers</h3>
                                <ul class="media-list list-items">
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-warning">2</span>
                                        </div>
                                        <img class="media-object" src="assets/layouts/layout/img/avatar6.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Lara Kunis</h4>
                                            <div class="media-heading-sub"> CEO, Loop Inc </div>
                                            <div class="media-heading-small"> Last seen 03:10 AM </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="label label-sm label-success">new</span>
                                        </div>
                                        <img class="media-object" src="assets/layouts/layout/img/avatar7.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Ernie Kyllonen</h4>
                                            <div class="media-heading-sub"> Project Manager,
                                                <br> SmartBizz PTL </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="assets/layouts/layout/img/avatar8.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Lisa Stone</h4>
                                            <div class="media-heading-sub"> CTO, Keort Inc </div>
                                            <div class="media-heading-small"> Last seen 13:10 PM </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-success">7</span>
                                        </div>
                                        <img class="media-object" src="assets/layouts/layout/img/avatar9.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Deon Portalatin</h4>
                                            <div class="media-heading-sub"> CFO, H&D LTD </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="assets/layouts/layout/img/avatar10.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Irina Savikova</h4>
                                            <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">4</span>
                                        </div>
                                        <img class="media-object" src="assets/layouts/layout/img/avatar11.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Maria Gomez</h4>
                                            <div class="media-heading-sub"> Manager, Infomatic Inc </div>
                                            <div class="media-heading-small"> Last seen 03:10 AM </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="page-quick-sidebar-item">
                                <div class="page-quick-sidebar-chat-user">
                                    <div class="page-quick-sidebar-nav">
                                        <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                            <i class="icon-arrow-left"></i>Back</a>
                                    </div>
                                    <div class="page-quick-sidebar-chat-user-messages">
                                        <div class="post out">
                                            <img class="avatar" alt="" src="assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> When could you send me the report ? </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> Its almost done. I will be sending it shortly </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> Alright. Thanks! :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:16</span>
                                                <span class="body"> You are most welcome. Sorry for the delay. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> No probs. Just take your time :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:40</span>
                                                <span class="body"> Alright. I just emailed it to you. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> Great! Thanks. Will check it right away. </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:40</span>
                                                <span class="body"> Please let me know if you have any comment. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="page-quick-sidebar-chat-user-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Type a message here...">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn green">
                                                    <i class="icon-paper-clip"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                            <div class="page-quick-sidebar-alerts-list">
                                <h3 class="list-heading">General</h3>
                                <ul class="feeds list-items">
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 4 pending tasks.
                                                        <span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> Just now </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-bar-chart-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-danger">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received with
                                                        <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 30 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Web server hardware needs to be upgraded.
                                                        <span class="label label-sm label-warning"> Overdue </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 2 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-default">
                                                            <i class="fa fa-briefcase"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <h3 class="list-heading">System</h3>
                                <ul class="feeds list-items">
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 4 pending tasks.
                                                        <span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> Just now </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-danger">
                                                            <i class="fa fa-bar-chart-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-default">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received with
                                                        <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 30 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Web server hardware needs to be upgraded.
                                                        <span class="label label-sm label-default "> Overdue </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 2 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-briefcase"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                            <div class="page-quick-sidebar-settings-list">
                                <h3 class="list-heading">General Settings</h3>
                                <ul class="list-items borderless">
                                    <li> Enable Notifications
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Allow Tracking
                                        <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Log Errors
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Auto Sumbit Issues
                                        <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Enable SMS Alerts
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                </ul>
                                <h3 class="list-heading">System Settings</h3>
                                <ul class="list-items borderless">
                                    <li> Security Level
                                        <select class="form-control input-inline input-sm input-small">
                                            <option value="1">Normal</option>
                                            <option value="2" selected>Medium</option>
                                            <option value="e">High</option>
                                        </select>
                                    </li>
                                    <li> Failed Email Attempts
                                        <input class="form-control input-inline input-sm input-small" value="5" /> </li>
                                    <li> Secondary SMTP Port
                                        <input class="form-control input-inline input-sm input-small" value="3560" /> </li>
                                    <li> Notify On System Error
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Notify On SMTP Error
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                </ul>
                                <div class="inner-content">
                                    <button class="btn btn-success">
                                        <i class="icon-settings"></i> Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
       <?php
        require_once 'footer.php';        
       ?>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/apps/scripts/todo-2.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

=======


    <head>
        <meta charset="utf-8" />
        <title>Metronic | Todo 2</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        
        
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="assets/apps/css/todo-2.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
        
         <?php
        require_once 'header.php';        
       ?>
        
        
       
             <?php
        require_once 'sidebar.php';        
       ?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    <div class="theme-panel">
                        <div class="toggler tooltips" data-container="body" data-placement="left" data-html="true" data-original-title="Click to open advance theme customizer panel">
                            <i class="icon-settings"></i>
                        </div>
                        <div class="toggler-close">
                            <i class="icon-close"></i>
                        </div>
                        <div class="theme-options">
                            <div class="theme-option theme-colors clearfix">
                                <span> THEME COLOR </span>
                                <ul>
                                    <li class="color-default current tooltips" data-style="default" data-container="body" data-original-title="Default"> </li>
                                    <li class="color-grey tooltips" data-style="grey" data-container="body" data-original-title="Grey"> </li>
                                    <li class="color-blue tooltips" data-style="blue" data-container="body" data-original-title="Blue"> </li>
                                    <li class="color-dark tooltips" data-style="dark" data-container="body" data-original-title="Dark"> </li>
                                    <li class="color-light tooltips" data-style="light" data-container="body" data-original-title="Light"> </li>
                                </ul>
                            </div>
                            <div class="theme-option">
                                <span> Theme Style </span>
                                <select class="layout-style-option form-control input-small">
                                    <option value="square" selected="selected">Square corners</option>
                                    <option value="rounded">Rounded corners</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Layout </span>
                                <select class="layout-option form-control input-small">
                                    <option value="fluid" selected="selected">Fluid</option>
                                    <option value="boxed">Boxed</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Header </span>
                                <select class="page-header-option form-control input-small">
                                    <option value="fixed" selected="selected">Fixed</option>
                                    <option value="default">Default</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Top Dropdown</span>
                                <select class="page-header-top-dropdown-style-option form-control input-small">
                                    <option value="light" selected="selected">Light</option>
                                    <option value="dark">Dark</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Mode</span>
                                <select class="sidebar-option form-control input-small">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected="selected">Default</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Style</span>
                                <select class="sidebar-style-option form-control input-small">
                                    <option value="default" selected="selected">Default</option>
                                    <option value="compact">Compact</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Menu </span>
                                <select class="sidebar-menu-option form-control input-small">
                                    <option value="accordion" selected="selected">Accordion</option>
                                    <option value="hover">Hover</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Sidebar Position </span>
                                <select class="sidebar-pos-option form-control input-small">
                                    <option value="left" selected="selected">Left</option>
                                    <option value="right">Right</option>
                                </select>
                            </div>
                            <div class="theme-option">
                                <span> Footer </span>
                                <select class="page-footer-option form-control input-small">
                                    <option value="fixed">Fixed</option>
                                    <option value="default" selected="selected">Default</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- END THEME PANEL -->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN TODO SIDEBAR -->
                            <div class="todo-ui">
                                <div class="todo-sidebar">
                                    <div class="portlet light ">
                                        <div class="portlet-title">
                                            <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content">
                                                <span class="caption-subject font-green-sharp bold uppercase">PROJECTS </span>
                                                <span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view project list</span>
                                            </div>
                                            <div class="actions">
                                                <div class="btn-group">
                                                    <a class="btn green btn-circle btn-outline btn-sm todo-projects-config" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                                        <i class="icon-settings"></i> &nbsp;
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;"> New Project </a>
                                                        </li>
                                                        <li class="divider"> </li>
                                                        <li>
                                                            <a href="javascript:;"> Pending
                                                                <span class="badge badge-danger"> 4 </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"> Completed
                                                                <span class="badge badge-success"> 12 </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"> Overdue
                                                                <span class="badge badge-warning"> 9 </span>
                                                            </a>
                                                        </li>
                                                        <li class="divider"> </li>
                                                        <li>
                                                            <a href="javascript:;"> Archived Projects </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="portlet-body todo-project-list-content">
                                            <div class="todo-project-list">
                                                <ul class="nav nav-stacked">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-info"> 6 </span> AirAsia Ads </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-success"> 2 </span> HSBC Promo </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="javascript:;">
                                                            <span class="badge badge-success"> 3 </span> GlobalEx</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-default"> 14 </span> Empire City </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-info"> 6 </span> AirAsia Ads </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-danger"> 2 </span> Loop Inc Promo </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet light ">
                                        <div class="portlet-title">
                                            <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content-tags">
                                                <span class="caption-subject font-red bold uppercase">TAGS </span>
                                                <span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view</span>
                                            </div>
                                            <div class="actions">
                                                <div class="actions">
                                                    <a class="btn btn-circle grey-salsa btn-outline btn-sm" href="javascript:;">
                                                        <i class="fa fa-plus"></i> Add </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="portlet-body todo-project-list-content todo-project-list-content-tags">
                                            <div class="todo-project-list">
                                                <ul class="nav nav-pills nav-stacked">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-danger"> 6 </span> Pending </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-info"> 2 </span> Completed </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-success"> 14 </span> In Progress </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-warning"> 6 </span> Closed </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="badge badge-info"> 2 </span> Delivered </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END TODO SIDEBAR -->
                                <!-- BEGIN TODO CONTENT -->
                                <div class="todo-content">
                                    <div class="portlet light ">
                                        <!-- PROJECT HEAD -->
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="icon-bar-chart font-green-sharp hide"></i>
                                                <span class="caption-helper">GlobalEx Tasks:</span> &nbsp;
                                                <span class="caption-subject font-green-sharp bold uppercase">Tune Website</span>
                                            </div>
                                            <div class="actions">
                                                <div class="btn-group">
                                                    <a class="btn green btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> MANAGE
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;"> New Task </a>
                                                        </li>
                                                        <li class="divider"> </li>
                                                        <li>
                                                            <a href="javascript:;"> Pending
                                                                <span class="badge badge-danger"> 4 </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"> Completed
                                                                <span class="badge badge-success"> 12 </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"> Overdue
                                                                <span class="badge badge-warning"> 9 </span>
                                                            </a>
                                                        </li>
                                                        <li class="divider"> </li>
                                                        <li>
                                                            <a href="javascript:;"> Delete Project </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end PROJECT HEAD -->
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-md-5 col-sm-4">
                                                    <div class="todo-tasklist">
                                                        <div class="todo-tasklist-item todo-tasklist-item-border-green">
                                                            <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar4.jpg" width="27px" height="27px">
                                                            <div class="todo-tasklist-item-title"> Slider Redesign </div>
                                                            <div class="todo-tasklist-item-text"> Lorem dolor sit amet ipsum dolor sit consectetuer dolore. </div>
                                                            <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> 21 Sep 2014 </span>
                                                                <span class="todo-tasklist-badge badge badge-roundless">Urgent</span>
                                                            </div>
                                                        </div>
                                                        <div class="todo-tasklist-item todo-tasklist-item-border-red">
                                                            <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar5.jpg" width="27px" height="27px">
                                                            <div class="todo-tasklist-item-title"> Homepage Alignments to adjust </div>
                                                            <div class="todo-tasklist-item-text"> Lorem ipsum dolor sit amet, consectetuer dolore dolor sit amet. </div>
                                                            <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> 14 Sep 2014 </span>
                                                                <span class="todo-tasklist-badge badge badge-roundless">Important</span>
                                                            </div>
                                                        </div>
                                                        <div class="todo-tasklist-item todo-tasklist-item-border-green">
                                                            <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar9.jpg" width="27px" height="27px">
                                                            <div class="todo-tasklist-item-title"> Slider Redesign </div>
                                                            <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> 10 Feb 2015 </span>
                                                                <span class="todo-tasklist-badge badge badge-roundless">Important</span>&nbsp; </div>
                                                        </div>
                                                        <div class="todo-tasklist-item todo-tasklist-item-border-blue">
                                                            <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar6.jpg" width="27px" height="27px">
                                                            <div class="todo-tasklist-item-title"> Contact Us Map Location changes </div>
                                                            <div class="todo-tasklist-item-text"> Lorem ipsum amet, consectetuer dolore dolor sit amet. </div>
                                                            <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> 04 Oct 2014 </span>
                                                                <span class="todo-tasklist-badge badge badge-roundless">Postponed</span>&nbsp;
                                                                <span class="todo-tasklist-badge badge badge-roundless">Test</span>
                                                            </div>
                                                        </div>
                                                        <div class="todo-tasklist-item todo-tasklist-item-border-purple">
                                                            <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar7.jpg" width="27px" height="27px">
                                                            <div class="todo-tasklist-item-title"> Projects list new Forms </div>
                                                            <div class="todo-tasklist-item-text"> Lorem ipsum dolor sit amet, consectetuer dolore psum dolor sit. </div>
                                                            <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> 19 Dec 2014 </span>
                                                            </div>
                                                        </div>
                                                        <div class="todo-tasklist-item todo-tasklist-item-border-yellow">
                                                            <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar8.jpg" width="27px" height="27px">
                                                            <div class="todo-tasklist-item-title"> New Search Keywords </div>
                                                            <div class="todo-tasklist-item-text"> Lorem ipsum dolor sit amet, consectetuer sit amet ipsum dolor, consectetuer ipsum consectetuer sit amet dolore. </div>
                                                            <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> 02 Feb 2015 </span>
                                                                <span class="todo-tasklist-badge badge badge-roundless">Postponed</span>&nbsp; </div>
                                                        </div>
                                                        <div class="todo-tasklist-item todo-tasklist-item-border-green">
                                                            <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar9.jpg" width="27px" height="27px">
                                                            <div class="todo-tasklist-item-title"> Slider Redesign </div>
                                                            <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> 10 Feb 2015 </span>
                                                                <span class="todo-tasklist-badge badge badge-roundless">Important</span>&nbsp; </div>
                                                        </div>
                                                        <div class="todo-tasklist-item todo-tasklist-item-border-red">
                                                            <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar5.jpg" width="27px" height="27px">
                                                            <div class="todo-tasklist-item-title"> Homepage Alignments to adjust </div>
                                                            <div class="todo-tasklist-item-text"> Lorem ipsum dolor sit amet, consectetuer dolore psum dolor sit. </div>
                                                            <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> 14 Sep 2014 </span>
                                                                <span class="todo-tasklist-badge badge badge-roundless">Important</span>
                                                            </div>
                                                        </div>
                                                        <div class="todo-tasklist-item todo-tasklist-item-border-blue">
                                                            <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar6.jpg" width="27px" height="27px">
                                                            <div class="todo-tasklist-item-title"> Contact Us Improvement </div>
                                                            <div class="todo-tasklist-item-text"> Lorem ipsum amet, psum dolor sit consectetuer dolore. </div>
                                                            <div class="todo-tasklist-controls pull-left">
                                                                <span class="todo-tasklist-date">
                                                                    <i class="fa fa-calendar"></i> 21 Feb 2015 </span>
                                                                <span class="todo-tasklist-badge badge badge-roundless">Postponed</span>&nbsp;
                                                                <span class="todo-tasklist-badge badge badge-roundless">Primary</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="todo-tasklist-devider"> </div>
                                                <div class="col-md-7 col-sm-8">
                                                    <form action="#" class="form-horizontal">
                                                        <!-- TASK HEAD -->
                                                        <div class="form">
                                                            <div class="form-group">
                                                                <div class="col-md-8 col-sm-8">
                                                                    <div class="todo-taskbody-user">
                                                                        <img class="todo-userpic pull-left" src="assets/pages/media/users/avatar6.jpg" width="50px" height="50px">
                                                                        <span class="todo-username pull-left">Vanessa Bond</span>
                                                                        <button type="button" class="todo-username-btn btn btn-circle btn-default btn-sm">&nbsp;edit&nbsp;</button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-sm-4">
                                                                    <div class="todo-taskbody-date pull-right">
                                                                        <button type="button" class="todo-username-btn btn btn-circle btn-default btn-sm">&nbsp; Complete &nbsp;</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- END TASK HEAD -->
                                                            <!-- TASK TITLE -->
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <input type="text" class="form-control todo-taskbody-tasktitle" placeholder="Task Title..."> </div>
                                                            </div>
                                                            <!-- TASK DESC -->
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <textarea class="form-control todo-taskbody-taskdesc" rows="8" placeholder="Task Description..."></textarea>
                                                                </div>
                                                            </div>
                                                            <!-- END TASK DESC -->
                                                            <!-- TASK DUE DATE -->
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <div class="input-icon">
                                                                        <i class="fa fa-calendar"></i>
                                                                        <input type="text" class="form-control todo-taskbody-due" placeholder="Due Date..."> </div>
                                                                </div>
                                                            </div>
                                                            <!-- TASK TAGS -->
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <select class="form-control todo-taskbody-tags">
                                                                        <option value="Pending">Pending</option>
                                                                        <option value="Completed">Completed</option>
                                                                        <option value="Testing">Testing</option>
                                                                        <option value="Approved">Approed</option>
                                                                        <option value="Rejected">Rejected</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!-- TASK TAGS -->
                                                            <div class="form-actions right todo-form-actions">
                                                                <button class="btn btn-circle btn-sm green">Save Changes</button>
                                                                <button class="btn btn-circle btn-sm btn-default">Cancel</button>
                                                            </div>
                                                        </div>
                                                        <div class="tabbable-line">
                                                            <ul class="nav nav-tabs ">
                                                                <li class="active">
                                                                    <a href="#tab_1" data-toggle="tab"> Comments </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#tab_2" data-toggle="tab"> History </a>
                                                                </li>
                                                            </ul>
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="tab_1">
                                                                    <!-- TASK COMMENTS -->
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <ul class="media-list">
                                                                                <li class="media">
                                                                                    <a class="pull-left" href="javascript:;">
                                                                                        <img class="todo-userpic" src="assets/pages/media/users/avatar8.jpg" width="27px" height="27px"> </a>
                                                                                    <div class="media-body todo-comment">
                                                                                        <button type="button" class="todo-comment-btn btn btn-circle btn-default btn-sm">&nbsp; Reply &nbsp;</button>
                                                                                        <p class="todo-comment-head">
                                                                                            <span class="todo-comment-username">Christina Aguilera</span> &nbsp;
                                                                                            <span class="todo-comment-date">17 Sep 2014 at 2:05pm</span>
                                                                                        </p>
                                                                                        <p class="todo-text-color"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                                                                            </p>
                                                                                        <!-- Nested media object -->
                                                                                        <div class="media">
                                                                                            <a class="pull-left" href="javascript:;">
                                                                                                <img class="todo-userpic" src="assets/pages/media/users/avatar4.jpg" width="27px" height="27px"> </a>
                                                                                            <div class="media-body">
                                                                                                <p class="todo-comment-head">
                                                                                                    <span class="todo-comment-username">Carles Puyol</span> &nbsp;
                                                                                                    <span class="todo-comment-date">17 Sep 2014 at 4:30pm</span>
                                                                                                </p>
                                                                                                <p class="todo-text-color"> Thanks so much my dear! </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </li>
                                                                                <li class="media">
                                                                                    <a class="pull-left" href="javascript:;">
                                                                                        <img class="todo-userpic" src="assets/pages/media/users/avatar5.jpg" width="27px" height="27px"> </a>
                                                                                    <div class="media-body todo-comment">
                                                                                        <button type="button" class="todo-comment-btn btn btn-circle btn-default btn-sm">&nbsp; Reply &nbsp;</button>
                                                                                        <p class="todo-comment-head">
                                                                                            <span class="todo-comment-username">Andres Iniesta</span> &nbsp;
                                                                                            <span class="todo-comment-date">18 Sep 2014 at 9:22am</span>
                                                                                        </p>
                                                                                        <p class="todo-text-color"> Cras sit amet nibh libero, in gravida nulla. Scelerisque ante sollicitudin commodo Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum
                                                                                            in vulputate at, tempus viverra turpis.
                                                                                            <br> </p>
                                                                                    </div>
                                                                                </li>
                                                                                <li class="media">
                                                                                    <a class="pull-left" href="javascript:;">
                                                                                        <img class="todo-userpic" src="assets/pages/media/users/avatar6.jpg" width="27px" height="27px"> </a>
                                                                                    <div class="media-body todo-comment">
                                                                                        <button type="button" class="todo-comment-btn btn btn-circle btn-default btn-sm">&nbsp; Reply &nbsp;</button>
                                                                                        <p class="todo-comment-head">
                                                                                            <span class="todo-comment-username">Olivia Wilde</span> &nbsp;
                                                                                            <span class="todo-comment-date">18 Sep 2014 at 11:50am</span>
                                                                                        </p>
                                                                                        <p class="todo-text-color"> Cras sit amet nibh libero, in gravida nulla. Scelerisque ante sollicitudin commodo Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum
                                                                                            in vulputate at, tempus viverra turpis.
                                                                                            <br> </p>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END TASK COMMENTS -->
                                                                    <!-- TASK COMMENT FORM -->
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <ul class="media-list">
                                                                                <li class="media">
                                                                                    <a class="pull-left" href="javascript:;">
                                                                                        <img class="todo-userpic" src="assets/pages/media/users/avatar4.jpg" width="27px" height="27px"> </a>
                                                                                    <div class="media-body">
                                                                                        <textarea class="form-control todo-taskbody-taskdesc" rows="4" placeholder="Type comment..."></textarea>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                            <button type="button" class="pull-right btn btn-sm btn-circle green"> &nbsp; Submit &nbsp; </button>
                                                                        </div>
                                                                    </div>
                                                                    <!-- END TASK COMMENT FORM -->
                                                                </div>
                                                                <div class="tab-pane" id="tab_2">
                                                                    <ul class="todo-task-history">
                                                                        <li>
                                                                            <div class="todo-task-history-date"> 20 Jun, 2014 at 11:35am </div>
                                                                            <div class="todo-task-history-desc"> Task created </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="todo-task-history-date"> 21 Jun, 2014 at 10:35pm </div>
                                                                            <div class="todo-task-history-desc"> Task category status changed to "Top Priority" </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="todo-task-history-date"> 22 Jun, 2014 at 11:35am </div>
                                                                            <div class="todo-task-history-desc"> Task owner changed to "Nick Larson" </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="todo-task-history-date"> 30 Jun, 2014 at 8:09am </div>
                                                                            <div class="todo-task-history-desc"> Task completed by "Nick Larson" </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END TODO CONTENT -->
                            </div>
                        </div>
                        <!-- END PAGE CONTENT-->
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
            <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
                <div class="page-quick-sidebar">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                                <span class="badge badge-danger">2</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                                <span class="badge badge-success">7</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-bell"></i> Alerts </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-info"></i> Notifications </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-speech"></i> Activities </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-settings"></i> Settings </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                            <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                                <h3 class="list-heading">Staff</h3>
                                <ul class="media-list list-items">
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-success">8</span>
                                        </div>
                                        <img class="media-object" src="assets/layouts/layout/img/avatar3.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Bob Nilson</h4>
                                            <div class="media-heading-sub"> Project Manager </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="assets/layouts/layout/img/avatar1.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Nick Larson</h4>
                                            <div class="media-heading-sub"> Art Director </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">3</span>
                                        </div>
                                        <img class="media-object" src="assets/layouts/layout/img/avatar4.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Deon Hubert</h4>
                                            <div class="media-heading-sub"> CTO </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="assets/layouts/layout/img/avatar2.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Ella Wong</h4>
                                            <div class="media-heading-sub"> CEO </div>
                                        </div>
                                    </li>
                                </ul>
                                <h3 class="list-heading">Customers</h3>
                                <ul class="media-list list-items">
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-warning">2</span>
                                        </div>
                                        <img class="media-object" src="assets/layouts/layout/img/avatar6.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Lara Kunis</h4>
                                            <div class="media-heading-sub"> CEO, Loop Inc </div>
                                            <div class="media-heading-small"> Last seen 03:10 AM </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="label label-sm label-success">new</span>
                                        </div>
                                        <img class="media-object" src="assets/layouts/layout/img/avatar7.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Ernie Kyllonen</h4>
                                            <div class="media-heading-sub"> Project Manager,
                                                <br> SmartBizz PTL </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="assets/layouts/layout/img/avatar8.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Lisa Stone</h4>
                                            <div class="media-heading-sub"> CTO, Keort Inc </div>
                                            <div class="media-heading-small"> Last seen 13:10 PM </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-success">7</span>
                                        </div>
                                        <img class="media-object" src="assets/layouts/layout/img/avatar9.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Deon Portalatin</h4>
                                            <div class="media-heading-sub"> CFO, H&D LTD </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="assets/layouts/layout/img/avatar10.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Irina Savikova</h4>
                                            <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">4</span>
                                        </div>
                                        <img class="media-object" src="assets/layouts/layout/img/avatar11.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Maria Gomez</h4>
                                            <div class="media-heading-sub"> Manager, Infomatic Inc </div>
                                            <div class="media-heading-small"> Last seen 03:10 AM </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="page-quick-sidebar-item">
                                <div class="page-quick-sidebar-chat-user">
                                    <div class="page-quick-sidebar-nav">
                                        <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                            <i class="icon-arrow-left"></i>Back</a>
                                    </div>
                                    <div class="page-quick-sidebar-chat-user-messages">
                                        <div class="post out">
                                            <img class="avatar" alt="" src="assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> When could you send me the report ? </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> Its almost done. I will be sending it shortly </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> Alright. Thanks! :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:16</span>
                                                <span class="body"> You are most welcome. Sorry for the delay. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> No probs. Just take your time :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:40</span>
                                                <span class="body"> Alright. I just emailed it to you. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> Great! Thanks. Will check it right away. </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:40</span>
                                                <span class="body"> Please let me know if you have any comment. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="page-quick-sidebar-chat-user-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Type a message here...">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn green">
                                                    <i class="icon-paper-clip"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                            <div class="page-quick-sidebar-alerts-list">
                                <h3 class="list-heading">General</h3>
                                <ul class="feeds list-items">
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 4 pending tasks.
                                                        <span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> Just now </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-bar-chart-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-danger">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received with
                                                        <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 30 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Web server hardware needs to be upgraded.
                                                        <span class="label label-sm label-warning"> Overdue </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 2 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-default">
                                                            <i class="fa fa-briefcase"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <h3 class="list-heading">System</h3>
                                <ul class="feeds list-items">
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 4 pending tasks.
                                                        <span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> Just now </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-danger">
                                                            <i class="fa fa-bar-chart-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-default">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received with
                                                        <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 30 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Web server hardware needs to be upgraded.
                                                        <span class="label label-sm label-default "> Overdue </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 2 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-briefcase"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                            <div class="page-quick-sidebar-settings-list">
                                <h3 class="list-heading">General Settings</h3>
                                <ul class="list-items borderless">
                                    <li> Enable Notifications
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Allow Tracking
                                        <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Log Errors
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Auto Sumbit Issues
                                        <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Enable SMS Alerts
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                </ul>
                                <h3 class="list-heading">System Settings</h3>
                                <ul class="list-items borderless">
                                    <li> Security Level
                                        <select class="form-control input-inline input-sm input-small">
                                            <option value="1">Normal</option>
                                            <option value="2" selected>Medium</option>
                                            <option value="e">High</option>
                                        </select>
                                    </li>
                                    <li> Failed Email Attempts
                                        <input class="form-control input-inline input-sm input-small" value="5" /> </li>
                                    <li> Secondary SMTP Port
                                        <input class="form-control input-inline input-sm input-small" value="3560" /> </li>
                                    <li> Notify On System Error
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Notify On SMTP Error
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                </ul>
                                <div class="inner-content">
                                    <button class="btn btn-success">
                                        <i class="icon-settings"></i> Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
       <?php
        require_once 'footer.php';        
       ?>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/apps/scripts/todo-2.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

>>>>>>> 36284f27f11e958b4d983bcc0b1a1459277ba6d0
</html>