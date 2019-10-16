<?php
include_once("config.php");

$result = $dbConn->query("SELECT * FROM mahasiswa ORDER BY id DESC");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Nama</td>
		<td>Nim</td>
		<td>Ttl</td>
		<td>Alamat</td>
		<td>Smt</td>
		<td>Prodi</td>
		<td>Foto</td>
		<td>Update</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['nama']."</td>";
		echo "<td>".$row['nim']."</td>";
		echo "<td>".$row['ttl']."</td>";
		echo "<td>".$row['alamat']."</td>";
		echo "<td>".$row['smt']."</td>";
		echo "<td>".$row['prodi']."</td>";
		echo "<td>".$row['foto']."</td>";	
		echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
