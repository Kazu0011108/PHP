<?php 
function write_data_to_csv(){
 $restaurants = [];
 $response = "hugahuga";

 if(isset($response["results"]["error"])){
     return print("エラーが発生しました!");
 }

 return print_r($restaurants);
}

write_data_to_csv();
?>