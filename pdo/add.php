<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$nama = $_POST['nama'];
	$nim = $_POST['nim'];
	$ttl = $_POST['ttl'];
	$alamat = $_POST['alamat'];
	$smt = $_POST['smt'];
	$prodi = $_POST['prodi'];
	$foto = $_POST['foto'];			
	// checking empty fields
	if(empty($nama) || empty($nim) || empty($ttl) || empty($alamat) || empty($smt) || empty($prodi) || empty($foto)) {
				
		if(empty($nama)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($nim)) {
			echo "<font color='red'>Nim field is empty.</font><br/>";
		}
		
		if(empty($ttl)) {
			echo "<font color='red'>Ttl field is empty.</font><br/>";
		}

		if(empty($alamat)) {
			echo "<font color='red'>Alamat field is empty.</font><br/>";
		}
		
		if(empty($smt)) {
			echo "<font color='red'>Smt field is empty.</font><br/>";
		}
		
		if(empty($prodi)) {
			echo "<font color='red'>Prodi field is empty.</font><br/>";
		}
		
		if(empty($foto)) {
			echo "<font color='red'>Foto field is empty.</font><br/>";
		}
		
	} else { 		
		$sql = "INSERT INTO mahasiswa(nama, nim, ttl, alamat, smt, prodi, foto) VALUES(:nama, :nim, :ttl, :alamat, :smt, :prodi, :foto)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':nama', $nama);
		$query->bindparam(':nim', $nim);
		$query->bindparam(':ttl', $ttl);
		$query->bindparam(':alamat', $alamat);
		$query->bindparam(':smt', $smt);
		$query->bindparam(':prodi', $prodi);
		$query->bindparam(':foto', $foto);
		$query->execute();
		
		
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
