<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>School Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">

    <!-- plugin css -->
    <link href="<?php echo base_url();?>assets/libs--/jquery-vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="<?php echo base_url();?>assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            <?php echo ucfirst($_SESSION['user_full_name']);?> 
                            <!-- <i class="mdi mdi-chevron-down"></i> -->
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                        <!-- item-->
                        <a href="<?php echo base_url();?>auth/logout" class="dropdown-item notify-item">
                            <i class="remixicon-logout-box-line"></i>
                            <span>Logout</span>
                        </a>

                    </div>
                </li>
            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="<?php echo base_url();?>auth/dashboard" class="logo text-center">
                    <span class="logo-lg">
                        <!-- <img src="<?php //echo base_url();?>assets/images/logo-light.jpg" alt="" height="50"> -->
                        <span class="logo-lg-text-light">School</span>
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-sm-text-dark">X</span> -->
                        <!-- <img src="<?php //echo base_url();?>assets/images/logo-sm.png" alt="" height="24"> -->
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="fe-menu"></i>
                    </button>
                </li>


            </ul>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="slimscroll-menu">

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                     <ul class="metismenu" id="side-menu">

                        <li class="menu-title">Navigation</li>

                        <li>
                            <a href="<?php echo base_url(); ?>auth/dashboard" class="waves-effect <?php if (!empty($active_tab) && $active_tab == 'Dashboard') { ?>active <?php } ?>">
                                <i class="remixicon-dashboard-line"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li class="active">
                            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"> 
                                <i class="remixicon-dashboard-line"></i>
                            <span class="waves-effect <?php if (!empty($active_tab) && $active_tab == 'create_school' || $active_tab == 'list_school') { ?>active <?php } ?>"> Schools </span>
                            </a>

                            <ul class="collapse list-unstyled <?php if ($active_tab == 'create_school' || $active_tab == 'list_school' ) { ?>show mm-show <?php } ?>" id="homeSubmenu">
                                <li class="<?php if ($active_tab == 'create_school') { ?>active <?php } ?>">
                                    <a href="<?php echo base_url(); ?>schools/create" class="waves-effect <?php if (!empty($active_tab) && $active_tab == 'create_school') { ?>active <?php } ?>">Create</a>
                                </li>
                                <li class="<?php if ($active_tab == 'list_school') { ?>active <?php } ?>">
                                    <a href="<?php echo base_url(); ?>schools/list" class="waves-effect <?php if (!empty($active_tab) && $active_tab == 'list_school') { ?>active <?php } ?>">List</a>
                                </li>
                            </ul>
                        </li> 


                    </ul>
                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="#">Test</a></li>
                                           
                                            <li class="breadcrumb-item active">Edit School</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Edit School </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                    <div class="row">

                        <div class="col-md-12">
                            <div class="card-title">
                                <!-- Blog Information -->
                            </div>

                            <div class="card-box">
                                <form id="edit_school" method="POST" action="<?php echo base_url(); ?>schools/update_school/<?php echo $schools_info[0]['id']; ?>" enctype="multipart/form-data">
                                    <input type="hidden" name="school_id" id="school_id" value="<?php echo $schools_info[0]['id'];?>">

                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fw-bold fs-6 mb-2">School Name <span class="mand-field" style="color:red">*</span></label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="school_name" id="school_name" value="<?php echo $schools_info[0]['school_name'];?>" class="form-control form-control-solid mb-3 mb-lg-0"/>
                                    </div><br/><br/>

                                    <div class="fv-row mt-10">
                                        <!--begin::Label-->
                                        <label class="fw-bold fs-6 mb-2">School Location <span class="mand-field" style="color:red">*</span></label>
                                        <!--end::Label-->
                                        <!--begin::Input-->

                                        <textarea id="school_location" name="school_location">
                                            <?php echo htmlentities($schools_info[0]['school_location']);?>
                                        </textarea>

                                        <!-- <input type="textarea" name="blog_description" id="blog_description" class="form-control form-control-solid mb-3 mb-lg-0" rows="4" cols="50"/> -->
                                    </div><br/><br/>

                                    

                                    <div class="text-center pt-15">
                                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit" id="btnSubmit">
                                            <span class="indicator-label">Update</span>
                                        </button>
                                    </div>

                                </form>
                                
                            </div> <!-- end col -->
                        </div>

                    </div>


                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                2022 © Project
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->



    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="<?php echo base_url(); ?>assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/new.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/toastr.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/sweetalert2@11.js"></script>

    <script src="https://cdn.ckeditor.com/4.10.0/full-all/ckeditor.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
  
    <script>
        $(function () {
  
          // CKEDITOR.replace('blog_description');
          CKEDITOR.replace( 'school_location', {
            toolbar: [
            { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
            { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
            '/',
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
            { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
            { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
            '/',
            { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
            { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
            { name: 'others', items: [ '-' ] },
            ]
            });          
        });
    </script>

    <script>
        $('#blog_title,#blog_description').keyup(function () {
            if ($(this).val().match(/(\s{2,})|[^a-zA-Z0-9']/g))
            {
              $(this).val($(this).val().replace(/(\s{2,})|[^a-zA-Z0-9']/g, ' '));
              $(this).val($(this).val().replace(/^\s*/, ''));
            }

            if ($(this).val().match(/([a-zA-Z0-9])\1{2,}/g)){
              $(this).val($(this).val().replace(/([a-zA-Z0-9])\1{2,}/g, ""));
            } 

            $(this).val(ucfirst($(this).val()));
        });

        $(document).ready(function(){ 
            $('#edit_school').validate({
                rules:{
                    school_name:{
                       required:true
                    },
                    school_location:{
                       required:true
                    }
                },
                messages:{
                    school_name:{
                        required:"<span style='color:red;'>Please enter school name here</span>" 
                    },
                    school_location:{
                        required:"<span style='color:red;'>Please enter blog description here</span>" 
                    }
                }
            });
        });
    </script> 
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.5.1.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap4.min.js"></script>  
</body>


</html>
