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
        $pdfName = uniqid('factura_Books4u_') . '.pdf';
        $datos = (object) $request->all();

        $pdf = PDF::loadView('email.facturaPDF', ['datos' => $datos]);
        $pdfPath = public_path('/facturas/'.$pdfName);
        $pdf->save($pdfPath);

        Mail::to($datos->userLog['email'])->send(new facturaMailable($datos, $pdfPath));

        return 'PDF generated and sent successfully!';
    }
}
