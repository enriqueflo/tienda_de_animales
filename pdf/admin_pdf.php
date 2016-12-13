<?php
    session_start();
    include("../fpdf/fpdf.php");
    require_once("../class/class.php");
    require_once("../class/consultas.php");
    define('EURO',chr(128));
    $trabajo=new Trabajo();
    $consulta=new Consultas();
    $datos=$trabajo->consultas($consulta->getPorFactura($_GET["id"]));
    $productos=$trabajo->consultas($consulta->getLineaCompra($_GET["id"]));
    $labels_productos=array("Marca", "Nombre","Cantidad","Precio unitario (".EURO.")","Precio linea (".EURO.")");
    $pos_productos=array(30, 80, 18, 30, 30);
    $altura=(15*7)+29;
    if(strlen($datos[0]["cp_calle"])==4){
    	$cp="0".$datos[0]["cp_calle"];
    }
    else{
    	$cp=$datos[0]["cp_calle"];
    }
    if(strlen($datos[0]["esc_user"])==0){
    	$esc="-";
    }
    else{
    	$esc=$datos[0]["esc_user"];
    }
    if(strlen($datos[0]["piso_user"])==0){
    	$piso="-";
    }
    else{
    	$piso=$datos[0]["piso_user"]."º";
    }
    if(strlen($datos[0]["puerta_user"])==0){
    	$puerta="-";
    }
    else{
    	$puerta=$datos[0]["puerta_user"]."ª";
    }
    if(strlen($datos[0]["movil_user"])==0){
    	$movil="-";
    }
    else{
    	$movil=$datos[0]["movil_user"];
    }
    if(strlen($datos[0]["phone_user"])==0){
    	$phone="-";
    }
    else{
    	$phone=$datos[0]["phone_user"];
    }
    if($datos[0]["gastos_compra"]==0){
    	$gastos="-";
    }
    else{
    	$gastos="5 ".EURO;
    }
    if(strlen($datos[0]["id_compra"])==1){
    	$factura="000000000".$datos[0]["id_compra"];
    }
    else if(strlen($datos[0]["id_compra"])==2){
    	$factura="00000000".$datos[0]["id_compra"];
    }
    else if(strlen($datos[0]["id_compra"])==3){
    	$factura="0000000".$datos[0]["id_compra"];
    }
    else if(strlen($datos[0]["id_compra"])==3){
    	$factura="000000".$datos[0]["id_compra"];
    }
    else if(strlen($datos[0]["id_compra"])==4){
    	$factura="00000".$datos[0]["id_compra"];
    }
    else if(strlen($datos[0]["id_compra"])==5){
    	$factura="0000".$datos[0]["id_compra"];
    }
    else if(strlen($datos[0]["id_compra"])==6){
    	$factura="000".$datos[0]["id_compra"];
    }
    else if(strlen($datos[0]["id_compra"])==7){
    	$factura="00".$datos[0]["id_compra"];
    }
    else if(strlen($datos[0]["id_compra"])==8){
    	$factura="0".$datos[0]["id_compra"];
    }
    else{
    	$factura=$datos[0]["id_compra"];
    }
    class MyPDF extends FPDF{

        private $codi_factura;

        public function Header(){
            $this->Image("../img/logo.jpg", 10, 20, 60, 20);
            $this->SetFont('Arial', "B", 24);
            $this->Cell(270, 45, "Factura cod. ".$this->codi_factura, 0, 0, "C");
            $this->Ln(10);
            $this->SetFont('Arial', "B", 6);
            $this->Cell(185, 45, "Passatge de Vila i Rosell 6", 0, 0, "R");
            $this->Ln(3);
            $this->SetFont('Arial', "B", 6);
            $this->Cell(185, 45, "c.p.  08032", 0, 0, "R");
            $this->Ln(3);
            $this->SetFont('Arial', "B", 6);
            $this->Cell(185, 45, "Barcelona", 0, 0, "R");
            $this->Ln(3);
            $this->SetFont('Arial', "B", 6);
            $this->Cell(185, 45, "TEL.  93-357-49-99", 0, 0, "R");
            $this->Ln(3);
            $this->SetFont('Arial', "B", 6);
            $this->Cell(185, 45, "N.I.F.  43423329-L", 0, 0, "R");
            $this->Ln(3);
            $this->SetFont('Arial', "B", 6);
            $this->Cell(185, 45, "Correo.  enriqueflojimeno@gmail.com", 0, 0, "R");
            $this->Ln(5);
        }

        public function SetCodeFacture($codeFacture){
            $this->codi_factura=$codeFacture;
        }

    }
    //$labels_cliente=array();
    
    $new_pdf=new MyPDF();
    $new_pdf->SetCodeFacture($factura);
    $new_pdf->addPage();
    $new_pdf->SetFont('Arial', "B", 16);
    $new_pdf->Cell(1, 70, "Datos cliente", 0, 0, "");
    $new_pdf->Line(10,78,198,78);
    $new_pdf->Rect(7.85, 67.85, 192.15 , 33.15, '');
    $new_pdf->Ln(10);
    $new_pdf->SetFont('Arial', "B", 10);
    $new_pdf->Cell(1, 70, utf8_decode("Nombre:"), 0, 0, "");
    $new_pdf->SetFont('Arial', "", 10);
    $new_pdf->Cell(30, 70, utf8_decode($datos[0]["nom_user"]."      ".$datos[0]["ape_uno_user"]."      ".
    		              $datos[0]["ape_dos_user"]), 0, 0, "L");
    $new_pdf->Ln(5);
    $new_pdf->SetFont('Arial', "B", 10);
    $new_pdf->Cell(1, 70, utf8_decode("Dirección:"), 0, 0, "");
    $new_pdf->SetFont('Arial', "", 10);
    $new_pdf->Cell(30, 70, utf8_decode($datos[0]["tipo_calle"]."    ".$datos[0]["nom_calle"]."    ".
    		              $datos[0]["num_user"]."    ".$esc."    ".$piso."    ".$puerta."    ".$cp."    ".
    		              $datos[0]["nom_ciudad"]."    Barcelona"), 0, 0, "L");
    $new_pdf->Ln(5);
    $new_pdf->SetFont('Arial', "B", 10);
    $new_pdf->Cell(1, 70, utf8_decode("Contactos:"), 0, 0, "");
    $new_pdf->SetFont('Arial', "", 10);
    $new_pdf->Cell(30, 70, utf8_decode("mail.... ".$datos[0]["mail_user"]).utf8_decode("      teléfono.... ").
    		               $phone.utf8_decode("     móvil.... ").$movil, 0, 0, "L");
    $new_pdf->Ln(20);
    $new_pdf->SetFont('Arial', "B", 16);
    $new_pdf->Cell(1, 70, "Lista de productos", 0, 0, "");
    $new_pdf->Line(10,119,198,119);
    $new_pdf->Rect(7.85, 105,192.15, $altura+0.15, '');
    $new_pdf->Ln(45);
    for ($i=0; $i < count($labels_productos); $i++) { 
        $new_pdf->SetFont('Arial', "", 8);
        $new_pdf->SetTextColor(255,255,255);
        $new_pdf->Cell($pos_productos[$i], 7,$labels_productos[$i], 1, 0, "C", true);
    }
    $new_pdf->SetTextColor(0,0,0);
    for ($i=0; $i < 15; $i++) { 
    	if($i%2==1){
    		$new_pdf->SetFillColor(160,160,160);
    	}
    	else{
    		$new_pdf->SetFillColor(255,255,255);
    	}
        $new_pdf->Ln(7);
        $new_pdf->Cell(30, 7, $productos[$i]["nom_marca"], 0, 0, "C", true);
        $new_pdf->Cell(80, 7, $productos[$i]["tipo_product"]." ".$productos[$i]["nom_product"], 0, 0, "C", true);
        $new_pdf->Cell(18, 7, $productos[$i]["cant_linea"], 0, 0, "C", true);
        $new_pdf->Cell(30, 7, $productos[$i]["preu_size"], 0, 0, "C", true);
        $new_pdf->Cell(30, 7, $productos[$i]["preu_linea"], 0, 0, "C", true);
    }
    $new_pdf->Ln(7);
    $new_pdf->Rect(128.85, $altura+105.20, 71.15, 9.45, '');
    $new_pdf->Rect(128.85, $altura+114.70, 71.15, 9.45, '');
    $new_pdf->SetFont('Arial', "B", 8);
    $new_pdf->Cell(150, 15,utf8_decode("gastos de envío")."(".EURO."):", 0, 0, "R");
    $new_pdf->SetFont('Arial', "", 8);
    $new_pdf->Cell(28, 15,$gastos, 0, 0, "R");
    $new_pdf->Ln(7);
    $new_pdf->SetFont('Arial', "B", 8);
    $new_pdf->Cell(151, 20,"Total (".EURO."):", 0, 0, "R");
    $new_pdf->SetFont('Arial', "", 8);
    $new_pdf->Cell(28, 20,$datos[0]["total_compra"], 0, 0, "R");
    $new_pdf->Output();
?>