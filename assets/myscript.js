const flashData= $('.flash-data').data('flashdata');

if (flashData){
	Swal.fire({
		title: 'Data Berhasil ' + flashData,
	});
}

//tombol hapus
$('.tombol-hapus').on( 'click',function(e){
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
		title: 'Apakah Data Akan Di Hapus?',
		text: "Data yang terhapus tidak akan kembali.",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#d33',
		cancelButtonColor: '#3085d6',
		confirmButtonText: 'Hapus',
		cancelButtonText: 'Kembali'
	}).then((result) => {
		if (result.value) {
			document.location.href= href;
		}
	})
 });
