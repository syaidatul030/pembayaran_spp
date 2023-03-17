<?=$this->extend('Dashboard');?>
<?=$this->section('content');?>
<h1>Data Siswa</h1>
<p>Berikut ini adalah data siswa yang sudah terdaftar dalam database.</p>

<?=session()->getFlashData('pesan-error');?>

<a href="/siswa/tambah" class="btn btn-primary btn-sm mb-2">
<i class="fas fa-user-plus"></i>Tambah Siswa</a>


<table class="table table-bordered">
    <thead class="bg-light">
        <tr class="text-center">
            <th>No.</th>
            <th>NISN</th>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            <th>Password</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>No. Telp</th>
            <th>Tarif SPP</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $htmlData=null;
    $no=null;
    foreach($listSiswa as $row){
        $no++;
        $htmlData ='<tr>'; 
        $htmlData .='<td class="text-center">'.$no.'</td>'; 
        $htmlData .='<td class="text-left">'.$row['nisn'].'</td>'; 
        $htmlData .='<td class="text-left">'.$row['nis'].'</td>'; 
        $htmlData .='<td class="text-left">'.$row['nama'].'</td>';
        $htmlData .='<td class="text-left">'.$row['password'].'</td>'; 
        $htmlData .='<td class="text-left">'.$row['nama_kelas'].'</td>'; 
        $htmlData .='<td class="text-left">'.$row['alamat'].'</td>'; 
        $htmlData .='<td class="text-left">'.$row['no_telp'].'</td>'; 
        $htmlData .='<td class="text-left"> Rp '.$row['nominal'].'</td>'; 
        $htmlData .='<td class="text-center">';
        $htmlData .='<a href="/siswa/edit/'.$row['nisn'].'" class="mr-2"><i class="fas fa-edit"></i></a>';
        $htmlData .='<a href="/siswa/hapus/'.$row['nisn'].'" data-confirm="Anda yakin akan menghapus data"><i class="fas fa-trash-alt"></i></a>';
        $htmlData .='</td>';
        $htmlData .='</tr>'; 
        echo $htmlData;
    }
    
    ?>
    </tbody>
</table>

<?=$this->endSection();?>