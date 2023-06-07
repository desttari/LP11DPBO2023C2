<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

class TabelPasien extends DB
{
	function __construct($host, $user, $password, $database)
    {
        // Memanggil konstruktor DB dengan parameter koneksi yang benar
        parent::__construct($host, $user, $password, $database);
    }
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}
    function getPasienById($id)
    {
        // Query mysql select data pasien berdasarkan ID
        $query = "SELECT * FROM pasien WHERE id=$id";
        // Mengeksekusi query
        return $this->execute($query);
    }

	function tambahPasien($nik, $nama, $tempat, $tanggal_lahir, $gender, $telepon, $email)
    {
        // Query mysql insert data pasien
        $query = "INSERT INTO pasien (nik, nama, tempat, tl, gender, telp, email) VALUES ('$nik', '$nama', '$tempat', '$tanggal_lahir', '$gender', '$telepon', '$email')";
        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $nik = $data['nik'];
        $nama = $data['nama'];
        $tempat = $data['tempat'];
        $tl = $data['tl'];
        $gender = $data['gender'];
        $email = $data['email'];
        $telp = $data['telp'];

        
        $query = "UPDATE pasien SET nik='$nik', nama='$nama', tempat='$tempat', tl='$tl', gender='$gender', email='$email', telp='$telp' WHERE id='$id'";

        return $this->execute($query);
    }

    function deletePasien($id)
	{
		// Query mysql delete data pasien
		$query = "DELETE FROM pasien WHERE id=$id";
		// Mengeksekusi query
		return $this->execute($query);
	}
}
