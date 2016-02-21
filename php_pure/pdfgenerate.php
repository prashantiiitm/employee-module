<?php
if ( isset( $_POST['data']) && $_POST['data'] != "" )
{
	$data=$_POST['data'];
}
else 
$data="<b> NO DATA PASSED </b>";
require 'pdfcrowd.php';
$client = new Pdfcrowd("prashant1232123", "d298da9ac7920f94460f6d8bf8643986");

try{
$pdf_from_html = $client->convertHtml($data);



    header("Content-Type: application/pdf");
    header("Cache-Control: no-cache");
    header("Accept-Ranges: none");
    header("Content-Disposition: inline; filename=\"salarysheet.pdf\"");

    echo $pdf_from_html;	
}
catch(PdfcrowdException $why)
{
    echo "Pdfcrowd Error: " . $why;
}
	
	
?>