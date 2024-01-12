<?php
$conn= mysqli_connect('localhost','emunicipal_smartnumber','hqGjzunbwxEy','emunicipal_smartnumber');

$ulbsmartcode="082";

$sql ="SELECT * FROM `properties_mst` where ulb_code='".$ulbsmartcode."' and id='1103'";

$rs = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($rs)){
    
          $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';

         $randam_string = substr(str_shuffle($permitted_chars), 0, 6);
    
          $url = "https://sn.emunicipal.in/ts/".$ulbsmartcode."/".$randam_string;
          
          echo $sql ="update properties_mst set unique_string='".$randam_string."', url='".$url."' where id='".$row['id']."'";
          mysqli_query($conn,$sql);
          
          
    
}
?>