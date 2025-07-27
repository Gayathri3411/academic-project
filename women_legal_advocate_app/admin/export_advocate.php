<?php
include('../includes/db.php');

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=advocates.csv");

$output = fopen("php://output", "w");
fputcsv($output, array('ID', 'Name', 'Email', 'Mobile', 'City', 'Status'));

$result = $conn->query("SELECT * FROM advocates WHERE status='Approved'");
while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}
fclose($output);
exit;
