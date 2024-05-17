<?php
//============================================================+
// File name   : example_050.php
// Begin       : 2009-04-09
// Last Update : 2013-05-14
//
// Description : Example 050 for TCPDF class
//               2D Barcodes
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: 2D barcodes.
 * @author Nicola Asuni
 * @since 2008-03-04
 * @group barcode
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).
require_once('../TCPDF/examples/tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('TCPDF Example 050');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

$PDF_HEADER_TITLE = "Titulo del PDF";
$PDF_HEADER_STRING = "";
// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, 90, " " . '', $PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// NOTE: 2D barcode algorithms must be implemented on 2dbarcode.php class file.


// set font
$pdf->setFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

$pdf->Write(0, 'FICHA MEDICA', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 10);

$txtorden = $_GET['txtorden'];;
$txtpaciente = $_GET['txtpaciente'];;
$txtempresa = $_GET['txtempresa'];;
$txtparentesco = $_GET['txtparentesco'];;
$txtmedico = $_GET['txtmedico'];;
$txtespecialidad = $_GET['txtespecialidad'];;
$txtdia = $_GET['txtdia'];;
$txtturno =$_GET['txtturno'];;
$html ='
<!-- EXAMPLE OF CSS STYLE -->
<style>
    table.first {
        font-family: helvetica;
        border-color:white;
    }
    td {
        border: 2px solid white;
    }
    td.second {
        border: 2px dashed white;
    }
    div.test {
        background-color: white;
        font-family: helvetica;
        font-size: 10pt;
        border-color: white;
        text-align: center;
    }
</style>

</div>

<br />

<table class="first" cellpadding="4" cellspacing="6">
 <tr>
  <td width="140" align="center"><b>No. DE ORDEN : </b></td>
  <td width="200" class"second"><b>'.$txtorden.'</b></td>
 </tr>
 <tr> <tr>
 <td width="140" align="center">PARENTESCO</td>
 <td width="200"  class="second">'.$txtparentesco.'</td>
</tr>
  <td width="140" align="center">PACIENTE : </td>
  <td width="200"  class="second">'.$txtpaciente.'</td>
 </tr>
 <tr>
  <td width="140" align="center">EMPRESA : </td>
  <td width="200"  class="second">'.$txtempresa.'</td>
 </tr>
 <tr>
  <td width="140" align="center">PARENTESCO : </td>
  <td width="200"  class="second">'.$txtparentesco.'</td>
 </tr>
 <tr>
  <td width="140" align="center">MEDICO : </td>
  <td width="200"  class="second">'.$txtmedico.'</td>
 </tr>
 <tr>
  <td width="140" align="center">ESPECIALIDAD : </td>
  <td width="200"  class="second">'.$txtespecialidad.'</td>
 </tr>
 <tr>
  <td width="140" align="center">DIA : </td>
  <td width="200"  class="second">'.$txtdia.'</td>
 </tr>
 <tr>
 <td width="140" align="center">TURNO : </td>
 <td width="200"  class="second">'.$txtturno.'</td>
</tr>
</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->writeHTML($tbl, true, false, false, false, '');

// set style for barcode
$style = array(
    'border' => 2,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

// QRCODE,L : QR-CODE Low error correction
$mensajeQr = "Orden:".$txtorden."\n" ."Parentesco:".$txtparentesco."\n" . "Paciente:".$txtpaciente."-Empresa:".$txtempresa." \n" ."Medico:".$txtmedico."-".$txtespecialidad."\n" . "Fecha:".$txtdia."-".$txtturno;


// QRCODE,M : QR-CODE Medium error correction
$pdf->write2DBarcode($mensajeQr, 'QRCODE,M', 130, 50, 50, 50, $style, 'N');


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('fichamedica.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
