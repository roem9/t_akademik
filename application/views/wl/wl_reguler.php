<!-- modal wl reguler -->
    <div class="modal fade" id="modalWlReguler" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalWlRegulerTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                            <a href="#" class='nav-link active' id="btn-form-1"><i class="fas fa-exchange-alt"></i></a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class='nav-link' id="btn-form-2"><i class="fas fa-user-slash"></i></a>
                            </li>
                            <li class="nav-item">
                            <a href="#" class='nav-link' id="btn-form-3"><i class="fas fa-list"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body cus-font">

                    <form action="<?= base_url()?>kelas/pindah_kelas_reguler" method="post" id="form-1">
                        <div class="alert alert-info"><i class="fa fa-info-circle mr-1 text-info"></i> Menu ini untuk memindahkan peserta reguler ke kelas reguler</div>
                        <ul class="list-group list-peserta-pindah"></ul>

                        <div class="form-group mt-3">
                        <label for="id-pindah">Pindah Ke Kelas?</label>
                        <select name="id" id="id-pindah" class="form-control form-control-sm" required>
                            <option value="">Pilih Kelas</option>
                            <?php foreach ($kelas_reg as $kelas) :?>
                            <option value="<?= $kelas['data']['id_kelas']?>"><?= $kelas['data']['program'] . " [" . $kelas['peserta'] . "] - " . $kelas['data']['nama_kpq'] . " - " . $kelas['data']['hari'] . " (" . $kelas['data']['jam'] . ")"?></option>
                            <?php endforeach;?>
                        </select>
                        </div>
                        <div class="d-flex justify-content-end">
                        <input type="submit" value="Pindah" class="btn btn-sm btn-success" id="btn-pindah">
                        </div>
                    </form>

                    <form action="<?= base_url()?>kelas/nonaktif_peserta" method="post" id="form-2">
                        <div class="alert alert-info"><i class="fa fa-info-circle mr-1 text-info"></i> Menu ini untuk menonaktifkan peserta reguler</div>
                        <ul class="list-group list-peserta-nonaktif"></ul>
                        <div class="d-flex justify-content-end">
                        <input type="submit" value="Nonaktif" class="btn btn-sm btn-danger mt-3" id="btn-nonaktif">
                        </div>
                    </form>
                    
                    <form action="<?= base_url()?>kelas/pindah_peserta_reguler_wl" method="post" id="form-3">
                        <div class="alert alert-info"><i class="fa fa-info-circle mr-1 text-info"></i> Menu ini untuk mengubah waktu atau program dari waiting list peserta reguler</div>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
    </div>
<!-- modal wl reguler -->

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
                <div class="col-6">
                    <?= $this->session->flashdata('pesan');?>    
                </div>
            </div>
        <?php endif; ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4" style="max-width: 550px">
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
                <table id="dataTable" class="table table-sm cus-font">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Ikhwan</th>
                            <th>Akhwat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 0;
                        foreach ($wl as $wl) :?>
                            <tr>
                                <td><center><?= ++$i?></center></td>
                                <td><?= $wl['kategori']?></td>
                                <td><center><a href="#modalWlReguler" data-toggle="modal" class="modalWlReguler" data-id="<?=$wl['kategori']?>|Pria"><?= $wl['pria']?></a></center></td>
                                <td><center><a href="#modalWlReguler" data-toggle="modal" class="modalWlReguler" data-id="<?=$wl['kategori']?>|Wanita"><?= $wl['wanita']?></a></center></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</div>

<script>
    $("#wl").addClass("active");

    $(".modalWlReguler").click(function(){
        let id = $(this).data("id");
        let data = id.split("|");
        $("#modalWlRegulerTitle").html(data[0]+" "+data[1]);

        $.ajax({
            url : "<?= base_url()?>wl/get_peserta_wl_reguler_by_kategori",
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
                                    data[i].tgl + " " + data[i].nama_peserta + 
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
                // console.log(data)
            }
        })
    })

    
    $("#form-2").hide();
    $("#form-3").hide();
    
    $("#btn-form-1").click(function(){
        $("#btn-form-1").addClass('active');
        $("#btn-form-2").removeClass('active');
        $("#btn-form-3").removeClass('active');
        
        $("#form-1").show();
        $("#form-2").hide();
        $("#form-3").hide();
    })
    
    $("#btn-form-2").click(function(){
        $("#btn-form-1").removeClass('active');
        $("#btn-form-2").addClass('active');
        $("#btn-form-3").removeClass('active');
        
        $("#form-1").hide();
        $("#form-2").show();
        $("#form-3").hide();
    })
    
    $("#btn-form-3").click(function(){
        $("#btn-form-1").removeClass('active');
        $("#btn-form-2").removeClass('active');
        $("#btn-form-3").addClass('active');
        
        $("#form-1").hide();
        $("#form-2").hide();
        $("#form-3").show();
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
    
    $("#btn-add-kelas").click(function(){
        var c = confirm("Yakin akan menambahkan kelas reguler?");
        return c;
    })
</script>
