<?php 

ini_set('display_errors',0);
// Include the qrlib file 
include 'qrlib.php'; 
include('../API/connection.php');
$PropertyIds = $_REQUEST['PropertyIds'];

$id=$_REQUEST['numQRCode'];
if($id > 50)
{
    die('Maximum qr code limit is 50 .');
}
$sproviderid = $_REQUEST['sproviderid'];
$zoneid = $_REQUEST['zoneid'];


$dir = $sproviderid;
if( is_dir($dir) === false )
{
    mkdir($dir);
}

$dir2 = $sproviderid."/images";
if( is_dir($dir2) === false )
{
    mkdir($dir2);
}
$dir3 = $sproviderid."/images/pdf_files";
if( is_dir($dir3) === false )
{
    mkdir($dir3);
}

foreach($PropertyIds as $key=>$id)
{
   $refno='';
$sql ="select * from properties_mst where id='".$id."'";
$rs = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($rs);
$rand = rand(10000,9999999);
$text = "https://egovindia.in/d2dcpms/API/checkUserType.php?id=".$rand;
$text2=$rand;
$f = str_replace(" ",'_',$row['bin_name']);
$f = str_replace(",",'_',$f);
$f = str_replace(".",'_',$f);
//$binname = $row['id']."_".$row['ulbid']."_".$row['bin_name'];
$binname = $row['id']."_".$row['circle_id']."_".$f;
$refno = rand(10000,9999999);
  
// $path variable store the location where to  
// store image and $file creates directory name 
// of the QR code file by using 'uniqid' 
// uniqid creates unique id based on microtime 
$path = $dir2; 
$file = $path.$binname.".jpg"; 

  
// $ecc stores error correction capability('L') 
$ecc = 'L'; 
$pixel_Size = 10; 
$frame_Size = 10; 
  
// Generates QR Code and Stores it in directory given 
QRcode::png($text, $file, $ecc, $pixel_Size, $frame_Size); 

$fullpath="/phpqrcode/".$file;

file_put_contents('imagetest.txt',$fullpath);
  
// Displaying the stored QR code from directory 
//echo "<center><img src='".$file."'></center>"; 
$sql ="update properties_mst set qrCode='".$text."',qrPath='".$fullpath."',qrCodeStatus='1',onlyQr='".$text2."',QrRefNo='".$refno."' where id='".$id."'";
if(mysqli_query($conn,$sql))
{
    
    $sql ="select * from properties_mst m, ulb_mst u where  m.circle_id=u.ulbid and m.id='".$id."'";
    $rs = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($rs);
    
    require_once('tcpdf/examples/tcpdf_include.php');
    require_once('tcpdf/tcpdf.php');

        require_once('tcpdf/examples/tcpdf_include.php');
        require_once('tcpdf/tcpdf.php');

                // create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                
                // set margins
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                
                // set auto page breaks
                //$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
                
                // set image scale factor
                //$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
                
                // set some language-dependent strings (optional)
                if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                	require_once(dirname(__FILE__).'/lang/eng.php');
                	$pdf->setLanguageArray($l);
                }
                
                // ---------------------------------------------------------
                
                // set font
                $pdf->SetFont('dejavusans', '', 10);
                $pdf->SetPrintHeader(false);
                $pdf->SetPrintFooter(false);
                $pdf->SetMargins(PDF_MARGIN_LEFT, 5);
                // add a page
                $pdf->AddPage();
                $html = '<p>
                <p>
<div  >
 

<table width="100%">
<tr>
<td align="center" width="100%"> <img src="images/ghmc-logo.png" style="width:1000px;"> </td>
 
</tr>
</table>
<br>
<br><br> 
<table width="100%" align="center"  >
<tr>
<td style="font-size:10px;">Circle <br> <img src="t4.png" width="50"><br>
'.$row['ulbname'].'-'.$row['circle_no'].'
</td>
<td style="font-size:10px;">Bin Property Name <br><img src="t3.png" width="150"><br>
'.$row['PropertyName'].'
</td>
</tr>
</table>

<br><br><br><br>

<table width="100%" align="center" style="text-align: center;">
<tr>
<td style="font-size:13px;">
<img src="t1.png" width="350"><br>
Scan this QR Code in your SmartBin Application 
</td>
</tr>
</table>

<br><br>';

$html.='<div style="text-align:center; font-size:13px;"> Ref.No: '.$refno.'</div>';

$html.='<table width="100%" align="center" style="text-align: center;">
<tr>
<td style="font-size:14px;">
<img src="https://egovindia.in/d2dcpms/'.$fullpath.'" width="300"  style="margin-top: 5px;">
</td>
</tr>
</table>

<div style="font-family: "Ramabhadra", sans-serif;">
 <img src="t2.png" >
</div>

 
 <div style="font-size:11px;   margin:auto; text-align:center; ">
  
  <img src="images/VMax-logo.png" width="80">
   
</div>
 


</div>';
                
                $pdf->writeHTML($html, true, false, true, false, '');
                
                $path=$_SERVER['DOCUMENT_ROOT']."d2dcpms/phpqrcode/".$dir."/";
                
                $filename=$path.$binname.".pdf";
                $savepath = "phpqrcode/".$dir."/".$binname.".pdf";
                
                
                $pdf->Output($filename, 'F');
    
                    $sql ="update properties_mst set pdfpath='".$savepath."' where id='".$id."'";
                    mysqli_query($conn,$sql);
}
}



?> 