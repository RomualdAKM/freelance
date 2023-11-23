<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FactureMail extends Mailable
{
    use Queueable, SerializesModels;

    public $facture;
    public $item_factures;
    public $user;
    public $pdfData;
    public $pdfFileName;

    public function __construct($facture,$user, $item_factures, $pdfData, $pdfFileName)
    {
        $this->facture = $facture;
        $this->user = $user;
        $this->item_factures = $item_factures;
        $this->pdfData = $pdfData;
        $this->pdfFileName = $pdfFileName;
    }

    public function build()
    {
        return $this->subject('Facture Mail')
                    ->view('factures.download')
                    ->attachData($this->pdfData, $this->pdfFileName, ['mime' => 'application/pdf']);
    }
}
