<?php
require('../fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Test PDF Generated Successfully!', 0, 1, 'C');
$pdf->Output('D', 'test.pdf');
?>
