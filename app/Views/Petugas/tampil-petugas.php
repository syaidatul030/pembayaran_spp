<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>

<h1>Data Petugas</h1>
<p>Berikut ini daftar petugas pengelola aplikasi SPP yang sudah terdaftar dalam database.</p>

<?=session()->getFlashData('pesan-error');?>

<p>
<a href="/petugas/tambah" class="btn btn-primary btn-sm"><i class="fas fa-user-plus"></i>
 Tambah Petugas </a>
</p>
<table class="table table-bordered">
<thead class="bg-light">
    <tr class="text-center">
        <th>No</th>
        <th>Nama Petugas</th>
        <th>Username</th>
        <th>Level User</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
<?php
    $htmlData=null;
    $nomor=null;
    foreach ($ListPetugas as $row){
     $nomor++;
     $htmlData ='<tr>';
     $htmlData .='<td class="text-center">'.$nomor.'</td>';
     $htmlData .='<td class="text-left">'.$row['nama_petugas'].'</td>';
     $htmlData .='<td class="text-left">'.$row['username'].'</td>';
     $htmlData .='<td class="text-left">'.$row['level'].'</td>';
     $htmlData .='<td class="text-center">';
     $htmlData .='<a href="/petugas/edit/'.$row['id_petugas'].'" class="mr-1"><i class="fas fa-edit"></i></a>';
     $htmlData .='<a href="/petugas/hapus/'.$row['id_petugas'].'" data-confirm="Apakah anda yakin akan menghapus data ?"><i class="fas fa-trash-alt"></i></a>';
     $htmlData .='</td>';
     $htmlData .='</tr>';
      
     echo $htmlData;
    }
?>
</tbody>
</table>

<?= $this->endSection() ?>

