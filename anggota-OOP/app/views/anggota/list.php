	<div style="overflow-x: scroll;">
		<table class="table table-striped table-bordered">
			<thead class="fw-bold text-center  text-nowrap">
				<td style="width: 5%">No.</td>
				<td>No. Anggota</td>
				<td>NIK</td>
				<td>Nama</td>
				<td>Tempat, Tanggal Lahir</td>
				<td>Jenis Kelamin</td>
				<td>Alamat</td>
				<td>No. Telepon</td>
				<td>Email</td>
				<td>Perusahaan</td>
				<td>Alamat Perusahaan</td>
				<td>No. Telepon Perusahaan</td>
				<td>Jabatan</td>
				<td>Bidang Usaha</td>
				<td>Tanggal Masuk</td>
				<td style="width: 10%">Aksi</td>
			</thead>
			<tbody>
			<?php $i=1; foreach ($data['anggota'] as $key): ?>
				<tr>
					<td class="text-center"><?php echo $i; $i++; ?></td>
					<td><?= $key['noanggota']; ?></td>
					<td><?= $this->crypt->dec($key['nik']); ?></td>
					<td><?= $key['nama']; ?></td>
					<td><?= $key['ttl']; ?></td>
					<td><?= $key['jk']; ?></td>
					<td><?= $key['alamat']; ?></td>
					<td><?= $this->crypt->dec($key['notlp']); ?></td>
					<td><?= $this->crypt->dec($key['email']); ?></td>
					<td><?= $key['perusahaan']; ?></td>
					<td><?= $key['alamatp']; ?></td>
					<td><?= $key['noper']; ?></td>
					<td><?= $key['jabatan']; ?></td>
					<td><?= $key['bidusaha']; ?></td>
					<td><?= $key['tglmasuk']; ?></td>
					<td class="text-center text-nowrap">
						<button class="btn btn-info btn-sm bi bi-pencil-square"></button>
						<a href="<?= BASEURL; ?>/anggota/hapus/<?= $key['id'] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data <?= $key['nama'] ?>')"><button class="btn btn-danger btn-sm bi bi-trash"></button></a>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>