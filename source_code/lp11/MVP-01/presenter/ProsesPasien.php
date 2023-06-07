<?php

include_once($_SERVER['DOCUMENT_ROOT']."/lp11/MVP-01/kontrak/KontrakPasien.php");
include_once($_SERVER['DOCUMENT_ROOT']."/lp11/MVP-01/model/DB.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/lp11/MVP-01/model/Pasien.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/lp11/MVP-01/model/TabelPasien.class.php");

// include_once("../kontrak/KontrakPasien.php");
// include_once("../model/DB.class.php");
// include_once("../model/TabelPasien.class.php");

class ProsesPasien implements KontrakPasienPresenter
{
	private $tabelpasien;
	private $data = [];

	function __construct()
	{
		//konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "pasien"; // nama basis data
			$this->tabelpasien = new TabelPasien($db_host, $db_user, $db_password, $db_name); //instansi TabelPasien
			$this->data = array(); //instansi list untuk data Pasien
			//data = new ArrayList<Pasien>;//instansi list untuk data Pasien
		} catch (Exception $e) {
			echo "wiw error" . $e->getMessage();
		}
	}

	function prosesDataPasien()
	{
		try {
			//mengambil data di tabel pasien
			$this->tabelpasien->open();
			$this->tabelpasien->getPasien();
			while ($row = $this->tabelpasien->getResult()) {
				//ambil hasil query
				$pasien = new Pasien(); //instansiasi objek pasien untuk setiap data pasien
				$pasien->setId($row['id']); //mengisi id
				$pasien->setNik($row['nik']); //mengisi nik
				$pasien->setNama($row['nama']); //mengisi nama
				$pasien->setTempat($row['tempat']); //mengisi tempat
				$pasien->setTl($row['tl']); //mengisi tl
				$pasien->setGender($row['gender']); //mengisi gender
				$pasien->setTlp($row['telp']); //mengisi tl
				$pasien->setEmail($row['email']); //mengisi gender


				$this->data[] = $row; //tambahkan data pasien ke dalam list
			}
			//tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
	}

	function prosesDataPasienByID($id)
	{
		try {
			$this->tabelpasien->open();
			$this->tabelpasien->getPasienByID($id);
			$this->data[] = $this->tabelpasien->getResult();
			
		} catch (Exception $e) {
			//memproses error
			echo "wiw error part 3" . $e->getMessage();
		}
	}
	function getId($i)
	{
		//mengembalikan id Pasien dengan indeks ke i
		return $this->data[$i]['id'];
	}
	
	function getNik($i)
	{
		//mengembalikan nik Pasien dengan indeks ke i
		return $this->data[$i]['nik'];
	}
	function getNama($i)
	{
		//mengembalikan nama Pasien dengan indeks ke i
		return $this->data[$i]['nama'];
	}
	function getTempat($i)
	{
		//mengembalikan tempat Pasien dengan indeks ke i
		return $this->data[$i]['tempat'];
	}
	function getTl($i)
	{
		//mengembalikan tanggal lahir(TL) Pasien dengan indeks ke i
		return $this->data[$i]['tl'];
	}
	function getGender($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['gender'];
	}
	function getSize()
	{
		return sizeof($this->data);
	}
	function getTlp($i)
	{
		//mengembalikan nomor telepon Pasien dengan indeks ke i
		return $this->data[$i]['telp'];
	}
	function getEmail($i)
	{
		//mengembalikan email Pasien dengan indeks ke i
		return $this->data[$i]['email'];
	}


	function tambahPasien($nik, $nama, $tempat, $tanggal_lahir, $gender, $telepon, $email)
    {
        // Memanggil fungsi tambahPasien dari TabelPasien
        $this->tabelpasien->open();
        $result = $this->tabelpasien->tambahPasien($nik, $nama, $tempat, $tanggal_lahir, $gender, $telepon, $email);
        $this->tabelpasien->close();
        return $result;
    }

    // function updatePasien($id, $nik, $nama, $tempat, $tanggal_lahir, $gender, $telepon, $email)
    // {
    //     // Memanggil fungsi updatePasien dari TabelPasien
    //     $this->tabelpasien->open();
    //     $result = $this->tabelpasien->updatePasien($id, $nik, $nama, $tempat, $tanggal_lahir, $gender, $telepon, $email);
    //     $this->tabelpasien->close();
    //     return $result;
    // }
	function ubahData($id, $data)
	{
		$this->tabelpasien->open();
		$this->tabelpasien->update($id, $data);
		$this->tabelpasien->close();
	}
	function hapusPasien($id) {
		try {
			$this->tabelpasien->open();
			$this->tabelpasien->deletePasien($id);
			$this->tabelpasien->close();

			echo ("<script>location.href = 'index.php';</script>");
		} catch (Exception $e) {
				echo "Error: " . $e->getMessage();
		}
	}
   function getPasienById($id)
	{
		$this->tabelpasien->open();
		$result = $this->tabelpasien->getPasienById($id);
		$this->tabelpasien->close();
		return $result;
	}

}
