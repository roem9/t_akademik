<!-- modal -->
  <div class="modal fade" id="modalKelasReguler" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalKelasRegulerTitle">Detail Kelas Reguler</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
              <!-- <div class="card-header">
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
              </div> -->

              <div class="card-body cus-font">
			  	<span class="badge bg-gradient-secondary btn-navigation active" data-menu="menu-data-kelas">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
                        <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z"/>
                        <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z"/>
                    </svg>
                </span>
                <span class="badge bg-gradient-secondary btn-navigation" data-menu="menu-wl-to-kelas">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-right" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5m14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5"/>
					</svg>
                </span>
                <span class="badge bg-gradient-secondary btn-navigation" data-menu="menu-nonaktif-peserta">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-slash" viewBox="0 0 16 16">
						<path d="M13.879 10.414a2.501 2.501 0 0 0-3.465 3.465zm.707.707-3.465 3.465a2.501 2.501 0 0 0 3.465-3.465m-4.56-1.096a3.5 3.5 0 1 1 4.949 4.95 3.5 3.5 0 0 1-4.95-4.95ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
					</svg>
                </span>
                <span class="badge bg-gradient-secondary btn-navigation" data-menu="menu-wl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
                        <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23"/>
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                    </svg>
                </span>

				<div class="mb-3"></div>
                <form action="<?= base_url()?>kelas/edit_kelas_reguler" method="post" id="menu-data-kelas" class="menu-navigation">
                  <input type="hidden" name="id" id="id-edit">
                  <div class="form-group">
                    <label for="nip-edit">Pengajar</label>
                    <select name="nip" id="nip-edit" class="form-control form-control-md" required>
                      <option value="">Pilih Pengajar</option>
                      <?php foreach ($kpq as $pengajar) :?>
                        <option value="<?= $pengajar['nip']?>"><?= $pengajar['nama_kpq']?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="pengajar-edit">Tipe Pengajar</label>
                    <select name="pengajar" id="pengajar-edit" class="form-control form-control-md" required>
                      <option value="">Pilih Tipe Pengajar</option>
                      <option value="Pria">Ikhwan</option>
                      <option value="Wanita">Akhwat</option>
                      <option value="Pria&Wanita">Ikhwan & Akhwat</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="program-edit">Program</label>
                    <select name="program" id="program-edit" class="form-control form-control-md" required>
                      <option value="">Pilih Program</option>
                      <?php foreach ($program as $prog) :?>
                        <option value="<?= $prog['nama_program']?>"><?= $prog['nama_program']?></option>
                      <?php endforeach;?>

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tempat-edit">Tempat</label>
                    <select name="tempat" id="tempat-edit" class="form-control form-control-md" required>
                      <option value="">Pilih Tempat</option>
                      <?php foreach ($ruangan as $tempat) :?>
                        <option value="<?= $tempat['nama_ruangan']?>"><?= $tempat['nama_ruangan']?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="hari-edit">Hari</label>
                    <select name="hari" id="hari-edit" class="form-control form-control-md" required>
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
                    <select name="jam" id="jam-edit" class="form-control form-control-md" required>
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

                <form action="<?= base_url()?>kelas/pindah_kelas_reguler" method="post" id="menu-wl-to-kelas" class="menu-navigation">
                  <div class="alert alert-info" style="background-image: none">
                    <i class="fa fa-info-circle text-info mr-1"></i> Menu ini untuk memindahkan peserta reguler ke kelas reguler. Maksimal 10 peserta dalam 1 kelas
                  </div>
                  <ul class="list-group list-peserta-pindah"></ul>

                  <div class="form-group mt-3">
                    <label for="">Pindah Ke Kelas?</label>
                    <select name="id" id="id-pindah" class="form-control form-control-md" required>
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

                <form action="<?= base_url()?>kelas/nonaktif_peserta" method="post" id="menu-nonaktif-peserta" class="menu-navigation">
                  <div class="alert alert-info" style="background-image: none">
                    <i class="fa fa-info-circle text-info mr-1"></i> Menu ini untuk menonaktifkan peserta reguler
                  </div>
                  <ul class="list-group list-peserta-nonaktif"></ul>
                  <div class="form-group mt-3">
                    <label for="tgl_history">Tgl Nonaktif</label>
                    <input type="date" name="tgl_history" id="tgl_history" class="form-control form-control-md" required>
                  </div>
                  <div class="d-flex justify-content-end">
                    <input type="submit" value="Nonaktif" class="btn btn-sm btn-danger mt-3" id="btn-nonaktif">
                  </div>
                </form>
                
                <form action="<?= base_url()?>kelas/pindah_peserta_reguler_wl" method="post" id="menu-wl" class="menu-navigation">
                  <div class="alert alert-info" style="background-image: none">
                    <i class="fa fa-info-circle text-info mr-1"></i> Menu ini untuk memindahkan peserta reguler ke waiting list
                  </div>
                  <ul class="list-group list-peserta-wl"></ul>
                  <div class="form-group mt-3">
                    <label for="program-wl">Program</label>
                    <select name="program" id="program-wl" class="form-control form-control-md" required> 
                      <option value="">Pilih Program</option>
                      <?php foreach ($program as $prog) :?>
                        <option value="<?= $prog['nama_program']?>"><?= $prog['nama_program']?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="hari-wl">Hari</label>
                    <select name="hari" id="hari-wl" class="form-control form-control-md" required>
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
                    <select name="jam" id="jam-wl" class="form-control form-control-md" required>
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

