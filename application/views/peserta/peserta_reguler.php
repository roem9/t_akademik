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
                            <label for="program">Program</label>
                            <select name="program" id="program" class="form-control form-control-sm">
                                <option value="">Pilih Program</option>
                                <?php foreach ($program as $prog) :?>
                                    <option value="<?= $prog['nama_program']?>"><?= $prog['nama_program']?></option>
                                <?php endforeach;?>
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
                        <div class="d-flex justify-content-end">
                            <a href="#" class='btn btn-sm btn-success' id="btn-next-1" >Data Diri</a>
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
                        <div class="d-flex justify-content-between">
                            <a href="#" class='btn btn-sm btn-success' id="btn-back-2" >Data Akademik</a>
                            <input type="submit" class="btn btn-sm btn-primary" value="Edit Data" id="btn-edit">
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- <div class="modal-footer">
                <input type="submit" class="btn btn-sm btn-primary btn-block" value="Update" id="btn-edit">
            </div> -->
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalWlReguler" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalWlRegulerTitle">Pindah Waiting List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fa fa-info-circle text-info mr-1"></i> Menu ini untuk memindahkan peserta nonaktif ke waiting list
                    </div>
                    <form action="<?=base_url()?>peserta/pindah_peserta_reguler_wl" method="post">
                        <input type="hidden" name="id_peserta">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input class='form-control form-control-sm' type="text" name="nama" readonly>
                        </div>
                        <div class="form-group">
                            <label for="program">Program</label>
                            <select name="program" class="form-control form-control-sm" required>
                                <option value="">Pilih Program</option>
                                <?php foreach ($program as $prog) :?>
                                    <option value="<?= $prog['nama_program']?>"><?= $prog['nama_program']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hari">Hari</label>
                            <select name="hari" class="form-control form-control-sm" required>
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
                            <select name="jam" class="form-control form-control-sm" required>
                                <option value="">Pilih Jam</option>
                                <option value="08.30-10.00">08.30-10.00</option>
                                <option value="10.00-11.30">10.00-11.30</option>
                                <option value="13.00-14.30">13.00-14.30</option>
                                <option value="15.30-17.00">15.30-17.00</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end">
                            <input type="submit" value="Pindah WL" class="btn btn-warning" id="pindah-wl">
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
        <div class="card shadow mb-4">
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
                            <?php if($title == "Peserta Reguler Nonaktif"):?>
                                <th style="width: 8%">Pindah WL</th>
                            <?php else :?>
                                <th>Pengajar</th>
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
                                <td><?= $peserta['status']?> 
                                <td><?= $peserta['nama_peserta']?></td>
                                <td><?= $peserta['no_hp']?></td>
                                <?php if($peserta['status'] == "wl" || $peserta['status'] == "nonaktif"):?>
                                    <td><?= $peserta['program_peserta']?></td>
                                    <td><center>-</center></td>
                                    <td><?= $peserta['hari_peserta']?></td>
                                    <td><?= $peserta['jam_peserta']?></td>
                                    <td><center><a href="#modalWlReguler" data-toggle="modal" data-id="<?= $peserta['id_peserta']?>" class="modalWlReguler btn btn-sm btn-outline-warning">WL</a></center></td>
                                    <!-- <td><center>-</center></td> -->
                                <?php else :?>
                                    <td><?= $peserta['program']?></td>
                                    <td><?= $peserta['tempat']?></td>
                                    <td><?= $peserta['hari']?></td>
                                    <td><?= $peserta['jam']?></td>
                                    <td><?= $peserta['nama_kpq']?></td>
                                <?php endif;?>
                                <td><a href="#modalDetailPesertaReguler" data-toggle="modal" data-id="<?= $peserta['id_peserta']?>" class="modalDetailPesertaReguler btn btn-sm btn-info">detail</a></td>
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
                $("#tgl_lahir").val(data.tgl_lahir);
            }
        })
    })
    
    $(".modalWlReguler").click(function(){
        const id = $(this).data('id');
        
        $.ajax({
            url : "<?=base_url()?>peserta/get_detail_peserta",
            method : "POST",
            data : {id : id},
            async : true,
            dataType : 'json',
            success : function(data){
                // console.log(data);
                $("input[name='id_peserta']").val(data.id_peserta);
                $("input[name='nama']").val(data.nama_peserta);
                $("select[name='program']").val(data.program);
                $("select[name='hari']").val(data.hari);
                $("select[name='jam']").val(data.jam);
            }
        })
    })

    $("#btn-form-1, #btn-back-2").click(function(){

        $("#btn-form-1").addClass("active")
        $("#btn-form-2").removeClass("active")
        
        $("#form-1").show();
        $("#form-2").hide();
    })

    $("#btn-form-2, #btn-next-1").click(function(){
        
        $("#btn-form-1").removeClass("active")
        $("#btn-form-2").addClass("active")
        
        $("#form-1").hide();
        $("#form-2").show();
    })

    $("#btn-edit").click(function(){
        var c = confirm('Yakin akan mengedit data?');
        return c;
    })
    
    $("#pindah-wl").click(function(){
        var c = confirm("Yakin akan memindahkan peserta ke waiting list?");
        return c;
    })
</script>
