<div class="modal fade" id="modalSet" tabindex="-1" aria-labelledby="info" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Setting Database</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-6">
              <a href="<?= BASEURL; ?>/anggota/encdb"><button class="btn btn-success rounded-pill w-100" >Enkripsi Database</button></a>
            </div>
            <div class="col-6">
              <a href="<?= BASEURL; ?>/anggota/decdb"><button class="btn btn-danger rounded-pill w-100">Dekripsi Database</button></a>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASEURL; ?>/js/script.js"></script>
</body>
</html>