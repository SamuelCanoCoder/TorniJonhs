<?php

	# Incluyendo librerias necesarias #
    require_once('./TCPDF-main/tcpdf.php');

	$pdf = new TCPDF('P','mm','Letter');
	$pdf->SetMargins(17,17,17);
	$pdf->AddPage();

	# Logo de la empresa formato png #
	$pdf->Image('img/logo2.jpeg',165,12,35,35,'jpeg');

	# Encabezado y datos de la empresa #
	$pdf->SetFont('helvetica','B',16);
	$pdf->SetTextColor(32,100,210);
	$pdf->Cell(150,10,(strtoupper("Nombre de empresa")),0,0,'L');

	$pdf->Ln(9);

	$pdf->SetFont('helvetica','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(150,9,("RUC: 0000000000"),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,("Direccion San Salvador, El Salvador"),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,("Teléfono: 00000000"),0,0,'L');

	$pdf->Ln(5);

	$pdf->Cell(150,9,("Email: correo@ejemplo.com"),0,0,'L');

	$pdf->Ln(10);

	$pdf->SetFont('helvetica','',10);
	$pdf->Cell(30,7,("Fecha de emisión:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(116,7,(date("d/m/Y", strtotime("13-09-2022"))." ".date("h:s A")),0,0,'L');
	$pdf->SetFont('helvetica','B',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(35,7,(strtoupper("Factura Nro.")),0,0,'C');

	$pdf->Ln(7);

	$pdf->SetFont('helvetica','',10);
	$pdf->Cell(12,7,("Cajero:"),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(134,7,("Carlos Alfaro"),0,0,'L');
	$pdf->SetFont('helvetica','B',10);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,7,(strtoupper("1")),0,0,'C');

	$pdf->Ln(10);

	$pdf->SetFont('helvetica','',10);
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(13,7,("Cliente:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(60,7,("Carlos Alfaro"),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(8,7,("Doc: "),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(60,7,("DNI: 00000000"),0,0,'L');
	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(7,7,("Tel:"),0,0,'L');
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(35,7,("00000000"),0,0);
	$pdf->SetTextColor(39,39,51);

	$pdf->Ln(7);

	$pdf->SetTextColor(39,39,51);
	$pdf->Cell(6,7,("Dir:"),0,0);
	$pdf->SetTextColor(97,97,97);
	$pdf->Cell(109,7,("San Salvador, El Salvador, Centro America"),0,0);

	$pdf->Ln(9);

	# Tabla de productos #
	$pdf->SetFont('helvetica','',8);
	$pdf->SetFillColor(23,83,201);
	$pdf->SetDrawColor(23,83,201);
	$pdf->SetTextColor(255,255,255);
	$pdf->Cell(90,8,("Descripción"),1,0,'C',true);
	$pdf->Cell(15,8,("Cant."),1,0,'C',true);
	$pdf->Cell(25,8,("Precio"),1,0,'C',true);
	$pdf->Cell(19,8,("Desc."),1,0,'C',true);
	$pdf->Cell(32,8,("Subtotal"),1,0,'C',true);

	$pdf->Ln(8);

	
	$pdf->SetTextColor(39,39,51);



	/*----------  Detalles de la tabla  ----------*/
	$pdf->Cell(90,7,("Nombre de producto a vender"),'L',0,'C');
	$pdf->Cell(15,7,("7"),'L',0,'C');
	$pdf->Cell(25,7,("$10 USD"),'L',0,'C');
	$pdf->Cell(19,7,("$0.00 USD"),'L',0,'C');
	$pdf->Cell(32,7,("$70.00 USD"),'LR',0,'C');
	$pdf->Ln(7);
	/*----------  Fin Detalles de la tabla  ----------*/


	
	$pdf->SetFont('helvetica','B',9);
	
	# Impuestos & totales #
	$pdf->Cell(100,7,(''),'T',0,'C');
	$pdf->Cell(15,7,(''),'T',0,'C');
	$pdf->Cell(32,7,("SUBTOTAL"),'T',0,'C');
	$pdf->Cell(34,7,("+ $70.00 USD"),'T',0,'C');

	$pdf->Ln(7);

	$pdf->Cell(100,7,(''),'',0,'C');
	$pdf->Cell(15,7,(''),'',0,'C');
	$pdf->Cell(32,7,("IVA (13%)"),'',0,'C');
	$pdf->Cell(34,7,("+ $0.00 USD"),'',0,'C');

	$pdf->Ln(7);

	$pdf->Cell(100,7,(''),'',0,'C');
	$pdf->Cell(15,7,(''),'',0,'C');


	$pdf->Cell(32,7,("TOTAL A PAGAR"),'T',0,'C');
	$pdf->Cell(34,7,("$70.00 USD"),'T',0,'C');

	$pdf->Ln(7);

	$pdf->Cell(100,7,(''),'',0,'C');
	$pdf->Cell(15,7,(''),'',0,'C');
	$pdf->Cell(32,7,("TOTAL PAGADO"),'',0,'C');
	$pdf->Cell(34,7,("$100.00 USD"),'',0,'C');

	$pdf->Ln(7);

	$pdf->Cell(100,7,(''),'',0,'C');
	$pdf->Cell(15,7,(''),'',0,'C');
	$pdf->Cell(32,7,("CAMBIO"),'',0,'C');
	$pdf->Cell(34,7,("$30.00 USD"),'',0,'C');

	$pdf->Ln(7);

	$pdf->Cell(100,7,(''),'',0,'C');
	$pdf->Cell(15,7,(''),'',0,'C');
	$pdf->Cell(32,7,("USTED AHORRA"),'',0,'C');
	$pdf->Cell(34,7,("$0.00 USD"),'',0,'C');

	$pdf->Ln(12);

	$pdf->SetFont('helvetica','',9);

	$pdf->SetTextColor(39,39,51);
	$pdf->MultiCell(0,9,("*** Precios de productos incluyen impuestos. Para poder realizar un reclamo o devolución debe de presentar esta factura ***"),0,'C',false);

	$pdf->Ln(9);

	# Codigo de barras #

	# Nombre del archivo PDF #
	$pdf->Output('C:/xampp/htdocs/FolderProyectos/TorniJonhs/PDFS/prueba.pdf', 'F');