<?php
ini_set('display_errors',0);
include 'qrlib.php'; 
$conn= mysqli_connect('localhost','emunicipal_smartnumber','hqGjzunbwxEy','emunicipal_smartnumber');

//$id=$_REQUEST['id'];
$id = 1100;
$sproviderid=1100;
$dir = $id;
if( is_dir($dir) === false )
{
    mkdir($dir);
}
$dir2 = $sproviderid."/images";
if( is_dir($dir2) === false )
{
    mkdir($dir2);
}
$sql ="select * from properties_mst where id='".$id."'";
$rs = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($rs);
$rand = rand(10000,9999999);
$text = $row['url'];
$text2=$row['unique_string'];
$f = str_replace(" ",'_',$row['assesment_no']);
$f = str_replace(",",'_',$f);
$f = str_replace(".",'_',$f);
//$binname = $row['id']."_".$row['ulbid']."_".$row['bin_name'];
 $binname = $row['id']."_".$row['assesment_no']."_".$f;


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
$frame_Size = 0; 
  
// Generates QR Code and Stores it in directory given 
QRcode::png($text, $file, $ecc, $pixel_Size, $frame_Size); 

$fullpath="/phpqrcode/".$file;


  
// Displaying the stored QR code from directory 
//echo "<center><img src='".$file."'></center>"; 
$sql ="update properties_mst set qrCode='".$text2."',qrPath='".$fullpath."',qrCodeStatus='1',onlyQr='".$text2."',QrRefNo='".$refno."' where id='".$id."'";
if(mysqli_query($conn,$sql))
{
    
    $sql ="select * from properties_mst where id='".$id."'";
   
    $rs = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($rs);
   
    
    

require_once('tcpdf8/examples/tcpdf_include.php');
require_once('tcpdf8/examples/tcpdf_include.php');
    require_once('tcpdf8/tcpdf.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->SetAutoPageBreak(false, 0);
        // set bacground image
        $img_file = 'siddipetnew.png';
        $this->Image($img_file, 0, 0, 200, 210, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}

// create new PDF document
$your_width="200";
$your_height="210";

$custom_layout = array($your_width, $your_height);
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, $custom_layout, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 051');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(5, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

$pdf->SetHeaderMargin(0);
$pdf->SetFooterMargin(0);

// remove default footer
$pdf->setPrintFooter(false);

// set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('aealarabiya', '', 20);

// add a page
$pdf->AddPage();

// Print a text
$html = '<p></p><p></p>
            
<div  >
 
        	<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody>
  <tr>
  <td height="125"></td>
  </tr>
    <tr  align="center">
      <td style="color:#f10000; font-weight: bold; font-size: 25px;"><b>'.$row['assesment_no'].'  </b> </td>
    </tr>
    <tr align="center">
      <td style="color:#f10000; font-size: 18px; font-weight: bold;">'.$row['owner_name'].' </td>
    </tr>
    
    <tr align="center">
      <td style="color:#000; font-size:18px; font-weight: bold; height:20px;">H.No: '.$row['door_no'].' </td>
    </tr>
    
     
    <tr align="center">
      <td style="height:10px;"> 
      <table width="100%" border="0">
      <tr>
      <td><img src="'.$fullpath.'" alt="qrcode" width="200"></td> 
      </tr>
      </table>
      </td> 
    </tr>
    
  </tbody>
</table>

	';
	
$pdf->writeHTML($html, true, false, true, false, '');
                
                $path=$_SERVER['DOCUMENT_ROOT']."phpqrcode/".$dir."/";
                
                $filename=$path.$binname.".pdf";
                $savepath = "phpqrcode/".$dir."/".$binname.".pdf";
                
                
                $pdf->Output($filename, 'F');
    
                    $sql ="update properties_mst set pdfpath='".$savepath."' where id='".$id."'";
                    mysqli_query($conn,$sql);
}

//============================================================+
// END OF FILE
//============================================================+