<?php 
ini_set('display_errors',1);
// Include the qrlib file 
include 'qrlib.php'; 
$conn= mysqli_connect('localhost','qrzoom_canopy_qr_module','QWDbIwo3ep*h','qrzoom_canopy_qr_module');

//$id=$_REQUEST['id'];
// $id = 1103;
// $sproviderid=1103;
// $dir = $id;
// if( is_dir($dir) === false )
// {
//     mkdir($dir);
// }
// $dir2 = $sproviderid."/images";
// if( is_dir($dir2) === false )
// {
//     mkdir($dir2);
// }

$dir2 = "../admin/public/canopy_qr_code";
$id = 2;
$sql ="SELECT * FROM `users` WHERE `qr_path` IS NULL";
$rs = mysqli_query($conn,$sql);
//$row = mysqli_fetch_assoc($rs);
while($row = mysqli_fetch_assoc($rs)){
            $rand = rand(10000,9999999);
            $text = $row['qr_link'];
            $text2=$row['uuid'];
            $f = str_replace(" ",'_',$row['id']);
            $f = str_replace(",",'_',$f);
            $f = str_replace(".",'_',$f);
            //$binname = $row['id']."_".$row['ulbid']."_".$row['bin_name'];
            // $binname = $row['id']."_".$row['uuid']."_".$f;
             $binname = $row['card_no'];
            
            $refno = rand(10000,9999999);
              
            // $path variable store the location where to  
            // store image and $file creates directory name 
            // of the QR code file by using 'uniqid' 
            // uniqid creates unique id based on microtime 
            $path = $dir2.'/'; 
             $file = $path.$binname.".jpg"; 
            
              
            // $ecc stores error correction capability('L') 
            $ecc = 'L'; 
            $pixel_Size = 10; 
            $frame_Size = 10; 
              
            // Generates QR Code and Stores it in directory given 
            QRcode::png($text, $file, $ecc, $pixel_Size, $frame_Size); 
            
            // $fullpath=$file;
           $fullpath = "canopy_qr_code/".$binname.".jpg"; 
            
              
            // Displaying the stored QR code from directory 
            //echo "<center><img src='".$file."'></center>"; 
            echo $sql ="update users set qr_path='".$fullpath."', status='1' where uuid='".$row['uuid']."' ";
         //   echo "<br>";
            $rs2 = mysqli_query($conn,$sql);
            
}


?> 