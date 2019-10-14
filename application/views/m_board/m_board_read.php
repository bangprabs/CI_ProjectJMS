<!doctype html>
<html>
<head>
    <title>JMS PROJECT </title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/dist/css/AdminLTE.min.css">
    <link href="<?=base_url()?>assets/lte/dist/css/profile.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/plugins/morris/morris.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>P</b>.TM</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Team</b> PROJECT</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <div id="jeng">
                    $  <span id="why"></span>
                </div>
            </nav>
        </header>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li class="active">Board</li>
                </ol>
            </section><br>
            <aside class="main-sidebar">
               <section class="sidebar">
                <div class="user-panel">
                    <div class="card hovercard">
                        <div class="cardheader">

                        </div>
                        <div class="avatar">
                            <img alt="" src="<?php echo base_url(); ?>assets/lte/dist/img/avatar5.png">
                        </div>
                        <div class="info">
                            <div class="title">
                                <a target="_blank" href="<?php echo base_url(); ?>adminbackend/profil"><?php echo $this->session->userdata("nama_lengkap"); ?></a>
                            </div>
                            <div class="desc" style="color: #fff;">Admin Team Project</div>
                            <div class="desc" style="color: #fff;">CV. Novatama Infomedia</div>
                            <div class="desc" style="color: #fff;">Since 2011.</div>
                        </div>
                        <div class="bottom">
                            <a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>login/logout">
                                <h5 style="color: #fff;"><i class="fa fa-sign-out"></i>  Logout</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class=""><a href="<?php echo base_url(); ?>adminbackend/report"><i class="fa fa-circle-o"></i>  Home</a></li>
                            <li><a href="<?php echo base_url(); ?>spk"><i class="fa fa-circle-o"></i>  SPK</a></li>
                            <li><a href="<?php echo base_url(); ?>ticket"><i class="fa fa-circle-o"></i> Ticket</a></li>
                            <li><a href="<?php echo base_url(); ?>agenda"><i class="fa fa-circle-o"></i> Agenda</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url(); ?>m_board">
                            <i class="fa fa-files-o"></i>
                            <span>Message Board</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>adminbackend/laporan">
                            <i class="fa fa-th"></i> <span>Report SPK</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo base_url(); ?>user">
                            <i class="fa fa-user"></i>  <span> User</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Options</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url(); ?>adminbackend/profil"><i class="fa fa-circle-o"></i> Profile</a></li>
                            <li><a href="<?php echo base_url('login/logout'); ?>"><i class="fa fa-circle-o"></i> Logout</a></li>
                        </ul>
                    </li> 
                </section>
                <!-- /.sidebar -->
            </aside><br>
            <div class="container-fluid">
                <h2 style="margin-top:0px">M board Read</h2>
                <table class="table">
                 <tr><td>Pesan</td><td><?php echo $pesan; ?></td></tr>
                 <tr><td>Author</td><td><?php echo $author; ?></td></tr>
                 <tr><td></td><td><a href="<?php echo site_url('m_board') ?>" class="btn btn-default">Cancel</a></td></tr>
             </table>
         </div>
     </div>
 </div>
</body>
<script src="<?=base_url();?>assets/js/jquery.js"></script>
<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/wow.min.js"></script>
<script src="<?=base_url() ?>assets/js/load.js"></script>
<script src="<?=base_url();?>assets/js/sidebar_menu.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="<?=base_url();?>assets/js/typed.min.js"></script>
<script>
    $(function(){
        $("#why").typed({
            strings: ["Halo!! <?php echo $this->session->userdata("nama_lengkap"); ?>", "Selamat Datang Di Web Admin Team Project.", "Halo!! <?php echo $this->session->userdata("nama_lengkap"); ?>", "Selamat Datang Di Web Admin Team Project.", "Halo!! <?php echo $this->session->userdata("nama_lengkap"); ?>", "Selamat Datang Di Web Admin Team Project.", "Halo!! <?php echo $this->session->userdata("nama_lengkap"); ?>", "Selamat Datang Di Web Admin Team Project."],
            typeSpeed: 100, 
            backDelay: 900, 
        });
    });
</script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/lte/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>assets/lte/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/lte/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>assets/lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/lte/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/lte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>assets/lte/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>assets/lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>assets/lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/lte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/lte/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/lte/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/lte/dist/js/demo.js"></script>

</html>