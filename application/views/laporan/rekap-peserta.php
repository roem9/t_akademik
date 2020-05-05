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
        <th colspan=12><center>Rekapitulasi Data Peserta Aktif TAR-Q</center></th>
    </tr>
    <tr>
        <th colspan=12><center><?= $title?></center></th>
    </tr>
    <tr>
        <th colspan=12></th>
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
        <th>Nama Peserta</th>
        <th>Status</th>
        <th>No. Hp</th>
    </tr>
    <tbody>
        <?php 
            $no = 0;
            foreach ($laporan as $laporan):?>
                <?php foreach ($laporan['kelas'] as $kelas) :?>
                    <tr>
                        <td rowspan="<?= COUNT($kelas['peserta_kbm'])?>"><?= ++$no?></td>
                        <td rowspan="<?= COUNT($kelas['peserta_kbm'])?>"><?= $laporan['kpq']['nama_kpq']?></td>
                        <td rowspan="<?= COUNT($kelas['peserta_kbm'])?>"><?= $kelas['hari']?></td>
                        <td rowspan="<?= COUNT($kelas['peserta_kbm'])?>"><?= $kelas['jam']?></td>
                        <td rowspan="<?= COUNT($kelas['peserta_kbm'])?>"><?= tipe($kelas['tipe_kelas'])?></td>
                        <td rowspan="<?= COUNT($kelas['peserta_kbm'])?>"><?= $kelas['program_kbm']?></td>
                        <td rowspan="<?= COUNT($kelas['peserta_kbm'])?>"><?= $kelas['peserta']?></td>
                        <td rowspan="<?= COUNT($kelas['peserta_kbm'])?>"><?= $kelas['tempat']?></td>
                        <td rowspan="<?= COUNT($kelas['peserta_kbm'])?>"><center><?= COUNT($kelas['peserta_kbm'])?></center></td>
                    <!-- </tr> -->
                    <?php 
                        $urut = 1;
                        foreach ($kelas['peserta_kbm'] as $peserta) :?>
                        <?php if($urut == 1):?>
                            <td><?= $urut . ". " .$peserta['nama_peserta']?></td>
                            <td><center><?php if($peserta['hadir'] == 1){echo "Hadir";}else{echo "Tidak Hadir";}?></center></td>
                            <td>'<?= $peserta['no_hp']?></td>
                        </tr>
                        <?php else:?>
                            <tr>
                                <td><?= $urut . ". " .$peserta['nama_peserta']?></td>
                                <td><center><?php if($peserta['hadir'] == 1){echo "Hadir";}else{echo "Tidak Hadir";}?></center></td>
                                <td>'<?= $peserta['no_hp']?></td>
                            </tr>
                        <?php endif;?>
                    <?php 
                        $urut++;
                        endforeach;?>
                <?php endforeach;?>
        <?php endforeach;?>
    </tbody>
</table>