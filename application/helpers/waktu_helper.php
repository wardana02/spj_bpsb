 <?php 

  function waktu($tgl_tiba,$tgl_berangkat){  
    $kini = new DateTime($tgl_tiba);  
	$kemarin = new DateTime($tgl_berangkat);  	
			$jml = $kemarin->diff($kini)->format('%a');
			$jml = $jml+1;

    return $jml;
  }


 ?>                            

