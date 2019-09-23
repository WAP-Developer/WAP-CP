$('.delete-button').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');
	console.log(href);

	Swal.fire({
		title: 'Peringatan !',
		text: "Apakah anda yakin ingin menghapus data ?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
});
