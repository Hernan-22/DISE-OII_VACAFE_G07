<?php 
require_once("../pdf/fpdf.php");
require_once("../Conexion/Modelo.php");
$modelo = new Modelo();
class PDF extends FPDF{
            // Cabecera de página
        function Header(){
            // Arial bold 15
            $this->SetFont('Arial','B',12);
            // Movernos a la derecha
            $this->Cell(80);
            // Título
            $this->Cell(30,10,'REPORTE DE COMPRAS POR PROVEEDOR',0,0,'C');
            // Salto de línea
            $this->Ln(20);
            
        }

            // Pie de página
        function Footer(){
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
            $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
        }
        function FancyTable($header,$result)
        {
            // Colores, ancho de línea y fuente en negrita

            $this->SetFillColor(32, 178, 170);//Color de las cabeceras
            $this->SetTextColor(255);
            //Color de las lineas de la tabla
            $this->SetDrawColor(176, 196, 222);
            $this->SetLineWidth(.3);
            $this->SetFont('','B');
            // Cabecera
            $w = array(45, 30, 60, 30, 30);
            for($i=0;$i<count($header);$i++)
                $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
            $this->Ln();
            // Restauración de colores y fuentes
            $this->SetFillColor(224,235,255);
            $this->SetTextColor(0);
            $this->SetFont('');
            
            // Datos
            
            if($result[0]=='1'){
                $fill = false;
                foreach ($result[2] as $row) {

                    $tipo = ($row['tipo_persona']==2) ? "Empleado": "Administrador"; 

                    $this->Cell($w[0],6,$row['nombre'],'LR',0,'L',$fill);
                    $this->Cell($w[1],6,$row['dui'],'LR',0,'L',$fill);
                    $this->Cell($w[2],6,$row['email'],'LR',0,'L',$fill);
                    $this->Cell($w[3],6,$row['usuario'],'LR',0,'L',$fill);
                    $this->Cell($w[4],6,$tipo,'LR',0,'L',$fill);
                     $this->Ln();
                    $fill = !$fill;
                }

            }else {
                print json_encode(array("Error",$_POST,$result));
                exit();
            }
            
            $this->Cell(array_sum($w),0,'','T');
        }
    }
    
    
    $pdf = new PDF();   
    // Títulos de las columnas
    $header = array('Empleado', 'Dui', 'Email', 'Usuario', 'Cargo');
    $sql = "SELECT
                nombre, 
                usuario, 
                email, 
                dui, 
                tipo_persona
            FROM
                tb_usuario
                INNER JOIN
                tb_persona
                ON 
                    tb_usuario.id_persona = tb_persona.id";
            $result = $modelo->get_query($sql);
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->FancyTable($header,$result);
    

    $pdf->Output();
?>