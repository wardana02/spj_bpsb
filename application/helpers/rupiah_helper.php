 <?php 

  function rupiah($angka){  
    $angka = number_format($angka); 
    $angka = str_replace(',', '.', $angka); 
    $angka ="$angka"; 

    return $angka;
  }


 ?>                            

