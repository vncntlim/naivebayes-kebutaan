<?php
	require_once("koneksi.php");
	//probabilitas data non numerik

	//hitung banyaknya data
	$query = mysqli_query($conn, "SELECT * FROM training");
	$banyakdata = mysqli_num_rows($query);

	//buta ya
	$query = mysqli_query($conn, "SELECT COUNT(*) AS PBY FROM training WHERE KEBUTAAN = 'YA'");
	$banyakbuta = mysqli_fetch_array($query)[0];
	$PBY = $banyakbuta / $banyakdata;

	//buta tidak
	$query = mysqli_query($conn, "SELECT COUNT(*) AS PBT FROM training WHERE KEBUTAAN = 'TIDAK'");
	$banyaktidakbuta = mysqli_fetch_array($query)[0];
	$PBT = $banyaktidakbuta / $banyakdata;

	//diabetes ya buta tidak
	$query = mysqli_query($conn, "SELECT COUNT(*) AS PDYBT FROM training WHERE DIABETES = 'YA' AND KEBUTAAN = 'TIDAK'");
	$PDYBT = mysqli_fetch_array($query)[0] / $banyaktidakbuta;

	//diabetes tidak buta tidak
	$query = mysqli_query($conn, "SELECT COUNT(*) AS PDTBT FROM training WHERE DIABETES = 'TIDAK' AND KEBUTAAN = 'TIDAK'");
	$PDTBT = mysqli_fetch_array($query)[0] / $banyaktidakbuta;

	//diabetes ya buta ya
	$query = mysqli_query($conn, "SELECT COUNT(*) AS PDYBY FROM training WHERE DIABETES = 'YA' AND KEBUTAAN = 'YA'");
	$PDYBY = mysqli_fetch_array($query)[0] / $banyakbuta;

	//diabetes tidak buta ya
	$query = mysqli_query($conn, "SELECT COUNT(*) AS PDTBY FROM training WHERE DIABETES = 'TIDAK' AND KEBUTAAN = 'YA'");
	$PDTBY = mysqli_fetch_array($query)[0] / $banyakbuta;

	//hipertensi ya buta tidak
	$query = mysqli_query($conn, "SELECT COUNT(*) AS PHYBT FROM training WHERE HIPERTENSI = 'YA' AND KEBUTAAN = 'TIDAK'");
	$PHYBT = mysqli_fetch_array($query)[0] / $banyaktidakbuta;

	//hipertensi tidak buta tidak
	$query = mysqli_query($conn, "SELECT COUNT(*) AS PHTBT FROM training WHERE HIPERTENSI = 'TIDAK' AND KEBUTAAN = 'TIDAK'");
	$PHTBT = mysqli_fetch_array($query)[0] / $banyaktidakbuta;

	//hipertensi ya buta ya
	$query = mysqli_query($conn, "SELECT COUNT(*) AS PHYBY FROM training WHERE HIPERTENSI = 'YA' AND KEBUTAAN = 'YA'");
	$PHYBY = mysqli_fetch_array($query)[0] / $banyakbuta;

	//hipertensi tidak buta ya
	$query = mysqli_query($conn, "SELECT COUNT(*) AS PHTBY FROM training WHERE HIPERTENSI = 'TIDAK' AND KEBUTAAN = 'YA'");
	$PHTBY = mysqli_fetch_array($query)[0] / $banyakbuta;

	//probabilitas data numerik

	//mean umur tidak buta
	$query = mysqli_query($conn, "SELECT AVG(UMUR) FROM training WHERE KEBUTAAN = 'TIDAK'");
	$MUBT = mysqli_fetch_array($query)[0];

	//mean umur buta
	$query = mysqli_query($conn, "SELECT AVG(UMUR) FROM training WHERE KEBUTAAN = 'YA'");
	$MUBY = mysqli_fetch_array($query)[0];

	//mean intraokular tidak buta
	$query = mysqli_query($conn, "SELECT AVG(INTRAOKULAR) FROM training WHERE KEBUTAAN = 'TIDAK'");
	$MIBT = mysqli_fetch_array($query)[0];

	//mean intraokular buta
	$query = mysqli_query($conn, "SELECT AVG(INTRAOKULAR) FROM training WHERE KEBUTAAN = 'YA'");
	$MIBY = mysqli_fetch_array($query)[0];

	//stdev umur tidak buta
	$query = mysqli_query($conn, "SELECT STDDEV(UMUR) FROM training WHERE KEBUTAAN='TIDAK'");
	$SDUBT = mysqli_fetch_array($query)[0];

	//stdev umur buta
	$query = mysqli_query($conn, "SELECT STDDEV(UMUR) FROM training WHERE KEBUTAAN='YA'");
	$SDUBY = mysqli_fetch_array($query)[0];
	//stdev intraokular tidak buta
	$query = mysqli_query($conn, "SELECT STDDEV(INTRAOKULAR) FROM training WHERE KEBUTAAN='TIDAK'");
	$SDIBT = mysqli_fetch_array($query)[0];

	//stdev intraokular buta
	$query = mysqli_query($conn, "SELECT STDDEV(INTRAOKULAR) FROM training WHERE KEBUTAAN='YA'");
	$SDIBY = mysqli_fetch_array($query)[0];

	//variance umur tidak buta
	$VUBT = pow($SDUBT,2);

	//variance umur buta
	$VUBY = pow($SDUBY,2);

	//variance intraokular tidak buta
	$VIBT = pow($SDIBT,2);

	//variance intraokular buta
	$VIBY = pow($SDIBY,2);
	
?>