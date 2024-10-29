<?php
// Start output buffering
ob_start();

require('fpdf.php'); // Include FPDF library
include('user_dashboard.php');
$conn = mysqli_connect('localhost', 'root', '', 'enumration_db');

// Fetch all the data you need from the database
require_once(__DIR__ . '/../classes/FacultyData.php');
$facultyDataTable = new FacultyDataTable();
$facultyData = $facultyDataTable->readAllWithJoins(); // Fetch all faculty data records

// Check if the 'generate_pdf' button was clicked
if (isset($_POST['generate_pdf'])) {
    $totalDuration = $_POST['totalDuration'];
    $totalAmount = $_POST['totalAmount'];
    $userId = $_POST['userId'];
    $_SESSION['userid'] = $userId;

    // Create a new PDF instance
    $pdf = new FPDF();
    $pdf->AddPage();

    // Set font for the PDF
    $pdf->SetFont('Arial', 'B', 16);

    // Title
    $pdf->Cell(0, 30, 'Faculty Remuneration Details', 1, 1, 'C');

    // Add User ID and Total Details
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, "User ID: " . $userId, 0, 1);
    $pdf->Cell(0, 10, "Username: " . $_SESSION['username'], 0, 1);

    $pdf->Ln(); // Line break

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(10, 10, 'ID', 1);
    $pdf->Cell(20, 10, 'Username', 1);
    $pdf->Cell(20, 10, 'Class', 1);
    $pdf->Cell(20, 10, 'Duration', 1);
    $pdf->Cell(20, 10, 'Exam Type', 1);
    $pdf->Cell(30, 10, 'Exam Pattern', 1);  // New column
    $pdf->Cell(30, 10, 'Department', 1);    // New column
    $pdf->Cell(20, 10, 'Time', 1);           // New column
    $pdf->Cell(20, 10, 'Amount', 1);
    $pdf->Ln(); // Line break

    // Add the data rows
    $pdf->SetFont('Arial', '', 10);
    foreach ($facultyData as $data) {
        $pdf->Cell(10, 10, $_SESSION['userid'], 1);
        $pdf->Cell(20, 10, $_SESSION['username'], 1);
        $pdf->Cell(20, 10, $data['class_name'], 1);
        $pdf->Cell(20, 10, $data['duration_name'] . ' Hours', 1);
        $pdf->Cell(20, 10, $data['exam_type_name'], 1);
        $pdf->Cell(30, 10, $data['exam_pattern_name'], 1); // New data
        $pdf->Cell(30, 10, $data['department_name'], 1);   // New data
        $pdf->Cell(20, 10, $data['time_name'], 1);          // New data
        $pdf->Cell(20, 10, '' . $data['remun'], 1);
        $pdf->Ln(); // Line break for the next row
    }


    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(30, 10, 'Data Id', 1);
    $pdf->Cell(30, 10, 'Total Duration', 1);
    $pdf->Cell(30, 10, 'Total Amount', 1);

    $pdf->Ln();

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(30, 10, 'Total', 1);
    $pdf->Cell(30, 10, $totalDuration . '  Hours', 1);
    $pdf->Cell(30, 10, $totalAmount, 1);

    // End output buffering and clear the output buffer
    ob_end_clean();


    // Output the PDF to browser
    $pdf->Output('I', 'faculty_remuneration_details.pdf'); // 'I' for inline display in browser
}
