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
		      <a class="nav-item nav-link" href="training">Training</a>
		      <a class="nav-item nav-link active" href="testing">Testing <span class="sr-only">(current)</span></a>
		    </div>
		  </div>
		</nav>
<?php
	require_once("ambil_data.php");

	error_reporting(0);

	if(isset($_POST['simpan'])){
		$NAMA_PASIEN = $_POST['NAMA_PASIEN'];
		$UMUR = $_POST['UMUR'];
		$DIABETES = $_POST['DIABETES'];
		$HIPERTENSI = $_POST['HIPERTENSI'];
		$INTRAOKULAR = $_POST['INTRAOKULAR'];

		//hitung likehood umur

		//buta
		$LUBY = 1/sqrt(2*3.14*$SDUBY)*pow(exp(1),(-pow(($UMUR-$MUBY),2))/(2*$VUBY));
		//tidak buta
		$LUBT = 1/sqrt(2*3.14*$SDUBT)*pow(exp(1),(-pow(($UMUR-$MUBT),2))/(2*$VUBT));

		//hitung likehood intraokular

		//buta
		$LIBY = 1/sqrt(2*3.14*$SDIBY)*pow(exp(1),(-pow(($INTRAOKULAR-$MIBY),2))/(2*$VIBY));
		//tidak buta
		$LIBT = 1/sqrt(2*3.14*$SDIBT)*pow(exp(1),(-pow(($INTRAOKULAR-$MIBT),2))/(2*$VIBT));

		//hitung likehood diabetes

		//buta
		if($DIABETES == 'YA'){
			$LDBY = $PDYBY;
		} else {
			$LDBY = $PDTBY;
		}
		//tidak buta
		if($DIABETES == 'YA'){
			$LDBT = $PDYBT;
		} else {
			$LDBT = $PDTBT;
		}

		//hitung likehood hipertensi

		//buta
		if($HIPERTENSI == 'YA'){
			$LHBY = $PHYBY;
		} else {
			$LHBY = $PHTBY;
		}
		//tidak buta
		if($HIPERTENSI == 'YA'){
			$LHBT = $PHYBT;
		} else {
			$LHBT = $PHTBT;
		}

		//menentukan prior
		$prior_buta = $PBY;
		$prior_tidak_buta = $PBT;

		//menghitung posterior
		$posterior_buta = $prior_buta * $LUBY * $LIBY * $LDBY * $LHBY;
		$posterior_tidak_buta = $prior_tidak_buta * $LUBT * $LIBT * $LDBT * $LHBT;

		if($posterior_buta > $posterior_tidak_buta){
			$KEBUTAAN = 'YA';
		} else {
			$KEBUTAAN = 'TIDAK';
		}

		$query = mysqli_query($conn, "INSERT INTO `testing` (`NOMOR`, `NAMA_PASIEN`, `UMUR`, `DIABETES`, `HIPERTENSI`, `INTRAOKULAR`, `KEBUTAAN`, `PRI_BUTA`, `PRI_TIDAK_BUTA`, `L_U_B`, `L_U_TB`, `L_I_B`, `L_I_TB`, `L_D_B`, `L_D_TB`, `L_H_B`, `L_H_TB`, `POS_BUTA`, `POS_TIDAK_BUTA`) VALUES (NULL, '$NAMA_PASIEN', '$UMUR', '$DIABETES', '$HIPERTENSI', '$INTRAOKULAR', '$KEBUTAAN', '$prior_buta', '$prior_tidak_buta', '$LUBY', '$LUBT', '$LIBY', '$LIBT', '$LDBY', '$LDBT', '$LHBY', '$LHBT', '$posterior_buta', '$posterior_tidak_buta');");
		if($query){
?>
			<script type="text/javascript">
				alert('Data berhasil disimpan!');
			</script>
<?php
		} else {
?>
			<script type="text/javascript">
				alert('Data gagal disimpan!');
			</script>
<?php
		}
	}
?>
	<div class="container-fluid">
		<hr>
			<h1 class="display-4">Detail Data Testing</h1>
		<hr>
		<div class="card">
		  <h5 class="card-header">Prior</h5>
		  <div class="card-body">
		    <h5 class="card-title">Positif Kebutaan</h5>
		    <p class="card-text"><?php echo number_format($prior_buta,5); ?></p>
		    <h5 class="card-title">Negatif Kebutaan</h5>
		    <p class="card-text"><?php echo number_format($prior_tidak_buta,5); ?></p>
		  </div>
		</div>
		<br>
		<div class="card">
		  <h5 class="card-header">Likehood</h5>
		  <div class="card-body">
		    <h5 class="card-title">Positif Kebutaan berdasarkan Umur</h5>
		    <p class="card-text"><?php echo number_format($LUBY, 5); ?></p>
		    <h5 class="card-title">Negatif Kebutaan berdasarkan Umur</h5>
		    <p class="card-text"><?php echo number_format($LUBT, 5); ?></p>
		    <h5 class="card-title">Positif Kebutaan berdasarkan Diabetes</h5>
		    <p class="card-text"><?php echo number_format($LDBY, 5); ?></p>
		    <h5 class="card-title">Negatif Kebutaan berdasarkan Diabetes</h5>
		    <p class="card-text"><?php echo number_format($LDBT, 5); ?></p>
		    <h5 class="card-title">Positif Kebutaan berdasarkan Hipertensi</h5>
		    <p class="card-text"><?php echo number_format($LHBY, 5); ?></p>
		    <h5 class="card-title">Negatif Kebutaan berdasarkan Hipertensi</h5>
		    <p class="card-text"><?php echo number_format($LHBT, 5); ?></p>
		    <h5 class="card-title">Positif Kebutaan berdasarkan Intraokular</h5>
		    <p class="card-text"><?php echo number_format($LIBY, 5); ?></p>
		    <h5 class="card-title">Negatif Kebutaan berdasarkan Intraokular</h5>
		    <p class="card-text"><?php echo number_format($LIBT, 5); ?></p>
		  </div>
		</div>
		<br>
		<div class="card">
		  <h5 class="card-header">Posterior</h5>
		  <div class="card-body">
		    <h5 class="card-title">Positif Kebutaan</h5>
		    <p class="card-text"><?php echo number_format($posterior_buta,5); ?></p>
		    <h5 class="card-title">Negatif Kebutaan</h5>
		    <p class="card-text"><?php echo number_format($posterior_tidak_buta,5); ?></p>
		  </div>
		</div>
		<br>
		<div class="card text-center">
		  <h5 class="card-header">Hasil</h5>
		  <div class="card-body">
		    <h5 class="card-title">Kemungkinan kebutaan adalah <strong><?php echo $KEBUTAAN; ?></strong></h5>
		  </div>
		</div>
		<hr>
	</div>
	</body>
</html>