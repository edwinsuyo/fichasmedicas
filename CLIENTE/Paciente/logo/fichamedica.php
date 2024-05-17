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

$PDF_HEADER_TITLE="Titulo del PDF";
$PDF_HEADER_STRING="SEgunda linea";
// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, " ".' 050', $PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
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

$txtorden=1;
$txtpaciente='jose maria';
$txtempresa='empresa';
$txtparentesco='titular';
$txtmedico='jose antonio gomez';
$txtespecialidad='pediatria';
$txtdia='Jueves, 28 Septiembre 2023';
$txtturno='Mañana';
$html = '
<div class="container">
  <div class="row">
    <div class="col">
      Columna eewq
    </div>
    <div class="col">
      Columna
    </div>
    <div class="col">
      Columna
    </div>
  </div>
</div>
<div class="field item form-group">
    <label
        class="col-form-label col-md-3 col-sm-3  label-align badge badge-light">N°
        DE ORDEN<span class="required">:</span></label>
    <div class="col-md-12 col-sm-6">
        <FONT SIZE=3.5>
            <p class="badge badge-light" id="txtorden" name="txtorden">'.$txtorden.'
            </p>
        </FONT>
    </div>
</div>
<div class="field item form-group">
    <label
        class="col-form-label col-md-3 col-sm-3  label-align badge badge-light">PACIENTE<span
            class="required">:</span></label>
    <div class="col-md-12 col-sm-6">
        <FONT SIZE=3.5>
            <p class="badge badge-light" id="txtpaciente"
                name="txtpaciente">'.$txtpaciente.'
            </p>
        </FONT>
    </div>
</div>
<div class="field item form-group">
    <label
        class="col-form-label col-md-3 col-sm-3  label-align badge badge-light">EMPRESA<span
            class="required">:</span></label>
    <div class="col-md-12 col-sm-6">
        <FONT SIZE=3.5>
            <p class="badge badge-light" id="txtempresa"
                name="txtempresa"> '.$txtempresa.'
            </p>
        </FONT>
    </div>
</div>
<div class="field item form-group">
    <label
        class="col-form-label col-md-3 col-sm-3  label-align badge badge-light">PARENTESCO<span
            class="required">:</span></label>
    <div class="col-md-12 col-sm-6">
        <FONT SIZE=3.5>
            <p class="badge badge-light" id="txtparentesco"
                name="txtparentesco"> '.$txtparentesco.'
            </p>
        </FONT>
    </div>
</div>
<div class="field item form-group">
    <label
        class="col-form-label col-md-3 col-sm-3  label-align badge badge-light">MEDICO<span
            class="required">:</span></label>
    <div class="col-md-12 col-sm-6">
        <FONT SIZE=3.5>
            <p class="badge badge-light" id="txtmedico"
                name="txtmedico">'.$txtmedico.'
            </p>
        </FONT>
    </div>
</div>
<div class="field item form-group">
    <label
        class="col-form-label col-md-3 col-sm-3  label-align badge badge-light">ESPECIALIDAD<span
            class="required">:</span></label>
    <div class="col-md-12 col-sm-6">
        <FONT SIZE=3.5>
            <p class="badge badge-light" id="txtespecialidad"
                name="txtespecialidad"></p> '.$txtespecialidad.'
        </FONT>

    </div>
</div>
<div class="field item form-group">
    <label
        class="col-form-label col-md-3 col-sm-3  label-align badge badge-light">DIA
        <span class="required">:</span></label>
    <div class="col-md-12 col-sm-6">
        <FONT SIZE=3.5>
            <p class="badge badge-light" id="txtdia" name="txtdia"></p>
        </FONT>
    </div>
</div>

<div class="field item form-group">
    <label
        class="col-form-label col-md-3 col-sm-3  label-align badge badge-light">TURNO<span
            class="required">:</span></label>
    <div class="col-md-6 col-sm-6">
        <FONT SIZE=3.5>
            <p class="badge badge-light" id="txtturno" name="txtturno">'.$txtturno.'
            </p>
        </FONT>
    </div>
    <div class="col-md-6 col-sm-6">
        <div id="qrcode"
            style="width:100px; height:100px; margin-top:15px;">
        </div>
    </div>
</div>
</form>
</div>
</div>';
// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

// set style for barcode
$style = array(
	'border' => 2,
	'vpadding' => 'auto',
	'hpadding' => 'auto',
	'fgcolor' => array(0,0,0),
	'bgcolor' => false, //array(255,255,255)
	'module_width' => 1, // width of a single module in points
	'module_height' => 1 // height of a single module in points
);

// QRCODE,L : QR-CODE Low error correction
$mensaje="u6hola mundo \n" . " hola doctor \n" . "holaslslsas \n". "  snjkasnhsjkahuskjbskjhbsa \n" . " memsankjsansajknsaknsak";
$mensaje2="hola mundo \n" . " hola doctor \n" . "holaslslsas \n". "  snjkasnhsjkahuskjbskjhbsa \n" . " memsankjsansajknsaknsakssaassasaassasasasasasasa";
$pdf->write2DBarcode($mensaje, 'QRCODE,L', 80, 210, 50, 50, $style, 'N');
$pdf->Text(20, 25, 'QRCODE L');

// QRCODE,M : QR-CODE Medium error correction
$pdf->write2DBarcode($mensaje2, 'QRCODE,M', 20, 90, 50, 50, $style, 'N');
$pdf->Text(20, 85, 'QRCODE M');


// -------------------------------------------------------------------
// PDF417 (ISO/IEC 15438:2006)

/*

 The $type parameter can be simple 'PDF417' or 'PDF417' followed by a
 number of comma-separated options:

 'PDF417,a,e,t,s,f,o0,o1,o2,o3,o4,o5,o6'

 Possible options are:

 	a  = aspect ratio (width/height);
 	e  = error correction level (0-8);

 	Macro Control Block options:

 	t  = total number of macro segments;
 	s  = macro segment index (0-99998);
 	f  = file ID;
 	o0 = File Name (text);
 	o1 = Segment Count (numeric);
 	o2 = Time Stamp (numeric);
 	o3 = Sender (text);
 	o4 = Addressee (text);
 	o5 = File Size (numeric);
 	o6 = Checksum (numeric).

 Parameters t, s and f are required for a Macro Control Block, all other parameters are optional.
 To use a comma character ',' on text options, replace it with the character 255: "\xff".

*/

// -------------------------------------------------------------------

// new style
$style = array(
	'border' => 2,
	'padding' => 'auto',
	'fgcolor' => array(0,0,255),
	'bgcolor' => array(255,255,64)
);

// QRCODE,H : QR-CODE Best error correction
$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,H', 80, 210, 50, 50, $style, 'N');
$pdf->Text(80, 205, 'QRCODE H - COLORED');



// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('fichamedica.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
