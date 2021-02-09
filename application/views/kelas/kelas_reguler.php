<!-- modal -->
  <div class="modal fade" id="modalKelasReguler" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalKelasRegulerTitle">Detail Kelas Reguler</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
              <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs">
                      <li class="nav-item">
                        <a href="#" class='nav-link active' id="btn-form-1"><i class="fas fa-book"></i></a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class='nav-link' id="btn-form-2"><i class="fas fa-exchange-alt"></i></a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class='nav-link' id="btn-form-3"><i class="fas fa-user-slash"></i></a>
                      </li>
                      <li class="nav-item">
                        <a href="#" class='nav-link' id="btn-form-4"><i class="fas fa-list-ul"></i></a>
                      </li>
                  </ul>
              </div>
              <div class="card-body cus-font">
                <form action="<?= base_url()?>kelas/edit_kelas_reguler" method="post" id="form-1">
                  <input type="hidden" name="id" id="id-edit">
                  <div class="form-group">
                    <label for="nip-edit">Pengajar</label>
                    <select name="nip" id="nip-edit" class="form-control form-control-sm" required>
                      <option value="">Pilih Pengajar</option>
                      <?php foreach ($kpq as $pengajar) :?>
                        <option value="<?= $pengajar['nip']?>"><?= $pengajar['nama_kpq']?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="pengajar-edit">Tipe Pengajar</label>
                    <select name="pengajar" id="pengajar-edit" class="form-control form-control-sm" required>
                      <option value="">Pilih Tipe Pengajar</option>
                      <option value="Pria">Ikhwan</option>
                      <option value="Wanita">Akhwat</option>
                      <option value="Pria&Wanita">Ikhwan & Akhwat</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="program-edit">Program</label>
                    <select name="program" id="program-edit" class="form-control form-control-sm" required>
                      <option value="">Pilih Program</option>
                      <?php foreach ($program as $prog) :?>
                        <option value="<?= $prog['nama_program']?>"><?= $prog['nama_program']?></option>
                      <?php endforeach;?>

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tempat-edit">Tempat</label>
                    <select name="tempat" id="tempat-edit" class="form-control form-control-sm" required>
                      <option value="">Pilih Tempat</option>
                      <?php foreach ($ruangan as $tempat) :?>
                        <option value="<?= $tempat['nama_ruangan']?>"><?= $tempat['nama_ruangan']?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="hari-edit">Hari</label>
                    <select name="hari" id="hari-edit" class="form-control form-control-sm" required>
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
                    <label for="jam-edit">Waktu</label>
                    <select name="jam" id="jam-edit" class="form-control form-control-sm" required>
                      <option value="">Pilih Waktu</option>
                      <option value="08.30-10.00">08.30-10.00</option>
                      <option value="10.00-11.30">10.00-11.30</option>
                      <option value="13.00-14.30">13.00-14.30</option>
                      <option value="15.30-17.00">15.30-17.00</option>
                    </select>
                  </div>
                  <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-success" id="btn-edit">Edit</button>
                  </div>
                </form>

                <form action="<?= base_url()?>kelas/pindah_kelas_reguler" method="post" id="form-2">
                  <div class="alert alert-info">
                    <i class="fa fa-info-circle text-info mr-1"></i> Menu ini untuk memindahkan peserta reguler ke kelas reguler. Maksimal 10 peserta dalam 1 kelas
                  </div>
                  <ul class="list-group list-peserta-pindah"></ul>

                  <div class="form-group mt-3">
                    <label for="">Pindah Ke Kelas?</label>
                    <select name="id" id="id-pindah" class="form-control form-control-sm" required>
                      <option value="">Pilih Kelas</option>
                      <?php foreach ($kelas_reg as $k_reguler) :?>
                        <option value="<?= $k_reguler['data']['id_kelas']?>"><?= $k_reguler['data']['program'] . " [" . $k_reguler['peserta'] . "] - " . $k_reguler['data']['nama_kpq'] . " - " . $k_reguler['data']['hari'] . " (" . $k_reguler['data']['jam'] . ")"?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                  <div class="d-flex justify-content-end">
                    <input type="submit" value="Pindah" class="btn btn-sm btn-success" id="btn-pindah">
                  </div>
                </form>

                <form action="<?= base_url()?>kelas/nonaktif_peserta" method="post" id="form-3">
                  <div class="alert alert-info">
                    <i class="fa fa-info-circle text-info mr-1"></i> Menu ini untuk menonaktifkan peserta reguler
                  </div>
                  <ul class="list-group list-peserta-nonaktif"></ul>
                  <div class="form-group mt-3">
                    <label for="tgl_history">Tgl Nonaktif</label>
                    <input type="date" name="tgl_history" id="tgl_history" class="form-control form-control-sm" required>
                  </div>
                  <div class="d-flex justify-content-end">
                    <input type="submit" value="Nonaktif" class="btn btn-sm btn-danger mt-3" id="btn-nonaktif">
                  </div>
                </form>
                
                <form action="<?= base_url()?>kelas/pindah_peserta_reguler_wl" method="post" id="form-4">
                  <div class="alert alert-info">
                    <i class="fa fa-info-circle text-info mr-1"></i> Menu ini untuk memindahkan peserta reguler ke waiting list
                  </div>
                  <ul class="list-group list-peserta-wl"></ul>
                  <div class="form-group mt-3">
                    <label for="program-wl">Program</label>
                    <select name="program" id="program-wl" class="form-control form-control-sm" required> 
                      <option value="">Pilih Program</option>
                      <?php foreach ($program as $prog) :?>
                        <option value="<?= $prog['nama_program']?>"><?= $prog['nama_program']?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="hari-wl">Hari</label>
                    <select name="hari" id="hari-wl" class="form-control form-control-sm" required>
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
                  <div class="d-flex justify-content-end">
                    <input type="submit" value="Pindah WL" class="btn btn-sm btn-warning mt-3" id="btn-wl">
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- modal -->

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
    <div class="card shadow mb-4" style="max-width: 950px">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm cus-font" id="dataTable" cellspacing="0">
                    <thead>
                        <th>No</th>
                        <th>Status</th>
                        <th>Program</th>
                        <th>Ruangan</th>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Pengajar</th>
                        <th>Peserta</th>
                        <?php if($status == "aktif") :?>
                          <th>Laporan</th>
                        <?php endif;?>
                        <th>Detail</th>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0;
                            foreach ($kelas as $i => $kelas) :?>
                            <tr>
                                <td><center><?=++$no;?></center></td>
                                <?php if($kelas['data']['status'] == "aktif"):?>
                                  <td><a href="<?= base_url()?>kelas/editstatus/<?= $kelas['data']['id_kelas']?>/nonaktif" onclick="return confirm('Yakin akan menonaktifkan kelas ini?')" class="btn btn-sm btn-outline-success">aktif</a></td>
                                <?php else :?>
                                  <td><a href="<?= base_url()?>kelas/editstatus/<?= $kelas['data']['id_kelas']?>/aktif" onclick="return confirm('Yakin akan mengaktifkan kelas ini?')" class="btn btn-sm btn-outline-secondary">nonaktif</a></td>
                                <?php endif;?>
                                <!-- <td><center><?=$kelas['data']['status']?></center></td> -->
                                <td><?=$kelas['data']['program']?></td>
                                <td><?=$kelas['data']['tempat']?></td>
                                <td><?=$kelas['data']['hari']?></td>
                                <td><?=$kelas['data']['jam']?></td>
                                <td><?=$kelas['data']['nama_kpq']?></td>
                                <td><center><?=$kelas['peserta']?></center></td>
                                <?php if($status == "aktif") :?>
                                  <td>
                                      <center>
                                          <?php if($kelas['data']['program'] == "Tahfidz Anak" || $kelas['data']['program'] == "Tahfidz Remaja" || $kelas['data']['program'] == "Tahfidz Dewasa") :?>
                                              <!-- <a target="_blank" href="<?= base_url()?>laporan/tahfidz/<?= md5($kelas['data']['id_kelas'])?>" class="btn btn-sm btn-warning"><i class="fa fa-file"></i></a> -->
                                              -
                                          <?php elseif($kelas['data']['program'] == "Pra Tahsin 1" || $kelas['data']['program'] == "Pra Tahsin 2" || $kelas['data']['program'] == "Pra Tahsin 3" || $kelas['data']['program'] == "Tahsin 1" || $kelas['data']['program'] == "Tahsin 2" || $kelas['data']['program'] == "Tahsin 3" || $kelas['data']['program'] == "Tahsin 4" || $kelas['data']['program'] == "Tahsin Lanjutan") : ?>
                                              <a target="_blank" href="<?= base_url()?>laporan/tahsin/<?= md5($kelas['data']['id_kelas'])?>" class="btn btn-sm btn-warning"><i class="fa fa-file"></i></a>
                                          <?php elseif($kelas['data']['program'] == "Bahasa Arab 1" || $kelas['data']['program'] == "Bahasa Arab 2" || $kelas['data']['program'] == "Bahasa Arab 3" || $kelas['data']['program'] == "Bahasa Arab 4" || $kelas['data']['program'] == "Bahasa Arab Lanjutan") : ?>
                                              <a target="_blank" href="<?= base_url()?>laporan/b_arab/<?= md5($kelas['data']['id_kelas'])?>" class="btn btn-sm btn-warning"><i class="fa fa-file"></i></a>
                                          <?php endif;?>
                                      </center>
                                  </td>
                                <?php endif;?>
                                <td><center><a href="#modalKelasReguler" class="btn btn-sm btn-info btn-rounded modalKelasReguler" data-toggle="modal" data-id="<?= $kelas['data']['id_kelas']?>">detail</a></center></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $("#kelas").addClass("active");
    $(".modalKelasReguler").click(function(){
        let id = $(this).data("id");

        $.ajax({
            url : "<?= base_url()?>kelas/get_data_kelas_reguler",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success : function(data){
                $("#id-edit").val(data.id_kelas);
                $("#status-edit").val(data.status);
                $("#nip-edit").val(data.nip);
                $("#pengajar-edit").val(data.pengajar);
                $("#program-edit").val(data.program);
                $("#tempat-edit").val(data.tempat);
                $("#hari-edit").val(data.hari);
                $("#jam-edit").val(data.jam);
            }
        })

        $.ajax({
            url : "<?= base_url()?>kelas/get_peserta_aktif_by_kelas/",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success : function(data){
                let html = '';
                let html1 = '';
                let html2 = '';
                let j = 0;

                for (let i = 0; i < data.length; i++) {
                    html += '<li class="list-group-item"><div class="form-check">'+
                                '<input class="form-check-input" name="id_peserta['+i+']" type="checkbox" value="'+data[i].id_peserta+'" id="'+i+'">'+
                                '<label class="form-check-label" for="'+i+'">'+
                                    data[i].nama_peserta+
                                '</label>'+
                            '</div></li>';
                }
                $(".list-peserta-pindah").html(html);
                
                for (let i = 0; i < data.length; i++) {
                    html1 += '<li class="list-group-item"><div class="form-check">'+
                                '<input class="form-check-input" name="id_peserta['+i+']" type="checkbox" value="'+data[i].id_peserta+'" id="i'+i+'">'+
                                '<label class="form-check-label" for="i'+i+'">'+
                                    data[i].nama_peserta+
                                '</label>'+
                            '</div></li>';
                }
                $(".list-peserta-nonaktif").html(html1);
                
                for (let i = 0; i < data.length; i++) {
                    html2 += '<li class="list-group-item"><div class="form-check">'+
                                '<input class="form-check-input" name="id_peserta['+i+']" type="checkbox" value="'+data[i].id_peserta+'" id="j'+i+'">'+
                                '<label class="form-check-label" for="j'+i+'">'+
                                    data[i].nama_peserta+
                                '</label>'+
                            '</div></li>';
                }
                $(".list-peserta-wl").html(html2);
            }
        })
    })
    
    $("#form-2").hide();
    $("#form-3").hide();
    $("#form-4").hide();
    
    $("#btn-form-1").click(function(){
        $("#btn-form-1").addClass('active');
        $("#btn-form-2").removeClass('active');
        $("#btn-form-3").removeClass('active');
        $("#btn-form-4").removeClass('active');
        
        $("#form-1").show();
        $("#form-2").hide();
        $("#form-3").hide();
        $("#form-4").hide();
    })
    
    $("#btn-form-2").click(function(){
        $("#btn-form-1").removeClass('active');
        $("#btn-form-2").addClass('active');
        $("#btn-form-3").removeClass('active');
        $("#btn-form-4").removeClass('active');
        
        $("#form-1").hide();
        $("#form-2").show();
        $("#form-3").hide();
        $("#form-4").hide();
    })
    
    $("#btn-form-3").click(function(){
        $("#btn-form-1").removeClass('active');
        $("#btn-form-2").removeClass('active');
        $("#btn-form-3").addClass('active');
        $("#btn-form-4").removeClass('active');
        
        $("#form-1").hide();
        $("#form-2").hide();
        $("#form-3").show();
        $("#form-4").hide();
    })
    
    $("#btn-form-4").click(function(){
        $("#btn-form-1").removeClass('active');
        $("#btn-form-2").removeClass('active');
        $("#btn-form-3").removeClass('active');
        $("#btn-form-4").addClass('active');
        
        $("#form-1").hide();
        $("#form-2").hide();
        $("#form-3").hide();
        $("#form-4").show();
    })
    
    $("#btn-edit").click(function(){
        var c = confirm("Yakin akan mengubah data?");
        return c;
    })
    
    $("#btn-pindah").click(function(){
        var c = confirm("Yakin akan memindahkan peserta?");
        return c;
    })
    
    $("#btn-nonaktif").click(function(){
        var c = confirm("Yakin akan menonaktifkan peserta?");
        return c;
    })

    $("#btn-wl").click(function(){
        var c = confirm("Yakin akan memindahkan peserta ke waiting list?")
        return c;
    })
</script>