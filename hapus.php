<?php
// ini saya buat 2 file agar lebih mengerti
require_once('koneksi.php');

$nik = $_GET['nik'];
if (isset($_GET['nik'])) {
// query delete
$data = [
	'nik' => $nik
];

	if($Config->delete('biodata',$data)){
		header("location:".base_url."index.php");
	}else{?>
		<script type="text/javascript">alert("gagal")?></script>
	<?php }

}