<?php
session_start();
include("../connect.php");
require('pdf/fpdf.php');
if(isset($_SESSION['name']) AND ($_SESSION['firstname']) AND($_SESSION['mdp'])){
        
}else{
    header('location:login.php');
}

$id = $_GET['month'];
$q=mysqli_fetch_array(mysqli_query($conn,"SELECT libelle from month where id='$id'"));
/* the request that I will use in order to print a pdf 
select p.name,hours, publication, videos, nouvelles_visites, cours_biblique from publishers 
as p inner join report as r on p.id = r.publishers_id inner join month as m on 
m.id = r.month_id inner join groups as g on p.groups_id = g.id where month_id= 1;  
*/
$str= "";
$str = utf8_decode($str);
$str = iconv('UTF-8', 'windows-1252', $str);

$pdf = new FPDF('p', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial','I',16);
$pdf->Cell(40,10,'RAPPORT DE PREDICATION POUR LE MOIS DE '.$q['libelle']);
$pdf->setTextColor(0,0,0);
$pdf->setRightMargin(2);
$pdf->Ln(18);
$pdf->Cell(35,5,'Name', 1, 0, 'C');
$pdf->Cell(30,5,'Heures', 1,0,'C');
$pdf->Cell(30,5,'Pub', 1,0,'C');
$pdf->Cell(30,5,'Videos', 1,0,'C');
$pdf->Cell(30,5,'NVisites', 1,0,'C');
$pdf->Cell(30,5,'Cours', 1,0,'C');

if(isset($_GET['month'])){
    $id = $_GET['month'];
    $query = mysqli_query($conn, "select p.name,hours, publication, videos, nouvelles_visites, cours_biblique from publishers 
                            as p inner join report as r on p.id = r.publishers_id inner join month as m on 
                            m.id = r.month_id inner join groups as g on p.groups_id = g.id where month_id='$id'");

    while($row=mysqli_fetch_array($query)){
        $pdf->SetFont('Courier','I',16);
        $pdf->Ln(5);
        $pdf->Cell(35,5,$row['name'], 1,0,'C');
        $pdf->Cell(30,5,$row['hours'], 1,0,'C');
        $pdf->Cell(30,5,$row['publication'], 1,0,'C');
        $pdf->Cell(30,5,$row['videos'], 1,0,'C');
        $pdf->Cell(30,5,$row['nouvelles_visites'], 1,0,'C');
        $pdf->Cell(30,5,$row['cours_biblique'], 1,0,'C');
    }

}
$pdf->Output();