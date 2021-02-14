<!-- modal kelas privat -->
    <div class="modal fade" id="modalKelasPrivat" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKelasPrivatTitle">Detail Kelas Privat</h5>
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
                            <a href="#" class='nav-link' id="btn-form-2"><i class="fas fa-user"></i></a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class='nav-link' id="btn-form-3"><i class="fas fa-user-slash"></i></a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class='nav-link' id="btn-form-4"><i class="fas fa-clock"></i></a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class='nav-link' id="btn-form-5"><i class="fas fa-exchange-alt"></i></a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class='nav-link' id="btn-form-6">tambah jadwal</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body cus-font">
                    <form action="<?= base_url()?>kelas/edit_kelas_privat" method="post" id="form-1">
                        <input type="hidden" name="id" id="id-edit">
                        <!-- <div class="form-group">
                        <label for="status-edit">Status</label>
                        <select name="status" id="status-edit" class="form-control form-control-sm" required>
                            <option value="">Pilih Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                            <option value="wl">WL</option>
                            <option value="konfirm">Konfirm</option>
                        </select>
                        </div> -->
                        <div class="form-group">
                        <label for="nip-edit">Pengajar</label>
                        <select name="nip" id="nip-edit" class="form-control form-control-sm">
                            <option value="">Pilih Pengajar</option>
                            <?php foreach ($kpq as $kpq) :?>
                            <option value="<?= $kpq['nip']?>"><?= $kpq['nama_kpq']?></option>
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
                            <?php foreach ($program as $program) :?>
                            <option value="<?= $program['nama_program']?>"><?= $program['nama_program']?></option>
                            <?php endforeach;?>

                        </select>
                        </div>
                        <div class="form-group" id="koor-form">
                        </div>
                        <div class="form-group">
                            <label for="catatan-edit">Catatan</label>
                            <textarea name="catatan" id="catatan-edit" class="form-control form-control-sm"></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-sm btn-success" id="btn-edit">Edit</button>
                        </div>
                    </form>

                    <form action="<?= base_url()?>kelas/nonaktif_peserta" method="post" id="form-2">
                        <div class="alert alert-info"><i class="fa fa-info-circle mr-1 text-info"></i> menu ini berisi list peserta aktif. pilih peserta kemudian pilih tombol nonaktif untuk menonaktifkan peserta</div>
                        <ul class="list-group list-peserta-aktif"></ul>
                        <input type="hidden" name="id_kelas">
                        <div class="d-flex justify-content-end mt-3">
                        <input type="submit" value="Nonaktif" class="btn btn-sm btn-danger" id="btn-nonaktif-peserta">
                        </div>
                    </form>
                    
                    <form action="<?= base_url()?>kelas/aktifkan_peserta" method="post" id="form-3">
                        <div class="alert alert-info"><i class="fa fa-info-circle mr-1 text-info"></i> menu ini untuk mengaktifkan kembali peserta. pilih peserta kemudian pilih tombol aktifkan untuk mengaktifkan peserta</div>
                        <ul class="list-group list-peserta-nonaktif"></ul>

                        <div class="d-flex justify-content-end mt-3">
                        <input type="submit" value="Aktifkan" class="btn btn-sm btn-success" id="btn-aktif-peserta">
                        </div>
                    </form>

                    <form action="<?= base_url()?>kelas/nonaktif_jadwal" method="post" id="form-4">
                        <input type="hidden" name="id_kelas">
                        <ul class="list-group list-jadwal-nonaktif"></ul>
                        <div class="form-group mt-3">
                            <label for="tgl_history">Tgl Nonaktif</label>
                            <input type="date" name="tgl_history" class="form-control form-control-sm" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" value="Nonaktif" class="btn btn-sm btn-danger mt-3" id="btn-nonaktif-jadwal">
                        </div>
                    </form>

                    <form action="<?= base_url()?>kelas/pindah_peserta_privat" method="post" id="form-5">
                        <div class="alert alert-info"><i class="fa fa-info-circle mr-1 text-info"></i> menu ini untuk memindahkan peserta ke kelas lain</div>
                        <ul class="list-group list-peserta-pindah"></ul>
                        <div class="form-group mt-1">
                            <label for="tipe_kelas">Tipe Kelas</label>
                            <select name="tipe_kelas" id="tipe_kelas" class="form-control form-control-sm">
                                <option value="">Pilih Tipe Kelas</option>
                                <option value="pv khusus">Privat Khusus</option>
                                <option value="pv luar">Privat Luar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_kelas_pindah">Koordinator</label>
                            <select name="id_kelas_pindah" id="id_kelas_pindah" class="form-control form-control-sm">
                            </select>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <input type="submit" value="Pindah" class="btn btn-sm btn-primary" id="btn-pindah-peserta">
                        </div>
                    </form>

                    <form action="<?= base_url()?>kelas/add_jadwal" method="post" id="form-6">
                        <input type="hidden" name="id" id="id-add">
                        <div class="form-group">
                        <label for="hari">Hari</label>
                        <select name="hari" id="hari" class="form-control form-control-sm" required>
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
                        <label for="jam">Jam</label>
                        <select name="jam" id="jam" class="form-control form-control-sm" required>
                            <option value="">Pilih Jam</option>
                            <option value="05.00-06.30|3">05.00-06.30</option>
                            <option value="06.00-07.30|3">06.00-07.30</option>
                            <option value="07.00-08.30|2">07.00-08.30</option>
                            <option value="08.30-10.00|0">08.30-10.00</option>
                            <option value="10.00-11.30|0">10.00-11.30</option>
                            <option value="13.00-14.30|0">13.00-14.30</option>
                            <option value="15.30-17.00|0">15.30-17.00</option>
                            <option value="16.00-17.30|1">16.00-17.30</option>
                            <option value="17.00-18.30|3">17.00-18.30</option>
                            <option value="18.30-20.00|3">18.30-20.00</option>
                            <option value="19.30-21.00|3">19.30-21.00</option>
                        </select>
                        </div>
                        <div class="form-group">
                        <label for="tempat">Tempat</label>
                            <select name="tempat" id="tempat-pv-khusus" class="form-control form-control-sm" required>
                            <option value="">Pilih Ruangan</option>
                            <?php foreach ($ruangan as $tempat) :?>
                                <option value="<?= $tempat['nama_ruangan']?>"><?= $tempat['nama_ruangan']?></option>
                            <?php endforeach;?>
                            </select>
                            <textarea name="tempat" id="tempat-pv-luar" class="form-control form-control-sm" required></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                        <input type="submit" value="Tambah" class="btn btn-sm btn-primary" id="btn-tambah-jadwal">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
