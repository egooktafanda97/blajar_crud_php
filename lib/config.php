<?php
// ego oktafanda
class Config{
	public $db_name 		= "";
	public $db_host 		= "";
	public $db_username 	= "";
	public $db_pass 		= "";

	public function setDatabase($data){
		$this->db_name		= $data[0];
		$this->db_host		= $data[1];
		$this->db_username	= $data[2];	 
		$this->db_pass 		= $data[3];
	}

	public function koneksi(){
		// isi nama host, username mysql, dan password mysql anda
		$host = mysqli_connect($this->db_host,$this->db_username,$this->db_pass,$this->db_name);
		 
		if($host){
			return $host;
		}else{
			return false;
		}

	}

	public function insert($table,$value,$auto = false){
		$data_ ="";
		for ($i=0; $i < count($value); $i++) {
			$data_ .= "'".$value[$i]."',"; 
		}
		if($auto == true){
			$query = "INSERT INTO ".$table." VALUES (NULL,".substr($data_, 0, -1).")";
		}else{
			$query = "INSERT INTO ".$table." VALUES (".substr($data_, 0, -1).")";
		}
		
	 	if(mysqli_query($this->koneksi(),$query)){
	 		return true;
	 	}else{
	 		return false;
	 	}
	}
	public function get_data($table,$param = array()){

		if(!empty($param)){
			$data_ = "";
			foreach ($param as $key => $value) {
				$data_ .= $key."='".$value."', ";
			}
			$query = "SELECT * FROM $table WHERE ".substr($data_, 0, -2);	
		}else{
			$query = "SELECT * FROM $table";
		}
		
		$qr = mysqli_query($this->koneksi(),$query);
		$result = array();
		while ($res = mysqli_fetch_assoc($qr)) {
			array_push($result, $res);
		}
		return $result;
	}

	public function get_oneItem($table,$param = array()){

		if(!empty($param)){
			$data_ = "";
			foreach ($param as $key => $value) {
				$data_ .= $key."='".$value."', ";
			}
			$query = "SELECT * FROM $table WHERE ".substr($data_, 0, -2);	
		}else{
			$query = "SELECT * FROM $table";
		}
		
		$qr = mysqli_query($this->koneksi(),$query);
		$res = mysqli_fetch_assoc($qr);
		return $res;
	}

	public function update($table,$data = array(),$where = array()){
		$where_ = "";
		foreach ($where as $key => $value) {
			$where_ .= $key."='".$value."', ";
		}
		$data_ = "";
		foreach ($data as $key => $value) {
			$data_ .= $key."='".$value."', ";
		}

		$query = "UPDATE $table SET ".substr($data_, 0, -2)." where ".substr($where_, 0, -2);

		if($qr = mysqli_query($this->koneksi(),$query)){
			return true;
		}else{
			return false;
		}
	}

	public function delete($table,$where){
		$where_ = "";
		foreach ($where as $key => $value) {
			$where_ .= $key."=".$value.", ";
		}

		$query = "DELETE FROM $table where ".substr($where_, 0, -2);
		if($qr = mysqli_query($this->koneksi(),$query)){
			return true;
		}else{
			return false;
		}
	}
}



// $Config = new Config();

// $data = ["latuhan_crud","localhost","root",""];
// $Config->setDatabase($data);







// //get Data 1 result
// $data = [
// 	'nama' => 'egi purwanda'
// ];
//$Config->get_oneItem('biodata',$data));





//// query delete
// $data = [
// 	'nik' => '160210014'
// ];

// var_dump($Config->delete('biodata',$data));








// // update
// $data  = [
// 	'nama'  => '',
// 	'jekel' => 'Perempuan'
// ];

// $where = [
// 	'nik' => '160210014'
// ];

// var_dump($Config->update('biodata',$data,$where));







// // get Data
// $data = [
// 	'nama' => 'egi purwanda'
// ];


// foreach ($Config->get_data('biodata',$data) as $key => $value) {
// 	var_dump($value['nama']);
// }

// cara lihat data;




// cara insert  data;
// $data = [
// 	'160210014',
// 	'ego oktafanda',
// 	'1997-10-30',
// 	'sungailangsat pangean',
// 	'laki-laki',
// 	'islam',
// 	'mahasiswa'
// ];

// var_dump($Config->insert("biodata",$data));
