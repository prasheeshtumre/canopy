<?php 
ini_set('display_errors',1);
// Include the qrlib file 
include 'qrlib.php'; 
$conn= mysqli_connect('localhost','emunicipal_smartnumber','hqGjzunbwxEy','emunicipal_smartnumber');

//$id=$_REQUEST['id'];
$id = 1103;
$sproviderid=1103;
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
$frame_Size = 10; 
  
// Generates QR Code and Stores it in directory given 
QRcode::png($text, $file, $ecc, $pixel_Size, $frame_Size); 

$fullpath="/phpqrcode/".$file;


  
// Displaying the stored QR code from directory 
//echo "<center><img src='".$file."'></center>"; 
$sql ="update properties_mst set qrCode='".$text."',qrPath='".$fullpath."',qrCodeStatus='1',onlyQr='".$text2."',QrRefNo='".$refno."' where id='".$id."'";

if(mysqli_query($conn,$sql))
{
    
    $sql ="select * from properties_mst where id='".$id."'";
   
    $rs = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($rs);
   
    
    require_once('tcpdf8/examples/tcpdf_include.php');
    require_once('tcpdf8/tcpdf.php');
    
    
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
        $img_file = 'pdf_bg.jpg';
        $this->Image($img_file, 0, 0, 10, 97, '', '', '', false, 300, '', false, false, 0);
        // restore auto-page-break status
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}
       

                // create new PDF document
                $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                
                // set margins
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
                
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
               
               
                $img_file = 'pdf_bg.jpg';
                $pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
                // add a page
                $pdf->AddPage();
                
               
                $html = '<p>
                <p>
<div  >
 

<table width="100%" border="1" cellpadding="0" cellspacing="0">
		<tr>
			<td> Residency </td>
		</tr>
		
		<tr>
			<td style="color:#000; font-size: 20px; font-weight: bold;"> Venakatshwara colony </td>
		</tr>
		
		<tr>
			<td style="color:#f10000; font-size: 27px; font-weight: bold;"> Renuka Sharma Jyoshi </td>
		</tr>
		
		<tr>
			<td>
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
				<td width="80%" valign="top">
					
					Door No <br>
					
					<span style="color:#000; font-size:30px; font-weight: bold;">  7-4-6   </span>
					
					
					</td>
				<td>
					<table width="100%">
						<tr>
							<td align="center"> <img src="qrcode.jpg" alt="qrcode" width="150"> </td>	
						</tr>
						<tr>
							<td align="center" style="color:#f10000; font-weight: bold; font-size: 25px;"> 1037017910 </td>	
						</tr>
						<tr>
							<td>  </td>	
						</tr>
					</table>
					
					</td>	
					
				</tr>	
				
		   </table>
			
			</td>
		</tr>
	</table>';
	
	
	
                
                $pdf->writeHTML($html, true, false, true, false, '');
                
                $path=$_SERVER['DOCUMENT_ROOT']."phpqrcode/".$dir."/";
                
                $filename=$path.$binname.".pdf";
                $savepath = "phpqrcode/".$dir."/".$binname.".pdf";
                
                
                $pdf->Output($filename, 'F');
    
                    $sql ="update properties_mst set pdfpath='".$savepath."' where id='".$id."'";
                    mysqli_query($conn,$sql);
    
    
    echo 1;
}
else
{
    echo 0;
}


?> 