<?php
include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$nama=$_POST['nama'];
	$nim=$_POST['nim'];
	$ttl=$_POST['ttl'];
	$alamat=$_POST['alamat'];
	$smt=$_POST['smt'];
	$prodi=$_POST['prodi'];
	$foto=$_POST['foto'];	
	
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
		$sql = "UPDATE mahasiswa SET nama=:nama, nim=:nim, ttl=:ttl, alamat=:alamat, smt=:smt, prodi=:prodi, foto=:foto, WHERE id=:id";
		$query = $dbConn->prepare($sql);
		
		$query->bindparam(':id', $id);
		$query->bindparam(':nama', $nama);
		$query->bindparam(':nim', $nim);
		$query->bindparam(':ttl', $ttl);
		$query->bindparam(':alamat', $alamat);
		$query->bindparam(':smt', $smt);
		$query->bindparam(':prodi', $prodi);
		$query->bindparam(':foto', $foto);		
		$query->execute();
		
		header("Location: index.php");
	}
}
?>
<?php
$id = $_GET['id'];

$sql = "SELECT * FROM mahasiswa WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$nama = $row['nama'];
	$nim = $row['nim'];
	$nim = $row['ttl'];
	$nim = $row['alamat'];
	$nim = $row['smt'];
	$nim = $row['prodi'];
	$nim = $row['foto'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?php echo $nama;?>"></td>
			</tr>
			<tr> 
				<td>Nim</td>
				<td><input type="text" name="nim" value="<?php echo $nim;?>"></td>
			</tr>
			<tr> 
				<td>Ttl</td>
				<td><input type="text" name="ttl" value="<?php echo $ttl;?>"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $alamat;?>"></td>
			</tr>
			<tr> 
				<td>Smt</td>
				<td><input type="text" name="smt" value="<?php echo $smt;?>"></td>
			</tr>
			<tr> 
				<td>Prodi</td>
				<td><input type="text" name="prodi" value="<?php echo $prodi;?>"></td>
			</tr>
			<tr> 
				<td>Foto</td>
				<td><input type="text" name="foto" value="<?php echo $foto;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
