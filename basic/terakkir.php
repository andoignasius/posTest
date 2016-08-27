<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		<input type="hidden" name="id_kategori"  />
		<input type="text" name="nama_kategori"  />
		<input type="submit" name="simpan" />
	</form>
	<?php
	include 'koneksi.php';
		if (isset($_POST['simpan'])) {
		  # code...
		$ik = $_POST['id_kategori'];
		$nk = $_POST['nama_kategori'];
		$input = mysql_query ("insert into kategori values ('$ik','$nk')");
			if ($input) {
				echo '<script language="javascript">';
				echo 'alert(" successfully ")';
				echo '</script>';
			} else {
				echo '<script language="javascript">';
				echo 'alert(" NOT successfully ")';
				echo '</script>';
			}
		}
	?>
	<?php
		$query = "SELECT * FROM kategori ";
		$result = mysql_query($query);
	?>
<br>
	<select name="kategori">
		<option>-Select Kategori-</option>
		<?php while($row = mysql_fetch_array($result)):;?>
			<option value="<?php echo $row['id_kategori'];?>"><?php echo $row['nama_kategori'];?></option>
		<?php endwhile;?>
	</select> 


<br><br><br>
	-------------Barang-------------
	<br>
	<!-- Barang -->
	<form method="get">
		<input type="hidden" name="id_barang"  />
		<?php
			include 'koneksi.php';
			$query = "SELECT * FROM kategori ";
			$result = mysql_query($query);
		?>
	<select name="id_kategori">
		<option>-Select Kategori-</option>
		<?php while($row = mysql_fetch_array($result)):;?>
			<option value="<?php echo $row['id_kategori'];?>"><?php echo $row['nama_kategori'];?></option>
		<?php endwhile;?>
	</select> 
		<input type="text" name="nama_barang" placeholder="nama barang" />
		<input type="text" name="stok_barang" placeholder="stok barang" />
		<input type="text" name="harga_barang" placeholder="harga barang" />
		<input type="submit" name="save" />
	</form>
	<?php
		include 'koneksi.php';
			if (isset($_GET['save'])) {
			  # code...
			$idbrg = $_GET['id_barang'];
			$idktgr = $_GET['id_kategori'];
			$nabar = $_GET['nama_barang'];
			$stbrg = $_GET['stok_barang'];
			$habar = $_GET['harga_barang'];
			$input = mysql_query ("insert into barang values ('$idbrg','$idktgr','$nabar','$stbrg','$habar')");
				if ($input) {
					echo '<script language="javascript">';
					echo 'alert(" successfully ")';
					echo '</script>';
				} else {
					echo '<script language="javascript">';
					echo 'alert(" NOT successfully ")';
					echo '</script>';
				}
			}
	?>
<br>
<br>
<br>
<br>
<br>
----------Hasil----------
<form method="get">
	<table>
		<?php
			include 'koneksi.php';
			$query = "SELECT * FROM barang ";
			$result = mysql_query($query);
			$_rows = 0;
		?>
		<?php while($row = mysql_fetch_array($result)): $_rows++;?>
			<tr>
				<td><input type="checkbox" name="selected_<?php echo $_rows;?>" /></td>
				<td><?php echo $row['id_barang'];?> <input type="hidden" name="id_barang_<?php echo $_rows;?>" value="<?php echo $row['id_barang']; ?>"></td>
				<td><?php echo $row['nama_barang'];?></td>
				<td><?php echo $row['stok_barang'];?></td>
				<td><input type="text" name="jumlah_barang_<?php echo $_rows;?>" /></td>
			</tr>
		<?php endwhile;?>
	</table>
	<input type="submit" name="kirim" />
</form>
	
</body> 
</html>