<?php

include_once($_SERVER['DOCUMENT_ROOT']."/lp11/MVP-01/kontrak/KontrakPasien.php");
include_once($_SERVER['DOCUMENT_ROOT']."/lp11/MVP-01/presenter/ProsesPasien.php");

// include_once("../kontrak/KontrakPasien.php");

// include_once("../presenter/ProsesPasien.php");

class TampilPasien implements KontrakPasienView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$id = $this->prosespasien->getId($i);
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getTlp($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>
					<a href='addpasien.php?id_edit=".$this->prosespasien->getId($i)."' class='btn-sm btn-dark'>Edit</a>
					<a href='index.php?hapus=" . $id ."' class='btn-sm btn-dark' >Delete</a>
			</td>";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}
	function deletePasien($id)
	{
		$this->prosespasien->HapusPasien($id);
	}
}
