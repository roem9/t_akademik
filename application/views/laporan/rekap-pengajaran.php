<?php 
    function tipe($tipe){
        if($tipe == 'pv khusus'){
            return 'PK';
        } elseif($tipe == 'pv luar') {
            return 'PL';
        } elseif($tipe == 'pv luar kota'){
            return 'PLK';
        } elseif($tipe == 'reguler'){
            return 'R';
        }
    }
?>

<table border=1>
    <tr>
        <th colspan=11><center>Rekapitulasi Data Pengajaran TAR-Q</center></th>
    </tr>
    <tr>
        <th colspan=11><center><?= $title?></center></th>
    </tr>
    <tr>
        <th colspan=11></th>
    </tr>
    <tr>
        <th>No</th>
        <th>Nama Pengajar</th>
        <th>Hari</th>
        <th>Jam</th>
        <th>Tipe</th>
        <th>Program</th>
        <th>Koordinator</th>
        <th>Alamat Belajar</th>
        <th>Peserta</th>
        <th>Peserta Hadir</th>
        <th>Peserta Tidak Hadir</th>
    </tr>
    <tbody>
        <?php 
            $no = 0;
            foreach ($laporan as $laporan):?>
                <?php foreach ($laporan['kelas'] as $kelas) :?>
                    <tr>
                        <td><?= ++$no?></td>
                        <td><?= $laporan['kpq']['nama_kpq']?></td>
                        <td><?= $kelas['hari']?></td>
                        <td><?= $kelas['jam']?></td>
                        <td><?= tipe($kelas['tipe_kelas'])?></td>
                        <td><?= $kelas['program_kbm']?></td>
                        <td><?= $kelas['peserta']?></td>
                        <td><?= $kelas['tempat']?></td>
                        <td><center><?= COUNT($kelas['peserta_kbm'])?></center></td>
                        <?php 
                            $hadir = 0;
                            $absen = 0;
                            foreach ($kelas['peserta_kbm'] as $peserta) {
                                if($peserta['hadir'] == 1){
                                    $hadir++;
                                } else {
                                    $absen++;
                                }
                            }
                        ?>
                        <td><center><?php if($hadir == 0){echo "-";}else{echo $hadir;}?></center></td>
                        <td><center><?php if($absen == 0){echo "-";}else{echo $absen;}?></center></td>
                    </tr>
                <?php endforeach;?>

        <?php endforeach;?>
    </tbody>
</table>