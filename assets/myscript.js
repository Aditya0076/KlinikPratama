const flashData= $('.flash-data').data('flashdata');
if (flashData){
	Swal({
		title: 'Data Berhasil ',
		text: 'Di Hapus',
		type: 'success'
	});
}

$('.tombol-hapus').on('click',function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal({
		title: 'Apakah anda yakin',
		text: 'Data Dihapus?',
		type:'warning',
		showCancelButton:true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText:'Data Terhapus'
	}).then((result))=>{
		if (result.value){
			document.location.href= href;
		}
	 }
 })
