<?php 


		    function hitung($n){
			    $hasil = "";
			    $angka = array("Nol","Satu","Dua","Tiga","Empat","Lima","Enam","Tujuh","Delapan",
			    	"Sembilan","Sepuluh","Sebelas","Duabelas","Tigabelas","Empatbelas","Limabelas");

			    if(array_key_exists($n,$angka)){
			      $hasil = $angka[$n];
			      }
			      else {
			      	$hasil = "Nol";
			      }
			    
			    return $hasil;
			  }
?>