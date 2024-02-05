<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
    <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 mt-3"><?= $title?></h1>
            </div>
            
            <!-- berhasil memindahkan peserta -->
            <?php if( $this->session->flashdata('pesan') ) : ?>
                <div class="row">
                    <div class="col-4">
                        <?= $this->session->flashdata('pesan');?>
                        </div>
                </div>
            <?php endif; ?>

            <!-- DataTales Example -->
            <div class="card shadow mb-4" style="max-width: 530px">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-hover table-sm cus-font" id="dataTable" cellspacing="0">
                        <thead>
                            <th>No</th>
                            <th>Program</th>
                            <th><center>Aksi</center></th>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 0;
                                foreach ($program as $program) :?>
                                <tr>
                                    <td width=10%><center><?= ++$no?></center></td>
                                    <td><?= $program['nama_program']?></td>
                                    <td><center><a href="<?= base_url()?>other/delete_program_by_id_program/<?= $program['id_program']?>" class="badge badge-danger" onclick="return confirm('Yakin akan menghapus program')">delete</a></center></td>
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
    $("#lainnya").addClass("active");
</script>