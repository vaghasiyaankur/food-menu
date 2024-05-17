<?php

namespace App\Services;

use Dompdf\Dompdf;

class PdfService
{
    public function generatePdf($htmlContent)
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml($htmlContent);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Return the PDF content
        return $dompdf->output();
    }
}
