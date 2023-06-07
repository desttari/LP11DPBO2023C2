<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

include_once("model/Template.class.php");
include_once("model/DB.class.php");
include_once("model/Pasien.class.php");
include_once("model/TabelPasien.class.php");
include_once("view/TampilPasien.php");
include_once("view/TambahPasien.php");
// include_once("view/EditPasien.php");


$tp = new TampilPasien();
$data = $tp->tampil();

if (!empty($_GET['hapus'])) {
  $id = $_GET['hapus'];
  $data = $tp->deletePasien($id);
}
else if (isset($_GET['edit'])) {
    $tp->tampilEdit($_GET['edit']);
}

