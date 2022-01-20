<?php 
 $data = [1, 2, "A"];
  foreach($data as &$d){
      print($d + 1);
  }
?>