<?= $this->extend('Dashboard') ?>
<!-- pembuka section content-->
<?= $this->section('content') ?>
<h1>Daftar Kelas</h1>
<p>Berikut daftar kelas yang sudah tersimpan dalam database</p>

<?=session()->getFlashData('pesan-error');?>
<p>
<a href="/kelas/tambah" class="btn btn-success btn-sm font-weight-bold"><i class="fas fa-plus-circle"></i> Tambah Kelas</a>
</p>
<table class="table table-bordered">
<thead class="bg-light">
    <tr class="text-center">
        <th>No.</th>
        <th>Nama Kelas</th>
        <th>Kompetensi Keahlian</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
<?php
$htmlData=null;
$noUrut=null;
if(isset($listKelas)){
    foreach($listKelas as $row){
        $noUrut++;
        $htmlData ='<tr>';
        $htmlData .='<td class="text-center">'.$noUrut.'</td>';     
        $htmlData .='<td class="text-left">'.$row['nama_kelas'].'</td>';     
        $htmlData .='<td class="text-left">'.$row['kompetensi_keahlian'].'</td>';     
        $htmlData .='<td class="text-center">';
        $htmlData .='<a href="/kelas/edit/'.$row['id_kelas'].'" class="mr-2"><i class="fas fa-edit"></i></a>';
        $htmlData .='<a href="/kelas/hapus/'.$row['id_kelas'].'" data-confirm="Apakah anda yakin akan menghapus data ?"><i class="fas fa-trash-alt"></i></a>';
        $htmlData .='</td>';
        $htmlData .='</tr>';     

        echo $htmlData;
    }
}
?>
</tbody>
</table>
<?= $this->endSection() ?>
<!-- penutup section content-->

