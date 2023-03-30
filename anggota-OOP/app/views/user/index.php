<div class="container bg-light mt-2 mb-3 p-3">
	<div class="d-flex justify-content-between mb-3">
		<div >
			<?php Alert::flash(); ?>
		</div>
		<div>
			<button class="btn btn-success modalTambah" data-bs-toggle="modal" data-bs-target="#modalForm">Tambah User</button>
		</div>
	</div>

	<table class="table table-bordered">
		<thead class="bg-dark text-white text-center">
			<td>No.</td>
			<td>Username</td>
			<td>Password</td>
			<td>Aksi</td>
		</thead>
		<tbody>
			<?php $no = 1; foreach ($data['user'] as $user): ?>
				<tr>
					<td class="text-center">
						<?php 
							echo $no; 
							$no++; 
						?>	
					</td>
					<td><?= $user['username']; ?></td>
					<td><?= $user['password']; ?></td>
					<td class="text-center">
						<button class="btn btn-sm btn-outline-info modalGanti" data-bs-toggle="modal" data-bs-target="#modalForm" data-id="<?= $user['id'] ?>">Ubah Password</button></a>
						<a href="<?= BASEURL; ?>/user/hapus/<?= $user['id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus User <?= $user['username'] ?>')"><button class="btn btn-sm btn-outline-danger">Hapus</button></a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>

<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/user/tambah" method="post">
        	<input type="hidden" name="id" id="id">
        	<div class="mb-3">
				<label for="username" class="form-label">Username</label>
				<input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
			</div>
			<div class="mb-3">
				<label for="confirm" class="form-label">Konfirmasi Password</label>
				<input type="password" class="form-control" id="confirm" name="confirm" placeholder="Konfirmasi Password">
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
       	</form>
      </div>
    </div>
  </div>
</div>