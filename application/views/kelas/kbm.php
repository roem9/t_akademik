<!-- Modal badal -->
    <div class="modal fade" id="modalBadal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBadalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" id="info-badal">
                    <div class="col-12">
                        <div class="alert alert-info" role="alert">
                            <i class="fa fa-info-circle mr-1 text-info"></i> Pastikan untuk mendapatkan pembadal terlebih dahulu sebelum melakukan pengajuan badal
                        </div>
                    </div>
                </div>
                <form action="<?= base_url()?>kelas/add_badal" method="post">
                    <input type="hidden" name="id_jadwal" id="id-jadwal-badal">
                    <input type="hidden" name="id_kelas" id="id-kelas-badal">
                    <input type="hidden" name="program" id="program-badal">
                    <input type="hidden" name="nip_kpq" id="nip-kpq">
                    <div class="form-group">
                        <label for="koor-badal">Koordinator</label>
                        <input type="text" name="koor" id="koor-badal" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kpq">Pengajar</label>
                        <input type="text" name="kpq" id="kpq" class="form-control form-control-sm" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nip-badal">dibadal oleh</label>
                        <select name="nip" id="nip-badal" class="form-control form-control-sm" required>
                            <option value="">Pilih Pengajar</option>
                            <?php foreach ($kpq as $pengajar) :?>
                                <?php if($pengajar['nama_kpq'] != "Muhammad Ru"):?>
                                    <option value="<?= $pengajar['nip']?>"><?= $pengajar['nama_kpq']?></option>
                                <?php endif;?>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tgl-badal">Tgl Badal</label>
                        <input type="date" name="tgl" id="tgl-badal" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="waktu-badal">Waktu</label>
                        <select name="waktu" id="waktu-badal" class="form-control form-control-sm" required>
                            <option value="">Pilih waktu</option>
                            <option value="05.00-06.30">05.00-06.30</option>
                            <option value="06.00-07.30">06.00-07.30</option>
                            <option value="07.00-08.30">07.00-08.30</option>
                            <option value="08.30-10.00">08.30-10.00</option>
                            <option value="10.00-11.30">10.00-11.30</option>
                            <option value="13.00-14.30">13.00-14.30</option>
                            <option value="15.30-17.00">15.30-17.00</option>
                            <option value="16.00-17.30">16.00-17.30</option>
                            <option value="17.00-18.30">17.00-18.30</option>
                            <option value="18.30-20.00">18.30-20.00</option>
                            <option value="19.30-21.00">19.30-21.00</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="catatan-badal">Catatan</label>
                        <textarea name="catatan" id="catatan-badal" class="form-control form-control-sm" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tempat-badal">Tempat</label>
                        <textarea name="tempat" id="tempat-badal" class="form-control form-control-sm" required></textarea>
                    </div>
                    <div class="d-flex justify-content-end mb-3">
                        <input type="submit" value="Simpan" id="btn-badal" class="btn btn-sm btn-primary">
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
<!-- Modal badal -->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 mt-3"><?= $title?></h1>
    </div>

    <!-- berhasil memindahkan peserta -->
    <?php if( $this->session->flashdata('pesan') ) : ?>
        <div class="row">
            <div class="col-6">
                <?= $this->session->flashdata('pesan');?>
                </div>
        </div>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4" style="max-width: ">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm cus-font" id="dataTable" cellspacing="0">
                    <thead>
                        <th>No</th>
                        <th>Koor</th>
                        <th>Tipe</th>
                        <th>Program</th>
                        <th style="max-width: 250px">Tempat</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Pengajar</th>
                        <th>KBM</th>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0;
                            foreach ($kbm as $i => $kbm) :?>
                            <tr>
                              <td><?= ++$no?></td>
                              <td><?= $kbm['koor']?></td>
                              <td><?= $kbm['jadwal']['tipe_kelas']?></td>
                              <td><?= $kbm['jadwal']['program']?></td>
                              <td><?= $kbm['jadwal']['tempat']?></td>
                              <td><?= $kbm['jadwal']['hari']?></td>
                              <td><?= $kbm['jadwal']['jam']?></td>
                              <td><?= $kbm['kpq']['nama_kpq']?></td>
                              <td>
                                <a href="#modalBadal" data-id="<?= $kbm['jadwal']['id_kelas']?>|<?= $kbm['jadwal']['id_jadwal']?>|<?= $kbm['koor']?>|<?= $kbm['jadwal']['program']?>|<?= $kbm['jadwal']['hari'] . " " . $kbm['jadwal']['jam']?>|<?= $kbm['kpq']['nama_kpq']?>|<?= $kbm['kpq']['nip']?>" data-toggle="modal" class="btn btn-sm btn-outline-info modal-badal"><?= COUNT($kbm['kbm'])?></a>
                              </td>
                              <!-- <td><center><a href="http://" class="btn btn-sm btn-outline-info"><?= COUNT($kbm['kbm'])?></a></center></td> -->
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $("#kbm").addClass("active");
  
    // modal badal
        $(".modal-badal").click(function(){
            let data = $(this).data("id");
            console.log(data)
            data = data.split("|");
            let id_kelas = data[0];
            let id_jadwal = data[1];
            let peserta = data[2];
            let program = data[3];
            let kpq = data[5];
            let nip = data[6];
            
            $("#modalBadalLabel").html("Badal "+data[4]);
            $("#id-jadwal-badal").val(id_jadwal);
            // $("#id-kelas-badal").val(id_kelas);
            $("input[name='id_kelas']").val(id_kelas);
            $("#koor-badal").val(peserta);
            $("#program-badal").val(program);
            $("#kpq").val(kpq);
            $("#nip-kpq").val(nip);
        })
    // modal badal
</script>