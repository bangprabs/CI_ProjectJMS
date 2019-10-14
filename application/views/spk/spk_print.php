<?php
function active_page($page,$current_page)
{
	if($page == $current_page)
	{
		echo "active";
	}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Print SPK</title>

	<link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<style>
		.table td, .table th {
			font-size:13px;
		}

		.silver {
			background: #f3f3f3;
			font-weight: bold;
		}

	</style>

</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12" style="margin-top: 20px;">
				<center><img src="<?=base_url()?>assets/img/nov.png" width="300" /></center>
				<br>
				<center>
					<p style="font-size: 20px;">Komplek Ardhini 1, Jalan Lilium 2 No 47, Jatirahayu, Pondok Gede - Bekasi 17411<br/>
						Phone: (021)-84999886</p>
					</center>
				</div>
			</div><br>
			<table class="table">
				<tr>
					<td style="padding-top: 30px;"><strong>SURAT PERINTAH KERJA </strong></td>
					<td align="right" style="padding-top: 30px;"><strong>No SPK : </strong>#<?=$no_spk ?></td>
				</tr>
			</table>
			<table width="100%" border="0">
				<tr>
					<td valign="top">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td><strong>Nama Klien</strong></td>
									<td>: <?=$nama_klien ?></td>
								</tr>
								<tr>
									<td><strong>Item Project</strong></td>
									<td>: <?=$details ?></td>
								</tr>
								<tr>
									<td><strong>Project Name</strong></td>
									<td>: <?=$project_name ?></td>
								</tr>
								<tr>
									<td><strong>Start Date</strong></td>
									<td>: <?=$start_date ?></td>
								</tr>
								<tr>
									<td><strong>Due Date</strong></td>
									<td>: <?=$duedate ?></td>
								</tr>
								<tr>
									<td><strong>Update By</strong></td>
									<td>: <?=$last_update_by ?></td>
								</tr>
								<tr>
									<td><strong>Update Time</strong></td>
									<td>: <?=$last_update_time ?></td>
								</tr>
							</tbody>
						</table>
					</td>
				</div>
				<!-- jQuery -->
				<script src="<?=base_url()?>assets/backend/bower_components/jquery/dist/jquery.min.js"></script>

				<!-- Bootstrap Core JavaScript -->
				<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
				<!-- Include all compiled plugins (below), or include individual files as needed -->
				<script src="<?=base_url()?>assets/main/js/bootstrap.min.js"></script>

				<script>

					window.print();
					window.location = '<?=base_url()?>spk';

				</script>
			</body>

			</html>
