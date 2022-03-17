	<?php
	$this->db->where('status !=', 'Done');
	$total_spk = $this->db->get('spk')->num_rows();
	$total_ticket = $this->db->get('ticket')->num_rows();
	$total_agenda = $this->db->get('agenda')->num_rows();

	$total = $total_spk + $total_ticket + $total_agenda;

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<style type="text/css">
			.dataTables_filter {
				display: none; 
			}
			.dataTables_length{
				text-align: left !important;
			}
		</style>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>JMS Project Team</title>
		<link href="<?=base_url()?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">	
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.css">
		<link href="<?=base_url()?>assets/styles.css" rel="stylesheet">
		<link href="<?=base_url()?>assets/lte/dist/css/profile.css" rel="stylesheet">
		<link href="<?=base_url()?>assets/css/simple-sidebar.css" rel="stylesheet">
		<link href="<?=base_url()?>assets/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/dist/css/skins/_all-skins.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/plugins/iCheck/flat/blue.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/plugins/morris/morris.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/plugins/datepicker/datepicker3.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/plugins/daterangepicker/daterangepicker.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
	</head>
	<body class="wow animated fadeIn data-wow-duration='3s' data-wow-delay='3s' hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<header class="main-header">
				<!-- Logo -->
				<a href="#" class="logo">
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
						<li class="active">Home</li>
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
										<a target="_blank" href="<?php echo base_url(); ?>adminbackend/profil"></a>
									</div>
									<div class="desc" style="color: #fff;"><?php echo $this->session->userdata("namauser"); ?></div>
									<h4 style="margin:0px; color:#fff;"><?php echo $this->session->userdata("nama_lengkap"); ?></h4>
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
						<!-- sidebar menu: : style can be found in sidebar.less -->
						<ul class="sidebar-menu">
							<li class="header">MAIN NAVIGATION</li>
							<li class="active treeview">
								<a href="#">
									<i class="fa fa-dashboard"></i> <span>Dashboard</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li class="active"><a href="<?php echo base_url(); ?>adminbackend/report"><i class="fa fa-circle-o"></i>  Home</a></li>
									<li><a href="<?php echo base_url(); ?>spk"><i class="fa fa-circle-o"></i>  SPK</a></li>
									<li><a href="<?php echo base_url(); ?>ticket"><i class="fa fa-circle-o"></i> Ticket</a></li>
									<li><a href="<?php echo base_url(); ?>agenda"><i class="fa fa-circle-o"></i> Agenda</a></li>
								</ul>
							</li>
							<li class="treeview">
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
									<li><a href="<?php echo base_url("adminbackend/profil"); ?>"><?php echo $this->session->userdata("nama_lengkap"); ?><i class="fa fa-circle-o"></i> Profile</a></li>
									<li><a href="<?php echo base_url('login/logout'); ?>"><i class="fa fa-circle-o"></i> Logout</a></li>
								</ul>
							</li>
						</section>
						<!-- /.sidebar -->
					</aside>
					<!-- /#sidebar-wrapper -->
					<!-- Page Content -->
					<div id="page-content-wrapper">
						<section class="content">
							<!-- Small boxes (Stat box) -->
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-3 col-xs-6">
										<!-- small box -->
										<div class="small-box bg-aqua">
											<div class="inner">
												<h3><?= $total_spk; ?></h3>

												<p>Unfinished Job SPK</p>
											</div>
											<div class="icon">
												<i class="ion ion-edit"></i>
											</div>
											<a href="<?php echo base_url(); ?>spk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
									<!-- ./col -->
									<div class="col-md-3 col-xs-6">
										<!-- small box -->
										<div class="small-box bg-green">
											<div class="inner">
												<h3><?= $total_ticket;?> <sup style="font-size: 20px"></sup></h3>

												<p>Ticket</p>
											</div>
											<div class="icon">
												<i class="ion-card"></i>
											</div>
											<a href="<?php echo base_url(); ?>ticket" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
									<div class="col-md-3 col-xs-6">
										<!-- small box -->
										<div class="small-box bg-red">
											<div class="inner">
												<h3><?= $total_agenda;?></h3>

												<p>Agenda</p>
											</div>
											<div class="icon">
												<i class="ion-android-calendar"></i>
											</div>
											<a href="<?php echo base_url(); ?>agenda" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
									<div class="col-md-3 col-xs-6" style="margin-top: 12px;">
										<!-- small box -->
										<div class="small-box bg-red">
											<div class="inner">
												<h3><?= $total;?></h3>

												<p>Total Report</p>
											</div>
											<div class="icon">
												<i class="ion-plus"></i>
											</div>
										</div>
									</div>
									<!-- ./col -->
								</div>
							</div>
						</section>
						<div class="container-fluid" style="margin-top: -30px;">
							<div class="row">
								<div class="col-md-1">
									<h3 style="text-align: center;"><b>SPK</b></h3>
								</div>
								<div class="col-md-11">
									<center>
										<table id="example1"  class="table table-cell">
											<thead style="background-color: #00c0ef;">
												<tr style="color: #fff;">
													<th style="text-align: center;">No. SPK</th>
													<th style="text-align: center;">Client Name</th>
													<th style="text-align: center;">Item Project</th>
													<th style="text-align: center;">Project Name</th>
													<th style="text-align: center;">Status</th>
													<th style="text-align: center;">Change Status</th>
												</tr>
											</thead>
											<tbody style="text-align: center;">
												<?php
												$this->db->where('status !=', 'Done');
												if($this->db->get('spk')->num_rows() == 0) { ?>
												<tr>
													<td colspan="5"><center>DONE ALL !!!</center></td>
												</tr>
												<?php } else { ?>
												<?php
												$i = 1 ;
												foreach ($spk as $key) :
													?>
												<tr>
													<td><?php echo $i++ ?></td>
													<td><?=$key['nama_klien'] ?></td>
													<td style="width: 500px;"><?=$key['details'] ?></td>
													<td><?=$key['project_name'] ?></td>
													<td><?=$key['status'] ?></td>
													<td><a href="<?=base_url('adminbackend/change_status/Done/'. $key['no_spk'])?>" class="btn btn-success btn-xs">Done</a> <a href="<?=base_url('adminbackend/change_status/Cheking/'. $key['no_spk'])?>" class="btn btn-warning btn-xs">Checking</a></td>
												</tr>
											<?php endforeach; ?>
											<?php } ?>
										</tbody>
									</table>
								</center>
							</div>
						</div>
					</div>
					<hr />
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-1">
								<h3 style="text-align: center;"><b>Ticket</b></h3>
							</div>
							<div class="col-md-11">
								<center>
									<table id="example2" class="table table-cell">
										<thead style="background-color: #00a65a; color: #fff;">
											<tr>
												<th style="text-align: center;">No. TICKET</th>
												<th style="text-align: center;">Client Name</th>
												<th style="text-align: center;">Report</th>
												<th style="text-align: center;">Report In</th>
												<th style="text-align: center;">Level</th>
												<th style="text-align: center;">Status</th>
												<th style="text-align: center;">Change Status</th>
											</tr>
										</thead>
										<tbody style="text-align: center;">
											<?php
											$this->db->where('status !=', 'Done');
											if($this->db->get('ticket')->num_rows() == 0) { ?>
											<tr>
												<td colspan="7"><center><b>DONE ALL !!!</b></center></td>
											</tr>
											<?php } else { ?>
											<?php
											$i = 1 ;
											foreach ($ticket as $key) :
												?>
											<tr>
												<td><?php echo $i++ ?></td>
												<td style="width: 20%;"><?=$key['nama_klien'] ?></td>
												<td style="width: 30%;"><?=$key['report'] ?></td>
												<td><?=$key['report_in'] ?></td>
												<td><?php $level = $key['level'] ;
													if ($level == 1) {
														echo 'High';
													} elseif ($level == 2) {
														echo 'Medium';
													} else {
														echo 'Low';
													}
													?></td>
													<td><?=$key['status'] ?></td>
													<td style="text-align: center;"><a href="<?=base_url('adminbackend/change_status_t/Done/'. $key['no_spk'])?>" class="btn btn-success btn-xs">Done</a> <a href="<?=base_url('adminbackend/change_status_t/Cheking/'. $key['no_spk'])?>" class="btn btn-warning btn-xs">Checking</a></td>
												</tr>
											<?php endforeach; ?>
											<?php } ?>
										</tbody>
									</table>
								</center>
							</div>
						</div>
					</div>
					<hr />
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-1">
								<h3 style="text-align: center;"><b>Agenda</b></h3>
							</div>
							<div class="col-md-11">
								<center>
									<table id="example3" class="table table-cell">
										<thead style="background-color: #dd4b39; color: #fff;">
											<tr>
												<th style="text-align: center;">No. AGENDA</th>
												<th style="text-align: center;">Invited By</th>
												<th style="text-align: center;">Judul Agenda</th>
												<th style="text-align: center;">Deskripsi</th>
												<th style="text-align: center;">Tempat</th>
												<th style="text-align: center;">Tanggal</th>
												<th style="text-align: center;">Jam</th>
												<th style="text-align: center;">Attenders</th>
												<th style="text-align: center;">Status</th>
												<th style="text-align: center;">Change Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
											if($this->db->get('agenda')->num_rows() == 0) { ?>
											<tr>
												<td colspan="10"><center>DONE ALL !!!</center></td>
											</tr>
											<?php } else { ?>
											<?php
											$i = 1 ;
											foreach ($agenda as $key) :
												?>
											<tr>
												<td><?php echo $i++ ?></td>
												<td><?=$key['invited_by'] ?></td>
												<td><?=$key['judul_agenda']?></td>
												<td style="width: 300px;"><?=$key['deskripsi']?></td>
												<td><?=$key['tempat']?></td>
												<td><?=$key['tanggal']?></td>
												<td><?=$key['jam']?></td>
												<td><?=$key['attenders']?></td>
												<td><?=$key['status']?></td>
												<td style="text-align: center; width: 250px;"><a href="<?=base_url('adminbackend/change_status_a/Cancel/'. $key['no_agenda'])?>" class="btn btn-danger btn-xs">Cancel</a> <a href="<?=base_url('adminbackend/change_status_a/Pending/'. $key['no_agenda'])?>" class="btn btn-warning btn-xs">Pending</a> <a href="<?=base_url('adminbackend/change_status_a/Reschedule/'. $key['no_agenda'])?>" class="btn btn-info btn-xs">Reschedule</a></td>
											</tr>
										<?php endforeach; ?>
										<?php } ?>
									</tbody>
								</table>
							</center>
						</div>
					</div>
				</div>
			</div><br>
		</div>
		<script>
			$.widget.bridge('uibutton', $.ui.button);
		</script>
		<script src="<?=base_url();?>assets/js/jquery.js"></script>
		<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
		<script src="<?=base_url();?>assets/js/wow.min.js"></script>
		<script src="<?=base_url() ?>assets/js/load.js"></script>
		<script src="<?=base_url();?>assets/js/sidebar_menu.js"></script>
		<script src="<?php echo base_url(); ?>assets/lte/plugins/jQuery/jquery-2.2.3.min.js"></script>
		<script src="<?=base_url();?>assets/js/typed.min.js"></script>
		<script>
			$(function(){
				$("#why").typed({
					strings: ["Halo !! <?php echo $this->session->userdata("nama_lengkap"); ?>", "Selamat Datang Di Web Admin Team Project.", "Halo !! <?php echo $this->session->userdata("nama_lengkap"); ?>", "Selamat Datang Di Web Admin Team Project.", "Halo !! <?php echo $this->session->userdata("nama_lengkap"); ?>", "Selamat Datang Di Web Admin Team Project.", "Halo!! <?php echo $this->session->userdata("nama_lengkap"); ?>", "Selamat Datang Di Web Admin Team Project."],
					typeSpeed: 100, 
					backDelay: 900, 
				});
			});
		</script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.js"></script>	
		<script type="text/javascript">
			$(function() {
				$('#example1').dataTable({ "dom": "lfrti" });
			});
		</script>
		<script type="text/javascript">
			$(function() {
				$('#example2').dataTable({ "dom": "lfrti" });
			});
		</script>
		<script type="text/javascript">
			$(function() {
				$('#example3').dataTable({ "dom": "lfrti" });
			});
		</script>
		<!-- jQuery UI 1.11.4 -->
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
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
	</body>
	</html>
