<?php
include('../db/db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require('../fpdf/fpdf.php');

$user_id = $_SESSION['user_id'];

$query = "
    SELECT 
        p.case_type, p.problem, s.solution, s.solution_date, a.name AS advocate_name
    FROM 
        user_problems p
    LEFT JOIN 
        advocate_solutions s ON p.problem_id = s.problem_id
    LEFT JOIN 
        advocate a ON s.advocate_id = a.advocate_id
    WHERE 
        p.user_id = '$user_id'
";

$result = mysqli_query($conn, $query);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(190, 10, 'Advocate Solutions to My Problems', 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40, 10, 'Case Type', 1);
$pdf->Cell(60, 10, 'Problem', 1);
$pdf->Cell(60, 10, 'Solution', 1);
$pdf->Cell(30, 10, 'Advocate', 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 10);

while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(40, 10, $row['case_type'], 1);
    $pdf->Cell(60, 10, substr($row['problem'], 0, 30), 1);
    $pdf->Cell(60, 10, substr($row['solution'] ?? 'Pending', 0, 30), 1);
    $pdf->Cell(30, 10, $row['advocate_name'] ?? '-', 1);
    $pdf->Ln();
}

$pdf->Output('I', 'solutions.pdf');
