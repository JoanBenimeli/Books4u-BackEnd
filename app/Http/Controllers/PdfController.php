<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;
use App\Mail\facturaMailable;

class PdfController extends Controller
{
    public function generateAndSendPdf(Request $request)
    {
        $pdfName = uniqid('factura_') . '.pdf';
        $datos = (object) $request->all();
        $pdf = PDF::loadView('email.facturaPDF', ['datos' => $datos]);
        $pdfPath = public_path('/facturas/'.$pdfName);
        $pdf->save($pdfPath);

        Mail::to('joan05benimeli@gmail.com')->send(new facturaMailable($datos, $pdfPath));

        return 'PDF generated and sent successfully!';
    }
}
