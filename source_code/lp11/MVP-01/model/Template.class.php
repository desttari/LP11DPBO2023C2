<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/




class Template{
	private $filename = '';
    private $content = '';

	public function __construct($filename = '') {
        $this->filename = $filename;
        $this->content = file_get_contents($filename);
    }

	public function clear(){
		// membersihkan isi kode yang seharusnya diganti
		// mengganti tulisan Data_... dengan kosong jika ada yang lupa untuk diganti
		// jika  tidak ingin menggunakan kode DATA_... dapat diganti di bagian pola ekspresi reguler
		$this->content = preg_replace("/DATA_[A-Z|_|0-9]+/", "", $this->content);

	}

	public function write() {
        $this->clear();
        echo $this->content;
    }

    public function getContent() {
        $this->clear();
        return $this->content;
    }

	public function replace($old = '', $new = ''){
		// mengganti kode dalam file (DATA_...)
		// pemrosesan nilai yang akan menggantikan
		if(is_int($new)){
			// jika penggantinya bilangan bulat (diubah ke formatnya ke teks)
			$value = sprintf("%d", $new);

		}elseif(is_float($new)){
			// jika penggantinya bilangan real *diubah formatnya ke teks
			$value = sprintf("%f", $new);
		}elseif(is_array($new)){
			// jika penggantinya bilangan array/tabel *diubah formatnya ke teks
			$value = '';
			// pemrosesan setiap elemen array/tabel
			foreach( $new as $item){
				$value .= $item. '';
			}

		}else{
			// jika selain tipe yang ada diatas maka langsung diisikan untuk menggantikan
			$value = $new;
		}

		// menggantikan suatu teks dengan teks baru (misal DATA_... diganti dengan <table> </table>)
		$this->content = preg_replace("/$old/",  $value, $this->content);

	}
}
