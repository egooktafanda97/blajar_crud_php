<?php require_once("koneksi.php");
$radio1 = 'checked';
$radio2 = '';
if (isset($_GET['nik'])) {
	$nik = $_GET['nik'];

	// get Data
	$data = [
		'nik' => $nik
	];
	$item = $Config->get_oneItem('biodata',$data);

	// ini maksud nya jika $item tidak kosong maka akan berisi nilai dari $tem yang di tentukan jika kosong maka $tem akan bernialai string kosong
	// ((!empty($item['']))?$item['']:'');
	// -------------------------------------------------------------------------------------------------

	// sekerang cara merubah format date yang ada di database ke format date html
	// digunakan jika memakai input type date
	  $time = strtotime($item['tanggal_lahir']);
	  $tgl_lahir = date('Y-m-d',$time);
	 // -----------------------------------------------------------------------

	// cara seting radio button

	  $radio1 = ((!empty($item['jekel']) && $item['jekel'] == 'Laki-Laki')?'checked':'');
	  $radio2 = ((!empty($item['jekel']) && $item['jekel'] == 'Perempuan')?'checked':'');

	// 
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url?>assets/css/bootstrap.min.css">

    <title>CRUD</title>
  </head>
  <body>

<!-- ngoding di sini -->


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">EGO OKTAFANDA</a>
      </li>
  </div>
</nav>


<br>

<div class="container">
	
<div class="card bg-light mb-3">
  <div class="card-header">Form Input Data</div>
  <div class="card-body">


<!-- form input data -->
    <form action="<?=base_url?>/proses.php" method="post">
    	<input type="hidden" name="nik__" value="<?=((!empty($item['nik']))?$item['nik']:'')?>">
  	<div class="row">
  		
	  		<div class="col-md-6">
			  	<div class="form-group">
					<label>NIK</label>
					<input type="text" class="form-control" name="nik" placeholder="input nik anda" value="<?=((!empty($item['nik']))?$item['nik']:'')?>">
				</div>
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control" name="nama" placeholder="input nama anda" value="<?=((!empty($item['nama']))?$item['nama']:'')?>">
				</div>

				<!-- type date tidak berfungsi di sebagian browser versi lama -->
		    <div class="form-group">
				<label>Tanggal Lahir</label>
				<input type="date" class="form-control" name="tanggal_l" value="<?=$tgl_lahir?>">
			</div>
				<div class="form-group">
				   <label >Alamat</label>
				   <textarea class="form-control" name="alamat" rows="2"><?=((!empty($item['alamat']))?$item['alamat']:'')?></textarea>
				</div>			  	
	  		</div>


	  		<!-- kiri -->
	  		<div class="col-md-6">
		  			<div class="form-group">
					<label >Jenis Klamin</label>
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="jekel" value="Laki-Laki" <?=$radio1?>>
					  <label class="form-check-label" for="exampleRadios1">
					    Laki Laki
					  </label>
					</div>
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="jekel" value="Perempuan" <?=$radio2?>>
					  <label class="form-check-label">
					    Perempuan
					  </label>
					</div>
				</div>
				<div class="form-group">
					<label >Agama</label>
					<select class="form-control form-control-sm" name="agama">
					  <?=((!empty($item['agama']))?'<option style="background-color:orange;">'.$item['agama'].'</option>':'')?>
					  <option>Islam</option>
					  <option>Kristen</option>
					  <option>Katolik</option>
					  <option>Hindu</option>
					  <option>Budha</option>
					</select>
				</div>

				<div class="form-group">
					<label>Pekerjaan</label>
					<input type="text" class="form-control" name="pekerjaan" placeholder="input pekerjaan" value="<?=((!empty($item['pekerjaan']))?$item['pekerjaan']:'')?>">
				</div>

<!-- untuk button simpan kita kasi juga if -->


				<input type="submit" name="simpan" value="<?=((isset($_GET['nik']))?'Edit':'Simpan')?>" class="btn btn-primary btn-sm" style="float: right;">


	  		</div>
    </div>
	</form>
<!-- ------------------------------------------------------ -->


<!-- table ===============================================================-->


<hr>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nik</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Klamin</th>
      <th scope="col">tanggal Lahir</th>
      <th scope="col">alamat</th>
      <th scope="col">Agama</th>
      <th scope="col">Pekerjaan</th>
      <th scope="col">Edit</th>
      <th scope="col">Hapus</th>
    </tr>

  </thead>
  <tbody>
 <?php $i = 1; foreach ($Config->get_data('biodata') as $key => $value) {?>
    <tr>
      <th scope="row"><?=$i++?></th>
      <td><?=$value['nik']?></td>
      <td><?=$value['nama']?></td>
      <td><?=$value['jekel']?></td>
      <td><?=$value['tanggal_lahir']?></td>
      <th><?=$value['alamat']?></th>
      <td><?=$value['agama']?></td>
      <td><?=$value['pekerjaan']?></td>
      
      <td><a href="<?=base_url?>index.php?nik=<?=$value['nik']?>" class="btn btn-info btn-sm">Edit</a></td>
      <td><a href="<?=base_url?>hapus.php?nik=<?=$value['nik']?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item')">Hapus</a></td>
    </tr>
 <?php } ?>
  </tbody>
</table>



<!-- ------------------------------------------------------ -->




  </div>
</div>


</div>





<!-- --------------- -->


<footer style="height: 100px; background-color: #ccc; padding-top: 50px">
	<div class="text-center">
		ego oktafanda
	</div>
</footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?=base_url?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?=base_url?>assets/js/popper.min.js"></script>
    <script src="<?=base_url?>assets/js/bootstrap.min.js"></script>
  </body>
</html>