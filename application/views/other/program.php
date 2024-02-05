<!-- modal add program -->
    <div class="modal fade" id="modalAddProgram" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Tambah Program</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="<?=base_url()?>other/add_program" method="post">
                  <div class="form-group">
                    <label for="program-nama">Program</label>
                    <input type="text" name="program" id="program-nama" class="form-control form-control-sm" required>
                  </div>
                  <div class="d-flex justify-content-end">
                    <input type="submit" value="Tambah Program" class="btn btn-sm btn-info" id="btn-add-program">
                  </div>
              </form>
            </div>
        </div>
      </div>
    </div>
  <!-- modal add program -->

<a href="javascript:void(0)" data-bs-toggle="modal" class="btn btn-success btn-sm mb-3 modalAddProgram" data-bs-target="#modalAddProgram">Tambah Program</a>

<div class="content">
    <div class="card shadow mb-4 overflow-auto">
        <div class="card-body">
            <table id="dataTable" class="table table-hover align-items-center mb-0 text-dark text-sm">
                <thead>
                    <tr>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">No</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Program</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 0;
                        foreach ($program as $program) : ?>
                            <tr>
                                <td><center><?=++$no?></center></td>
                                <td><?= $program['nama_program']?></td>
                                <td>
                                    <center>
                                        <a href="<?= base_url()?>other/delete_program_by_id_program/<?= $program['id_program']?>" onclick="return confirm('Yakin akan menghapus program')">
                                            <span class="badge bg-gradient-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                </svg>
                                            </span>
                                        </a>
                                    </center>
                                </td>
                            </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?= footer()?>

<script>
    let table = new DataTable('#dataTable');

    <?php if( $this->session->flashdata('pesan') ) : ?>
        Toast.fire({
            icon: "success",
            title: "<?= $this->session->flashdata('pesan')?>"
        });
    <?php endif; ?>

    $("#btn-add-program").click(function(){
      var c = confirm("Yakin akan menambahkan program baru?");
      return c;
    })
</script>