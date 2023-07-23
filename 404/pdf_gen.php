<?php
require('FPDF/fpdf.php');
require('db.php');

if(isset($_POST["generate"])){
	
if($_POST["selectedLength"] != ""){
	
	$limit = $_POST["selectedLength"];	
	
	$pdf = new FPDF('P','mm','A4');
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(20,18,'SN.',1,0,'C');
	$pdf->Cell(65,18,'To-Number',1,0,'C');
	$pdf->Cell(35,18,'Amount',1,0,'C');
	$pdf->Cell(70,18,'Date',1,1,'C');
	
	
	$pdf->SetFont('Arial','',18);
	$query = "SELECT * FROM `admin_notification` WHERE seen='0' and wAction<3 and notificationType=2 and userType=0 order by withdraw asc limit $limit";
                                $result = mysqli_query($con, $query);
                                if ($result) {
                                    $i = 0;
                                    while ($deposit = mysqli_fetch_assoc($result)) {
                                        $i++;
	
									$pdf->Cell(20,18,$i,1,0,'C');
									$pdf->Cell(65,18,$deposit['to_number'],1,0,'C');
									$pdf->Cell(35,18,$deposit['withdraw'],1,0,'C');
									$pdf->Cell(70,18,$deposit['time'],1,1,'C');
									}
									$querys = "SELECT sum(withdraw) as total FROM `admin_notification` WHERE seen='0' and wAction<3 and notificationType=2 and userType=0 order by withdraw asc limit $limit";
                                $results = mysqli_query($con, $querys);
                                if ($results){
                                    
                                    while ($deposits = mysqli_fetch_assoc($results)) {
                                        $pdf->Cell(190,10,$deposits['total'],1,1,'C');
									}
								}
							}
	$pdf->Output();
}
}
?>
