<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="form" aria-hidden="true">
  <div class="modal-dialog  ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formName">Tambah Data Anggota</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/anggota/tambah" method="post" enctype="multipart/form-data">
          <div class="mb-2">
            <label for="fnoanggota" class="form-label">Nomor Anggota</label>
            <input type="text" class="form-control" id="fnoanggota" name="noanggota" autocomplete="off" required>
          </div>
          <div class="mb-2">
            <label for="fnik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="fnik" name="nik" autocomplete="off" required>
          </div>
          <div class="mb-2">
            <label for="fnama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="fnama" name="nama" autocomplete="off" required>
          </div>
          <div class="mb-2">
            <label for="ftempat" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="ftempat" name="tempat" autocomplete="off" required>
          </div>
          <div class="mb-2">
            <label for="ftl" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="ftl" name="tl" autocomplete="off" required>
          </div>
          <div class="mb-2">
            <label for="jk" class="form-label d-block">Jenis Kelamin</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="jk" id="fl" value="Laki-Laki" checked>
              <label class="form-check-label" for="fl">Laki-Laki</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="jk" id="fp" value="Perempuan">
              <label class="form-check-label" for="fp">Perempuan</label>
            </div>
          </div>
          <div class="mb-2">
            <label for="falamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="falamat" name="alamat" rows="3" autocomplete="off" required></textarea>
          </div>
          <div class="mb-2">
            <label for="fnotlp" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="fnotlp" name="notlp" autocomplete="off" required>
          </div>
          <div class="mb-2">
            <label for="femail" class="form-label">Email</label>
            <input type="email" class="form-control" id="femail" name="email" autocomplete="off" required>
          </div>
          <div class="mb-2">
            <label for="fperusahaan" class="form-label">Perusahaan</label>
            <input type="text" class="form-control" id="fperusahaan" name="perusahaan" autocomplete="off" required>
          </div>
          <div class="mb-2">
            <label for="falamatp" class="form-label">Alamat Perusahaan</label>
            <textarea class="form-control" id="falamatp" name="alamatp" rows="3" autocomplete="off" required></textarea>
          </div>
          <div class="mb-2">
            <label for="fnoper" class="form-label">Nomor Telepon Perusahaan</label>
            <input type="text" class="form-control" id="fnoper" name="noper" autocomplete="off" required>
          </div>
          <div class="mb-2">
            <label for="fjabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" id="fjabatan" name="jabatan" autocomplete="off" required>
          </div>
          <div class="mb-2">
            <label for="fbidusaha" class="form-label">Bidang Usaha</label>
            <select id="fbidusaha" name="bidusaha" class="form-select" aria-label="Default select example" required>
              <option hidden="true">Bidang Usaha</option>
              <option value="Biro Perjalanan Wisata">Biro Perjalanan Wisata</option>
              <option value="Hotel/Homestay/Penginapan">Hotel/Homestay/Penginapan</option>
              <option value="Restoran/Rumah Makan">Restoran/Rumah Makan</option>
              <option value="Pusat Oleh-Oleh, Souvenir">Pusat Oleh-Oleh, Souvenir</option>
              <option value="Obyek Wisata">Obyek Wisata</option>
              <option value="Guide (Pemandu Wisata)">Guide (Pemandu Wisata)</option>
              <option value="Transportasi">Transportasi</option>
            </select>
          </div>
          <div class="mb-2">
            <label for="ftglmasuk" class="form-label">Tanggal Masuk</label>
            <input type="date" class="form-control" id="ftglmasuk" name="tglmasuk" autocomplete="off" required>
          </div>
          <div class="mb-2">
            <label for="ffoto" class="form-label">Foto</label>
            <input class="form-control" name="foto" type="file" id="ffoto">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
      </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalInfo" tabindex="-1" aria-labelledby="info" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nama"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img id="img" src="" width="250">
        </div>
        <table class="table table-striped mt-3">
          <tr>
            <td style="width: 30%">No. Anggota</td>
            <td>:</td>
            <td id="noanggota"></td>
          </tr>
          <tr>
            <td>NIK</td>
            <td>:</td>
            <td id="nik"></td>
          </tr>
          <tr>
            <td>Tempat, Tanggal Lahir</td>
            <td>:</td>
            <td id="ttl"></td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td id="jk"></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td id="alamat"></td>
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
          <tr>
            <td>Bidang Usaha</td>
            <td>:</td>
            <td id="bidusaha"></td>
          </tr>
          <tr>
            <td>Tanggal Masuk</td>
            <td>:</td>
            <td id="tglmasuk"></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>