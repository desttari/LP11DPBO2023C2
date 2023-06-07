<?php
include_once($_SERVER['DOCUMENT_ROOT']."/lp11/MVP-01/kontrak/KontrakPasien.php");
include_once($_SERVER['DOCUMENT_ROOT']."/lp11/MVP-01/model/DB.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/lp11/MVP-01/model/Pasien.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/lp11/MVP-01/model/TabelPasien.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/lp11/MVP-01/presenter/ProsesPasien.php");

if (isset($_POST['hapus'])) {
    if (isset($_POST['idPasien'])) {
        $idPasien = $_POST['idPasien'];
        // Instantiate the ProsesPasien object
        $prosespasien = new ProsesPasien();
        // Delete the patient's data from the database
        $result = $prosespasien->hapusPasien($idPasien);

        if ($result) {
            // Redirect to the TampilPasien page after successful deletion
            header("Location: ../index.php");
            exit();
        } else {
            // Display an error message if deletion failed
            echo "<p class='text-danger'>Gagal menghapus data pasien.</p>";
        }
    }
}
