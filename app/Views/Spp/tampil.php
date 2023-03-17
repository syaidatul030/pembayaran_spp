<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>

<h1>Daftar Tarif SPP</h1>
<p>Berikut ini daftar tarif SPP yang sudah terdaftar dalam database.</p>

<?=session()->getFlashData('pesan-error');?>

<p>
<a href="/spp/tambah" class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i> Tambah Tarif SPP</a>
</p>
<table class="table table-bordered">
<thead class="bg-light">
    <tr class="text-center">
        <th>No</th>
        <th>Tahun Angkatan</th>
        <th>Tarif SPP</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
<?php
    $htmlData=null;
    $nomor=null;
    if(isset($ListTarifSPP)){
    foreach ($ListTarifSPP as $row){
     $nomor++;
     $htmlData ='<tr>';
     $htmlData .='<td class="text-center">'.$nomor.'</td>';
     $htmlData .='<td class="text-center">'.$row['tahun'].'</td>';
     $htmlData .='<td class="text-center">Rp. '.number_format($row['nominal'],0,',','.').'</td>';
     $htmlData .='<td class="text-center">';
     $htmlData .='<a href="/spp/edit/'.$row['id_spp'].'" class="mr-1"><i class="fas fa-edit"></i></a>';
     $htmlData .='<a href="/spp/hapus/'.$row['id_spp'].'" data-confirm="Anda yakin akan menghapus data"><i class="fas fa-trash-alt"></i></a>';
     $htmlData .='</td>';
     $htmlData .='</tr>';
      
     echo $htmlData;
    }
}
?>
</tbody>
</table>

<?= $this->endSection() ?>

