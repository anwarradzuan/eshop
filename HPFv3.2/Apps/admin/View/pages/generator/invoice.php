<?php


$id = url::get(3);

$i = invoices::getBy(["i_id" => $id]);

if(count($i) > 0){
    $i = $i[0];
    
    
    //$pdf = new \FPDF\FPDF();
    // $pdf = new PDF;
    // $pdf->AddPage();
    // $pdf->SetFont('Arial','B',16);
    // $pdf->Cell(40,10,'Hello World!');
    // $pdf->Output();
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML('<h1>Hello world!</h1>');
    $mpdf->Output();
    
}else{
    Page::Load("404");
}