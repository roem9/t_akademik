<div class="modal fade" id="modalDetailPesertaReguler" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDetailPesertaRegulerTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        <form action="<?=base_url()?>peserta/edit_data_peserta_reguler" method="post">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a href="#" class='nav-link' id="btn-form-1" data-id=""><i class="fas fa-book"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class='nav-link' id="btn-form-2" data-id=""><i class="fas fa-user"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <input type="hidden" name="id_peserta" id="id_peserta">
                    <div class="form-detail" id="form-1">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control form-control-sm">
                                <option value="">Pilih Status</option>
                                <option value="aktif">Aktif</option>
                                <option value="wl">WL</option>
                                <option value="nonaktif">Nonaktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="program">Program</label>
                            <select name="program" id="program" class="form-control form-control-sm">
                                <option value="">Pilih Program</option>
                                <option value="Pra Tahsin 1">Pra Tahsin 1</option>
                                <option value="Pra Tahsin 2">Pra Tahsin 2</option>
                                <option value="Pra Tahsin 3">Pra Tahsin 3</option>
                                <option value="Tahsin 1">Tahsin 1</option>
                                <option value="Tahsin 2">Tahsin 2</option>
                                <option value="Tahsin 3">Tahsin 3</option>
                                <option value="Tahsin 4">Tahsin 4</option>
                                <option value="Tahsin Lanjutan">Tahsin Lanjutan</option>
                                <option value="Tahfidz Anak">Tahfidz Anak</option>
                                <option value="Tahfidz Dewasa">Tahfidz Dewasa</option>
                                <option value="Bahasa Arab 1">Bahasa Arab 1</option>
                                <option value="Bahasa Arab 2">Bahasa Arab 2</option>
                                <option value="Bahasa Arab 3">Bahasa Arab 3</option>
                                <option value="Bahasa Arab 4">Bahasa Arab 4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hari">Hari</label>
                            <select name="hari" id="hari" class="form-control form-control-sm">
                                <option value="">Pilih Hari</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Ahad">Ahad</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jam">Jam</label>
                            <select name="jam" id="jam" class="form-control form-control-sm">
                                <option value="">Pilih Jam</option>
                                <option value="08.30-10.00">08.30-10.00</option>
                                <option value="10.00-11.30">10.00-11.30</option>
                                <option value="13.00-14.30">13.00-14.30</option>
                                <option value="15.30-17.00">15.30-17.00</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_masuk">Tgl Masuk</label>
                            <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control form-control-sm" readonly>
                        </div>
                    </div>
                    <div class="form-detail" id="form-2">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input class='form-control form-control-sm' type="text" name="nama" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No Handphone</label></td>
                            <input class='form-control form-control-sm' type="text" name="no_hp" id="no_hp">
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
                    </div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-sm btn-primary btn-block" value="Update" id="btn-edit">
            </div>
        </form>
    </div>
  </div>
</div>

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
        <div class="card shadow mb-4"">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link <?php if($tabs == 'reguler') echo 'active'?>" href="<?= base_url()?>peserta/reguler">Reguler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($tabs == 'pv khusus') echo 'active'?>" href="<?= base_url()?>peserta/pvkhusus">Pv Khusus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($tabs == 'pv luar') echo 'active'?>" href="<?= base_url()?>peserta/pvluar">Pv Luar</a>
                </li>
            </ul>
        </div>
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
                            <th>Tempat</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Pengajar</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 0;
                        foreach ($peserta as $peserta) :?>
                            <tr>
                                <td><center><?= ++$i?></center></td>
                                <td><?= $peserta['status']?> 
                                <td><?= $peserta['nama_peserta']?></td>
                                <td><?= $peserta['no_hp']?></td>
                                <?php if($peserta['status'] == "wl" || $peserta['status'] == "nonaktif"):?>
                                    <td><?= $peserta['program_peserta']?></td>
                                    <td><center>-</center></td>
                                    <td><?= $peserta['hari_peserta']?></td>
                                    <td><?= $peserta['jam_peserta']?></td>
                                    <td><center>-</center></td>
                                <?php else :?>
                                    <td><?= $peserta['program']?></td>
                                    <td><?= $peserta['tempat']?></td>
                                    <td><?= $peserta['hari']?></td>
                                    <td><?= $peserta['jam']?></td>
                                    <td><?= $peserta['nama_kpq']?></td>
                                <?php endif;?>
                                <td><a href="#modalDetailPesertaReguler" data-toggle="modal" data-id="<?= $peserta['id_peserta']?>" class="modalDetailPesertaReguler">
                                <span class="badge badge-warning">detail</span></a></td>
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
    $("#peserta").addClass("active");
    
    $("#btn-form-1").addClass("active");

    $("#form-1").show();
    $("#form-2").hide();
    
    $(".modalDetailPesertaReguler").click(function(){
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
                $("#program").val(data.program);
                $("#hari").val(data.hari);
                $("#jam").val(data.jam);
                $("#alamat_peserta").val(data.alamat);
            }
        })
    })

    $("#btn-form-1").click(function(){

        $("#btn-form-1").addClass("active")
        $("#btn-form-2").removeClass("active")
        
        $("#form-1").show();
        $("#form-2").hide();
    })

    $("#btn-form-2").click(function(){
        
        $("#btn-form-1").removeClass("active")
        $("#btn-form-2").addClass("active")
        
        $("#form-1").hide();
        $("#form-2").show();
    })

    $("#btn-edit").click(function(){
        var c = confirm('Yakin akan mengedit data?');
        return c;
    })
    
    $("#btn-add-kelas").click(function(){
        var c = confirm("Yakin akan menambahkan kelas reguler?");
        return c;
    })
</script>
