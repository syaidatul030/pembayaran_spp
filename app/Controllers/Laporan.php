<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Laporan extends BaseController
{
	public function index()
	{
		return view('/Laporan/histori-pembayaran');
	}

	public function historiBayar(){

		$this->bayar->join('siswa','siswa.nisn=pembayaran.nisn');
		$this->bayar->join('kelas','kelas.id_kelas=siswa.id_kelas');
		$data['listPembayaran']=$this->bayar->where('siswa.nisn',$this->request->getPost('txtNoIndukSiswaNasional'))->orderBy('tgl_bayar','asc')->findAll();

		$arrBulan=[1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'];

		$htmlData=null;
		$no=null;
		$total_bayar=null;
		$htmlData .='<p>Berikut adalah histori pembayaran siswa NISN '.$this->request->getPost('txtNoIndukSiswaNasional').' :</p>';

		$htmlData .='<table class="table table-bordered">';
		$htmlData .='<thead class="bg-light">
						<tr class="text-center">
							<th>No</th>
							<th>Nama</th>
							<th>Kelas</th>
							<th>Tahun </th>
							<th>Bulan</th>
							<th>Tanggal Bayar</th>
							<th>Jumlah Bayar</th>
						</tr>
					</thead>
					<tbody>';

		foreach ($data['listPembayaran'] as $row){
			$no++;
			$htmlData .='<tr class="text-center">';
			$htmlData .='<td>'.$no.'</td>';
			$htmlData .='<td>'.$row['nama'].'</td>';
			$htmlData .='<td>'.$row['nama_kelas'].'</td>';
			$htmlData .='<td>'.$row['tahun_dibayar'].'</td>';
			$htmlData .='<td>'.$row['bulan_dibayar'].'</td>';
			$htmlData .='<td>'.$row['tgl_bayar'].'</td>';
			$htmlData .='<td class="text-right">'.number_format($row['jumlah_bayar'],0,',','.').'</td>';
			$htmlData .='</tr>';
		
			$total_bayar=$total_bayar + $row['jumlah_bayar'];
		}
		$htmlData .='
					<tr class="bg-light">
					<td colspan="6" class="text-center font-weight-bold">Total Penerimaan</td>
					<td class="text-right font-weight-bold">'.number_format($total_bayar,0,',','.').'</td>
					</tr>
					</tbody>
					</table>';

		echo $htmlData;
	}

	public function penerimaanSpp(){
		return view('Laporan/penerimaan-spp');
	}

	public function tampilkanPenerimaan(){

		$this->bayar->join('siswa','siswa.nisn=pembayaran.nisn');
		$this->bayar->join('kelas','kelas.id_kelas=siswa.id_kelas');
		$data['listPembayaran']=$this->bayar->where('pembayaran.nisn',$this->request->getPost('txtNoIndukSiswaNasional'))->orderBy('tgl_bayar','asc')->findAll();
		$arrBulan=[1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'];
		$htmlData=null;
		$no=null;
		$htmlData .='<p>Berikut adalah histori pembayaran siswa NISN '.$this->request->getPost('txtNoIndukSiswaNasional').' :</p>';

		$htmlData .='<table class="table table-bordered>';
		$htmlData .='<thead class="bg-light">
						<tr class="text-center">
							<th>No</th>
							<th>Tahun</th>
							<th>Bulan</th>
							<th>Tanggal Bayar</th>
							<th>Jumlah Bayar</th>
						</tr>
					</thead>
					<tbody>';

		foreach ($data['listPembayaran'] as $row){
			$no++;
			$htmlData .='<tr>';
			$htmlData .='<td class="text-center">'.$no.'</td>';
			$htmlData .='<td>'.$row['tahun_dibayar'].'</td>';
			$htmlData .='<td>'.$row['bulan_dibayar'].'</td>';
			$htmlData .='<td>'.$row['tgl_bayar'].'</td>';
			$htmlData .='<td class="text-right">'.number_format($row['jumlah_bayar'],0,',','.').'</td>';
			$htmlData .='</tr>';
		}
		$htmlData .='
					</tbody>
					</table>';

		echo $htmlData;
	}

	public function penerimaanTampil(){
		$this->bayar->join('siswa','siswa.nisn=pembayaran.nisn');
		$this->bayar->join('kelas','kelas.id_kelas=siswa.id_kelas');
		$data['listPembayaran']=$this->bayar->where('pembayaran.tgl_bayar',$this->request->getPost('txtTglBayar'))->findAll();

		$arrBulan=[1=>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'];
		
		$htmlData=null;
		$no=null;
		$total_bayar=null;

		$htmlData .='<p>Berikut adalah laporan penerimaan SPP tanggal '.$this->request->getPost('txtTglBayar').' :</p>';

		$htmlData .='<table class="table table-bordered">';
		$htmlData .='<thead class="bg-light">
						<tr class="text-center">
							<th>No</th>
							<th>NISN</th>
							<th>Nama Siswa</th>
							<th>Kelas</th>
							<th>Jumlah Bayar</th>
						</tr>
					</thead>
					<tbody>';

		foreach ($data['listPembayaran'] as $row){
			$no++;
			$htmlData .='<tr>';
			$htmlData .='<td class="text-center">'.$no.'</td>';
			$htmlData .='<td>'.$row['nisn'].'</td>';
			$htmlData .='<td>'.$row['nama'].'</td>';
			$htmlData .='<td>'.$row['nama_kelas'].'</td>';
			$htmlData .='<td class="text-right">'.number_format($row['jumlah_bayar'],0,',','.').'</td>';
			$htmlData .='</tr>';

			$total_bayar=$total_bayar + $row['jumlah_bayar'];
		}
		$htmlData .='
					<tr class="bg-light">
					<td colspan="4" class="text-center font-weight-bold">Total Penerimaan</td>
					<td class="text-right font-weight-bold">'.number_format($total_bayar,0,',','.').'</td>
					</tr>
					</tbody>
					</table>';

			

		echo $htmlData;		
	}	
}