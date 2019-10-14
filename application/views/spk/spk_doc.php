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
        <h2>Spk List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Klien</th>
		<th>Details</th>
		<th>Start Date</th>
		<th>Duedate</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($spk_data as $spk)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $spk->nama_klien ?></td>
		      <td><?php echo $spk->details ?></td>
		      <td><?php echo $spk->start_date ?></td>
		      <td><?php echo $spk->duedate ?></td>
		      <td><?php echo $spk->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>