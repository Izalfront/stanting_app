<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap demo</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
	<h1>Hello, world!</h1>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<a href="<?= site_url('stanting'); ?>" class="btn btn-primary">Tambah data</a>
<table class="table">
	<thead>
		<tr>
			<th scope="col">Id User</th>
			<th scope="col">Nama Anak</th>
			<th scope="col">Jenis Kelamin</th>
			<th scope="col">Bulan</th>
			<th scope="col">Berat Badan</th>
			<th scope="col">Tinggi Badan</th>
			<th scope="col">BB.umur</th>
			<th scope="col">TB.umur</th>
			<th scope="col">BB.PB</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($user as $publik) : ?>
			<tr>
				<td><?= $publik['ID_User']; ?></td>
				<td><?= $publik['Nama_anak']; ?></td>
				<td><?= $publik['Jenis_kelamin']; ?></td>
				<td><?= $publik['Bulan']; ?></td>
				<td><?= $publik['Berat_badan']; ?></td>
				<td><?= $publik['Tinggi_badan']; ?></td>

			</tr>
		<?php endforeach; ?>

	</tbody>
</table>

</html>