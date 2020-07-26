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

$(document).ready(function () {
	$('dusun').autocomplete({
		source:"http://localhost/KlinikPratama/kepala_keluarga/get_autocomplete"
	});
});

// $(document).ready(function(){
// 	$('.kepala_keluarga').select2({
// 		ajax:{
// 			url: "http://localhost/KlinikPratama/pasien/getKepala",
// 			dataType: "json",
// 			delay: 250,
// 			data: function(params){
// 				return{
// 					nama_kepala: params.term
// 				};
// 			},
// 			processResults: function(data){
// 				var results = [];

// 				$.each(data, function(index, item){
// 					results.push({
// 						id: item.kode_keluarga,
// 						text: item.nama_kepala
// 					});
// 				});
// 				return {
// 					results: results
// 				};
// 			}
// 		}
// 	});
// });

// $(document).ready(function(){
// 	$('.dusun').select2({
// 		ajax:{
// 			url: "http://localhost/KlinikPratama/kepala_keluarga/getDusun",
// 			dataType: "json",
// 			delay: 250,
// 			data: function(params){
// 				return {
// 					dusun: params.term
// 				};
// 			},
// 			processResults: function(data){
// 				var results = [];

// 				$.each(data, function(index, item){
// 					results.push({
// 						id: item.kode_dusun,
// 						text: item.nama_dusun
// 					});
// 				});
// 				return {
// 					results: results
// 				};
// 			}
// 		}
// 	});
// });
