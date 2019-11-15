<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Sistem KP <?= date('Y'); ?></span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
			</div>
		</div>
	</div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js"></script>

<script>
	$('.custom-file-input').on('change', function() {
		let filename = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(filename);
	});

	$('.form-check-input').on('click', function() {
		const menuId = $(this).data('menu');
		const roleId = $(this).data('role');

		$.ajax({
			url: "<?= base_url('admin/changeaccess'); ?>",
			type: 'post',
			data: {
				menuId: menuId,
				roleId: roleId
			},
			success: function() {
				document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId
			}
		});

	});

	$('#jabatan').on('click', function() {

		const nama = $('#myInput').val();

		$.ajax({
			url: "<?= base_url('PDL/getJabatan'); ?>",
			type: 'post',
			method: "POST",
			data: {
				nama: nama,
			},
			async: false,
			dataType: 'json',
			success: function(data) {
				$("#jabatan").val(data[0].jabatan);
				$("#golongan").val(data[0].golongan);

			}
		});
	});

	// $('#golongan').on('click', function() {

	// 	const nama = $('#myInput').val();

	// 	$.ajax({
	// 		url: "<?= base_url('PDL/getGolongan'); ?>",
	// 		type: 'post',
	// 		method: "POST",
	// 		data: {
	// 			nama: nama,
	// 		},
	// 		async: false,
	// 		dataType: 'json',
	// 		success: function(data) {
	// 			$("#golongan").val(data[0].golongan);

	// 		}
	// 	});
	// });


	$('#jabatan_penandatanganan').on('click', function() {

		const ditunjukkan_kepada = $('#myInput2').val();

		$.ajax({
			url: "<?= base_url('PDL/getJabatanPenandatanganan'); ?>",
			type: 'post',
			method: "POST",
			data: {
				ditunjukkan_kepada: ditunjukkan_kepada,
			},
			async: false,
			dataType: 'json',
			success: function(data) {
				$("#jabatan_penandatanganan").val(data[0].jabatan);
			}
		});
	});

	$('#jabatan_penandatangan_spj').on('click', function() {

		const penandatangan_spj = $('#penandatangan_spj').val();

		$.ajax({
			url: "<?= base_url('SPJ/getJabatanPenandatangananspj'); ?>",
			type: 'post',
			method: "POST",
			data: {
				penandatangan_spj: penandatangan_spj,
			},
			async: false,
			dataType: 'json',
			success: function(data) {
				$("#jabatan_penandatangan_spj").val(data[0].jabatan);
			}
		});
	});

	$(document).ready(function() {
		var max_fields = 20; //maximum input boxes allowed
		var wrapper = $(".input_fields_wrap"); //Fields wrapper
		var add_button = $(".add_field_button"); //Add button ID
		var x = 1; //initlal text box count

		$(add_button).click(function(e) { //on add input button click

			var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
			var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

			e.preventDefault();
			if (x < max_fields) { //max input box allowed
				x++; //text box increment
				/*
				1 baris 2 inputan
				<div class="form-group"><div class="row"><div class="col-5"><input class="form-control" type="text" class="form tambahForm" id="nama_rombongan" name="nama_rombongan[]" placeholder="Cari Nama Rombongan"></div><div class="col"><select id="show-list" class="form-control" name="jabatan_rombongan[]"><option>Tidak ada data</option></select></div></div></div>
				*/

				$(wrapper).append('<div><div class="form-group"><div class="row"><div class="col-5"><input id="tambahForm' + nextform + '" class="form-control tambahForm mt-2" type="text" class="form tambahForm"  placeholder="Cari Nama Rombongan"></div><div class="col mt-2"><select id="show-list' + nextform + '" class="show-list form-control" name="nama_rombongan[]"><option>Tidak ada data</option></select></div></div></div><div class="form-group"><input id="jabatanRombongan' + nextform + '" type="text" class="form-control" placeholder="Jabatan Rombongan" name="jabatan_rombongan[]" readonly></div><div class="form-group"><input id="golonganRombongan' + nextform + '" type="text" placeholder="Golongan Rombongan" class="form-control" name="golongan_rombongan[]" readonly></div><a href="#" class="remove_field ml-1" style="color:red; font-size:14px">Hapus Rombongan</a></div>'); //add input box

				// asli $(wrapper).append('<div> <div class="form-group"><input id="tambahForm' + nextform + '" class="form-control tambahForm mt-2" placeholder="Nama Rombongan" type="text" name="nama_rombongan[]"></div><div class="form-group"><input type="text" class="form-control" placeholder="Jabatan Rombongan" name="jabatan_rombongan[]"></div><div class="form-group"><input type="text" placeholder="Golongan Rombongan" class="form-control" name="golongan_rombongan[]"></div><a href="#" class="remove_field ml-1" style="color:red; font-size:14px">Hapus Rombongan</a></div>'); //add input box
				// edit $(wrapper).append('<div><div class="form-group"><div class="row"><div class="col-5"><input class="form-control" type="text" class="form tambahForm" id="nama_rombongan" name="nama_rombongan[]" placeholder="Cari Nama Rombongan"></div><div class="col"><select id="show-list" class="form-control" name="jabatan_rombongan[]"><option>Tidak ada data</option></select></div></div></div><div class="form-group"><input type="text" class="form-control" placeholder="Jabatan Rombongan" name="jabatan_rombongan[]"></div><div class="form-group"><input type="text" placeholder="Golongan Rombongan" class="form-control" name="golongan_rombongan[]"></div><a href="#" class="remove_field ml-1" style="color:red; font-size:14px">Hapus Rombongan</a></div>'); //add input box
			}

			$("#jumlah-form").val(nextform);

		});

		$(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
			e.preventDefault();
			$(this).parent('div').remove();
			var angka = parseInt($("#jumlah-form").val()) - 1;
			$("#jumlah-form").val(angka);
			x--;
		})

		// autocomplete nama
		$('#nama_rombongan').keyup(function() {
			var searchText = $(this).val();
			if (searchText != '') {
				$.ajax({
					url: "<?= base_url('pdl/search'); ?>",
					method: 'post',
					data: {
						query: searchText
					},
					success: function(response) {
						if (response == 'null') {
							$('#show-list').html('<option>Data tidak ditemukan</option>');
						} else {
							$('#show-list').html(response);
						}
					}
				});
			}
		});

		// autocomplete nama pemohon
		$('#nama').keyup(function() {
			var searchText = $(this).val();
			if (searchText != '') {
				$.ajax({
					url: "<?= base_url('pdl/search'); ?>",
					method: 'post',
					data: {
						query: searchText
					},
					success: function(response) {
						if (response == 'null') {
							$('#show-list-pemohon').html('<option>Data tidak ditemukan</option>');
						} else {
							$('#show-list-pemohon').html(response);
						}
					}
				});
			}
		});

		$('#nama_rombongan').click(function() {
			$('#show-list').html('<option>Data tidak ditemukan</option>');
			$('#jabatan_rombongan').val('');
			$('#golonganRombongan').val('');
		});

		$('#nama').click(function() {
			$('#show-list-pemohon').html('<option>Data tidak ditemukan</option>');
			$('#jabatan').val('');
			$('#golongan').val('');
		});

		$("#tambahInput").click(function() { // Ketika tombol Tambah Data Form di klik

			var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
			var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

			// Kita akan menambahkan form dengan menggunakan append
			// pada sebuah tag div yg kita beri id insert-form
			$("#insert-form").append(nextform +
				// "<table>" +
				"<tr>" +
				"<td><input id='tambahForm" + nextform + "' class='tambahForm' placeholder='Nama Rombongan' type='text' name='nama_rombongan[]' required></td>" +
				"<td><a href='#' class='remove_field'>Remove</a></td>" +
				"</tr>" +
				// "</table>" +
				"");

			$("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform

			// autocomplete(document.getElementById("tambahForm2"), count);

		});

		// autoset jabatan dan golongan berdasarkan nama yang dipilih 
		$("#show-list").on('click', function() {
			var nama = $('#show-list option:selected').text();
			$.ajax({
				url: "<?= base_url('pdl/getDataKaryawanByName'); ?>",
				type: 'post',
				method: 'post',
				dataType: 'json',
				data: {
					nama: nama,
				},
				async: 'false',
				success: function(response) {
					console.log(response);
					if (response != null) {
						$('#jabatan_rombongan').val(response[0]['jabatan']);
						$('#golonganRombongan').val(response[0]['golongan']);
						$('#nama_rombongan').val('');
					} else {
						console.log('no response');
					}
				}
			})
		});

		// autoset jabatan dan golongan berdasarkan nama Karyawan yang dipilih 
		$("#show-list-pemohon").on('click', function() {
			var nama = $('#show-list-pemohon option:selected').text();
			$.ajax({
				url: "<?= base_url('pdl/getDataKaryawanByName'); ?>",
				type: 'post',
				method: 'post',
				dataType: 'json',
				data: {
					nama: nama,
				},
				async: 'false',
				success: function(response) {
					console.log(response);
					if (response != null) {
						$('#jabatan').val(response[0]['jabatan']);
						$('#golongan').val(response[0]['golongan']);
						$('#nama').val('');
					} else {
						console.log('no response');
					}
				}
			})
		});

		// Buat fungsi untuk mereset form ke semula
		$("#resetInput").click(function() {
			$("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
			$("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
		});

		// autocomplete nama rombongan
		$(document).on('keyup', '.tambahForm', function() {
			var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
			var nextform = jumlah + 1;
			var id = this.id
			// autocomplete(document.getElementById(id), count);
			lakukanAjaxCariNama(id, jumlah);
		});

		$(document).on('click', '.show-list', function() {
			var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
			var nextform = jumlah + 1;
			var id = this.id
			// autocomplete(document.getElementById(id), count);
			lakukanAjaxAmbilData(id, jumlah);
		});
	});

	// autocomplete data rombongan


	// autocomplete nama rombongan
	function lakukanAjaxCariNama(element, number) {
		var searchText = $("#tambahForm" + number).val();
		if (searchText != '') {
			$.ajax({
				url: "<?= base_url('pdl/search'); ?>",
				method: 'post',
				data: {
					query: searchText
				},
				success: function(response) {
					if (response == 'null') {
						$("#show-list" + number).html('<option>Data tidak ditemukan</option>');
					} else {
						$("#show-list" + number).html(response);
					}
				}
			});
		}
	};

	// autocomplete data rombongan
	function lakukanAjaxAmbilData(element, number) {
		var nama = $('#show-list' + number + ' option:selected').text();
		console.log(nama);
		$.ajax({
			url: "<?= base_url('pdl/getDataKaryawanByName'); ?>",
			type: 'post',
			method: 'post',
			dataType: 'json',
			data: {
				nama: nama,
			},
			async: 'false',
			success: function(response) {
				if (response != null) {
					$('#jabatanRombongan' + number).val(response[0]['jabatan']);
					$('#golonganRombongan' + number).val(response[0]['golongan']);
					$('#nama_rombongan' + number).val('');
				} else {
					console.log('no response');
				}
			}
		})
	}
</script>

</body>

</html>