<?php
define("base_url", "http://localhost/crud/");
require_once("lib/config.php");

// instance object
$Config = new Config();

// koneksi  
$data = ["latuhan_crud","localhost","root",""];
$Config->setDatabase($data);
// --------------------------------------------

