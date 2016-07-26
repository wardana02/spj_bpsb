<?php 


			function tospd($tanggal,$kd_bln,$no,$kode){
				 $tgl    = explode('-', $tanggal);
                        $no_spd = $no."/$kode/03/".$kd_bln."/".$tgl[0]."";


                  return $no_spd;

			}


?>


                        