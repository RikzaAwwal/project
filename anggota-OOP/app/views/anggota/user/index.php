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
						</div>
				  	</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>

<div class="modal fade" id="modalInfo" tabindex="-1" aria-labelledby="info" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Profil Anggota</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img id="img" src="" width="250">
        </div>
        <table class="table table-striped mt-3">
          <tr>
            <td style="width: 30%">Nama</td>
            <td>:</td>
            <td id="nama"></td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td id="jk"></td>
          </tr>
          <tr>
            <td>No. Telepon</td>
            <td>:</td>
            <td id="notlp"></td>
          </tr>
          <tr>
            <td>Email</td>
            <td>:</td>
            <td id="email"></td>
          </tr>
          <tr>
            <td>Bidang Usaha</td>
            <td>:</td>
            <td id="bidusaha"></td>
          </tr>
          <tr>
            <td>Perusahaan</td>
            <td>:</td>
            <td id="perusahaan"></td>
          </tr>
          <tr>
            <td>Alamat Perusahaan</td>
            <td>:</td>
            <td id="alamatp"></td>
          </tr>
          <tr>
            <td>No. Telepon Perusahaan</td>
            <td>:</td>
            <td id="noper"></td>
          </tr>
          <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td id="jabatan"></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>