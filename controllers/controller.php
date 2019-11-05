<?php
require('public/fpdf.php');
require_once "model/Conexion.php";

    class PDF extends FPDF
    {
        function Header()
        {
            $this->Image('public/images/unjbg.jpg', 5, 5, 20 );
            $this->SetFont('Arial','B',15);
            $this->Cell(30);
            $this->Cell(140,10, 'Reporte De Ventas',0,0,'C');
            $this->Ln(20);
        }

        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','I', 8);
            $this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
        }
    }

    $query = "CALL `prueba11`('2019-01-19')";
	$resultado = $mysqli->query($query);

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(48,6,'id_cli',1,0,'C',1);
    $pdf->Cell(48,6,'Nombre',1,0,'C',1);
    $pdf->Cell(48,6,'Monto',1,0,'C',1);
	$pdf->Cell(48,6,'Fecha',1,1,'C',1);

	$pdf->SetFont('Arial','',10);

	while($row = $resultado->fetch_assoc())
	{
        $pdf->Cell(48,6,utf8_decode($row['id_cli']),1,0,'C');
        $pdf->Cell(48,6,$row['nombre'],1,0,'C');
        $pdf->Cell(48,6,$row['monto'],1,0,'C');
		$pdf->Cell(48,6,utf8_decode($row['fecha']),1,1,'C');
    }
    // $pdf->Cell(40,10,date('d/m/Y H:i:s'),0,1,'L');
	$pdf->Output();
/* // Ejemplo 1

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40,10,'!Hola Mundo!');
    $pdf->Output();
*/
    class MvcController{

        #LLAMADA A LA PLANTILLA
        #-------------------------------------

        public function pagina(){

            include "views/template.php";

        }
    }
?>
