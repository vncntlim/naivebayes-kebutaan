<!DOCTYPE html>
<?php
	require_once("koneksi.php");
	error_reporting(0);

	$NOMOR = $_GET['ubah'];

	$query = mysqli_query($conn, "SELECT * FROM training WHERE NOMOR = $NOMOR");
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
		      <a class="nav-item nav-link active" href="training">Training <span class="sr-only">(current)</span></a>
		      <a class="nav-item nav-link" href="testing">Testing</a>
		    </div>
		  </div>
		</nav>
		<div class="container-fluid">
			<hr>
			<h1 class="display-4">Ubah Data Training</h1>
			<hr>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label class="control-label">Nama Pasien</label>
					<input type="text" class="form-control" name="NAMA_PASIEN" required="required" value="<?php echo $data['NAMA_PASIEN']; ?>">
				</div>
				<div class="form-group">
					<label class="control-label">Umur</label>
					<input type="text" class="form-control" name="UMUR" required="required" value="<?php echo $data['UMUR']; ?>">
				</div>
				<div class="form-group">
					<label class="control-label">Diabetes</label>
					<select class="form-control" name="DIABETES" required="required">
				      <option value="">-Pilih-</option>
				      <?php
				      	if($data['DIABETES'] == 'YA'){
				      ?>
				      <option value="YA" selected="selected">YA</option>
				      <option value="TIDAK">TIDAK</option>
				      <?php
				      	} else {
				      ?>
				      <option value="YA">YA</option>
				      <option value="TIDAK" selected="selected">TIDAK</option>
				      <?php
				      	}
				      ?>
				    </select>				
				</div>
				<div class="form-group">
					<label class="control-label">Hipertensi</label>
					<select class="form-control" name="HIPERTENSI" required="required">
				      <option value="">-Pilih-</option>
				      <?php
				      	if($data['HIPERTENSI'] == 'YA'){
				      ?>
				      <option value="YA" selected="selected">YA</option>
				      <option value="TIDAK">TIDAK</option>
				      <?php
				      	} else {
				      ?>
				      <option value="YA">YA</option>
				      <option value="TIDAK" selected="selected">TIDAK</option>
				      <?php
				      	}
				      ?>
				    </select>				
				</div>
				<div class="form-group">
					<label class="control-label">Intraokular</label>
					<input type="text" class="form-control" name="INTRAOKULAR" required="required" value="<?php echo $data['INTRAOKULAR']; ?>">
				</div>
				<div class="form-group">
					<label class="control-label">Kebutaan</label>
					<select class="form-control" name="KEBUTAAN" required="required">
				      <option value="">-Pilih-</option>
				      <?php
				      	if($data['KEBUTAAN'] == 'YA'){
				      ?>
				      <option value="YA" selected="selected">YA</option>
				      <option value="TIDAK">TIDAK</option>
				      <?php
				      	} else {
				      ?>
				      <option value="YA">YA</option>
				      <option value="TIDAK" selected="selected">TIDAK</option>
				      <?php
				      	}
				      ?>
				    </select>				
				</div>
				<hr>
		        <input type="submit" name="simpan" class="btn btn-primary" value="Ubah">
		        <a href="training.php" class="btn btn-default">Kembali</a>
			</form>
		</div>
<?php
	if(isset($_POST['simpan'])){
		$NAMA_PASIEN = $_POST['NAMA_PASIEN'];
		$UMUR = $_POST['UMUR'];
		$DIABETES = $_POST['DIABETES'];
		$HIPERTENSI = $_POST['HIPERTENSI'];
		$INTRAOKULAR = $_POST['INTRAOKULAR'];
		$KEBUTAAN = $_POST['KEBUTAAN'];

		$query = mysqli_query($conn, "UPDATE `training` SET `NAMA_PASIEN` = '$NAMA_PASIEN', `UMUR` = '$UMUR', `DIABETES` = '$DIABETES', `HIPERTENSI` = '$HIPERTENSI', `INTRAOKULAR` = '$INTRAOKULAR', `KEBUTAAN` = '$KEBUTAAN' WHERE `training`.`NOMOR` = '$NOMOR'");
		if($query){
?>
			<script type="text/javascript">
				alert('Data berhasil diubah!');
				window.location = 'training.php';
			</script>
<?php
		} else {
?>
			<script type="text/javascript">
				alert('Data gagal diubah!');
			</script>
<?php
		}
	}
?>
	</body>
</html>