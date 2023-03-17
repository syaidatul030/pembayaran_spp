<?=$this->extend('/Home/Dashboard');?>
<?=$this->section('content');?>
<h2>Histori Pembayaran SPP</h2>
<p>Berikut adalah histori pembayaran SPP anda. </p>
<table class="table table-bordered">
    <thead class="bg-light">
        <tr>    
            <th>No</th>
            <th>Bulan / Tahun Bayar</th>
            <th>Tanggal Bayar </th>
            <th>Jumlah Bayar</th>
        </tr>
    </thead>
    <tbody>
    <?php
     $htmlData=null;
     $no=null;

    foreach($historiBayar as $row){
        $no++;
        $htmlData ='<tr>';
        $htmlData .='<td>'.$no.'</td>';
        $htmlData .='<td>'.$row['bulan_dibayar'].' '.$row['tahun_dibayar'].'</td>';
        $htmlData .='<td>'.$row['tgl_bayar'].'</td>';
        $htmlData .='<td class="text-right">Rp. '.number_format($row['jumlah_bayar'],0,',','.').'</td>';
        $htmlData .='</tr>';

        echo  $htmlData;

    }
    ?>
    </tbody>
</table>
<?=$this->endSection();?>