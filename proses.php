<?php
require_once('koneksi.php');
$btn = $_POST['simpan'];
if (isset($btn) && $btn == 'Simpan') {
	// html akan mengirimdata ke sini
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$tgl = $_POST['tanggal_l'];
	$alamat = $_POST['alamat'];
	$jekel = $_POST['jekel'];
	$agama = $_POST['agama'];
	$pekerjaan = $_POST['pekerjaan'];
	// -------------------------------
// urutkan sesuai isi database, Harus sesuai
	$data = [
		$nik, 
		$nama,
		$tgl, 
		$alamat,
		$jekel,
		$agama,
		$pekerjaan
	];
	// ini artinya jika proses berhasil 
	// jika anda menggunakan autoincrement pada database tambahkan true pada parameter akhir  ex: $Config->insert("biodata",$data, true)
	if($Config->insert("biodata",$data)){
		header("location:".base_url."index.php");	
	}else{?>
		<script type="text/javascript">alert("gagal")?></script>
	<?php }
	
}else if (isset($btn) && $btn == 'Edit') {
	// html mengirim data ke sini
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$tgl = $_POST['tanggal_l'];
	$alamat = $_POST['alamat'];
	$jekel = $_POST['jekel'];
	$agama = $_POST['agama'];
	$pekerjaan = $_POST['pekerjaan'];
	// ------------------------------------------------
// update
	// ini data nya
	$nik__ = $_POST['nik__'];
	$data  = [
		'nik'			=> $nik,
		'nama'			=> $nama,
		'tanggal_lahir'	=> $tgl,
		'alamat'		=> $alamat,
		'jekel'			=> $jekel,
		'agama'			=> $agama,
		'pekerjaan'		=> $pekerjaan
	];		
	
	// where ini adalah kode fild apa yang mau di ubah
	// mengapa nik tidak masuk kedalam data karena kita menggunakan nik tersebut untuk parameter 
	// jika ingin merubah nik kita harus mengirim nik dengan cara lain ,
	// mari saya contohkan.
	$where = [
		'nik'			=> $nik__,
	];

	if($Config->update('biodata',$data,$where)){
		header("location:".base_url."index.php");		
	}else{?>
		<script type="text/javascript">alert("gagal")?></script>
	<?php }
	
}