<div class="content">
    <div class="card shadow mb-4 overflow-auto">
        <div class="card-body">
            <table id="dataTable" class="table table-hover align-items-center mb-0 text-dark text-sm">
                <thead>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Status</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Program</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Ruangan</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Hari</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Waktu</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Pengajar</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Peserta</th>
                    <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Action</th>
                </thead>
                <tbody>
					<?php
						foreach ($kelas as $i => $kelas) :
						?>
						<tr>
							<td>
								<?php 
									$background = "";
									$msg = "";

									if($kelas['data']['status'] == "aktif"){
										$background = 'success';
										$msg = 'Yakin akan menonaktifkan kelas ini?';
										$statusKelas = 'nonaktif';
									} else {
										$background = 'warning';
										$msg = 'Yakin akan mengaktifkan kelas ini?';
										$statusKelas = 'aktif';
									}
								?>

								<a href="<?= base_url()?>kelas/editstatus/<?= $kelas['data']['id_kelas']?>/<?= $statusKelas?>" onclick="return confirm('<?= $msg?>')">
									<span class="badge bg-gradient-<?= $background?>">
										<?= $kelas['data']['status']?>
									</span>
								</a>
							</td>
							<td><?=$kelas['data']['program']?></td>
							<td><?=$kelas['data']['tempat']?></td>
							<td><?=$kelas['data']['hari']?></td>
							<td><?=$kelas['data']['jam']?></td>
							<td><?=$kelas['data']['nama_kpq']?></td>
							<td><center><?=$kelas['peserta']?></center></td>
							<td>
								<center>
								<?php if($status == "aktif") :?>
									<?php if($kelas['data']['program'] == "Tahfidz Anak" || $kelas['data']['program'] == "Tahfidz Remaja" || $kelas['data']['program'] == "Tahfidz Dewasa") :?>
										<a href="javascript:void(0)">
											<span class="badge bg-gradient-secondary">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sticky" viewBox="0 0 16 16">
													<path d="M2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 15 8.586V2.5A1.5 1.5 0 0 0 13.5 1zM2 2.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V8H9.5A1.5 1.5 0 0 0 8 9.5V14H2.5a.5.5 0 0 1-.5-.5zm7 11.293V9.5a.5.5 0 0 1 .5-.5h4.293z"/>
												</svg>
											</span>
										</a>
									<?php elseif($kelas['data']['program'] == "Pra Tahsin 1" || $kelas['data']['program'] == "Pra Tahsin 2" || $kelas['data']['program'] == "Pra Tahsin 3" || $kelas['data']['program'] == "Tahsin 1" || $kelas['data']['program'] == "Tahsin 2" || $kelas['data']['program'] == "Tahsin 3" || $kelas['data']['program'] == "Tahsin 4" || $kelas['data']['program'] == "Tahsin Lanjutan") : ?>
										<a target="_blank" href="<?= base_url()?>laporan/tahsin/<?= md5($kelas['data']['id_kelas'])?>">
											<span class="badge bg-gradient-warning">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sticky" viewBox="0 0 16 16">
													<path d="M2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 15 8.586V2.5A1.5 1.5 0 0 0 13.5 1zM2 2.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V8H9.5A1.5 1.5 0 0 0 8 9.5V14H2.5a.5.5 0 0 1-.5-.5zm7 11.293V9.5a.5.5 0 0 1 .5-.5h4.293z"/>
												</svg>
											</span>
										</a>
									<?php elseif($kelas['data']['program'] == "Bahasa Arab 1" || $kelas['data']['program'] == "Bahasa Arab 2" || $kelas['data']['program'] == "Bahasa Arab 3" || $kelas['data']['program'] == "Bahasa Arab 4" || $kelas['data']['program'] == "Bahasa Arab Lanjutan") : ?>
										<a target="_blank" href="<?= base_url()?>laporan/b_arab/<?= md5($kelas['data']['id_kelas'])?>">
											<span class="badge bg-gradient-warning">
												<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sticky" viewBox="0 0 16 16">
													<path d="M2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 15 8.586V2.5A1.5 1.5 0 0 0 13.5 1zM2 2.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V8H9.5A1.5 1.5 0 0 0 8 9.5V14H2.5a.5.5 0 0 1-.5-.5zm7 11.293V9.5a.5.5 0 0 1 .5-.5h4.293z"/>
												</svg>
											</span>
										</a>
									<?php endif;?>
								<?php endif;?>

								<a href="javascript:void(0)" class="modalKelasReguler" data-bs-target="#modalKelasReguler" data-bs-toggle="modal" data-id="<?= $kelas['data']['id_kelas']?>">
									<span class="badge bg-gradient-info">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
											<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
											<path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
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

    $(document).on("click", ".modalKelasReguler", function(){
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

		let data = 'menu-data-kelas';
        // Remove and add classes to navigation buttons
        $(".btn-navigation").removeClass("bg-gradient-info").addClass("bg-gradient-secondary");
        $(`[data-menu='${data}']`).removeClass("bg-gradient-secondary").addClass("bg-gradient-info");

        // Hide all menu-navigation elements and show the one with the specified data-menu
        $(".menu-navigation").hide();
        $("#" + data).show();

		$(".content").hide();
    })
    
	var modalKelasReguler = document.getElementById('modalKelasReguler')
    modalKelasReguler.addEventListener('hidden.bs.modal', function (event) {
        $(".content").show();
    })

    $(".btn-navigation").on("click", function(){
        $(".alert-error").hide();

        let data = $(this).data("menu");

        $(".btn-navigation").removeClass("bg-gradient-info");
        $(".btn-navigation").removeClass("bg-gradient-secondary");
        $(".btn-navigation").addClass("bg-gradient-secondary");

        $(`[data-menu='${data}']`).removeClass("bg-gradient-secondary");
        $(`[data-menu='${data}']`).addClass("bg-gradient-info");

        $(".menu-navigation").hide();
        $("#" + data).show();
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