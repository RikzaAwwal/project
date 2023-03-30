<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Ubah Data User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/anggota/ubahUser" method="post">
          <input type="hidden" name="id" id="id">
          <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" disabled>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password Baru">
      </div>
      <div class="mb-3">
        <label for="confirm" class="form-label">Konfirmasi Password</label>
        <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Konfirmasi Password Baru">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary">Ubah Password</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASEURL; ?>/js/script.js"></script>
</body>
</html>