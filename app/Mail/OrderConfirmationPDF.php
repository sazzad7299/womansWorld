<?php

namespace App\Mail;

use Dompdf\Dompdf;
use App\Models\Order;
use App\Models\WebInfo;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\PDF;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderConfirmationPDF extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The PDF to attach to the email.
     *
     * @var Dompdf
     */
    protected $orders;
    protected $data;

    /**
     * Create a new message instance.
     *
     * @param Dompdf $pdf
     */
    public function __construct($orders, $data)
    {
        $this->orders = $orders;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        $order = Order::where('id', $this->orders)->with('orderDetails')->first();
        $webinfo = WebInfo::where('id', 1)->first();
        // Disable SSL verification
        $opts = [
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
            ],
        ];

        $imageData = base64_encode(file_get_contents(asset($webinfo->logo), false, stream_context_create($opts)));


        $html = view('emails.order', ['order' => $order, 'logo' => $imageData])->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $pdfData = $dompdf->output();

        return $this->view('emails.blank',['texts' =>$data['message']])
            ->subject($data['subject'])
            ->attachData($pdfData, 'invoice.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
