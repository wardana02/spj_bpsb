<?php 


			function tost($tanggal,$kd_bln,$no,$kode){
				 $tgl    = explode('-', $tanggal);
                        $no_st  = $no."/ST/$kode/".$kd_bln."/".$tgl[0]."";


                 return $no_st;

			}


?>