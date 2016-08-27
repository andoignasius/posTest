<?php
			include 'koneksi.php';
			$query = "SELECT * FROM idbrgorder ";
			$result = mysql_query($query);
			$_rows = 0;
			$a = 0;
		?>
		<?php while($row = mysql_fetch_array($result)):;?>
			<tr class="rows">
				<td><?php echo $row['no'];?>
				</td>
				<td>
						<?php echo $row['charDpn'];?></a>
				</td>
			</tr>
		<?php endwhile;?>
	</table>
<br>
<br>
<br>
<form method="GET">
	<table>
		<?php 
		include 'koneksi.php';
			$id 	= $_GET['no']; 
			$query 	= "SELECT * FROM idbrgorder WHERE no = '$id'";  
			$result = mysql_query($query);
			$i 		= 0;
			if (mysql_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysql_fetch_assoc($result)) {
			        echo "<table> " .
			        		 "<td>" . $row["no"]. "</td>" .
			        	 	 "<td>". "<input text='charDpn' name='id_barang_order' value='". $row["charDpn"] ."$i' />" . "</td>" .
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
		$id 	= $_GET['no'];
		$iBO 	= $_GET['id_barang_order'];

			$input = mysql_query ('update barang_order values ("$iBO") WHERE no = "$id"');
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