<!-- modal kelas privat -->

<!-- modal pindah wl -->
    <div class="modal fade" id="modalPindahWl" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPindahWlTitle">Pindah Ke Waiting List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <i class="fa fa-exclamation-circle text-warning mr-1"></i> <strong>Perhatian</strong>! ketika kelas privat dipindahkan ke waiting list maka jadwal dan pengajar dari kelas akan dihapus. Harap mengisi jadwal dan detail peserta pada form catatan
                    </div>
                    <form action="<?=base_url()?>kelas/pindah_wl" method="post">
                        <input type="hidden" name="id_kelas" id="id_kelas">
                        <div class="form-group">
                            <label for="koor">Koordinator</label>
                            <input type="text" name="koor" id="p_koor" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="form-group">
                            <label for="p_catatan">Catatan</label>
                            <textarea name="catatan" id="p_catatan" class="form-control form-control-sm" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="p_tempat">Tempat</label>
                            <textarea name="tempat" id="p_tempat" class="form-control form-control-sm" required></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" value="Pindah WL" class="btn btn-sm btn-warning" id="pindah-wl">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- modal pindah wl -->

<!-- modal nonaktif -->
    <div class="modal fade" id="modalNonaktif" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNonaktifTitle">Nonaktifkan Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="alert alert-warning">
                        <i class="fa fa-exclamation-circle text-warning mr-1"></i> <strong>Perhatian</strong>! ketika kelas privat dipindahkan ke waiting list maka jadwal dan pengajar dari kelas akan dihapus. Harap mengisi jadwal dan detail peserta pada form catatan
                    </div> -->
                    <form action="<?=base_url()?>kelas/nonaktif_kelas_privat" method="post">
                        <input type="hidden" name="id_kelas">
                        <div class="form-group">
                            <label for="koor">Koordinator</label>
                            <input type="text" name="koor" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tgl_history">Tgl Nonaktif</label>
                            <input type="date" name="tgl_history" class="form-control form-control-sm" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" value="Nonaktif" class="btn btn-sm btn-danger" id="nonaktif">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- modal nonaktif -->

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 mt-3"><?= $title?></h1>
    </div>

    <!-- berhasil memindahkan peserta -->
    <?php if( $this->session->flashdata('pesan') ) : ?>
        <div class="row">
            <div class="col-12">
                <?= $this->session->flashdata('pesan');?>
                </div>
        </div>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4" style="max-width:1100px">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm cus-font" id="dataTable" cellspacing="0">
                    <thead>
                        <th>No</th>
                        <th>Status</th>
                        <th>Koor</th>
                        <th>No HP</th>
                        <th>Program</th>
                        <th>Pengajar</th>
                        <th>Peserta</th>
                        <?php if($status == "aktif") :?>
                          <th>Laporan</th>
                        <?php endif;?>
                        <th>Detail</th>
                        <th>Pindah WL</th>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0;
                            foreach ($kelas as $kelas) :?>
                            <tr>
                                <td><center><?=++$no?></center></td>
                                <?php if($kelas['data']['status'] == "aktif"):?>
                                  <td><a href="#modalNonaktif" data-id = "<?= $kelas['data']['id_kelas'] . "|" . $kelas['data']['nama_peserta']?>" class="btn btn-sm btn-outline-success nonaktif-kelas" data-toggle="modal">aktif</a></td>
                                  <!-- <td><a href="<?= base_url()?>kelas/editstatus/<?= $kelas['data']['id_kelas']?>/nonaktif" onclick="return confirm('Yakin akan menonaktifkan kelas ini?')" class="btn btn-sm btn-outline-success">aktif</a></td> -->
                                <?php elseif($kelas['data']['status'] == "nonaktif") :?>
                                  <td><a href="<?= base_url()?>kelas/editstatus/<?= $kelas['data']['id_kelas']?>/aktif" onclick="return confirm('Yakin akan mengaktifkan kelas ini?')" class="btn btn-sm btn-outline-secondary">nonaktif</a></td>
                                <?php endif;?>
                                <td><?= $kelas['data']['nama_peserta']?></td>
                                <td><?= $kelas['data']['no_hp']?>
                                <td><?= $kelas['data']['program']?>
                                <td><?= $kelas['data']['nama_kpq']?>
                                <td><center><?= $kelas['peserta']?></center></td>
                                <?php if($status == "aktif") :?>
                                  <td>
                                      <center>
                                          <?php if($kelas['data']['program'] == "Tahfidz Anak" || $kelas['data']['program'] == "Tahfidz Remaja" || $kelas['data']['program'] == "Tahfidz Dewasa") :?>
                                              -
                                          <?php elseif($kelas['data']['program'] == "Pra Tahsin 1" || $kelas['data']['program'] == "Pra Tahsin 2" || $kelas['data']['program'] == "Pra Tahsin 3" || $kelas['data']['program'] == "Tahsin 1" || $kelas['data']['program'] == "Tahsin 2" || $kelas['data']['program'] == "Tahsin 3" || $kelas['data']['program'] == "Tahsin 4" || $kelas['data']['program'] == "Tahsin Lanjutan") : ?>
                                              <a target="_blank" href="<?= base_url()?>laporan/tahsin/<?= md5($kelas['data']['id_kelas'])?>" class="btn btn-sm btn-warning"><i class="fa fa-file"></i></a>
                                          <?php elseif($kelas['data']['program'] == "Bahasa Arab 1" || $kelas['data']['program'] == "Bahasa Arab 2" || $kelas['data']['program'] == "Bahasa Arab 3" || $kelas['data']['program'] == "Bahasa Arab 4" || $kelas['data']['program'] == "Bahasa Arab Lanjutan") : ?>
                                              <a target="_blank" href="<?= base_url()?>laporan/b_arab/<?= md5($kelas['data']['id_kelas'])?>" class="btn btn-sm btn-warning"><i class="fa fa-file"></i></a>
                                          <?php endif;?>
                                      </center>
                                  </td>
                                <?php endif;?>
                                <td><center><a href="#modalKelasPrivat" class="btn btn-sm btn-info modalKelasPrivat" data-toggle="modal" data-id="<?= $kelas['data']['id_kelas']?>|<?= $kelas['data']['id_peserta']?>">detail</a></center></td>
                                <td>
                                    <center>
                                        <a href="#modalPindahWl" data-id="<?= $kelas['data']['id_kelas']?>|<?= $kelas['data']['nama_peserta']?>" data-toggle="modal" class="btn btn-sm btn-outline-warning modalPindahWl">WL</a>
                                    </center>
                                </td>
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

    // nonaktifkan kelas
    $(".nonaktif-kelas").click(function(){
        let data = $(this).data("id");
        data = data.split("|");
        let id = data[0];
        let nama_peserta = data[1];

        $("input[name='id_kelas']").val(id);
        $("input[name='koor']").val(nama_peserta);
    })

    $(".modalPindahWl").click(function(){
        let data = $(this).data("id");
        data = data.split("|");
        let id = data[0];
        let nama_peserta = data[1];

        $.ajax({
            url : "<?= base_url()?>kelas/get_data_kelas_privat",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success : function(data){
                $("#id_kelas").val(data.id_kelas);
                $("#p_catatan").val(data.catatan);
                $("#p_tempat").val(data.tempat);
                $("#p_koor").val(nama_peserta);
            }
        })
    })

    $(".modalKelasPrivat").click(function(){
        $("#koor-edit").val()
        
        let data = $(this).data("id");
        data = data.split("|");
        let id = data[0];
        let id_peserta = data[1];

        $("input[name='id_kelas']").val(id);
        
        $.ajax({
            url : "<?= base_url()?>kelas/get_peserta_aktif_by_kelas",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success : function(data){
                let html = `<label for="koor-edit">Koordinator</label>
                            <select name="id_peserta" id="koor-edit" class="form-control form-control-sm" required>
                            <option value="">Pilih Koordinator</option>`;
                let html2 = '';
                
                for (let i = 0; i < data.length; i++) {
                    if(data[i].id_peserta == id_peserta){
                        html += '<option value="'+data[i].id_peserta+'" selected>'+data[i].nama_peserta+'</option>';
                    } else {
                        html += '<option value="'+data[i].id_peserta+'">'+data[i].nama_peserta+'</option>';
                    }
                }

                html += '</select>';

                $("#koor-form").html(html);
                
                for (let i = 0; i < data.length; i++) {
                    html2 += '<li class="list-group-item"><div class="form-check">'+
                                '<input class="form-check-input" name="id_peserta['+i+']" type="checkbox" value="'+data[i].id_peserta+'" id="'+i+'">'+
                                '<label class="form-check-label" for="'+i+'">'+
                                    data[i].nama_peserta+
                                '</label>'+
                            '</div></li>';
                }

                $(".list-peserta-aktif").html(html2);
                
                html2 = "";
                for (let i = 0; i < data.length; i++) {
                    html2 += '<li class="list-group-item"><div class="form-check">'+
                                '<input class="form-check-input" name="id_peserta['+i+']" type="checkbox" value="'+data[i].id_peserta+'" id="p'+i+'">'+
                                '<label class="form-check-label" for="p'+i+'">'+
                                    data[i].nama_peserta+
                                '</label>'+
                            '</div></li>';
                }

                $(".list-peserta-pindah").html(html2);
            }
        })
        
        $.ajax({
            url : "<?= base_url()?>kelas/get_peserta_nonaktif_by_kelas",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success : function(data){
                let html = '';
                
                for (let i = 0; i < data.length; i++) {
                    html += '<li class="list-group-item"><div class="form-check">'+
                                '<input class="form-check-input" name="id_peserta['+i+']" type="checkbox" value="'+data[i].id_peserta+'" id="a'+i+'">'+
                                '<label class="form-check-label" for="a'+i+'">'+
                                    data[i].nama_peserta+
                                '</label>'+
                            '</div></li>';
                }

                $(".list-peserta-nonaktif").html(html);
            }
        })

        $.ajax({
            url : "<?= base_url()?>kelas/get_data_kelas_privat",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success : function(data){
                $("#id-add").val(data.id_kelas);
                $("#id-edit").val(data.id_kelas);
                $("#status-edit").val(data.status);
                $("#nip-edit").val(data.nip);
                $("#pengajar-edit").val(data.pengajar);
                $("#program-edit").val(data.program);
                $("#koor-edit").val(data.id_peserta);
                $("#catatan-edit").val(data.catatan);
                if(data.tipe_kelas == 'pv khusus'){
                    $("#tempat-pv-khusus").show();
                    $("#tempat-pv-khusus").attr("name", "tempat");
                    $("#tempat-pv-khusus").attr("required", "");
                    $("#tempat-pv-luar").hide();
                    $("#tempat-pv-luar").attr("name", "");
                    $("#tempat-pv-luar").removeAttr("required");
                } else {
                    $("#tempat-pv-khusus").hide();
                    $("#tempat-pv-khusus").attr("name", "");
                    $("#tempat-pv-khusus").removeAttr("required");
                    $("#tempat-pv-luar").show();
                    $("#tempat-pv-luar").attr("name", "tempat");
                    $("#tempat-pv-luar").attr("required", "");
                }
            }
        })
        
        $.ajax({
            url : "<?= base_url()?>kelas/get_data_jadwal_aktif_by_kelas",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success : function(data){
                let html = '';
                for (let i = 0; i < data.length; i++) {
                    html += '<li class="list-group-item"><div class="form-check">'+
                                '<input class="form-check-input" name="id_jadwal['+i+']" type="checkbox" value="'+data[i].id_jadwal+'" id="j'+i+'">'+
                                '<label class="form-check-label" for="j'+i+'">' +data[i].hari+ ' ' +data[i].jam+ ' [' +data[i].ot * 30+ '] '+
                                    data[i].tempat+
                                '</label>'+
                            '</div></li>';
                }

                $(".list-jadwal-nonaktif").html(html)
            }
        })
    })

    $("#form-2").hide();
    $("#form-3").hide();
    $("#form-4").hide();
    $("#form-5").hide();
    $("#form-6").hide();
    
    $("#btn-form-1").click(function(){
        $("#btn-form-1").addClass('active');
        $("#btn-form-2").removeClass('active');
        $("#btn-form-3").removeClass('active');
        $("#btn-form-4").removeClass('active');
        $("#btn-form-5").removeClass('active');
        $("#btn-form-6").removeClass('active');
        
        $("#form-1").show();
        $("#form-2").hide();
        $("#form-3").hide();
        $("#form-4").hide();
        $("#form-5").hide();
        $("#form-6").hide();
    })
    
    $("#btn-form-2").click(function(){
        $("#btn-form-1").removeClass('active');
        $("#btn-form-2").addClass('active');
        $("#btn-form-3").removeClass('active');
        $("#btn-form-4").removeClass('active');
        $("#btn-form-5").removeClass('active');
        $("#btn-form-6").removeClass('active');
        
        $("#form-1").hide();
        $("#form-2").show();
        $("#form-3").hide();
        $("#form-4").hide();
        $("#form-5").hide();
        $("#form-6").hide();
    })
    
    $("#btn-form-3").click(function(){
        $("#btn-form-1").removeClass('active');
        $("#btn-form-2").removeClass('active');
        $("#btn-form-3").addClass('active');
        $("#btn-form-4").removeClass('active');
        $("#btn-form-5").removeClass('active');
        $("#btn-form-6").removeClass('active');
        
        $("#form-1").hide();
        $("#form-2").hide();
        $("#form-3").show();
        $("#form-4").hide();
        $("#form-5").hide();
        $("#form-6").hide();
    })
    
    $("#btn-form-4").click(function(){
        $("#btn-form-1").removeClass('active');
        $("#btn-form-2").removeClass('active');
        $("#btn-form-3").removeClass('active');
        $("#btn-form-4").addClass('active');
        $("#btn-form-5").removeClass('active');
        $("#btn-form-6").removeClass('active');
        
        $("#form-1").hide();
        $("#form-2").hide();
        $("#form-3").hide();
        $("#form-4").show();
        $("#form-5").hide();
        $("#form-6").hide();
    })
    
    $("#btn-form-5").click(function(){
        $("#btn-form-1").removeClass('active');
        $("#btn-form-2").removeClass('active');
        $("#btn-form-3").removeClass('active');
        $("#btn-form-4").removeClass('active');
        $("#btn-form-5").addClass('active');
        $("#btn-form-6").removeClass('active');
        
        $("#form-1").hide();
        $("#form-2").hide();
        $("#form-3").hide();
        $("#form-4").hide();
        $("#form-5").show();
        $("#form-6").hide();
    })
    
    $("#btn-form-6").click(function(){
        $("#btn-form-1").removeClass('active');
        $("#btn-form-2").removeClass('active');
        $("#btn-form-3").removeClass('active');
        $("#btn-form-4").removeClass('active');
        $("#btn-form-5").removeClass('active');
        $("#btn-form-6").addClass('active');
        
        $("#form-1").hide();
        $("#form-2").hide();
        $("#form-3").hide();
        $("#form-4").hide();
        $("#form-5").hide();
        $("#form-6").show();
    })

    $("#btn-edit").click(function(){
        var c = confirm("Yakin akan mengubah data kelas?");
        return c;
    })
    
    $("#btn-nonaktif-peserta").click(function(){
        var c = confirm("Yakin akan menonaktifkan peserta?");
        return c;
    })
    
    $("#btn-aktif-peserta").click(function(){
        var c = confirm("Yakin akan mengaktifkan kembali peserta?");
        return c;
    })
    
    $("#btn-nonaktif-jadwal").click(function(){
        var c = confirm("Yakin akan menonaktifkan jadwal?");
        return c;
    })
    
    $("#btn-tambah-jadwal").click(function(){
        var c = confirm("Yakin akan menambahkan jadwal?");
        return c;
    })

    $("#pindah-wl").click(function(){
        var c = confirm("Yakin akan memindahkan kelas ini ke waiting list?");
        return c;
    })

    $("#nonaktif").click(function(){
        var c = confirm("Yakin akan menonaktifkan kelas ini?")
        return c;
    })
    
    $("#btn-pindah-peserta").click(function(){
        var c = confirm("Yakin akan memindahkan peserta?")
        return c;
    })
    
    // generate peserta 
        $("#tipe_kelas").change(function(){
            let tipe = $(this).val();

            $.ajax({
                url: "<?= base_url()?>kelas/get_koor_kelas",
                dataType: "JSON",
                data: {tipe: tipe},
                method: "POST",
                success: function(result){
                    // console.log(result)
                    html = "";
                    result.kelas.forEach(kelas => {
                        html += `<option value="`+kelas.id_kelas+`">`+kelas.peserta+`</option>`
                    });
                    $("#id_kelas_pindah").html(html);
                }
            })
        })
        
        $("#btnGenerate").click(function(){
            let id_peserta = $("#id_generate").val();

            $.ajax({
                url: "<?= base_url()?>peserta/get_detail_peserta",
                dataType: "JSON",
                data: {id: id_peserta},
                method: "POST",
                success: function(data){
                    // console.log(data);
                    if(data.diri != null){
                        $("#nama_peserta").val(data.diri.nama_peserta)
                        $("#no_hp").val(data.diri.no_hp)
                        $("#t4_lahir").val(data.diri.t4_lahir)
                        $("#tgl_lahir").val(data.diri.tgl_lahir)
                        $("#tgl_masuk").val(data.diri.tgl_masuk)
                        $("#umur").val(data.diri.umur)
                        $("#jk").val(data.diri.jk)
                        $("#pendidikan").val(data.diri.pendidikan)
                        $("#status_nikah").val(data.diri.status_nikah)
                        $("#info").val(data.diri.info);
                        
                        var info = ["Teman", "Spanduk", "Media Elektronik", "Civitas Tar-Q", "Brosur", "Peserta", "Event"]
                        if(data.diri.info == "" || data.diri.info == null){
                            $("#info").val("");
                            $("#civitas").attr("disabled", true);
                            $("#civitas").val("");
                        } else if(info.includes(data.diri.info) == false){
                            $("#info").val("Lainnya");
                            $("#civitas").attr("disabled", false);
                            $("#civitas").val(data.diri.info);
                        } else {
                            $("#info").val(data.diri.info);
                            $("#civitas").attr("disabled", true);
                            $("#civitas").val("");
                        }

                        // data alamat
                        $("#alamat").val(data.alamat.alamat)
                        $("#kel").val(data.alamat.kel)
                        $("#kd_pos").val(data.alamat.kd_pos)
                        $("#kec").val(data.alamat.kec)
                        $("#kab_kota").val(data.alamat.kab_kota)
                        $("#provinsi").val(data.alamat.provinsi)
                        $("#no_telp").val(data.alamat.no_telp)
                        $("#email").val(data.alamat.email)

                        // data pekerjaan
                        $("#nama_perusahaan").val(data.pekerjaan.nama_perusahaan)
                        $("#alamat_perusahaan").val(data.pekerjaan.alamat_perusahaan)
                        $("#no_telp_perusahaan").val(data.pekerjaan.no_telp_perusahaan)
                        
                        var pekerjaan = ["Pelajar", "Mahasiswa", "Swasta", "PNS/BUMN", "TNI/POLRI"]
                        if(data.pekerjaan.pekerjaan == "" || data.pekerjaan.pekerjaan == null){
                            $("#pekerjaan").val(data.pekerjaan.pekerjaan)
                            $("#pekerjaan_lainnya").attr("disabled", true);
                            $("#pekerjaan_lainnya").val("");
                        } else if(pekerjaan.includes(data.pekerjaan.pekerjaan) == false){
                            $("#pekerjaan").val("Lainnya");
                            $("#pekerjaan_lainnya").attr("disabled", false);
                            $("#pekerjaan_lainnya").val(data.pekerjaan.pekerjaan);
                        } else {
                            $("#pekerjaan").val(data.pekerjaan.pekerjaan);
                            $("#pekerjaan_lainnya").attr("disabled", true);
                            $("#pekerjaan_lainnya").val("");
                        }

                        // data ortu
                        $("#nama_ibu").val(data.ortu.nama_ibu)
                        $("#t4_lahir_ibu").val(data.ortu.t4_lahir_ibu)
                        $("#tgl_lahir_ibu").val(data.ortu.tgl_lahir_ibu)
                        $("#nama_ayah").val(data.ortu.nama_ayah)
                        $("#t4_lahir_ayah").val(data.ortu.t4_lahir_ayah)
                        $("#tgl_lahir_ayah").val(data.ortu.tgl_lahir_ayah)

                        $(".msg-generate").html(`<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil mengenerate data `+data.diri.nama_peserta+`<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>`)
                    } else {
                        $("#formPendaftaran").trigger("reset");
                        $(".msg-generate").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal mengenerate data<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>`)
                    }
                    
                }
            })
        })
    // generate peserta 
</script>