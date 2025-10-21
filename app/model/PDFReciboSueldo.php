<?php
require_once __DIR__ . '/../librarys/fpdf/fpdf.php';

class PDFReciboSueldo extends FPDF {
    function Header(){
        $this->SetFillColor(230,240,255);
        $this->Rect(0,0,210,30,'F');
        if(file_exists(__DIR__ . '../../assets/img/logo/logo.svg')){
            $this->Image(__DIR__ . '../../assets/img/logo/logo.svg', 10,8,20);
        }
        $this->SetFont('Arial','B',18);
        $this->SetTextColor(30,50,100);
        $this->Cell(0,15,'Recibo de Sueldo',0,1,'C');
        $this->Ln(10);
    }

    function Footer(){
        $this->SetY(-20);
        $this->SetFont('Arial','I',9);
        $this->SetTextColor(130,130,130);
        $this->Cell(0,10,'Página '.$this->PageNo().'/{nb} | RRHH Digital',0,0,'C');
    }

    function bloqueEmpleado($empleado){
        $this->SetFont('Arial','B',14);
        $this->SetTextColor(40,60,120);
        $this->Cell(0,10,'Datos del Empleado',0,1,'L');
        $this->Ln(3);
        $this->SetFillColor(245,247,255);
        $this->SetDrawColor(200,200,200);
        $this->Rect(10,$this->GetY(),190,55,'FD');
        $this->Ln(4);

        $this->SetFont('Arial','',12);
        $this->Cell(50,8,'Nombre:',0,0);
        $this->Cell(50,8,mb_convert_encoding($empleado['Nombre'].' '.$empleado['Apellido'], 'ISO-8859-1', 'UTF-8'),0,1);
        $this->Cell(50,8,'Departamento:',0,0);
        $this->Cell(60,8,mb_convert_encoding($empleado['Departamento'], 'ISO-8859-1', 'UTF-8'),0,1);
        $this->Cell(50,8,'Puesto:',0,0);
        $this->Cell(60,8,mb_convert_encoding($empleado['Puesto'], 'ISO-8859-1', 'UTF-8'),0,1);
        $this->Cell(50,8,'Fecha de Contratación:',0,0);
        $this->Cell(60,8,$empleado['FECHA_CONTRATACION'],0,1);
        $this->Cell(50,8,'Periodo:',0,0);
        $this->Cell(60,8,$empleado['PERIODO'],0,1);
        $this->Ln(10);
    }

    function bloqueSueldo($recibo){
        $this->SetFont('Arial','B',14);
        $this->SetTextColor(40,60,120);
        $this->Cell(0,10,'Detalle de Haberes',0,1,'L');
        $this->Ln(3);
        $this->SetFillColor(245,247,255);
        $this->SetDrawColor(200,200,200);
        $this->Rect(10,$this->GetY(),190,50,'FD');
        $this->Ln(4);

        $this->SetFont('Arial','',12);
        $this->Cell(70,8,'Sueldo Base:',0,0);
        $this->Cell(60,8,'$'.$recibo['SUELDO_BASE'],0,1);
        $this->Cell(70,8,'Bonificaciones:',0,0);
        $this->Cell(60,8,'$'.$recibo['BONIFICACIONES'],0,1);
        $this->Cell(70,8,'Descuentos:',0,0);
        $this->Cell(60,8,'$'.$recibo['DESCUENTOS'],0,1);
        $this->SetFont('Arial','B',12);
        $this->Cell(70,8,'Sueldo Neto:',0,0);
        $this->Cell(60,8,'$'.$recibo['SUELDO_NETO'],0,1);
        $this->Ln(10);
    }
}
?>
