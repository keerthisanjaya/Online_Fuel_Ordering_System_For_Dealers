<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');
use Dompdf\Dompdf;


class Pdf {
	
    function createPDF($html, $filename='', $download=TRUE, $paper='A4', $orientation='portrait'){
        $dompdf = new Dompdf();
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
		$pdfroot  = dirname(dirname(__FILE__));
        $pdfroot .= '../../assets/pdf/invoice/'.$filename.'.pdf';
        $dompdf->render();
		$pdf_string = $dompdf->output();
        file_put_contents($pdfroot, $pdf_string );
        if($download)
            $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
            
		if(file_exists($pdfroot)){
			return $pdfroot;
			
		}
		
    }
}
?>