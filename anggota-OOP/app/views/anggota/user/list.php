	<div style="overflow-x: scroll;">
		<table class="table table-striped table-bordered text-nowrap">
			<thead class="fw-bold text-center">
				<td style="width: 5%">No.</td>
				<td>Nama</td>
				<td>Jenis Kelamin</td>
				<td>No. Telepon</td>
				<td>Email</td>
				<td>Bidang Usaha</td>
				<td>Perusahaan</td>
				<td>Alamat Perusahaan</td>
				<td>No. Telepon Perusahaan</td>
				<td>Jabatan</td>
			</thead>
			<tbody>
			<?php $i=1; foreach ($data['anggota'] as $key): ?>
				<tr>
					<td class="text-center"><?php echo $i; $i++; ?></td>
					<td><?= $key['nama']; ?></td>
					<td><?= $key['jk']; ?></td>
					<td><?= $this->crypt->dec($key['notlp']); ?></td>
					<td><?= $this->crypt->dec($key['email']); ?></td>
					<td><?= $key['bidusaha']; ?></td>
					<td><?= $key['perusahaan']; ?></td>
					<td><?= $key['alamatp']; ?></td>
					<td><?= $key['noper']; ?></td>
					<td><?= $key['jabatan']; ?></td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>