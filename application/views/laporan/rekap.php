<?php
    $bul = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
?>
<div class="content">
    <div class="card shadow mb-4 overflow-auto">
        <div class="card-body">
            <table id="dataTable" class="table table-hover align-items-center mb-0 text-dark text-sm">
                <thead>
                    <tr>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">No</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama KPQ</th>
                        <?php if(date("m") == $bulan && date("Y") == $tahun) :?>
                          <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Kelas</th>
                          <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Jadwal</th>
                        <?php endif;?>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">KBM</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Badal</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Dibadal</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Blm Rekap Badal</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Action</th>
                        <!-- <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">Rekap</th>
                        <th class="text-uppercase text-dark text-xxs font-weight-bolder w-1">WA</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 0;
                        foreach ($kbm as $j => $kbm) :?>
                        <tr>
                            <td><center><?= ++$i?></center></td>
                            <td><?= $kbm['kpq']?></td>
                            <?php if(date("m") == $bulan && date("Y") == $tahun) :?>
                              <td><center><?= $kbm['kelas']?></center></td>
                              <td><center><?= $kbm['jadwal']?></center></td>
                            <?php endif;?>
                            <td><center><?= $kbm['kbm']?></center></td>
                            <td><center><?= $kbm['badal']?></center></td>
                            <td><center><?= $kbm['dibadal']?></center></td>
                            <td><center><?= $kbm['no_rekap']?></center></td>
                            <!-- <td>-</td> -->
							<td>
								<a href="<?= base_url()?>laporan/rekapkpq/<?=$kbm['nip'].'/'.$bulan.'/'.$tahun?>" target="_blank">
									<span class="badge bg-gradient-info">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book-fill" viewBox="0 0 16 16">
											<path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
										</svg>
									</span>
								</a>
								<a href="https://api.whatsapp.com/send?phone=62<?= substr($kbm['no_hp'], 1)?>&text=<?= str_replace(' ', '%20', $kbm['text'])?>" target="_blank">
									<span class="badge bg-gradient-success">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
										</svg>
									</span>
								</a>
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
</script>