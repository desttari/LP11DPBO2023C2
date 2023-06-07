<?php
include_once($_SERVER['DOCUMENT_ROOT']."/lp11/MVP-01/presenter/ProsesPasien.php");
include_once($_SERVER['DOCUMENT_ROOT']."/lp11/MVP-01/kontrak/KontrakPasien.php");

class DataPasien implements KontrakPasienView
{
	private $prosespasien; //presenter yang dapat berinteract langsung dengan view
	private $tpl;
	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}
	function tambahData($data)
	{
		$this->prosespasien->tambahData($data);
	}
	function hapusData($id)
	{
		$this->prosespasien->hapusData($id);
	}
	function ubahData($id, $datapasien)
	{
		$this->prosespasien->ubahData($id, $datapasien);
	}
	function tampil()
	{
		$ACTION_FORM = "addpasien.php";
		$ACTION_BUTTON = "add";
        $TOMBOL ="SIMPAN";
        $FORM_DATA ="Tambah";
        $DATA_GENDER = "-";
		

		$this->tpl->replace("ACTION_FORM", $ACTION_FORM);
		$this->tpl->replace("DATA_NIK", "");
        $this->tpl->replace("DATA_NAMA", "");
        $this->tpl->replace("DATA_TEMPAT", "");
        $this->tpl->replace("DATA_TL", "");
        $this->tpl->replace("DATA_GENDER", "$DATA_GENDER");
        $this->tpl->replace("DATA_EMAIL", "");
        $this->tpl->replace("DATA_TELP", "");
		$this->tpl->replace("ACTION_BUTTON", $ACTION_BUTTON);
        $this->tpl->replace("TOMBOL", $TOMBOL);
        $this->tpl->replace("FORM_DATA", $FORM_DATA);
		$this->tpl->write();
	}
	function tampilEdit($id)
	{
		$this->prosespasien->prosesDataPasienByID($id);
		$ACTION_FORM = "addpasien.php?id_edit=".$this->prosespasien->getId(0);
		$ACTION_BUTTON = "update";
        $TOMBOL ="Edit";
        $FORM_DATA ="Edit";
		$this->tpl = new Template("templates/skinEdit.html");

		$this->tpl->replace("ACTION_FORM", $ACTION_FORM);
		$this->tpl->replace("DATA_NIK", $this->prosespasien->getNik(0));
        $this->tpl->replace("DATA_NAMA", $this->prosespasien->getNama(0));
        $this->tpl->replace("DATA_TEMPAT", $this->prosespasien->getTempat(0));
        $this->tpl->replace("DATA_TL", $this->prosespasien->getTl(0));
		$this->tpl->replace("DATA_GENDER", $this->prosespasien->getGender(0));
        $this->tpl->replace("DATA_EMAIL", $this->prosespasien->getEmail(0));
        $this->tpl->replace("DATA_TELP", $this->prosespasien->getTlp(0));
		$this->tpl->replace("ACTION_BUTTON", $ACTION_BUTTON);
        $this->tpl->replace("TOMBOL", $TOMBOL);
        $this->tpl->replace("FORM_DATA", $FORM_DATA);
		$this->tpl->write();
	}
}

