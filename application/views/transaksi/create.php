<?php
require 'application/views/templete/header.php';
require 'application/views/templete/navbar.php';
?>
<div class="jumbotron m-lg-auto ">
	<div class="jumbotron">

		<table class="text-justify m-auto">
			<tr>
				<td colspan="2"> <center><h3 class="font-weight-bold">Tambah Data Transaksi</h3></center></td>
			</tr>

			<tr>
				<form class="form-control-sm form-group" method="post" action="<?=base_url('transaksi/insert');?>">
					<td></td>
					<td>
						<table class="text-justify m-auto">
							<tr>
								<td>Tanggal</td>
								<td>:</td>
								<td>
									<input type="date" class="form-control" id="datepicker" name="waktu" placeholder="masukkan tanggal"width="276">
									<!-- <script>
                                        $('#datepicker').datepicker({
                                            uiLibrary: 'bootstrap4'
                                        });
									</script> -->
								</td>
							</tr>
							<tr>
								<td>Kode Keluarga</td>
								<td>:</td>
								<td>
									<input class="form-control" type="text" name="kode_keluarga" placeholder="kode keluarga" id="kode_keluarga" >
								</td>
							</tr>
							<tr>
								<td>Nama Pasien</td>
								<td>:</td>
								<td>
									<!-- <input type="text" name="nama_pasien" id="nama_pasien" placeholder="nama pasien" class="form-control"> -->
									<select id="nama_pasien" class="form-control" name="kode_pasien" >
										<option value=""> Default </option>
										
									</select>
								</td>
							</tr>
							</tr>
							<td>Total Pembayaran </td>
							<td>:</td>
							<td><input class="form-control" type="text" name="biaya_administrasi" placeholder="masukkan biaya administrasi"></td>
							</tr>
							<tr>
								<td colspan="3"> <center><input class="btn-success" type="submit" value="Tambah"></center></td>
							</tr>
						</table>
					</td>
				</form>

			</tr>
		</table>

		<div class="row">
			<div id="showData">
				
			</div>
		</div>

		<!-- <script type="text/javascript"></script> -->
		<script type="text/javascript" >
			$(document).ready(function(){
				$('#kode_keluarga').change(function(){
					var kode_keluarga = $(this).val();
					// alert(id);
					$.ajax({
						url : '<?=base_url('transaksi/getPasienonKeluarga');?>',
						method : 'post',
						data : {kode_keluarga: kode_keluarga},
						async : true,
						dataType : 'json',
						success : function(data){
							// alert(data[1].kode_pasien);
							console.log(data);
							var html = '';
							var i;
							 //html += '<table><tr><th>'+data[1].kode_pasien+'</th><th>Kode Pasien</th><th>Harga Transaksi</th></tr>';
							for(i=0; i<data.length; i++){
								html += '<option value='+data[i].kode_pasien+'>'+data[i].nama_pasien+'</option>';
							}
							$('#nama_pasien').html(html);
						}
					});
					return false;
				});
				/*showData();
				function showData(){
					$.ajax({
						url : "< base_url('transaksi/showData');?>",
						method : "POST",
						dataType : "json",
						success : function(data){
							var html='';
							var i;
							html += '<table><tr><th>Kode Keluarga</th><th>Kode Pasien</th><th>Harga Transaksi</th></tr>';
							for (i in data){
								html += '<tr><td>'+data[i].kode_keluarga+'</td><td>'+data[i].kode_pasien+'</td><td>'+data[i].harga_transaksi+'</td></tr>';
							}
							html += '</table>';
							$('#showData').html(html);
						}
					})
				}*/
			});

		</script>

	</div>
</div>
<?php
require 'application/views/templete/footer.php';
?>
