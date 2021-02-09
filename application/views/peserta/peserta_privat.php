<!-- modal detail peserta -->
    <div class="modal fade" id="modalDetailPesertaPrivat" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailPesertaPrivatTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?=base_url()?>peserta/edit_data_peserta_privat" method="post">
                                <input type="hidden" name="id_peserta" id="id_peserta">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input class='form-control form-control-sm' type="text" name="nama" id="nama">
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No Handphone</label></td>
                                    <input class='form-control form-control-sm' type="text" name="no_hp" id="no_hp">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir">Tgl Lahir</label></td>
                                    <input class='form-control form-control-sm' type="date" name="tgl_lahir" id="tgl_lahir">
                                </div>
                                <div class="form-group">
                                    <label for="jk">Gender</label>
                                    <select name="jk" id="jk" class='form-control form-control-sm'>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_peserta">Alamat</label>
                                    <textarea class='form-control form-control-sm' name="alamat" id="alamat_peserta" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_masuk">Tgl Masuk</label>
                                    <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control form-control-sm" readonly>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input type="submit" class="btn btn-sm btn-success" value="Edit Data" id="btn-edit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- modal detail peserta -->

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
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
            <div class="card shadow mb-4" style="max-width: 950px">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-sm cus-font">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Status</th>
                                <th>Nama Peserta</th>
                                <th>No Hp</th>
                                <th>Program</th>
                                <th>Pengajar</th>
                                <?php if($status == "aktif") :?>
                                    <th>Laporan</th>
                                <?php endif;?>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 0;
                            foreach ($peserta as $peserta) :?>
                                <tr>
                                    <td><center><?= ++$i?></center></td>
                                    <?php if($peserta['status'] == "aktif"):?>
                                        <td><a href="<?= base_url()?>peserta/edit_status_peserta/<?= $peserta['id_peserta']?>/nonaktif" onclick="return confirm('Yakin akan menonaktifkan peserta ini?')" class="btn btn-sm btn-outline-success">aktif</a></td>
                                    <?php elseif($peserta['status'] == "nonaktif"):?>
                                        <td><a href="<?= base_url()?>peserta/edit_status_peserta/<?= $peserta['id_peserta']?>/aktif" onclick="return confirm('Yakin akan mengaktifkan peserta ini?')" class="btn btn-sm btn-outline-secondary">nonaktif</a></td>
                                    <?php endif;?>
                                    <td><?= $peserta['nama_peserta']?></td>
                                    <td><?= $peserta['no_hp']?></td>
                                    <?php if($peserta['nama_kpq'] == ""):?>
                                        <td><center>-</center></td>
                                        <td><center>-</center></td>
                                        <?php if($status == "aktif") :?>
                                            <td><center>-</center></td>
                                        <?php endif;?>
                                    <?php else :?>
                                        <td><?= $peserta['program']?></td>
                                        <td><?= $peserta['nama_kpq']?></td>
                                        
                                        <?php if($status == "aktif") :?>
                                            <td>
                                                <center>
                                                    <?php if($peserta['program'] == "Tahfidz Anak" || $peserta['program'] == "Tahfidz Remaja" || $peserta['program'] == "Tahfidz Dewasa") :?>
                                                        <a target="_blank" href="https://peserta.tar-q.com/laporan/tahfidz/<?= md5($peserta['no_peserta'])?>" class="btn btn-sm btn-warning"><i class="fa fa-file"></i></a>
                                                    <?php elseif($peserta['program'] == "Pra Tahsin 1" || $peserta['program'] == "Pra Tahsin 2" || $peserta['program'] == "Pra Tahsin 3" || $peserta['program'] == "Tahsin 1" || $peserta['program'] == "Tahsin 2" || $peserta['program'] == "Tahsin 3" || $peserta['program'] == "Tahsin 4" || $peserta['program'] == "Tahsin Lanjutan") : ?>
                                                        <a target="_blank" href="https://peserta.tar-q.com/laporan/tahsin/<?= md5($peserta['no_peserta'])?>" class="btn btn-sm btn-warning"><i class="fa fa-file"></i></a>
                                                    <?php elseif($peserta['program'] == "Bahasa Arab 1" || $peserta['program'] == "Bahasa Arab 2" || $peserta['program'] == "Bahasa Arab 3" || $peserta['program'] == "Bahasa Arab 4" || $peserta['program'] == "Bahasa Arab Lanjutan") : ?>
                                                        <a target="_blank" href="https://peserta.tar-q.com/laporan/b_arab/<?= md5($peserta['no_peserta'])?>" class="btn btn-sm btn-warning"><i class="fa fa-file"></i></a>
                                                    <?php endif;?>
                                                </center>
                                            </td>
                                        <?php endif;?>
                                    <?php endif;?>
                                    <td><a href="#modalDetailPesertaPrivat" data-toggle="modal" data-id="<?= $peserta['id_peserta']?>" class="modalDetailPesertaPrivat btn btn-sm btn-info">detail</a></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>

        </div>
    </div>
</div>

<script>
    $("#peserta").addClass("active");
    
    // $("#btn-form-1").addClass("active");
    // $("#form-1").show();
    // $("#form-2").hide();
    
    $(".modalDetailPesertaPrivat").click(function(){
        const id = $(this).data('id');
        
        $.ajax({
            url : "<?=base_url()?>peserta/get_detail_peserta",
            method : "POST",
            data : {id : id},
            async : true,
            dataType : 'json',
            success : function(data){
                $(".modal-title").html(data.nama_peserta);
                $("#id_peserta").val(data.id_peserta);
                $("#nama").val(data.nama_peserta);
                $("#status").val(data.status);
                $("#no_hp").val(data.no_hp);
                $("#tgl_masuk").val(data.tgl_masuk);
                $("#jk").val(data.jk);
                $("#alamat_peserta").val(data.alamat);
                $("#tgl_lahir").val(data.tgl_lahir);
            }
        })
    })

    // validation
        // $("#btn-form-1").click(function(){

        //     $("#btn-form-1").addClass("active")
        //     $("#btn-form-2").removeClass("active")
            
        //     $("#form-1").show();
        //     $("#form-2").hide();
        // })

        // $("#btn-form-2").click(function(){
            
        //     $("#btn-form-1").removeClass("active")
        //     $("#btn-form-2").addClass("active")
            
        //     $("#form-1").hide();
        //     $("#form-2").show();
        // })

        $("#btn-edit").click(function(){
            var c = confirm('Yakin akan mengedit data?');
            return c;
        })
    // validation
</script>
