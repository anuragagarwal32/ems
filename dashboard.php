
 <?php
            require_once 'header.php';
        ?>
         <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="assets/apps/css/inbox.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        

    <!-- <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid"> -->
      
        
            <?php
            require_once 'sidebar.php';
        ?>
        <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <div class="col-md-4">
                        <!-- BEGIN PORTLET-->
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption">
                                    <span class="caption-subject font-dark bold uppercase">Name Jere</span>
                                </div>
                                <div class="actions">
                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                        <i class="icon-plus"></i>
                                    </a>
                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                        <i class="icon-settings"></i>
                                    </a>
                                   
                                </div>
                            </div>
                            
                                <h4 class="block">Email@1234.com</h4>
                                <div style="margin-bottom: 20px;">
                                    <strong style="color: #7f7f7f;">Unassigned</strong> <span class="pull-right" style="color: #6f6f6f;">10</span> </div>
                                <div style="margin-bottom: 20px">
                                    <strong style="color: #7f7f7f;">Mine</strong> <span class="pull-right" style="color: #6f6f6f;">10</span> </div>
                                <div style="margin-bottom: 20px">
                                    <strong style="color: #7f7f7f;">Assigned</strong> <span class="pull-right" style="color: #6f6f6f;">10</span> </div>
                                
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-success">
                                            <!-- Default panel contents -->
                                            <div class="panel-heading">
                                                <h3 class="panel-title" style="font-weight: 600;">Name Here</h3>
                                            </div>
                                            <div class="panel-body">
                                                 <span style="font-size: 1.3em; font-weight: 600; color: #6f6f6f; text-align: center;">
                                                     Email@1234 
                                                 </span>
                                            </div>
                                            <!-- List group -->
                                            <ul class="list-group">
                                                <li class="list-group-item"> Unassigned
                                                    <span class="badge badge-default"> 3 </span>
                                                </li>
                                                <li class="list-group-item"> Mine
                                                    <span class="badge badge-success"> 11 </span>
                                                </li>
                                                <li class="list-group-item"> Assigned
                                                    <span class="badge badge-danger"> new </span>
                                                </li>
                                                
                                            </ul>
                                        </div>
                    </div>
                </div>
                       

            </div>
            <?php
                require_once 'footer.php';
            ?>        