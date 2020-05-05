<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="d-flex justify-content-begin mt-3">
                    <h1 class="h3 mb-0 text-gray-800 mr-3"><?= $title?></h1>
                </div>
            </div>
            <?php $urut = 0;?>
                <?php foreach ($pengajar as $key => $pengajar) :?>
                    <?php if(isset($pengajar['kelas']) || isset($pengajar['kbm_badal'])) :?>
                        <div class="table-responsive">
                            <table class="table cus-font" style="font-size: 12px" border=1>
                                <thead class="thead-light">
                                    <tr>
                                        <th colspan=22><center><?= ++$urut.". ".$pengajar['nama_kpq'] . " ( Gol. " . $pengajar['golongan'] . " )"?></center></th>
                                    </tr>
                                </thead>
                                <?php if(isset($pengajar['kelas'])) :?>
                                    <tr>
                                        <th rowspan=2 style="vertical-align:middle">No</th>
                                        <th rowspan=2 style="vertical-align:middle">Koordinator</th>
                                        <th rowspan=2 style="vertical-align:middle">Hari</th>
                                        <th rowspan=2 style="vertical-align:middle">Jam</th>
                                        <th rowspan=2 style="vertical-align:middle">Tipe</th>
                                        <th rowspan=2 style="vertical-align:middle">Program</th>
                                        <th colspan=5 style="vertical-align:middle"><center>Tgl KBM</center></th>
                                        <th rowspan=2 style="vertical-align:middle">Jmlh</th>
                                        <th rowspan=2 style="vertical-align:middle">Pest</th>
                                        <th colspan=5 style="vertical-align:middle"><center>Pest Hadir</center></th>
                                        <th rowspan=2 style="vertical-align:middle">Sesuai</th>
                                        <th rowspan=2 style="vertical-align:middle">Ganti</th>
                                        <th rowspan=2 style="vertical-align:middle">Badal</th>
                                        <th rowspan=2 style="vertical-align:middle">Tempat</th>
                                    </tr>
                                    <tr>
                                        <td><center>I</center></td>
                                        <td><center>II</center></td>
                                        <td><center>III</center></td>
                                        <td><center>IV</center></td>
                                        <td><center>V</center></td>
                                        <td><center>I</center></td>
                                        <td><center>II</center></td>
                                        <td><center>III</center></td>
                                        <td><center>IV</center></td>
                                        <td><center>V</center></td>
                                    </tr>
                                    <?php 
                                        $no = 0;

                                        if (isset($pengajar['kelas'])) :?>
                                        <?php foreach ($pengajar['kelas'] as $kelas) :?>
                                            <tr>
                                                <td><?= ++$no?></td>
                                                <td><?= $kelas['peserta']?></td>
                                                <td><?= $kelas['hari']?></td>
                                                <td><?= $kelas['jam']?></td>
                                                <td><?= $kelas['tipe_kelas']?></td>
                                                <td><?= $kelas['program_kbm']?></td>

                                                <!-- tgl kbm -->
                                                <?php 
                                                    $jumlah_pertemuan = 0;
                                                    $kbm_sesuai = 0;
                                                    $kbm_ganti = 0;
                                                    $kbm_badal = 0;

                                                    for ($i=0; $i < 5; $i++) :?>
                                                    <?php 
                                                        if(isset($kelas['kbm'][$i])){
                                                            if($kelas['kbm'][$i]['keterangan'] == 'sesuai'){
                                                                $kbm_sesuai += 1;
                                                            } else if($kelas['kbm'][$i]['keterangan'] == 'ganti'){
                                                                $kbm_ganti += 1;
                                                            }

                                                            $jumlah_pertemuan += 1;
                                                            if($kelas['kbm'][$i]['keterangan'] == 'badal'){
                                                                $kbm_badal += 1;
                                                                echo "<td style='background-color: red'> " . date('j', strtotime($kelas['kbm'][$i]['tgl'])) . "</td>";
                                                            } else {
                                                                echo "<td> " . date("j", strtotime($kelas['kbm'][$i]['tgl'])) . "</td>";
                                                            }
                                                        } else {
                                                            echo "<td>-</td>";
                                                        }
                                                    ?>
                                                <?php endfor;?>

                                                <td><center><?= $jumlah_pertemuan?></center></td>
                                                <td><center><?= $kelas['jum_peserta']?></center></td>

                                                <!-- peserta hadir -->
                                                <?php for ($i=0; $i < 5; $i++) :?>
                                                    <?php 
                                                        if(isset($kelas['kbm'][$i])){
                                                            echo "<td> " . $kelas['kbm'][$i]['peserta'] . "</td>";
                                                        } else {
                                                            echo "<td>-</td>";
                                                        }
                                                    ?>
                                                <?php endfor;?>

                                                <td><center><?=$kbm_sesuai?></center></td>
                                                <td><center><?=$kbm_ganti?></center></td>
                                                <td><center><?=$kbm_badal?></center></td>
                                                <td><?=$kelas['tempat']?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                <?php endif;?>

                                <?php if(isset($pengajar['kbm_badal'])) :?>
                                    <tr>
                                        <th colspan=22><center>KBM Badal</center></th>
                                    </tr>
                                    <tr>
                                        <th>No</th>
                                        <th>Koordinator</th>
                                        <th>Hari</th>
                                        <th>Jam</th>
                                        <th>Tipe</th>
                                        <th>Program</th>
                                        <th colspan=5>Tgl KBM</th>
                                        <th colspan=9>Pengajar Yang Dibadal</th>
                                        <th colspan=2>Kode Badal</th>
                                    </tr>
                                    <?php
                                        $no = 0;
                                        foreach ($pengajar['kbm_badal'] as $badal) :?>
                                            <tr>
                                                <td><?= ++$no?></td>
                                                <td><?= $badal['peserta']?></td>
                                                <td><?= $badal['hari']?></td>
                                                <td><?= $badal['jam']?></td>
                                                <td><?= $badal['tipe_kelas']?></td>
                                                <td><?= $badal['program_kbm']?></td>
                                                <td colspan=5><center><?= date("d-m-Y", strtotime($badal['tgl']))?></center></td>
                                                <td colspan=9><?= $badal['nama_kpq']?></td>
                                                <td colspan=2 style="text-align: left"><?= $badal['id_kbm']?></td>
                                            </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </table>
                        </div>
                        <br>
                    <?php endif;?>
                <?php endforeach;?>
        </div>
    </div>
</div>
<script>
    $("#sidebarRekap").addClass("active");
</script>