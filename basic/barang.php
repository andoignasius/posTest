<form method="GET">
	<table>
		<?php 
		include 'koneksi.php';
			$id = $_GET['id_barang']; 
			$query = "SELECT * FROM barang WHERE id_barang = '$id'";  
			$result = mysql_query($query);

			if (mysql_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysql_fetch_assoc($result)) {
			        echo "<table> " .
			        		 "<td>" . $row["id_barang"]. "</td>" .
			        	 	 "<td>" . $row["nama_barang"]. "</td>" .
			         	 	 "<td>" . $row["stok_barang"]. "</td>" .
			         	 	 "<td>" . "<input type='text' placeholder='Banyak Barang yg dibeli' />" ."</td>" .
			        	 "<table>";
			    }
			} else {
			    echo "404";
			}
			?>
	</table>
	<input type="submit" value="kirim" name="kirim" onclick="return sure();" />
</form>
		<?php
			if (isset($_GET['kirim'])) {
				echo '<script language="javascript">';
				echo 'alert(" successfully ")';
				echo '</script>';
			} else {
				echo '<script language="javascript">';
				echo 'alert(" NOT successfully ")';
				echo '</script>';
			}
		?>

<script>
function sure() {
    var x;
    if (confirm("Press a button!") == true) {
       x = "asd"
    } else {
        x = "You pressed Cancel!";
    }
    document.getElementById("demo").innerHTML = x;
}
</script>