<?php 

ini_set('display_errors',0);
// Include the qrlib file 
include 'qrlib.php'; 
include('../API/connection.php');
$id=1;
$id=$_REQUEST['numQRCode'];
$id=1;
if($id > 50)
{
    die('Maximum qr code limit is 50 .');
}
$sproviderid = 75;


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

for($i=1;$i<=$id;$i++)
{

 $binname = rand(10000,99999999);
  
// $path variable store the location where to  
// store image and $file creates directory name 
// of the QR code file by using 'uniqid' 
// uniqid creates unique id based on microtime 
$path = $dir2; 
$file = $path."/test"."jpg"; 
$text = rand(10000,99999);
$text2 = "https://egovindia.in/cfcms/API/checkUserType.php?id=".$text;
  
// $ecc stores error correction capability('L') 
$ecc = 'L'; 
$pixel_Size = 10; 
$frame_Size = 10; 
  
// Generates QR Code and Stores it in directory given 
QRcode::png($text2, $file, $ecc, $pixel_Size, $frame_Size); 

$fullpath="/phpqrcode/".$file;

//file_put_contents('imagetest.txt',$fullpath);
  
// Displaying the stored QR code from directory 
//echo "<center><img src='".$file."'></center>"; 

    
   
    
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
                $pdf->SetMargins(PDF_MARGIN_LEFT, 10, 10);
                // add a page
                $pdf->AddPage();
                
                
                
                $html = '<div style="background-color:#0188d5;"> <img src="images/ghmc-logo.png" width="1000"></div>
  <div>&nbsp;</div>
 <div style="text-align:center; font-size:14px; margin-top:20px;">Scan the below QR to share your feedback</div>
 <div><img src="images/qrcode_scan.png" width="500"> </div>
 <br><br>
<div style="text-align:center;">
	 <img src="images/qr-code.png" width="180">
</div>
 <br>
<br>
  <div style="text-align:center;">
	 <img src="images/howtofeedback.jpg" width="1000">
</div>
 
  <div>&nbsp;</div>
 
 
 <div >
	 
		<table border="0" cellpadding="0" cellspacing="0" width="100%;"  >
				<tr>
					<td style="text-align:center;">
					<div><img src="images/icon1.png" width="40"></div>
					<div>Scan QR</div>
					<div><img src="images/qr_code.png" width="100"></div>
					</td>
					<td style="text-align:center;">
					<div><img src="images/icon2.png" width="40"></div>
					<div>Share your feedback </div>
					<div> <img src="images/feedback.png" width="120"> </div>
					</td>
					<td style="text-align:center;">
					<div><img src="images/icon3.png" width="40"></div>
					<div>Give your Suggestions</div>
					<div> <img src="images/suggestions.png" width="80"> </div>
					</td>
				</tr>
		</table>
	 
</div>
 
 <div>&nbsp;</div>
  
  
 <div style="text-align:center; margin-top:50px; "> To scan, use Mobile Camera or Google Lens or any Barcode / QRcode Scanner. <br> <br>
  <img src="images/bot_te.png" width="400">
 </div>
 
 
 <hr>
 <br> <br> <br>
 
 <div style="margin-top:30px;">
 <table>
		<tr>
			<td width="50%" style="text-align:right;"> Powered by </td>
			<td width="50%">  <img src="images/vmax.png" width="50">  </td>
		</tr>
</table>
</div>
 
                ';
                
                $pdf->writeHTML($html, true, false, true, false, '');
                
                $path=$_SERVER['DOCUMENT_ROOT']."cfcms/phpqrcode/".$dir3."/";
                
                echo $filename=$path."test".".pdf";
                $savepath = "phpqrcode/".$dir3."/test".".pdf";
                
                
                $pdf->Output($filename, 'F');
    
                    
    
    
}



?> 