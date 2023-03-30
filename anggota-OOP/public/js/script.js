$(function(){
	$('.modalTambah').on('click', function(){
		$('#judulModal').html('Tambah Data User');
		$('.modal-footer button[type=submit]').html('Tambah Data');
		$('.modal-body form').attr('action', 'http://localhost/asppi/public/user/tambah');
		$('#username').val('');
		document.getElementById('username').disabled = false;
	});

	$('.modalGanti').on('click', function(){
		$('#judulModal').html('Ganti Password User');
		$('.modal-footer button[type=submit]').html('Ganti Password');
		$('.modal-body form').attr('action', 'http://localhost/asppi/public/user/ubah');
		document.getElementById('username').disabled = true;

		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/asppi/public/user/get',
			data: {id :id},
			type: 'post',
			dataType: 'json',
			
			success: function(data){
				$('#username').val(data.username);
				$('#id').val(data.id);
			} 
		});
	});

	$('.ganti').on('click', function(){
		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/asppi/public/anggota/get',
			data: {id :id},
			type: 'post',
			dataType: 'json',
			
			success: function(data){
				$('#username').val(data.username);
				$('#id').val(data.id);
			} 
		});
	});

	$('.infoModal').on('click', function(){
		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/asppi/public/anggota/getanggota',
			data: {id : id},
			type: 'post',
			dataType: 'json',

			success: function(data){
				const foto = "http://localhost/asppi/public/img/".concat(data.foto);
				$('#img').attr('src', foto);
				$('#noanggota').html(data.noanggota);
				$('#nama').html(data.nama);
				$('#nik').html(data.nik);
				$('#ttl').html(data.ttl);
				$('#jk').html(data.jk);
				$('#alamat').html(data.alamat);
				$('#notlp').html(data.notlp);
				$('#email').html(data.email);
				$('#perusahaan').html(data.perusahaan);
				$('#alamatp').html(data.alamatp);
				$('#noper').html(data.noper);
				$('#jabatan').html(data.jabatan);
				$('#bidusaha').html(data.bidusaha);
				$('#tglmasuk').html(data.tglmasuk);
			}
		});
	});
});


//'.~' untuk mencari class
//'#~' untuk mencari id
