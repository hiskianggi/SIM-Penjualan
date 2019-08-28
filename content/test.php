<table>
	<tr>
		<td><label><center>ID Barang</center></label></td>
		<td><label><center>Nama Barang</center></label></td>
		<td><label><center>Harga Barang</center></label></td>
	</tr>
	<tr>
		<td><input onkeyup="proses()" type="text" value="" id="id_barang" name="id_barang" class="textsmall"></td>
		<td><input readonly="" type="text" value="" id="nama_barang" name="nama_barang" class="textsmall"></td>
		<td><input readonly="" type="text" value="" id="harga" name="harga" class="textsmall"></td>
	</tr>
	<tr>
		<td><label><center>Jumlah Barang</center></label></td>
		<td><label><center>Sub Total</center></label></td>
		<td><label></label></td>
	</tr>
	<tr>
		<td><input type="text" value="" name="jumlah_barang" class="textsmall"></td>
		<td><input readonly="" type="text" value="" name="subtotal" class="textsmall"></td>
		<td><center><input type="submit" name="simpan" value="Simpan" class="simpan2"></center></td>
	</tr>
</table>
<script src="assets/js/jquery.min.js"></script>
<script type="text/javascript">
	function proses(){
		var id_barang = $("#id_barang").val();
		$.ajax({
			url: 'http://localhost/simpenjualan/content/p_data.php',
			data:"id_barang="+id_barang ,
		}).success(function (data) {
			var json = data,
			obj = JSON.parse(json);
			$('#nama_barang').val(obj.nama_barang);
			$('#harga').val(obj.harga);
		});
	}
</script>