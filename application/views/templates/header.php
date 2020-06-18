<?php
    set_time_limit(300);
    function rupiah($angka){
        
        $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
        return $hasil_rupiah;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="icon" href="<?=base_url()?>assets/img/logo-tarq.jpg">
  <title><?= $title?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- Custom styles for data tables -->
  <link href="<?= base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- modal plugins css -->
  <!-- <link rel="stylesheet" href="<?= base_url()?>assets/css/jquery.modal.min.css"> -->
  
    <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url()?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url()?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url()?>assets/js/demo/datatables-demo.js"></script>

  <!-- modal plugin -->
  <!-- <script src="<?= base_url()?>assets/js/jquery.modal.min.js"></script> -->

  <!-- sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <!-- customku -->
  <link rel="stylesheet" href="<?= base_url()?>assets/css/style.css">
</head>

<body id="page-top">

  <!-- modal tambah kelas reguler -->
    <div class="modal fade" id="modalTambahKelasReguler" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Tambah Kelas Reguler</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form action="<?=base_url()?>kelas/add_kelas_reguler" method="post">
                      <div class="form-group">
                        <label for="nip-kelas">Pengajar</label>
                        <select name="nip" id="nip-kelas" class="form-control form-control-sm" required>
                          <option value="">Pilih Pengajar</option>
                          <?php foreach ($kpq as $pengajar) :?>
                            <option value="<?= $pengajar['nip']?>"><?= $pengajar['nama_kpq']?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="pengajar-kelas">Tipe Pengajar</label>
                        <select name="pengajar" id="pengajar-kelas" class="form-control form-control-sm" required>
                          <option value="">Pilih Tipe Pengajar</option>
                          <option value="Pria">Ikhwan</option>
                          <option value="Wanita">Akhwat</option>
                          <option value="Pria&Wanita">Ikhwan & Akhwat</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="program-kelas">Program</label>
                        <select name="program" id="program-kelas" class="form-control form-control-sm" required>
                          <option value="">Pilih Program</option>
                          <?php foreach ($program as $prog) :?>
                            <option value="<?= $prog['nama_program']?>"><?= $prog['nama_program']?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="hari-kelas">Hari</label>
                        <select name="hari" id="hari-kelas" class="form-control form-control-sm" required>
                          <option value="">Pilih Hari</option>
                          <option value="Ahad">Ahad</option>
                          <option value="Senin">Senin</option>
                          <option value="Selasa">Selasa</option>
                          <option value="Rabu">Rabu</option>
                          <option value="Kamis">Kamis</option>
                          <option value="Jumat">Jumat</option>
                          <option value="Sabtu">Sabtu</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="jam-wl">Waktu</label>
                        <select name="jam" id="jam-wl" class="form-control form-control-sm" required>
                          <option value="">Pilih Waktu</option>
                          <option value="08.30-10.00">08.30-10.00</option>
                          <option value="10.00-11.30">10.00-11.30</option>
                          <option value="13.00-14.30">13.00-14.30</option>
                          <option value="15.30-17.00">15.30-17.00</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tempat-kelas">Tempat</label>
                        <select name="tempat" id="tempat-kelas" class="form-control form-control-sm" required>
                          <option value="">Pilih Tempat</option>
                          <?php foreach ($ruangan as $tempat) :?>
                            <option value="<?= $tempat['nama_ruangan']?>"><?= $tempat['nama_ruangan']?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                      <div class="d-flex justify-content-end">
                        <input type="submit" value="Tambah Kelas" class="btn btn-sm btn-primary" id="btn-add-kelas">
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
  <!-- modal tambah kelas reguler -->

  <!-- modal add program -->
    <div class="modal fade" id="modalAddProgram" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Tambah Program</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="<?=base_url()?>other/add_program" method="post">
                  <div class="form-group">
                    <label for="program-nama">Program</label>
                    <input type="text" name="program" id="program-nama" class="form-control form-control-sm">
                  </div>
                  <div class="d-flex justify-content-end">
                    <input type="submit" value="Tambah Program" class="btn btn-sm btn-primary" id="btn-add-program">
                  </div>
              </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
            </div>
        </div>
      </div>
    </div>
  <!-- modal add program -->

  <!-- Page Wrapper -->
  <div id="wrapper">
