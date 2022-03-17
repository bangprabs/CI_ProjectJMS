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
			<div class="col-sm-3">
				<big><strong style="font-family: 'Arvo', serif;">SPK Team Project</strong></big>
			</div>

			<div class="col-sm-2">
				<center><span class="pull-right">Keterangan :</span></center>
			</div>
			<div class="col-md-3">
				<table class="table">
					<div class="ase" style="text-align: center; padding: 10px;">Telah Melewati Duedate</div>
				</table>
			</div>
			<div class="col-md-2">
				<table class="table">
					<div class="lole" style="text-align: center; padding: 10px;">Duedate kurang dari 7 hari</div>
				</table>
			</div>
			<div class="col-sm-2">
				<a href="<?=base_url()?>report/index2" class="btn btn-success btn-xs btn-block">Go to &rarr; Agenda</a>
			</div>
		</div>
	</div>
	<div id="jeng">
		<span id="why" style="font-family: 'Poiret One', cursive;"></span>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3" style="margin-right: 250px;">
				<big style="color: #fff;"><strong>SPK TEAM PROJECT</strong></big>
			</div>
		</div>
		<br><br>
		<div class="col-md-12" style="color: #fff;">
			<div class="yogs">
				<table class="table table-cell">
					<thead>
						<tr style="border: 1px solid transparent !important; font-family: 'Questrial', sans-serif;">
							<th>No. SPK</th>
							<th>Nama Klien</th>
							<th>Item Project</th>
							<th>Project Name</th>
							<th>Start Date</th>
							<th>Duedate</th>
							<th>Status</th>
						</tr>						
					</thead>
					<tbody style="font-family: 'Questrial', sans-serif;">
						<?php 
						$this->db->where('status !=', 'Done');
						if($this->db->get('spk')->num_rows() == 0) { ?>
						<td colspan="7"><center><b>DONE ALL !!!</b></center></td>
					</tr>	
					<?php } else { ?>
					<?php $i = 1; foreach ($spk as $key) ?>
					<?php 
					$this->db->where('status !=', 'Done');
					if($this->db->get('spk')->num_rows() == 0) { ?>
					<tr>
						<td colspan="5"><center>SELESAI !!!</center></td>
					</tr>	
					<?php } else { ?>
					<?php 
					$i = 1;
					foreach ($spk as $key) : ?>
					<?php if($today >= $key['duedate']) { ?>
					<tr class="ase">
						<?php } else if($next7day >= $key['duedate']) { ?>
					</tr>
					<tr class="lole">
						<?php } else { ?>
						<tr>
							<?php } ?>
							<td><?=$i++ ?></td>
							<td><?=$key['nama_klien']?></td>
							<td>
								<?php
								$this_value = strip_tags($key['details']);
								if(strlen($this_value) > 70)
								{
									$this_value = substr($this_value,0,50)." ...";
								}
								echo $this_value ;
								?>
							</td>
							<td><?=$key['project_name']?></td>
							<td><?=date('D, d-M-Y',strtotime($key['start_date']))?></td>
							<td><?=date('D, d-M-Y',strtotime($key['duedate']))?></td>
							<td><?=$key['status'] ?></td>
						</tr>
					<?php endforeach; ?>
					<?php $i++; } ?> 
				</tr>
				<?php } ?> 
			</tbody>
		</table>
	</div>
</div>
</div>
</div>
</div>
</div>
<meta http-equiv="refresh" content="25;url=http://localhost:8081/jms_project/report/index2">
<script src="<?=base_url();?>assets/js/jquery.js"></script>
<script src="<?=base_url();?>assets/js/typed.min.js"></script>
<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/js/wow.min.js"></script>
<script src="<?=base_url() ?>assets/js/load.js"></script>
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