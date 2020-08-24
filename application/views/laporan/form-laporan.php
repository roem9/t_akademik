   <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800 mt-3"><?= $title?></h1>
    </div>
    <?php if( $this->session->flashdata('pesan') ) : ?>
        <div class="row">
            <div class="col-12 col-md-6">
                <?= $this->session->flashdata("pesan")?>
            </div>
        </div>
    <?php endif; ?>
   
   <div class="col-12 col-md-6">
        <div class="alert alert-info">
            <i class="fa fa-info-circle text-info mr-1"></i> Laporan yang tersedia hanya laporan dari periode <strong>Mei 2020</strong>
        </div>
        <form action="<?=base_url()?>laporan/cetak_laporan" method="post" target="_blank">
            <div class="form-group">
                <label for="laporan">Laporan</label>
                <select name="laporan" id="jenis-laporan" class="form-control form-control-sm" required>
                    <option value="">Pilih Laporan</option>
                    <option value="Rekap Peserta">Rekap Peserta</option>
                    <option value="Rekap Pengajaran">Rekap Pengajaran</option>
                    <option value="Rekap KBM">Rekap KBM</option>
                    <option value="Kelas Nonaktif">Kelas Pv Nonaktif</option>
                    <option value="Jadwal Nonaktif">Jadwal Pv Nonaktif</option>
                    <option value="Peserta Nonaktif">Peserta Reguler Nonaktif</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bulan">Bulan</label>
                <select name="bulan" id="bulan" class="form-control form-control-sm" required>
                    <option value="">Pilih Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <select name="tahun" id="tahun" class="form-control form-control-sm" required>
                    <option value="">Pilih Tahun</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                </select>
            </div>
            <div class="d-flex justify-content-end">
                <input type="submit" value="Download Laporan" class="btn btn-sm btn-success" id="cetak-laporan">
            </div>
        </form>
   </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

<script>
    $("#laporan").addClass("active");
    
    $("#cetak-laporan").click(function(){
        var c = confirm("Yakin akan mendownload laporan?");
        return c;
    })

</script>