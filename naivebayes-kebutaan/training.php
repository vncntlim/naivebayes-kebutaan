<!DOCTYPE html>
<html>
	<head>
		<title>Deteksi Kebutaan - Naive Bayes</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</head>
	<body>
		<!-- NAVBAR -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="index.php">Deteksi Kebutaan</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		    <div class="navbar-nav">
		      <a class="nav-item nav-link" href="index.php">Home</a>
		      <a class="nav-item nav-link active" href="training">Training <span class="sr-only">(current)</span></a>
		      <a class="nav-item nav-link" href="testing">Testing</a>
		    </div>
		  </div>
		</nav>
<?php
	require_once("koneksi.php");

	//pagination
	if(isset($_GET['halaman'])){
		$halaman = $_GET['halaman'];
	} else {
		$halaman = 1;
	}

	$banyak_data_per_halaman = 10;
	$offset = ($halaman-1) * $banyak_data_per_halaman;

	$query = mysqli_query($conn, "SELECT COUNT(*) FROM training");
	$banyak_baris = mysqli_fetch_array($query)[0];
	$total_halaman = ceil($banyak_baris / $banyak_data_per_halaman);
?>
		<!-- Content -->
		<div class="container-fluid">
			<hr>
			<h1 class="display-4">Data Training</h1>
			<hr>
			<div class="row">
				<div class="col-12 col-md-8">
					<a href="tambah_training.php" class="btn btn-primary">Tambah Data</a>
				</div>
				<div class="col-6 col-md-4">
					<div class="float-right">
					<strong>Banyaknya data: <?php echo $banyak_baris; ?></strong>
					</div>
				</div>
			</div>
			<hr>
			<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Nomor</th>
			      <th scope="col">Nama Pasien</th>
			      <th scope="col">Umur</th>
			      <th scope="col">Diabetes</th>
			      <th scope="col">Hipertensi</th>
			      <th scope="col">Intraokular</th>
			      <th scope="col">Kebutaan</th>
			      <th scope="col" colspan="2"></th>
			    </tr>
			  </thead>
			  <tbody>
<?php
	$i = $halaman * 10 - 9;
	$query = mysqli_query($conn, "SELECT * FROM training LIMIT $offset, $banyak_data_per_halaman");
	while($training = mysqli_fetch_assoc($query)){
?>
				<tr>
					<th scope="row"><?php echo $i; ?></th>
					<td><?php echo $training['NAMA_PASIEN']; ?></td>
					<td><?php echo $training['UMUR']; ?></td>
					<td><?php echo $training['DIABETES']; ?></td>
					<td><?php echo $training['HIPERTENSI']; ?></td>
					<td><?php echo $training['INTRAOKULAR']; ?></td>
					<td><?php echo $training['KEBUTAAN']; ?></td>
					<td><a href="ubah_training.php?ubah=<?php echo $training['NOMOR']; ?>" class="btn btn-default">Ubah</a></td>
					<td><a href="hapus_training.php?hapus=<?php echo $training['NOMOR']; ?>" class="btn btn-default" onclick="return confirm('Anda yakin akan menghapus data <?php echo $training['NAMA_PASIEN'];?> ?')">Hapus</a></td>
				</tr>
<?php
		$i++;
	}
?>			  	
			  </tbody>
			</table>
			<hr>
			<nav aria-label="...">
			<ul class="pagination">
				<li class="page-item"><a class="page-link"href="?halaman=1">Pertama</a></li>
				<li class="page-item <?php if($halaman <= 1){ echo 'disabled'; } ?>">
		            <a class="page-link" href="<?php if($halaman <= 1){ echo '#'; } else { echo "?halaman=".($halaman - 1); } ?>">Sebelumnya</a>
		        </li>
		        <li class="page-item <?php if($halaman >= $total_halaman){ echo 'disabled'; } ?>">
		            <a class="page-link" href="<?php if($halaman >= $total_halaman){ echo '#'; } else { echo "?halaman=".($halaman + 1); } ?>">Selanjutnya</a>
		        </li>
		        <li class="page-item"><a class="page-link" href="?halaman=<?php echo $total_halaman; ?>">Terakhir</a></li>
			</ul>
		</div>
	</body>
</html>