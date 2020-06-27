<?php
define("base_url", "http://localhost/crud/");
require_once("lib/config.php");

// instance object
$Config = new Config();

// koneksi  
// koneksi  
//nama database latuhan_crud
//host database jika memakai xampp pakai localhost
//username database untuk xampp biasanya root
//password default xampp biasanya kosong
$data = ["latuhan_crud","localhost","root",""];
$Config->setDatabase($data);
// --------------------------------------------

