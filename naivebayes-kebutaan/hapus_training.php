<?php
	require_once("koneksi.php");
	$NOMOR = $_GET['hapus'];

	$query = mysqli_query($conn, "DELETE FROM `training` WHERE `training`.`NOMOR` = '$NOMOR'");
	if($query){
?>
		<script type="text/javascript">
			alert('Data berhasil dihapus!');
			window.location = 'training.php';
		</script>
<?php
	} else {
?>
		<script type="text/javascript">
			alert('Data gagal dihapus!');
			window.location = 'training.php';
		</script>
<?php
	}
?>