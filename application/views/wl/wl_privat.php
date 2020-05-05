<!-- modal wl kelas pv -->
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
                            <a href="#" class='nav-link' id="btn-form-3"><i class="fas fa-clock"></i></a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class='nav-link' id="btn-form-4">tambah jadwal</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body cus-font">
                    <form action="<?= base_url()?>kelas/edit_kelas_privat" method="post" id="form-1">
                        <input type="hidden" name="id" id="id-edit">
                        <div class="form-group">
                        <label for="status-edit">Status</label>
                        <select name="status" id="status-edit" class="form-control form-control-sm" required>
                            <option value="">Pilih Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                            <option value="wl">WL</option>
                            <option value="konfirm">Konfirm</option>
                        </select>
                        </div>
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
                        <div class="alert alert-info"><i class="fa fa-info-circle mr-1 text-info"></i> menu ini berisi list peserta aktif</div>
                        <ul class="list-group list-peserta-aktif"></ul>

                        <div class="d-flex justify-content-end mt-3">
                        <!-- <input type="submit" value="Nonaktif" class="btn btn-sm btn-danger" id="btn-nonaktif-peserta"> -->
                        </div>
                    </form>

                    <form action="<?= base_url()?>kelas/nonaktif_jadwal" method="post" id="form-3">
                        <ul class="list-group list-jadwal-nonaktif"></ul>
                        <div class="d-flex justify-content-end">
                        <input type="submit" value="Nonaktif" class="btn btn-sm btn-danger mt-3" id="btn-nonaktif-jadwal">
                        </div>
                    </form>

                    <form action="<?= base_url()?>kelas/add_jadwal" method="post" id="form-4">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
    </div>
<!-- modal wl kelas pv -->

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 mt-3"><?= $title?></h1>
    </div>

    <!-- berhasil memindahkan peserta -->
    <?php if( $this->session->flashdata('pesan') ) : ?>
        <div class="row">
            <div class="col-7">
                <?= $this->session->flashdata('pesan');?>
                </div>
        </div>
    <?php endif; ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link <?php if($tabs == 'privat') echo 'active'?>" href="<?= base_url()?>wl/privat">Privat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($tabs == 'reguler') echo 'active'?>" href="<?= base_url()?>wl/reguler">Reguler</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm cus-font" id="dataTable" cellspacing="0">
                    <thead>
                        <th>No</th>
                        <th>Status</th>
                        <th>Tipe</th>
                        <th>Koor</th>
                        <th>No HP</th>
                        <th>Program</th>
                        <th>Pengajar</th>
                        <th>Peserta</th>
                        <th>Detail</th>
                        <th>Konfirmasi</th>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0;
                            foreach ($kelas as $kelas) :?>
                            <tr>
                                <td><center><?=++$no?></center></td>
                                <td><?= $kelas['data']['status']?>
                                <td><?= $kelas['data']['tipe_kelas']?></td>
                                <td><?= $kelas['data']['nama_peserta']?></td>
                                <td><?= $kelas['data']['no_hp']?>
                                <td><?= $kelas['data']['program']?>
                                <td><?= $kelas['data']['nama_kpq']?>
                                <td><center><?= $kelas['peserta']?></center></td>
                                <td><center><a href="#modalKelasPrivat" class="badge badge-warning modalKelasPrivat" data-toggle="modal" data-id="<?= $kelas['data']['id_kelas']?>">detail</a></center></td>
                                <?php if($kelas['data']['nama_kpq'] == ''):?>
                                    <td><center>-</center></td>
                                <?php else :?>
                                    <td>
                                        <center>
                                            <a href="<?= base_url()?>wl/batal_wl/<?= $kelas['data']['id_kelas']?>" onclick="return confirm('Yakin tidak menyetujui kelas waiting list ini?')" class="btn btn-danger btn-sm" id="btn-delete"><i class="fa fa-times"></i></a>
                                            <a href="<?= base_url()?>wl/konfirm_wl/<?= $kelas['data']['id_kelas']?>" onclick="return confirm('Yakin menyetujui kelas waiting list ini?')" class="btn btn-success btn-sm" id="btn-konfirm"><i class="fa fa-check" style="font-size: 12px"></i></a>
                                        </center>
                                    </td>
                                    <!-- <td><center><a href="<?=base_url()?>wl/konfirmasi_kelas_wl/<?= $kelas['data']['id_kelas']?>" class="badge badge-info" onclick="return confirm('Anda yakin akan menyetujui kelas ini?')">konfirmasi</a></center></td> -->
                                <?php endif;?>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $("#wl").addClass("active");
    $("#tempat-modal").remove();

    $(".modalKelasPrivat").click(function(){
        
        $("#koor-edit").val()
        
        let id = $(this).data("id");
        
        $.ajax({
            url : "<?= base_url()?>kelas/get_peserta_aktif_by_kelas",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success : function(data){
                let html = '<option value="">Pilih Koordinator</option>';
                let html2 = '';
                
                for (let i = 0; i < data.length; i++) {
                    html += '<option value="'+data[i].id_peserta+'">'+data[i].nama_peserta+'</option>';
                }

                $("#koor-edit").html(html);
                
                for (let i = 0; i < data.length; i++) {
                    html2 += '<li class="list-group-item"><div class="form-check">'+
                                // '<input class="form-check-input" name="id_peserta['+i+']" type="checkbox" value="'+data[i].id_peserta+'" id="'+i+'">'+
                                '<label class="form-check-label" for="'+i+'">'+
                                    data[i].nama_peserta+
                                '</label>'+
                            '</div></li>';
                }

                $(".list-peserta-aktif").html(html2);
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
        var c = confirm("Yakin akan mengubah data kelas?");
        return c;
    })
    
    $("#btn-nonaktif-peserta").click(function(){
        var c = confirm("Yakin akan menonaktifkan peserta?");
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
    
    $("#btn-add-kelas").click(function(){
        var c = confirm("Yakin akan menambahkan kelas reguler?");
        return c;
    })
</script>