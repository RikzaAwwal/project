	<div>
		<h3 style="text-align: center; font-weight: bold;">Data Anggota Asosiasi Pelaku Pariwisata Indonesia DPC Wilayah III Jawa Barat</h3>
	</div>
	<div>
		<table border="1">
			<thead style="text-align: center;">
				<th style="width: 5%">No.</th>
				<th>No. Anggota</th>
				<th>NIK</th>
				<th>Nama</th>
				<th>Tempat, Tanggal Lahir</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
				<th>No. Telepon</th>
				<th>Email</th>
				<th>Perusahaan</th>
				<th>Alamat Perusahaan</th>
				<th>No. Telepon Perusahaan</th>
				<th>Jabatan</th>
				<th>Bidang Usaha</th>
				<th>Tanggal Masuk</th>
			</thead>
			<tbody>
			<?php $i=1; foreach ($data['anggota'] as $key): ?>
				<tr>
					<td style="text-align: center;"><?php echo $i; $i++; ?></td>
					<td style="text-align: left;"><?= $key['noanggota']; ?></td>
					<td style="text-align: left;"><?= $this->crypt->dec($key['nik']); ?></td>
					<td style="text-align: left;"><?= $key['nama']; ?></td>
					<td style="text-align: left;"><?= $key['ttl']; ?></td>
					<td style="text-align: left;"><?= $key['jk']; ?></td>
					<td style="text-align: left;"><?= $key['alamat']; ?></td>
					<td style="text-align: left;"><?= $this->crypt->dec($key['notlp']); ?></td>
					<td style="text-align: left;"><?= $this->crypt->dec($key['email']); ?></td>
					<td style="text-align: left;"><?= $key['perusahaan']; ?></td>
					<td style="text-align: left;"><?= $key['alamatp']; ?></td>
					<td style="text-align: left;"><?= $key['noper']; ?></td>
					<td style="text-align: left;"><?= $key['jabatan']; ?></td>
					<td style="text-align: left;"><?= $key['bidusaha']; ?></td>
					<td style="text-align: left;"><?= $key['tglmasuk']; ?></td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>