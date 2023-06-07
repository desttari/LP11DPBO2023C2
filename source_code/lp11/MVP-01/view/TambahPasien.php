<?php
include_once($_SERVER['DOCUMENT_ROOT']."/lp11/MVP-01/presenter/ProsesPasien.php");
include_once($_SERVER['DOCUMENT_ROOT']."/lp11/MVP-01/kontrak/KontrakPasien.php");
// include_once("../presenter/ProsesPasien.php");
$prosesPasien = new ProsesPasien();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nik = $_POST["nikInput"];
    $nama = $_POST["namaInput"];
    $tempat = $_POST["tempatInput"];
    $tanggal_lahir = $_POST["tglLahirInput"];
    $gender = $_POST["genderInput"];
    $telepon = $_POST["teleponInput"];
    $email = $_POST["emailInput"];

    // // Membuat objek presenter
    // $prosesPasien = new ProsesPasien();

    // Memanggil fungsi tambahPasien untuk menyimpan data ke database
    $result = $prosesPasien->tambahPasien($nik, $nama, $tempat, $tanggal_lahir, $gender, $telepon, $email);

    if ($result) {
        // Jika data berhasil disimpan, redirect ke halaman sukses atau tampilan lainnya
        header("Location: ../index.php");
        exit();
    } else {
        // Jika terjadi kesalahan, redirect ke halaman error atau tampilan lainnya
        header("Location: error.html");
        exit();
    }
}

