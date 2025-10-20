<?php
require_once __DIR__ . '/../librarys/fpdf/fpdf.php';


class PDFReclamo extends FPDF {

    // === CABECERA ===
    function Header() {
        // Fondo de cabecera
        $this->SetFillColor(230, 240, 255); // azul muy claro
        $this->Rect(0, 0, 210, 30, 'F');

        // Logo
        if (file_exists('../../assets/img/logo/logo.svg')) {
            $this->Image('../../assets/img/logo/logo.svg', 10, 8, 20);
        }

        // Título principal
        $this->SetFont('Arial', 'B', 18);
        $this->SetTextColor(30, 50, 100);
        $this->Cell(0, 15, 'Comprobante de Reclamo', 0, 1, 'C');
        $this->Ln(10);
    }

    // === PIE DE PÁGINA ===
    function Footer() {
        $this->SetY(-20);
        $this->SetFont('Arial', 'I', 9);
        $this->SetTextColor(130,130,130);
        $this->Cell(0, 10,  utf8_decode('Página '.$this->PageNo().'/{nb}  |  RRHH Digital'), 0, 0, 'C');
    }

    // === BLOQUE DE DATOS DEL RECLAMO ===
    function bloqueDatos($reclamo) {
        $this->SetFont('Arial','B',14);
        $this->SetTextColor(40,60,120);
        $this->Cell(0,10,'Detalles del Reclamo',0,1,'L');
        $this->Ln(3);

        // Caja de fondo suave
        $this->SetFillColor(245, 247, 255);
        $this->SetDrawColor(200,200,200);
        $this->Rect(10, $this->GetY(), 190, 55, 'FD');
        $this->Ln(4);

        $this->SetFont('Arial','',12);
        $this->SetTextColor(50,50,50);

        $this->Cell(45,8,'ID Reclamo:',0,0); 
        $this->Cell(60,8,utf8_decode($reclamo['ID_RECLAMO']),0,1);

        $this->Cell(45,8,'Empleado:',0,0);
        $this->Cell(60,8,utf8_decode($reclamo['nombre_empleado'].' '.$reclamo['apellido_empleado']),0,1);

        $this->Cell(45,8,'Supervisor:',0,0);
        $this->Cell(60,8,utf8_decode($reclamo['nombre_supervisor'].' '.$reclamo['apellido_supervisor']),0,1);

        $this->Cell(45,8,'Fecha:',0,0);
        $this->Cell(60,8,utf8_decode($reclamo['fecha_denuncia']),0,1);

        $this->Cell(45,8,'Estado:',0,0);
        $this->SetFont('Arial','B',12);
        $this->SetTextColor(20,100,160);
        $this->Cell(60,8,ucfirst($reclamo['estado']),0,1);
        $this->Ln(10);
    }

    // === BLOQUE DE DESCRIPCIÓN / IMPACTO / SOLUCIÓN ===
    function bloqueTexto($titulo, $contenido, $color = [240,240,240]) {
        if(empty($contenido)) return;
        $this->SetFont('Arial','B',13);
        $this->SetTextColor(40,60,120);
        $this->Cell(0,10,utf8_decode($titulo),0,1,'L');

        $this->SetFillColor($color[0], $color[1], $color[2]);
        $this->SetDrawColor(220,220,220);
        $this->SetFont('Arial','',12);
        $this->SetTextColor(50,50,50);
        $this->MultiCell(0,8,utf8_decode($contenido),0,'L',true);
        $this->Ln(5);
    }

    // === BLOQUE DE COMENTARIOS ===
    function imprimirComentarios($comentarios) {
        if(empty($comentarios)) return;

        $this->SetFont('Arial','B',14);
        $this->SetTextColor(40,60,120);
        $this->Cell(0,10,'Comentarios / Respuestas',0,1,'L');
        $this->Ln(2);

        foreach($comentarios as $c) {
            $this->SetFillColor(250,250,255);
            $this->SetDrawColor(220,220,220);
            $this->Rect(10, $this->GetY(), 190, 25, 'FD');
            $this->Ln(3);

            $this->SetFont('Arial','B',12);
            $this->SetTextColor(20,60,140);
            $this->Cell(0,6,$c['nombre_empleado'].' '.$c['apellido_empleado'].' - '.$c['fecha_respuesta'],0,1,'L');

            $this->SetFont('Arial','',11);
            $this->SetTextColor(60,60,60);
            $this->MultiCell(0,6,$c['respuesta']);
            $this->Ln(2);
        }
    }
}


?>