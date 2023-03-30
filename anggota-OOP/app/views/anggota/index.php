	<div class="row">
		<?php foreach ($data['anggota'] as $key): ?>
			<div class="col-lg-3 col-md-4 col-sm-6 mb-2">
				<div class="card">
					<img src="<?= BASEURL; ?>/img/<?= $key['foto']; ?>" class="card-img-top">
					<div class="card-body">
				   		<h5 class="card-title text-truncate"><?= $key['nama']; ?></h5>
				    	<p class="card-text"><?= $key['noanggota']; ?></p>
						<div class="float-end">
							<button class="infoModal btn btn-warning btn-sm bi bi-info-lg" onclick="" data-id="<?= $key['id']; ?>" data-bs-toggle="modal" data-bs-target="#modalInfo"></button></a>
							<button class="btn btn-info btn-sm bi bi-pencil-square"></button>
							<a href="<?= BASEURL; ?>/anggota/hapus/<?= $key['id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data <?= $key['nama'] ?>')"><button class="btn btn-danger btn-sm bi bi-trash"></button></a>
						</div>
				  	</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>