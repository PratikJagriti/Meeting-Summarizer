<?php

$original = $_POST['original_txt'];
$summary = $_POST['summary'];

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require_once('C:\Users\madhu\Documents\Final Project Code\final\vendor\autoload.php');

// Create a new TCPDF object
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Generated PDF');
$pdf->SetSubject('Generated PDF using TCPDF');
$pdf->SetKeywords('TCPDF, PDF, example, generate');

// Add a page
$pdf->AddPage();

// Set font settings
$pdf->SetFont('times', '', 12);
//$original = 'All the PHP files on the fonts directory are subject to the general TCPDF license (GNU-LGPLv3), they do not contain any binary data but just a description of the general properties of a particular font. These files can be also generated on the fly using the font utilities and TCPDF methods.';
//$summary = 'All the original binary TTF font files have been renamed for compatibility with TCPDF and compressed using the gzcompress PHP function that uses the ZLIB data format (.z files)';

// Add content to the PDF
$pdf->WriteHTML('<h1>Original Text </h1> <p>' . $original .'</p>');
$pdf->WriteHTML('<h1>Summary </h1> <p>' . $summary .'</p>');
// Output the PDF as a file
$pdf->Output('generated_pdf.pdf', 'D');
?>