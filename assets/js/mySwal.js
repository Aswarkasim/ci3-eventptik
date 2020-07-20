const flashdata = $('.flash-data').data('flashdata');

if (flashdata) {
	Swal({
		title: 'Data',
		text: flashdata,
		type: 'success'
	})
}


// Tommbol hapus
$('.tombol-hapus').on('click', function (e) {
	// Mematikan href
	e.preventDefault();
	const href = $(this).attr('href');

	Swal({
		title: 'Apakah anda yakin ingin menghapus?',
		text: "data akan dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
})

// Tommbol hapus
$('.hapus-event').on('click', function (e) {
	// Mematikan href
	e.preventDefault();
	const href = $(this).attr('href');

	Swal({
		title: 'Hapus Event?',
		text: "Semua data peserta dan panitia akan dihapus",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Hapus Data!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
})

// Tommbol aktif
$('.tombol-aktif').on('click', function (e) {
	// Mematikan href
	e.preventDefault();
	const href = $(this).attr('href');

	Swal({
		title: 'Apakah anda yakin mengaktifkan?',
		type: 'confirm',
		showCancelButton: true,
		confirmButtonColor: '#00a65a',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Aktifkan!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
})

// Tommbol aktif
$('.tombol-non-aktif').on('click', function (e) {
	// Mematikan href
	e.preventDefault();
	const href = $(this).attr('href');

	Swal({
		title: 'Apakah anda yakin menonaktifkan?',
		type: 'confirm',
		showCancelButton: true,
		confirmButtonColor: '#00a65a',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Non-aktifkan!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
})

// Batal
$('.batal-alert').on('click', function (e) {
	// Mematikan href
	e.preventDefault();
	const href = $(this).attr('href');

	Swal({
		title: 'Batal mengikuti event ini?',
		type: 'confirm',
		showCancelButton: true,
		confirmButtonColor: '#00a65a',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
})

// Ikuti
$('.ikuti-alert').on('click', function (e) {
	// Mematikan href
	e.preventDefault();
	const href = $(this).attr('href');

	Swal({
		title: 'Ikuti event ini?',
		type: 'confirm',
		showCancelButton: true,
		confirmButtonColor: '#00a65a',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})
})
