<!DOCTYPE html>
<?php
	require_once("koneksi.php");
	error_reporting(0);

	$NOMOR = $_GET['detail'];

	$query = mysqli_query($conn, "SELECT * FROM testing WHERE NOMOR = $NOMOR");
	$data = mysqli_fetch_assoc($query);
?>
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
		      <a class="nav-item nav-link" href="training">Training</a>
		      <a class="nav-item nav-link active" href="testing">Testing <span class="sr-only">(current)</span></a>
		    </div>
		  </div>
		</nav>
	<div class="container-fluid">
		<hr>
			<h1 class="display-4">Detail Data Testing</h1>
		<hr>
		<div class="card">
		  <h5 class="card-header">Prior</h5>
		  <div class="card-body">
		    <h5 class="card-title">Positif Kebutaan</h5>
		    <p class="card-text"><?php echo number_format($data['PRI_BUTA'],5); ?></p>
		    <h5 class="card-title">Negatif Kebutaan</h5>
		    <p class="card-text"><?php echo number_format($data['PRI_TIDAK_BUTA'],5); ?></p>
		  </div>
		</div>
		<br>
		<div class="card">
		  <h5 class="card-header">Likehood</h5>
		  <div class="card-body">
		    <h5 class="card-title">Positif Kebutaan berdasarkan Umur</h5>
		    <p class="card-text"><?php echo number_format($data['L_U_B'],5); ?></p>
		    <h5 class="card-title">Negatif Kebutaan berdasarkan Umur</h5>
		    <p class="card-text"><?php echo number_format($data['L_U_TB'],5); ?></p>
		    <h5 class="card-title">Positif Kebutaan berdasarkan Diabetes</h5>
		    <p class="card-text"><?php echo number_format($data['L_D_B'],5); ?></p>
		    <h5 class="card-title">Negatif Kebutaan berdasarkan Diabetes</h5>
		    <p class="card-text"><?php echo number_format($data['L_D_TB'],5); ?></p>
		    <h5 class="card-title">Positif Kebutaan berdasarkan Hipertensi</h5>
		    <p class="card-text"><?php echo number_format($data['L_H_B'],5); ?></p>
		    <h5 class="card-title">Negatif Kebutaan berdasarkan Hipertensi</h5>
		    <p class="card-text"><?php echo number_format($data['L_H_TB'],5); ?></p>
		    <h5 class="card-title">Positif Kebutaan berdasarkan Intraokular</h5>
		    <p class="card-text"><?php echo number_format($data['L_I_B'],5); ?></p>
		    <h5 class="card-title">Negatif Kebutaan berdasarkan Intraokular</h5>
		    <p class="card-text"><?php echo number_format($data['L_I_TB'],5); ?></p>
		  </div>
		</div>
		<br>
		<div class="card">
		  <h5 class="card-header">Posterior</h5>
		  <div class="card-body">
		    <h5 class="card-title">Positif Kebutaan</h5>
		    <p class="card-text"><?php echo number_format($data['POS_BUTA'],5); ?></p>
		    <h5 class="card-title">Negatif Kebutaan</h5>
		    <p class="card-text"><?php echo number_format($data['POS_TIDAK_BUTA'],5); ?></p>
		  </div>
		</div>
		<br>
		<div class="card text-center">
		  <h5 class="card-header">Hasil</h5>
		  <div class="card-body">
		    <h5 class="card-title">Kemungkinan kebutaan adalah <strong><?php echo $data['KEBUTAAN']; ?></strong></h5>
		  </div>
		</div>
		<hr>
	</div>
	</body>
</html>