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

	<!-- BELI -->
<br>
<br>
<br>
<br>
<br>
----------BELI----------
<form method="get">
	<table>
		<?php
			include 'koneksi.php';
			$query = "SELECT * FROM barang ";
			$result = mysql_query($query);
			$_rows = 0;
			$a = 0;
		?>
		<?php while($row = mysql_fetch_array($result)): $_rows++;?>
			<tr class="rows" onclick="stored($(this))">
				<td><?php echo $row['id_barang'];?> <input class="id_barang" type="hidden" name="id_barang" value="<?php echo $row['id_barang']; ?>">
				</td>
				<td>
						<a href="barang.php?id_barang=<?php echo $row['id_barang'];?>"><?php echo $row['nama_barang'];?></a>
				</td>
				<td><?php echo $row['stok_barang'];?></td>
				<td><input type="number" class="jumlah_barang" value="0" name="jumlah_barang_<?php echo $_rows;?>" /></td>
			</tr>
		<?php endwhile;?>
	</table>
	<input type="submit" name="kirim" />
</form>
	<?php
		if (isset($_GET['kirim'])) {
			for ($i=0; $i < $_rows; $i++) { 
				
				//$id_odr 	= 
				$odr_brg_id = 'B0001'+($i + 1);
				$id_brg 	= $_GET['id_barang_'.($i + 1)];  
				$odr_jml 	= $_GET['jumlah_barang_'.($i + 1)];  

					$input = mysql_query ("INSERT INTO `barang_order` (`no`, `id_barang_order`, `id_order`, `id_barang`, `jumlah_barang`) VALUES (NULL, '$odr_brg_id', '', '$id_brg', '$odr_jml')");

					$cek = mysql_query("SELECT * FROM `barang_order` WHERE jumlah_barang = 0");
				if ($cek) {
					$hps = mysql_query("DELETE FROM `barang_order` WHERE jumlah_barang = 0");
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
				

			}
		}
	?>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<script>
		function stored(ini){
			idB = ini.find('.id_barang');
			jmB = ini.find('.jumlah_barang');

			var b = idB.attr('value');
			var c = jmB.attr('value');

			$.ajax({
				data :{ id_barang_order : "aadc", id_order : 2, id_barang : b, jumlah_barang : c},
				type :"get",
				url : "ajax.php",
				success: function(data){
					console.log(data);
				}
			});

			// $.post("barang.php", { id_barang:b }).done(function(data){
			// 		console.log(data)
			// 	});
		}
	</script>
</body> 
		
</html>