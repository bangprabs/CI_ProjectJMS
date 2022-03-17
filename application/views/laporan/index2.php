<!DOCTYPE html>
<?php
$today = date('Y-m-d');
$next7day = date("Y-m-d", strtotime("+1 week"));
?>
<style type="text/css">
	.ase{
		background-color: #d9534f !important;
	}
	.lole{
		background-color: #ec971f !important;
	}
</style>
<html>
<head>
	<style type="text/css">
		.jang{
			display: none; 
		}
	</style>
	<title>Board</title>
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
<body class="wow animated fadeIn data-wow-duration='3s' data-wow-delay='3s'" style="background: url('../assets/img/V9BqwTs.png'); background-width: 3000px; margin-top: 20px;"> 
	<div class="container-fluid">
		<div class="row" style="color: #fff;">
			<div class="col-md-3">
				<big><strong style="font-family: 'Arvo', serif;">SPK Team Project</strong></big>
			</div>
			<div class="col-sm-5">
				<center><span class="pull-right">Keterangan :</span></center>
			</div>
			<div class="col-md-3 jang">
				<table class="table">
					<div class="ase" style="text-align: center; padding: 10px;">Telah Melewati Duedate</div>
				</table>
			</div>
			<div class="col-md-2">
				<table class="table">
					<div class="lole" style="text-align: center; padding: 10px;">Mendekati Hari Meeting</div>
				</table>
			</div>
			<div class="col-sm-2">
				<a href="<?=base_url()?>report/index3" class="btn btn-success btn-xs btn-block">Go to &rarr; TICKET</a>
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
			<div class="col-md-12" style="color: #fff">
				<big style="color: #fff; font-size: 30px; font-family: 'Poiret One', cursive;"><strong>Agenda</strong></big></center><br><br>
				<div class="yogs">
					<table class="table">
						<thead>
							<tr style="font-family: 'Questrial', sans-serif;">
								<th>No. Agenda</th>
								<th>Invited By</th>
								<th>Judul Agenda</th>
								<th>Deskripsi</th>
								<th>Tempat</th>
								<th>Tanggal</th>
								<th>Jam</th>
								<th>Attenders</th>
								<th>Status</th>
							</tr>						
						</thead>
						<?php 
						$this->db->where('status !=', 'Cancel');
						if($this->db->get('agenda')->num_rows() == 0) { ?>
						<tr>
							<td colspan="9" style="font-family: 'Questrial', sans-serif;"><center>Tidak Ada Agenda</center></td>
						</tr>	
						<?php } else { ?>
						<?php $i = 1; foreach ($agenda as $key) : ?>
						<?php if($next7day >= $key['tanggal']) { ?>
						<tr class="lole" style="font-family: 'Questrial', sans-serif;"">
							<?php } else { ?>
							<tr>
								<?php } ?>
								<td><?=$i++ ?></td>
								<td><?=$key['invited_by']?></td>
								<td><?=$key['judul_agenda']?></td>
								<td style="width: 300px;">
									<?php
									$this_value = strip_tags($key['deskripsi']);
									if(strlen($this_value) > 70)
									{
										$this_value = substr($this_value,0,70)." ...";
									}
									echo $this_value ;
									?>
								</td>
								<td><?=$key['tempat']?></td>
								<td><?=date('D, d-M-Y',strtotime($key['tanggal']))?></td>
								<td><?=$key['jam']?></td>
								<td><?=$key['attenders']?></td>
								<td><?=$key['status'] ?></td>
							</tr>
						</tr>
					<?php endforeach; ?> 
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
<meta http-equiv="refresh" content="25;url=http://localhost:8081/jms_project/report/index3">
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
