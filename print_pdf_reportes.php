<?php  
require __DIR__.'./vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
// Recoger el contenido de otro fichero
ob_start();
require_once 'print_pdf_reportes_view.php';
$html = ob_get_clean();
$html2pdf = new Html2Pdf('P', 'A4', 'es', 'true', 'UTF-8');
$html2pdf->pdf->SetDisplayMode('fullpage');
$html2pdf->writeHTML($html);
$html2pdf->output('Informe_Facturas_ZUMAQUE.pdf');

?>