<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Agenda List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Invited By</th>
		<th>Judul Agenda</th>
		<th>Deskripsi</th>
		<th>Tempat</th>
		<th>Tanggal</th>
		<th>Jam</th>
		<th>Attenders</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($agenda_data as $agenda)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $agenda->invited_by ?></td>
		      <td><?php echo $agenda->judul_agenda ?></td>
		      <td><?php echo $agenda->deskripsi ?></td>
		      <td><?php echo $agenda->tempat ?></td>
		      <td><?php echo $agenda->tanggal ?></td>
		      <td><?php echo $agenda->jam ?></td>
		      <td><?php echo $agenda->attenders ?></td>
		      <td><?php echo $agenda->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>