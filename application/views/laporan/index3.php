<!DOCTYPE html>
<html>
<head>
	<title>Board</title>
	<style type="text/css">
		.col-md-3 {
			width: 26%;
		}
	</style>
	<link href="<?=base_url()?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
	<link href="<?=base_url()?>assets/css/simple-sidebar.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu+Mono" rel="stylesheet">
</head>
<body class="wow animated fadeIn data-wow-duration='3s' data-wow-delay='3s'" style="background: url('../assets/img/V9BqwTs.png'); margin-top: 20px;"> 
	<div class="container-fluid">
		<div class="row" style="color: #fff;">
			<div class="col-md-3" style="margin-right: 800px;">
				<big><strong style="font-family: 'Arvo', serif; ">SPK Team Project</strong></big>
			</div>
			<div class="col-md-3 pull-right" style="width: 300px;">
				<a href="<?=base_url()?>report/index" class="btn btn-success btn-xs btn-block">Go to &rarr; SPK</a>
			</div>
		</div>
	</div><br>
	<div id="jeng">
		  <span id="why" style="font-family: 'Poiret One', cursive;"></span>
	</div>
	<div class="container-fluid">
		<div class="row">
		</div>
		<br>
		<div class="col-md-12" style="color: #fff;">
			<div class="col-md-12">
				<big style="color: #fff; font-size: 30px; font-family: 'Poiret One', cursive;"><strong>Ticket</strong></big></center><br><br>
				<div class="yogs">
					<table class="table">
						<thead>
							<tr style="font-family: 'Questrial', sans-serif;">
								<th>No. Ticket</th>
								<th>Nama Klien</th>
								<th>Laporan</th>
								<th>Report In At</th>
								<th>Level</th>
							</tr>						
						</thead>
						<?php 
						$this->db->where('status !=', 'Done');
						if($this->db->get('ticket')->num_rows() == 0) { ?>
						<td colspan="5"><center>DONE ALL !!!</center></td>
					</tr>	
					<?php } else ?>
					<?php $i = 1; foreach ($ticket as $key) { ?>
					<tr style="font-family: 'Questrial', sans-serif;"> 
						<td><?php echo $i++ ?></td>
						<td><?=$key['nama_klien'] ?></td>
						<td><?=$key['report'] ?></td>
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
						</tr>
						<?php } ?> 
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<meta http-equiv="refresh" content="25;url=http://localhost:8081/jms_project/report/index">
<script src="<?=base_url();?>assets/js/jquery.js"></script>
<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/wow.min.js"></script>
<script src="<?=base_url() ?>assets/js/load.js"></script>
<script src="<?=base_url();?>assets/js/sidebar_menu.js"></script>
<script src="<?=base_url();?>assets/js/typed.min.js"></script>
<?php foreach ($m_board as $key) { ?>
<script>
	$(function(){
		$("#why").typed({
			strings: ["<?=$key['pesan'] ?>.", "By - <?php echo $key['author'] ?>."],
			typeSpeed: 100
		});
	});
</script>
<?php } ?>
</body>
</html>
